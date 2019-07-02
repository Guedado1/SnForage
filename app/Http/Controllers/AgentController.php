<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('agents.index');
    }
    public function list(Request $request)
{
    $agent=Agent::get()->load('user');
    return Datatables::of($agent)->make(true);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agent=Agent::get();
        return view('agents.create',compact('agent'));
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
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function show(agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit(agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent $Agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(agent $agent)
    {
        //
        $message = $agent->user->firstname.''.$agent->user->name. 'suppression réussie';
        // return $agent;
        $agent->delete();

        return redirect()->route('agents.index')->with(compact('message'));
    }
}
