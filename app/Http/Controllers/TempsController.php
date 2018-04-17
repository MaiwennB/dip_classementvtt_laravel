<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temps;
use App\Pistes;

class TempsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $temps=Temps::all();
        return view('temps',compact('temps'));
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
        $temps = new Temps;
        $temps->temps=$request->temps;
        $temps->idPiste=$request->idPiste;
        $temps->idAdh=$request->idAdh;
        $temps->save();
        $piste1=Pistes::find($request->idPiste);
        return view('home');
        // return Temps::find($temps->id);
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
        $temps = new Temps;
        $temps = Temps::findOrFail($request->id);
        $temps->temps=$request->temps;
        $temps->idPiste=$request->idPiste;
        $temps->idAdh=$request->idAdh;
        $temps->save();
        return Temps::find($temps->id);
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
        $temps = Temps::findOrFail($request->id);
        $temps->delete();
        return $request->id;
    }
}
