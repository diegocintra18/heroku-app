<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class BillingController extends Controller
{
    public function checkout($hash){
        if(Clients::where('client_hash', $hash)->exists()){
            $client = json_decode(Clients::where('client_hash', $hash)->get())[0];
            return view('billing.paymentSelect', compact('client'));
        }else{
            return redirect()->route('welcome');
        }
    }
    
    public function makePayment(){
        
        $plan_value = "600";
        
        $response = Http::post('https://www.2rpay.com.br/api/v1/transaction', [
            'merchant_key' => 'ISdjHg3YRKx0VOqpREJGx6edtlAXOG3B',
            'payment_method' => 'pix',
            'pix' => array(
                'expiration_days' => 1
            ),
            'amount' => $plan_value,
            'customer' => array(
                'firstName' => 'Diego',
                'lastName' => 'Cintra',
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
            ),
            'postback_url' => 'localhost/callback/pix'
        ]);

        echo '<pre>', $response->body(), '</pre>';die;
    }
}
