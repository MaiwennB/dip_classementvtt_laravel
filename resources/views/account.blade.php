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
                    <!-- ******************* ASSOCIATION ********************** -->
                    @foreach ($associations as $association)
                    @if ($association->idUser == Auth::user()->id)
                    <H1>Espace association</H1>
                    <table>
                        <tr>
                            <a href="{{$association->site}}"><img width="500px" src="{{$association->logoAsso}}" ></img></a>
                        <tr>
                        <tr>
                            <td><h3>Association :</h3></td>
                            <td><h3>{{ $association->nomAsso }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Email: </h3></td>
                            <td><h3>{{ Auth::user()->email }}</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Site: </h3></td>
                            <td><h3><a href="{{$association->site}}">{{$association->site}}</a></h3></td>
                        </tr>
                    </table>

                    <h3>Pistes :</h3>
                        <h3>
                            <ul>
                        @foreach ($pistes as $piste)
                        @if($piste->idAsso == $association->idAsso)
                            @if($piste->idAsso == $association->idAsso)
                            <li>{{ $piste->nomPiste }}</li>
                            @endif
                        @endif
                        @endforeach
                            </ul>
                        </h3>

                        <h3>Adherents :</h3>
                        <h3>
                            <ul>
                        @foreach ($adherents as $adherent)
                        @if($adherent->idAsso == $association->idAsso)
                            @foreach ($users as $user)
                            @if($user->id == $adherent->id)
                            <li>{{ $user->name }}</li>
                            @endif
                            @endforeach
                        @endif
                        @endforeach
                            </ul>
                        </h3>

                    @endif
                    @endforeach
                    <!-- ******************* END ASSOCIATION ********************** -->
                   
                    @foreach ($adherents as $adherent)
                    @if ($adherent->id == Auth::user()->id)
                    <H1>Mon compte</H1>
                    <table>
                        <tr>
                            <td><h3>Email: </h3></td>
                            <td><h3>{{ Auth::user()->email }}</h3></td>
                        <tr>
                        </tr>
                            <td><h3>NOM Prénom :</h3></td>
                            <td><h3>{{ Auth::user()->name }}</h3></td>
                        </tr>
                        </tr>
                            @foreach ($associations as $association)
                            @if ($association->idAsso == $adherent->idAsso)
                            <td><h3>Association :</h3></td>
                            <td><h3>{{ $association->nomAsso }}</h3></td>
                            @endif
                            @endforeach
                        </tr>
                    </table>
                    <br>
                    <H2>Mes temps</H2>
                    @foreach ($pistes as $piste)
                        <H3>{{ $piste->nomPiste }}</H3>
                        <table class="time">
                            <tr class="time">
                                <td class="time"><h3>Temps</h3></td>
                                <td class="time"><h3>Date</h3></td>
                            </tr>
                            @foreach ($temps as $tps)
                            @if ($tps->idAdh == $adherent->idAdh)
                            @if($tps->idPiste == $piste->idPiste)
                            <tr class="time">
                                <td class="time">{{$tps->temps}}</td>
                                <td class="time">{{$tps->created_at}}</td>
                            </tr>
                            @endif
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
                background-image:url("http://www.ilovebicyclette.com/wp-content/uploads/2015/06/World-Cup-Leogang-2015.3.jpg");
                color: #636b6f;
                background-repeat: no-repeat;
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

