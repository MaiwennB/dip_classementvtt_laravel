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
                <!-- <div class="panel-heading">Dashboard</div> -->
                <div class="panel-body">
                    <div class="title">
                    Korigo
                    </div>
                    <div class="blop">
                        <H1>Les associations :</H1>
                        @foreach($associations as $association)
                        <a href="{{$association->site}}"><img width="200px" src="{{$association->logoAsso}}" ></img></a>
                        @endforeach
                        </br>
                    </div>

                    <div class="blop">
                        <H1>Records :</H1>
                        @foreach ($pistes as $piste)
                        <?php $i = 0 ?>
                            @foreach ($temps as $temp)
                            @if ($temp->idPiste == $piste->idPiste)
                            @if($temp!=[])
                                @foreach($adherents as $adherent)
                                @if($adherent->idAdh == $temp->idAdh)
                                    @foreach($users as $user)
                                    @if($adherent->id == $user->id)
                                        @foreach($associations as $association)
                                        @if($piste->idAsso == $association->idAsso)
                                            @if ($i == 0)
                                            <h3 class="blop"> Le record pour la {{$piste->nomPiste}}
                                            est de {{$temp->temps}}, 
                                            il appartiens à {{$user->name}}
                                            ( {{$association->nomAsso}} )</h3>
                                            <?php $i = 1 ?>
                                            @endif
                                        @endif
                                        @endforeach
                                    @endif
                                    @endforeach
                                
                                @endif
                                @endforeach
                            </tr>
                            @endif
                            @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
            .title {
                font-size: 150px;
                color:#392613;

            }
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

        </style>
