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
            return view('billing.checkout', compact('client'));
        }else{
            return redirect()->route('welcome');
        }
    }
    
    public function makePayment(Request $request){

        $data = $request->all();
        $client = json_decode(Clients::where('client_hash', $data['client_hash'])->get())[0];
        
        $response = Http::post('https://www.2rpay.com.br/api/v1/transaction', [
            'merchant_key' => 'ISdjHg3YRKx0VOqpREJGx6edtlAXOG3B',
            'payment_method' => $data['payment_method'],
            $data['payment_method'] => array(
                'expiration_days' => 1
            ),
            'amount' => $data['plan_value'],
            'customer' => array(
                'firstName' => $client->name,
                'email' => $client->email,
                'phoneNumber' => $client->phone,
                'documentType' => 'cnpj',
                'documentNumber' => $client->cnpj,
                'zipCode' => $client->zipcode,
                'address' => $client->address_name,
                'number_home' => $client->address_number,
                'complement' => '',
                'neighborhood' => $client->district,
                'city' => $client->city,
                'state' => $client->state,
                'ipAddress' => strval($_SERVER['REMOTE_ADDR'])
            )
            //'postback_url' => 'localhost/callback/pix'
        ]);

        $paymentInfo = $response->body();

        return view('billing.success', compact('paymentInfo'));

        echo '<pre>', $response->body(), '</pre>';die;
    }
}
