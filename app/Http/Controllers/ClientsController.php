<?php

namespace App\Http\Controllers;

use App\Http\Requests\clientRequest;
use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ConversionApi(){
        $ipAddress = strval($_SERVER['REMOTE_ADDR']);
        //echo '<pre>' , var_dump($ipAddress) , '</pre>'; die;
        $token = 'EAAHd3nZBFfM0BADtAlKDz0uoe0USm2CzpJZC25LJHaxTqZC33hnMNrRfd1HJN7PZBSBcLZBMFfPrQEsoOaJIWj7VZAgpyBVbYgeQ52kn9S4UuxYZC4ZCcOHdxFwZBSsl0cpy8sM4P4cS4aKzN2EtdoKfHfOAXpCH6H6PJBdgQavCBttyOl3OZBPAT6NbG603yDBJYZD';
        $request = Http::post('https://graph.facebook.com/v14.0/1667876963346713/events?access_token='. $token, [
            "data" => array(
                0 => [
                    "event_name" => "Purchase",
                    "event_id" =>  random_int(1000000, 9999999999),
                    "event_time" => 1658324995,
                    "action_source" => "website",
                    "user_data" => [
                        "client_user_agent" => "Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1",
                        "em" => "f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a",
                        "client_ip_address" => $ipAddress
                    ],
                    "custom_data" => [
                        "currency" => "BRL",
                        "value" => "142"
                    ]
                ]
            ),
            "test_event_code" => "TEST13510"
        ]);

        echo "<br><br><br>";
        echo $ipAddress . "<br>";
        echo '<pre>' , var_dump($request->body()) , '</pre>'; die;
    }

    public function getLoggedClient(){
        return json_decode(DB::table('userClients')->where('user_id', Auth::user()->id)->select('client_id')->get())[0]->client_id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(clientRequest $request)
    {
        $data = $request->validated();
        
        if(!isset($data['complement'])){
            $data['complement'] = 'empresa';
        }
        $cnpjRegex = array(".", "/", "-");
        $cnpj = str_replace($cnpjRegex, '', $data['cnpj']);

        // API de validação de situação cadastral do CNPJ - DOC: https://www.cnpj.ws/docs/api-publica/consultando-cnpj
        // $response = Http::get('https://publica.cnpj.ws/cnpj/' . $cnpj);
        // if($response->failed()){
        //     return redirect()->back()->with('error', 'O CNPJ informado encontra-se desativado ou com restrições, entre em contato com o suporte para obter maiores informações');
        // }
        
        if(Clients::where('cnpj', $data['cnpj'])->exists()){
            return redirect()->back()->with('error', 'O CNPJ já encontra-se cadastrado em nossa base, não é possível se cadastrar duas vezes com o mesmo CNPJ');
        }
        
        if(User::where('email', $data['email'])->exists()){
            return redirect()->back()->with('error', 'Já existe um usuário cadastrado com este e-mail, não é possível se cadastrar novamente');
        }

        DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $client = Clients::create([
            'name' => $data['name'],
            'cnpj' => $data['cnpj'],
            'inscricao_estadual' => 'isento',
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address_name' => $data['address_name'],
            'address_number' => $data['address_number'],
            'district' => $data['district'],
            'complement' => $data['complement'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'status' => 1,
        ]);
        
        $userId = json_decode(DB::table('users')->where('email', $data['email'])->select('id')->get())[0]->id;
        $clientId = json_decode($client)->id;

        DB::table('userClients')->insert([
            'user_id' => $userId,
            'client_id' => $clientId
        ]);

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
