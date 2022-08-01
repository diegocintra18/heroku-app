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
            ),
            'postback_url' => 'https://webhook.site/a65ea7d1-4b75-4a52-82d1-cc4f44cb308e'
        ]);

        $data = $response->body();
        $paymentInfo = json_decode($data);

        return view('billing.success', compact('paymentInfo'));

        // retorno da callback
        // {
        //     "id": 249497,
        //     "reference": "82fcf56943a749624b9fa413a4394a796d85817d",
        //     "amount": "600",
        //     "status": "paid",
        //     "pix": {
        //       "id": "5b6697b1-9b3b-4939-b1a8-fef024ef538d",
        //       "code": "00020101021226990014br.gov.bcb.pix2577pix.bpp.com.br/23114447/qrs1/v2/01Xvcl6wb19jpGDlO6rijeEl66x69OYAZRmypDigzlf1052040000530398654046.005802BR59102RPAY LTDA6009SAO PAULO62070503***63040937",
        //       "qrcode": "https://cdn.2rpay.com.br/qrcodes/2022/07/82fcf56943a749624b9fa413a4394a796d85817d.png",
        //       "expiration": "2022-07-22T07:57:33.000Z",
        //       "additional_info": ""
        //     },
        //     "billet": {
        //       "id": null,
        //       "code": null,
        //       "link": null,
        //       "expiration": "1969-12-31T21:00:00.000Z",
        //       "additional_info": ""
        //     },
        //     "metadata": [],
        //     "created_at": "2022-07-21T07:57:26.000Z",
        //     "postback_url": "https://webhook.site/a65ea7d1-4b75-4a52-82d1-cc4f44cb308e"
        // }
    }
}
