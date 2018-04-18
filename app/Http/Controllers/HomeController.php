<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pistes;
use App\Adherents;
use App\Associations;
use App\Temps;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $temps = Temps::orderBy('temps')->get();
        $users=User::all();
        $pistes=Pistes::all();
        $associations=Associations::all();
        $adherents=Adherents::all();
        return view('home', ['pistes'=>$pistes,'adherents'=>$adherents,'associations'=>$associations,'temps'=>$temps, 'users'=>$users]);
    }
}
