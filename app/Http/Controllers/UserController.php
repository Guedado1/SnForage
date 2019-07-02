<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index');
    }
  public function list(Request $request)
    {
        $user=User::get()->load('role');
        return Datatables::of($user)->make(true);
    }  

public function create()
{
    //
    $user=User::get();
    return view('users.create',compact('user'));
}
 /* public function list(Abonnement $abonnement=null)
{
    if($abonnement==null){
        $consommation=\App\Consommation::with(['agent','user.abonnement.client.user'])->get();
        return DataTables::of($consommation)->make(true);
    }else{
        $consommation=$abonnement->user->consommation->load(['agent','user.abonnement.client.user']);
        return DataTables::of($consommation)->make(true);
    }
}
public function selectclient()
{
    return view('user$user.selectclient');
}
public function selectuser(Request $request)
{
    $client=\App\Client::find($request->input('client'));
    return view('user$user.selectuser',compact('client'));
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
        $user=\App\user::find($request->input('user'));

        return view('user$user.create',compact(['client','user']));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
    public function update(Request $request, User $user)
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
        return redirect()->route('user$user.index')->with(compact('message'));
    } */
}
