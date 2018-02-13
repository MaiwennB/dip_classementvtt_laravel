<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Associations;

class AssociationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Association::all();
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
        $association->nomAsso=$request->nomAsso;
        $association->loginAsso=$request->loginAsso;
        $association->mdpAsso=$request->mdpAsso;
        $association->save();
        return Associations::find($association->idAsso);
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
    public function update(Request $request, $idAsso)
    {
        //
        $association = new Associations;
        $association = Associations::findOrFail($request->idAsso);
        $association->nomAsso=$request->nomAsso;
        $association->loginAsso=$request->loginAsso;
        $association->mdpAsso=$request->mdpAsso;
        $association->save();
        return Associations::find($association->idAsso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAsso)
    {
        //
        $association = Associations::findOrFail($request->idAsso);
        $association->delete();
        return $request->idAsso;
    }
}
