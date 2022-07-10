<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ZendeskController;
use App\Http\Requests\storeZendeskVisualization;
use App\Models\Zendesk\ZendeskRules;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function monitorSettings(){
        $client = new ClientsController;
        $clientId = $client->getLoggedClient();
        
        if(ZendeskRules::where('client_id', $clientId)->exists()){
            $rules = json_decode(ZendeskRules::where('client_id', $clientId)->get());
            return view('monitor.settings', compact('rules'));
        }else{
            return view('monitor.settings');
        }
    }

    public function zendeskViewsRules(){
        return view('monitor.zendeskViews');
    }

    public function zendeskVisualizationRules(){
        return view('monitor.visualizationsZendesk');
    }

    public function storeZendeskVisualization(storeZendeskVisualization $request){
        $data = $request->all();

        if($this->validateVisualization($data['zendesk_visualization_id']) == FALSE){
            return redirect()->back()->with('error', 'O Id de visualização está inválido, verifique o id e tente novamente');
        }
        
        $client = new ClientsController;
        $clientId = $client->getLoggedClient();

        if(ZendeskRules::where('client_id', $clientId)->where('zendesk_visualization_id', $data['zendesk_visualization_id'])->exists()){
            return redirect()->back()->with('error', 'Não é possível salvar a mesma visualização do Zendesk mais de uma vez');
        }

        $data['red_range'] = $data["yellow_range"] + 1;
        $data['client_id'] = $clientId;

        ZendeskRules::create($data);

        return redirect()->route('monitor.visualizationRules')->with('message', 'Visualização salva com sucesso!');
    }

    public function validateVisualization($id){
        $zendesk = new ZendeskController;
        $path = 'views/' . $id . '/count.json';
        $response = $zendesk->callApiZendesk($path, $body = null);

        return $response == TRUE ? $response : FALSE;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
