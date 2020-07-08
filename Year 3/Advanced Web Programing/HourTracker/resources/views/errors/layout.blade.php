<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Style -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
            }
            a{
                color: #2E4857;
            }
            a:hover{
                
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height bg-gray-900 text-white">
            <div class="content">
                <div class="title">
                    <h1 style="margin-bottom: 0px;" class=" text-5xl">Whoops!</h1>
                    @yield('message')
                   <p style="font-size: 24px">Please try again from our <a class="text-gray-500 hover:text-gray-300" href="{{ route('home') }}">home page</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
