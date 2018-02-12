<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssociationS extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Associations::all();
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
        $association = new Associations;
        $association->label=$request->label;
        $association->save();
        return Associations::find($association->idAsso);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idAsso
     * @return \Illuminate\Http\Response
     */
    public function show($idAsso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idAsso
     * @return \Illuminate\Http\Response
     */
    public function edit($idAsso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idAsso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $associations = new Associations;
        $associations = Associations::findOrFail($request->idAsso);
        $associations->label=$request->label;
        $associations->isDone=$request->isDone;
        $associations->save();
        return Associations::find($associations->idAsso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idAsso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $associations = Associations::findOrFail($request->idAsso);
        $association->delete()
        return $request->idAsso;
    }
}
