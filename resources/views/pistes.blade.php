@extends('layouts.app')
@section('content')
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
                    <H1>Les pistes</H1>
                    @foreach ($associations as $association)
                    @if ($association->idUser == Auth::user()->id)
                    <form  id="formulaire2" action="{{ route('create')}}" method=POST>    
                    
                    <div class="blop">
                        <h2>Nouvelle piste</h2>
                        <h3>Nom : <input name="nomPiste"></br></h3>
                        <h3>Description : <input name="Description"></br></h3>
                        <h3>URL Photo : <input name="urlPhoto"></br></h3>
                        <h3><input type="hidden" name="idAsso" value="{{ $association->idAsso }}"></h3>
                        <h3><input type="hidden" name="_token" value="{{ csrf_token() }}"></h3>
                        <h3><input type='submit'></h3>
                    </div>
                    </form>
                    </br>

                    @endif
                    @endforeach
                    <div class="blop">
                        <h2>Piste :</h2>
                        <form id="formulaire">
                            <h3><select id="listpistes" name='idPiste'>
                                @foreach($pistes as $piste)
                                <option value={{ $piste->idPiste}}>{{ $piste->nomPiste }}</option>
                                @endforeach</h3>
                            </select>
                            <h3><input type='submit'></h3>
                        </form>
                        </br>
                    </div>


                    
                    @if ($piste1 != null)
                        @foreach ($adherents as $adherent)
                        @if ($adherent->id == Auth::user()->id)
                        
                        <div class="blop">
                            <form id="formulaire1" action="{{ route('store')}}" method=POST>   
                                <h2>Nouveau temps</h2>
                                                
                                <h3>Temps : <input  name="temps" type="time" step="1" value="00:00:00"><h3>
                                <input type="hidden" name="idAdh" value="{{ $adherent->idAdh }}">
                                <input type="hidden" name="idPiste" value="{{ $piste1->idPiste }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3><input type='submit'></br><h3>
                            </form>
                        </div>
                        @endif
                        @endforeach
                        
                        <div class="blop">
                            <h2>Info de la piste</h2>
                            @foreach($associations as $association)
                            @if($association->idAsso == $piste1->idAsso)
                            <H3>{{ $piste1->nomPiste }} ( {{$association->nomAsso}} )</H3>
                            @endif
                            @endforeach
                            <img src="{{$piste1->urlPhoto}}" width=500px></img>
                            <h3>{{ $piste1->Description }}</h3>
                            </br>
                        </div>

                        <div class="blop">
                            <H2>Classement</H2>
                            <table >
                                <tr>
                                    <td><h3 class="caseMain"> Temps </h3></td>
                                    <td><h3 class="caseMain">Nom Prénom</h3></td>
                                </tr>
                                @foreach ($temps as $temp)
                                @if ($temp->idPiste == $piste1->idPiste)
                                <tr>
                                    <td><h3 class="case">{{ $temp->temps }}</h3></td>
                                    @foreach($adherents as $adherent)
                                    @if($adherent->idAdh == $temp->idAdh)
                                        @foreach($users as $user)
                                        @if($adherent->id == $user->id)
                                            <td><h3 class="case">{{ $user->name }}</h3></td>
                                        @endif
                                        @endforeach
                                    @endif
                                    @endforeach
                                </tr>
                                @endif
                                @endforeach
                        
                            </table>
                        </div>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
