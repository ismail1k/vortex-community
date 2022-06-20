<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vortex</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
        <link href="/css/style.min.css" rel="stylesheet">

        <style>
            .bg-img {
                width:100%;
                height:100%;
                position: absolute;
                background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("/image/vortex-background.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                z-index: -1;
            }
            body {
                font-family: 'Nunito', sans-serif;
                
            }
            a {
                color: #f9611d;
                font-size:18px;
            }
            a:hover{
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="bg-img"></div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="d-flex justify-content-end mx-4">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm  underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm underline mx-3">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div style="position:absolute; top:40%; left:calc(50% - 175px);">
                <a style="color: #f9611d;font-size:3em;"><b>Vortex Community</b></a>
                <div style="color: #f9611d;" class="d-flex justify-content-between">
                    <a href="https://discord.gg/9ygtuYzf3f">Discord</a>
                    <a href="javascript:void(0);">Demand Passport</a>
                    <a href="javascript:void(0);">Rules</a>
                </div>
            </div>
        </div>
    </body>
</html>
