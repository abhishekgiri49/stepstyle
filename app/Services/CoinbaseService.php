<?php

namespace App\Services;

use GuzzleHttp\Client;

class CoinbaseService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('COINBASE_COMMERCE_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.commerce.coinbase.com/',
            'headers' => [
                'X-CC-Api-Key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createCharge(array $data)
    {
        $response = $this->client->post('charges', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }


    public function getCharge($chargeId)
    {
        $response = $this->client->get("charges/{$chargeId}");

        return json_decode($response->getBody(), true);
    }

    public function listCharges()
    {
        $response = $this->client->get('charges');

        return json_decode($response->getBody(), true);
    }
}
