<?php

namespace App\Http\Controllers;

use App\Models\Zendesk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ZendeskController extends Controller
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
    public function store(Request $request)
    {
        $user_email = $request->user_email;
        $password = base64_encode($request->user_email . ":" . $request->password);

        if(strpos($request->domain, "https://") !== false){
            $removeHttps = explode('https://', $request->domain);
            $domain = explode('.zendesk.com', $removeHttps[1]);
        } else {
            $domain = explode('.zendesk.com', $request->domain);
        }

        $client = new ClientsController;
        $clientId = $client->getLoggedClient();

        $data = array(
            'user_email' => $user_email,
            'password' => $password,
            'domain' => $domain[0],
            'client_id' => $clientId
        );

        if($this->zendeskValidate($data) == TRUE){
        
            Zendesk::create($data);

            $settings = new SettingsController;
    
            $dataSettings = array(
                'config_name' => 'Zendesk Support',
                'config_value' => $data['domain'],
                'status' => 1,
                'client_id' => $clientId
            );
    
            $settings->store($dataSettings);

            return redirect()->back()->with('message', 'Integração realizada com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Ocorreu um erro na validação dos dados, verifique os mesmos e tente novamente!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zendesk  $zendesk
     * @return \Illuminate\Http\Response
     */
    public function show(Zendesk $zendesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zendesk  $zendesk
     * @return \Illuminate\Http\Response
     */
    public function edit(Zendesk $zendesk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zendesk  $zendesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zendesk $zendesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zendesk  $zendesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zendesk $zendesk)
    {
        //
    }

    public function zendeskValidate($data){
        $baseUrl = "https://" . $data['domain'] . ".zendesk.com/api/v2/tickets";
        
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $data['password'],
            'Content-type' => 'Application/json'
        ])->get($baseUrl);

        if ($response->successful() == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function callApiZendesk($path, $body){
        $client = new ClientsController;

        $getCredentials = json_decode(Zendesk::where('client_id', $client->getLoggedClient())->select('domain', 'password')->get()[0]);
        
        $baseUrl = "https://" . $getCredentials->domain . ".zendesk.com/api/v2/" . $path;
        
        if($body == null){
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $getCredentials->password,
                'Content-type' => 'Application/json'
            ])->get($baseUrl);
            
            if ($response->successful() == TRUE){
                return json_decode($response);
            }else{
                return FALSE;
            }
        }else{
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . 'ZGllZ29AZWNvbW1lcmNlc2ltcGxpZmljYWRvLmNvbS5icjpEaWVnbzkxMzUq',
                'Content-type' => 'Application/json'
                ])->body($body)->get($baseUrl);
                
            if ($response->successful() == TRUE){
                return json_decode($response);
            }else{
                return FALSE;
            }
        }
    }
}
