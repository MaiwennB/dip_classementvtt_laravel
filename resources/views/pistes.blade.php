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
                    @if ($association->idUser == Auth::user()->id)
                    <form  id="formulaire2" action="{{ route('create')}}" method=POST>    
                    <h2>Nouvelle piste</h2>
                        Nom : <input name="nomPiste"></br>
                        Description : <input name="Description"></br>
                        URL Photo : <input name="urlPhoto"></br>
                        <input type="hidden" name="idAsso" value="{{ $association->idAsso }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type='submit'>
                    </form>
                    </br>

                    @endif
                    @endforeach

                    Piste : 
                    <form id="formulaire">
                    <select id="listpistes" name='idPiste'>
                    @foreach($pistes as $piste)
                        <option value={{ $piste->idPiste}}>
                        {{ $piste->nomPiste }}
                        </option>
                    @endforeach
                    </select>
                    <input type='submit'>
                    </form>
                    </br>


                    
                    @if ($piste1 != null)

                    @foreach ($adherents as $adherent)
                    @if ($adherent->id == Auth::user()->id)
                    <form id="formulaire1" action="{{ route('store')}}" method=POST>   
                    <h2>Nouveau temps</h2>
                                          
                        Temps : <input  name="temps" type="time" step="1" value="00:00:00">
                        <input type="hidden" name="idAdh" value="{{ $adherent->idAdh }}">
                        <input type="hidden" name="idPiste" value="{{ $piste1->idPiste }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type='submit'></br>
                    </form>

                    @endif
                    @endforeach

                    <h2>Info de la piste</h2>
                        <H3>{{ $piste1->nomPiste }}</H3>
                        {{ $piste1->Description }}
                        </br>
                    <H2>Classement</H2>
                    <table class="time">
                        <tr class="time">
                            <td class="time">Temps </td>
                            <td class="time">Nom Prénom</td>
                        </tr>
                        @foreach ($temps as $temp)
                        @if ($temp->idPiste == $piste1->idPiste)
                        <tr class="time">
                            <td class="time">{{ $temp->temps }}</td>
                            @foreach($adherents as $adherent)
                                @if($adherent->idAdh == $temp->idAdh)
                                @foreach($users as $user)
                                @if($adherent->id == $user->id)
                                    <td class="time">{{ $user->name }}</td>
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                        </tr>
                        @endif
                    
                    @endforeach
                    @endif
                    </table>
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
