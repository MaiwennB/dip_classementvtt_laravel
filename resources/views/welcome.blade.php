<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Korigo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url("https://pre00.deviantart.net/e971/th/pre/i/2013/164/6/8/hexagonal_cube_pattern_thingie_by_black_light_studio-d68vloo.png");
                color: #636b6f;
                background-repeat: repeat;
                background-color:#636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
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
                font-size: 250;
                letter-spacing: .1rem;
                text-transform: uppercase;
                border-color:#392613;
                border-width:2px;
                border-style: solid;
                border-radius: 5px;

                
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                Korigo
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
