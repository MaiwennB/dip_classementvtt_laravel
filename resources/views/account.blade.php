@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="links">
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/pistes') }}">Piste</a>
            <a href="{{ url('/account') }}">Mon compte</a>
        </div>
            <div class="panel panel-default">
                <div class="panel-body">

                    @foreach ($associations as $association)
                    @if ($association->id == Auth::user()->id)
                        <h2>Mon compte Association</h2>
                        <table>
                        <tr>

                            <td><h4>Email: </h4></td>
                            <td><h4>{{ Auth::user()->email }}</h4></td>
                        <tr>
                        </tr>
                            <td><h4>NOM Prénom :</h4></td>
                            <td><h4>{{ Auth::user()->name }}</h4></td>
                        </tr>
                        </tr>
                            <td><h4>Association :</h4></td>
                            <td><h4>{{ $association->nomAsso }}</h4></td>
                        </tr>
                    </table>
                    @endif
                    @endforeach

                   
                    @foreach ($adherents as $adherent)
                    @if ($adherent->id == Auth::user()->id)
                    <h2>Mon compte Adhérent</h2>
                    <table>
                        <tr>
                            <td><h4>Email: </h4></td>
                            <td><h4>{{ Auth::user()->email }}</h4></td>
                        <tr>
                        </tr>
                            <td><h4>NOM Prénom :</h4></td>
                            <td><h4>{{ Auth::user()->name }}</h4></td>
                        </tr>
                        </tr>
                            @foreach ($associations as $association)
                            @if ($association->idAsso == $adherent->idAsso)
                            <td><h4>Association :</h4></td>
                            <td><h4>{{ $association->nomAsso }}</h4></td>
                            @endif
                            @endforeach
                        </tr>
                    </table>
                    <br>
                    <H3>Mes temps</H3>
                    @foreach ($pistes as $piste)
                        <H4>{{ $piste->nomPiste }}</H4>
                        <table class="time">
                            <tr class="time">
                                <td class="time"><h4>Temps</h4></td>
                                <td class="time"><h4>Date</h4></td>
                            </tr>
                            @foreach ($temps as $tps)
                            @if ($tps->idAdh == $adherent->idAdh)
                            <tr class="time">
                                <td class="time">{{$tps->temps}}</td>
                                <td class="time">{{$tps->created_at}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                        </br>
                    @endforeach

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.container {
                color: #636b6f;
                background-repeat: repeat;
                background-color:#f5f5f0;
                font-family: 'Raleway', sans-serif;
            }
            body {
                background-image:url("https://pre00.deviantart.net/e971/th/pre/i/2013/164/6/8/hexagonal_cube_pattern_thingie_by_black_light_studio-d68vloo.png");
                color: #636b6f;
                background-repeat: repeat;
                background-color:#636b6f;

            }
            .title {
                font-size: 150px;
                color:#f5f5f0;
                font-family:Arial, Helvetica, sans-serif;

            }

            .links > a{
                /* 636b6f */
                background-color: #f5f5f0;
                color: #392613;
                padding: 0 25px;
                font-size: 20;
                letter-spacing: .1rem;
                text-transform: uppercase;
                border-color:#392613;
                border-width:2px;
                border-style: solid;
                border-radius: 5px;

                
            }
            .time{
                border-width:2px;
                border-style: solid;
                border-radius: 5px;
            }

        </style>

