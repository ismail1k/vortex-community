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
                background-image: url("/image/vortex-background.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                z-index: -1;
            }
            body {
                color: #ffffff;
                font-family: 'arial';
                
            }
            .home {
                color: #ffffff;
                font-size:18px;
            }
            .vortex-header-img > img {
                width: 180px;
            }
            .vortex-header-text > *{
                color: #ffffff;
                border: 1px solid #ffffff;
                border-radius: 5px;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .vortex-header-text > *:hover{
                color: #ffffff;
            }
            .vortex-content{
                height: calc(100vh - 100px);
            }
            .part1-welcome{
                font-size: 25px;
            }
            .part1-title{
                font-size: 75px;
                font-weight: bold;
                line-height: 1;
            }
            .part2-vortexlogo{
                position: relative;
                max-width: 300px;
            }
            .part1-actions{
                height: 60px;
            }
            .part1-actions>div>*{
                color: #ffffff;
                cursor: pointer;
                font-size: 18px;
                border-radius: 3px;
                transition: 200ms;
                padding-left: 15px;
                padding-right: 15px;
            }
            .part1-actions>div>*:hover{
                color: #f9611d;
                border: 1px solid #f9611d;
            }
        </style>
    </head>
    <body>
        <div class="bg-img"></div>
        <div class="container home d-flex justify-content-between align-items-center">
            <div class="vortex-header-img my-3">
                <img src="/image/vortex-header.png" alt="">
            </div>
            @if (Route::has('login'))
                <div class="vortex-header-text d-flex justify-content-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm  underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm underline mx-3">Sign in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="container row d-md-flex justify-content-center align-items-center vortex-content">
            <div class="col-md-6 d-flex justify-content-center justify-content-start align-items-center vortex-content-part1">
                <img src="/image/vortex.png" class="part2-vortexlogo">
            </div>
            <div class="col-md-6 d-flex justify-content-center justify-content-start align-items-center vortex-content-part2">
                <span>
                    <div class="part1-welcome">WELCOME TO</div>
                    <div class="part1-title">VORTEX <br> COMMUNITY</div>
                    <div class="part1-actions">
                        <div class="d-flex justify-content-between">
                            <a class="d-flex justify-content-start">Discord</a>
                            <a class="d-flex justify-content-center">Demand&nbsp;Passport</a>
                            <a class="d-flex justify-content-center">Rules</a>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </body>
</html>
