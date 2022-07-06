<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ZendeskController;
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
        return view('monitor.settings');
    }

    public function zendeskViewsRules(){
        return view('monitor.zendeskViews');
    }

    public function zendeskVisualizationRules(){
        return view('monitor.visualizationsZendesk');
    }

    public function storeZendeskVisualization(Request $request){
        $data = $request->all();

        //$validate = $data['zendesk_visualization_id'] > 0 ? $this->validateVisualization($data['zendesk_visualization_id']) : false;

        if($data['zendesk_visualization_id'] > 0){
            $this->validateVisualization($data['zendesk_visualization_id']);
        }

        if($data['green_range'] > $data['yellow_range']){
            return redirect()->back()->with('error', "O valor máximo da cor verde não pode ser maior que o amarelo");
        }

        $data['red_range'] = $data["yellow_range"] + 1;

        ZendeskRules::create($data);

        return redirect()->route('monitor.visualizationRules')->with('message', 'Visualização salva com sucesso!');
    }

    public function validateVisualization($id){
        $zendesk = new ZendeskController;
        $path = 'views/' . $id . '/count.json';
        $response = $zendesk->callApiZendesk($path, $body = null);
        if($response == false){
            return redirect()->back()->with('error', 'Id de visualização inválido');
        }else{
            return TRUE;
        }
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
