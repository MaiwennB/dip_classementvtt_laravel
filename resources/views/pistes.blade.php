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


                    @foreach ($associations as $association)
                    @if ($association->id == Auth::user()->id)
                        <h2>Nouvelle piste</h2>
                        Nom : <input></br>
                        Description : <input></br>
                        URL Photo : <input></br>

                    @endif
                    @endforeach

                    
                    @if ($piste1 != null)

                    @foreach ($adherents as $adherent)
                    @if ($adherent->id == Auth::user()->id)
                            <!-- {{ $adherent->id }}
                            {{ Auth::user()->id }} -->
                    
                    <form id="formulaire1" action="{{ route('store')}}" method=POST>
                    <!-- @csrf     -->
                    <h2>Nouveau temps</h2>                   
                        Temps : <input  name="temps" type="time" step="2" value="00:00:00">
                        <input type="hidden" name="idAdh" value="{{ $adherent->idAdh }}">
                        <input type="hidden" name="idAdh" value="{{ $piste1->idPiste }}">
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
