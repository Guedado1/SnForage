<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Reglement;
use App\Client;

/* use App\Client; */

use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('factures.index');
    }
  public function list(Request $request)
    {
        $facture=Facture::with('reglement.type')->get();
        return DataTables::of($facture)->make(true);
    }  

public function create(Facture $facture)
{
    //
    return $facture;
   
}
 /* public function list(Abonnement $abonnement=null)
{
    if($abonnement==null){
        $consommation=\App\Consommation::with(['agent','facture.abonnement.client.user'])->get();
        return DataTables::of($consommation)->make(true);
    }else{
        $consommation=$abonnement->facture->consommation->load(['agent','facture.abonnement.client.user']);
        return DataTables::of($consommation)->make(true);
    }
}
public function selectclient()
{
    return view('facture$facture.selectclient');
}
public function selectfacture(Request $request)
{
    $client=\App\Client::find($request->input('client'));
    return view('facture$facture.selectfacture',compact('client'));
} */








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*  public function create(Request $request)
    {
        //
        $client=\App\Client::find($request->input('client'));
        $facture=\App\facture::find($request->input('facture'));

        return view('facture$facture.create',compact(['client','facture']));
    } */

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
    public function show(Facture $facture)
    {
        //
        return view('factures.show',compact('facture'));
        /* return view('layout.user',compact('facture')); */
        /* return $facture; */
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
  /*   public function destroy(consommation $consommation)
    {
        
        $message = $consommation->client->user->firstname.''.$consommation->client->user->name. 'suppression réussie';
        // return $consommation;
        $consommation->delete();
        return redirect()->route('facture$facture.index')->with(compact('message'));
    } */
}
