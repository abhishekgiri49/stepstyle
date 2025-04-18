<?php

namespace App\Http\Controllers;

use App\Services\CoinbaseService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $coinbase;

    public function __construct(CoinbaseService $coinbase)
    {
        $this->coinbase = $coinbase;
    }
    public function createCryptoPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'crypto' => 'nullable|string',
        ]);
    
        $coinbase = new CoinbaseService();
    
        $chargeData = [
            'name' => 'Order Payment',
            'description' => 'Payment for cart items',
            'pricing_type' => 'fixed_price',
            'local_price' => [
                'amount' => $request->amount,
                'currency' => $request->currency,
            ],
            'metadata' => [
                'order_id' => uniqid(), // Generate a unique order ID
                'crypto_preference' => $request->crypto,
            ],
            'redirect_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ];
    
        $charge = $coinbase->createCharge($chargeData);
    
        return response()->json([
            'hosted_url' => $charge['data']['hosted_url'],
        ]);
    }
    public function createPayment(Request $request)
    {
        $chargeData = [
            'name' => 'Laravel Product',
            'description' => 'Payment for services',
            'pricing_type' => 'fixed_price',
            'local_price' => [
                'amount' => '10.00', // USD amount
                'currency' => 'USD',
            ],
            'metadata' => [
                'order_id' => '12345', // Custom order ID
            ],
            'redirect_url' => route('payment.success'), // Redirect after payment
            'cancel_url' => route('payment.cancel'), // Redirect if canceled
        ];

        $charge = $this->coinbase->createCharge($chargeData);

        return redirect($charge['data']['hosted_url']);
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('X-CC-Webhook-Signature');

        // Verify webhook signature (optional but recommended)
        // See: https://commerce.coinbase.com/docs/api/#webhooks

        $event = json_decode($payload, true);

        if ($event['event']['type'] === 'charge:confirmed') {
            // Payment successful, update your database
        }

        return response()->json(['success' => true]);
    }

    public function paymentSuccess()
    {
        return view('payment.success');
    }

    public function paymentCancel()
    {
        return view('payment.cancel');
    }
}