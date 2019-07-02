<?php

namespace App\Http\Controllers;

use App\Consommation;
use App\Abonnement;
use App\Client;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ConsommationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('consommations.index');
    }
/*      public function list(Request $request)
{
    $consommations=Consommation::get()->load(['agent','compteur']);
    return Datatables::of($consommations)->make(true);
}  */
 public function list(Abonnement $abonnement=null)
{
    if($abonnement==null){
        $consommation=\App\Consommation::with(['agent','compteur.abonnement.client.user'])->get();
        return DataTables::of($consommation)->make(true);
    }else{
        $consommation=$abonnement->compteur->consommation->load(['agent','compteur.abonnement.client.user']);
        return DataTables::of($consommation)->make(true);
    }
}
public function selectclient()
{
    return view('consommations.selectclient');
}
public function selectcompteur(Request $request)
{
    $client=\App\Client::find($request->input('client'));
    return view('consommations.selectcompteur',compact('client'));
}








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $client=\App\Client::find($request->input('client'));
        $compteur=\App\Compteur::find($request->input('compteur'));

        return view('consommations.create',compact(['client','compteur']));
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
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(Consommation $consommation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consommation $consommation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(consommation $consommation)
    {
        
        $message = $consommation->compteur->abonnement->client->firstname.''.$consommation->compteur->abonnement->client->name. 'suppression réussie';
        // return $consommation;
        $consommation->delete();
        return redirect()->route('consommations.index')->with(compact('message'));
    }
}
