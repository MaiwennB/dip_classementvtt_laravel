<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adherents;
use App\User;
use App\Associations;
use App\Pistes;
use App\Temps;

class AdherentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents=Adherents::all();
        $associations=Associations::all();
        $users=User::all();
        $pistes=Pistes::all();
        $temps=Temps::all();
        
        return view('account',['adherents'=>$adherents, 'users'=>$users, 'associations'=>$associations, 'pistes'=>$pistes, 'temps'=>$temps]);
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
        $adherent = new Adherents;
        $adherent->nomAdh=$request->nomAdh;
        $adherent->loginAdh=$request->loginAdh;
        $adherent->mdpAdh=$request->mdpAdh;
        $adherent->idAsso=$request->idAsso;
        $adherent->save();
        return Adherents::find($adherent->idAdh);
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
        $adherent = new Adherents;
        $adherent = Adherents::findOrFail($request->idAdh);
        $adherent->nomAdh=$request->nomAdh;
        $adherent->loginAdh=$request->loginAdh;
        $adherent->mdpAdh=$request->mdpAdh;
        $adherent->idAsso=$request->idAsso;
        $adherent->save();
        return Adherents::find($adherent->idAdh);
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
        $adherent = Adherents::findOrFail($request->idAdh);
        $adherent->delete();
        return $request->idAdh;
    }

    public function login(Request $request)
    {
        //
        $adherent = Adherents::where('id',$request->id)->first();
        return Adherents::find($adherent->idAdh);
    }
}
