<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class BillingController extends Controller
{
    public function checkout($hash){
        if(Clients::where('client_hash', $hash)->exists()){
            $client = json_decode(Clients::where('client_hash', $hash)->get())[0];
            if(Billing::where('client_id', $client->id)->exists()){
                $getBilling = Billing::where('client_id', $client->id)->get();
                return view('billing.checkout', compact('client'));
            }else{
                return "Não há faturas disponíveis";
            }
        }else{
            return redirect()->route('welcome');
        }
    }

    public function makePayment(Request $request){
        $data = $request->all();
        $client = json_decode(Clients::where('client_hash', $data['client_hash'])->get())[0];

        if(DB::table('billing')->where('client_id', $client->id)->where('transaction_id', '>', 0)->exists()){
            $transactionId = json_decode(DB::table('billing')->where('client_id', $client->id)->select('transaction_id')->get())[0]->transaction_id;

            $response = Http::get('https://www.2rpay.com.br/api/v1/transaction/' . $transactionId, ['merchant_key' => 'ISdjHg3YRKx0VOqpREJGx6edtlAXOG3B']);

            $data = $response->body();
            $paymentInfo = json_decode($data);

            return view('billing.success', compact('paymentInfo'));
        }else{
            $response = Http::post('https://www.2rpay.com.br/api/v1/transaction', [
                'merchant_key' => 'ISdjHg3YRKx0VOqpREJGx6edtlAXOG3B',
                'payment_method' => $data['payment_method'],
                $data['payment_method'] => array(
                    'bank' => 'bb',
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
                ),
                'postback_url' => 'https://webhook.site/a65ea7d1-4b75-4a52-82d1-cc4f44cb308e'
            ]);

            $data = $response->body();
            $paymentInfo = json_decode($data);

            dd($data);

            DB::table('billing')->where('client_id', $client->id)->update([
                'transaction_id' => $paymentInfo->id
            ]);

            return view('billing.success', compact('paymentInfo'));
        }
    }
}
