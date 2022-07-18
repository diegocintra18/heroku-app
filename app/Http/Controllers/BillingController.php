<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BillingController extends Controller
{
    public function makePayment(){
        
        $plan_value = 49.9;
        
        $payload = array(
            'merchant_key' => 'ISdjHg3YRKx0VOqpREJGx6edtlAXOG3B',
            'payment_method' => 'pix',
            'pix' => array(
                'expiration_days' => 1
            ),
            'amount' => $plan_value,
            'customer' => array(
                'firstname' => 'Diego',
                'lastname' => 'Cintra',
                'email' => 'diegoffcintra@gmail.com',
                'phoneNumber' => '16 991353306',
                'documentType' => 'cnpj',
                'documentNumber' => '36771571000177',
                'zipCode' => '14403450',
                'address' => 'Rua Ewerton de Paula Merlino',
                'number_home' => 2271,
                'complement' => '',
                'neighborhood' => 'Santa Cruz',
                'city' => 'Franca',
                'state' => 'SP',
                'ipAddress' => '127.0.0.1'
            )
        );
        
        $response = Http::post('https://www.2rpay.com.br/api/v1/transaction', json_encode($payload));

        dd($response->getBody());
    }
}
