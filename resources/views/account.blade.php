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
                    <div class="blop">
                        <table>
                            <tr>
                                <a href="{{$association->site}}"><img width="500px" src="{{$association->logoAsso}}" ></img></a>
                            <tr>
                            <tr>
                                <td><h2>Association :</h2></td>
                                <td><h2>{{ $association->nomAsso }}</h2></td>
                            </tr>
                            <tr>
                                <td><h2>Email: </h2></td>
                                <td><h2>{{ Auth::user()->email }}</h2></td>
                            </tr>
                            <tr>
                                <td><h2>Site: </h2></td>
                                <td><h2><a href="{{$association->site}}">{{$association->site}}</a></h2></td>
                            </tr>
                        </table>
                    </div>
                        <div class="blop">
                            <h2>Pistes :</h2>
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
                        </div>
                        <div class="blop">
                            <h2>Adherents :</h2>
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
                        </div>

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
                        <table>
                            <tr>
                                <td><h3 class="caseMain">Temps</h3></td>
                                <td><h3 class="caseMain">Date</h3></td>
                            </tr>
                            @foreach ($temps as $tps)
                            @if ($tps->idAdh == $adherent->idAdh)
                            @if($tps->idPiste == $piste->idPiste)
                            <tr>
                                <td><h3 class="caseMain">{{$tps->temps}}</h3></td>
                                <td><h3 class="caseMain">{{$tps->created_at}}</h3></td>
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
            .blop{
                border-color:#ccccb3;
                border-width:5px;
                border-style: solid;
                border-radius: 15px;
                padding: 10px;
                margin: 10px;
            }
            .caseMain{
                padding: 10px;
                border-width:1px;
                border-style: solid;
                border-radius: 10px;
                background :#c0c0b0; 
            }
            .case{
                padding: 20px;
                border-radius: 10px;
                background :#f5f5f0; 
            }
        </style>

