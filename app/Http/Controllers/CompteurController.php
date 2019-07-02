<?php

namespace App\Http\Controllers;

use App\Compteur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CompteurController extends Controller
{
    public function list(Request $request)
    {
        $compteurs=Compteur::with('administrateur.user')->get();
        return Datatables::of($compteurs)->make(true);
    }
    /**
     * Display a listing of the resource.     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('compteur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            //
            // $this->validate(
            //     $request, [
            //         'village' => 'required|exists:villages,id',
            //     ]);
            $village_id=$request->input('village');
            $village=\App\Village::find($village_id);
            return view('compteurs.create',compact('village'));
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
        $this->validate(
            $request, [
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|max:50',
            ]
        );
        return view('compteurs.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function show(Compteur $compteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compteur  $compteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Compteur $compteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compteur $compteur
     * @return \Illuminate\Http\Response
     */
   

    public function update(Request $request, Compteur $compteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compteur $compteur
     * @return \Illuminate\Http\Response
     */
    
       public function destroy(Compteur $compteur)
       {
           $compteur->delete();
           $message = $compteur->user->firstname.' '.$compteur->user->name.' a été supprimé(e)';
           return redirect()->route('compteurs.index')->with(compact('message'));
       }
    
}
