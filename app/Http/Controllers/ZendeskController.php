<?php

namespace App\Http\Controllers;

use App\Models\Zendesk;
use Illuminate\Http\Request;

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
        $password = base64_encode($request->password);

        if(strpos($request->domain, "https://") !== false){
            $removeHttps = explode('https://', $request->domain);
            $domain = explode('.zendesk.com', $removeHttps[1]);
        } else {
            $domain = explode('.zendesk.com', $request->domain);
        }

        $data = array(
            'user_email' => $user_email,
            'password' => $password,
            'domain' => $domain[0]
        );

        dd($data);
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
}
