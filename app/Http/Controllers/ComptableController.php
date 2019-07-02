<?php

namespace App\Http\Controllers;

use App\Comptable;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('comptables.index');
    }
    public function list(Request $request)
{
    $comptable=Comptable::get()->load('user');
    return Datatables::of($comptable)->make(true);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comptable=Comptable::get();
        return view('comptables.create',compact('comptable'));
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
     * @param  \App\comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function show(comptable $comptable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function edit(comptable $comptable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comptable $comptable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function destroy(comptable $comptable)
    {
        
        $message = $comptable->user->firstname.''.$comptable->user->name. 'suppression réussie';
        // return $comptable;
        $comptable->delete();
        return redirect()->route('comptables.index')->with(compact('message'));
    }
}
