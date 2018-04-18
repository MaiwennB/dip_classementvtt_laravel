<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pistes;
use App\Adherents;
use App\Associations;
use App\Temps;
use App\User;

class PistesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idPiste = null,Request $request)
    {
        //
        $piste1 = null;
        $time= null;
        if ($idPiste != null || $idPiste = $request->input("idPiste")){
            $piste1=Pistes::find($idPiste);
        }
        $temps = Temps::orderBy('temps')->get();
        $pistes=Pistes::all();
        $associations=Associations::all();
        $adherents=Adherents::all();
        $users=User::all();
        return view('pistes',['pistes'=>$pistes,'adherents'=>$adherents,'associations'=>$associations, 'piste1'=>$piste1, 'temps'=>$temps, 'users'=>$users]);
        //return Pistes::all();
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
        $piste = new Pistes;
        $piste->nomPiste=$request->nomPiste;
        $piste->urlPhoto=$request->urlPhoto;
        $piste->Description=$request->Description;
        $piste->idAsso=$request->idAsso;
        $piste->save();

        // return Pistes::find($piste->idPiste);
        $piste1 = null;
        $temps = Temps::orderBy('temps')->get();
        $pistes=Pistes::all();
        $associations=Associations::all();
        $adherents=Adherents::all();
        $users=User::all();
        return view('pistes',['pistes'=>$pistes,'adherents'=>$adherents,'associations'=>$associations, 'piste1'=>$piste1, 'temps'=>$temps, 'users'=>$users]);
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
    public function update(Request $request)
    {
        //
        $piste = new Pistes;
        $piste = Pistes::findOrFail($request->idPiste);
        $piste->nomPiste=$request->nomPiste;
        $piste->urlPhoto=$request->urlPhoto;
        $piste->Description=$request->Description;
        $piste->idAsso=$request->idAsso;
        $piste->save();
        return Pistes::find($piste->idPiste);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $piste = Pistes::findOrFail($request->idPiste);
        $piste->delete();
        return $request->idPiste;
    }
}
