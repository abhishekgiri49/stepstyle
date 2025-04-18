<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', [ProductController::class, 'home']);

Route::post('/create-crypto-payment', [PaymentController::class, 'createCryptoPayment']);
Route::get('/pay', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::post('/coinbase/webhook', [PaymentController::class, 'handleWebhook']);
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');