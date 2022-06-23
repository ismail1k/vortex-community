<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Request Whitelist</div>
                            <div class="card-body">
                                <script>
                                    const rules = [
                                        {
                                            name: 'Mass Rp',
                                            description: 'hia fach katdkhol par exemple l chi street dyal chi gang , khassek tdir bli ra kaynin bezaaaaf dyal les membres tema 7it kola street fiha +500 wahed donc khassek t3amel bhalla kaynin',
                                        },
                                        {
                                            name: 'Powergaming',
                                            description: 'par exemple fach kati7 mn chi blkassa 3aliya w katnoud 3adi b7al la maw93 lik wallo wla drti accident w katkhrj katjri',
                                        },
                                        {
                                            name: 'Meta Gaming ',
                                            description: 'hiwa fach katjib chi info kharej l game b7a mn discord ola ila galhalik chi sa7bek ...',
                                        },
                                        {
                                            name: 'Troll ',
                                            description: 'Hya Tb9a Tstafz Fchi Wa7d B7al Matalan Tb9a Tmchi Tjbd F Police Bach Itb3ok',
                                        },
                                        {
                                            name: 'Red Zone',
                                            description: 'HOMA Droba Dyal Les Gamg Ola Lpoint Dyal Cartil Ola Mafia Had Lblays Khask tkhaf Fihom 3la Rask Hitach Kaykono Khatirin Bzf',
                                        },
                                        {
                                            name: 'Safe Zone',
                                            description: 'Homa Lblays Li Maymknch Dir Fihom Chi 3amal Tkhribi B7al Tgrisi Fiha Chi wa7d Ola Chi 7aja B7al Haka oli Homa: Hospital, Comico, Micano, Concess',
                                        },
                                        {
                                            name: 'Freekill',
                                            description: 'katmchi t9tl chi wa7d bla sbab',
                                        },
                                        {
                                            name: 'RevengeKill',
                                            description: 'mli ki 9etlek chi wahed katrj3 lih T3awd t9etlo alors que normalement fach katmout katnssa chno w9e3 lik',
                                        },
                                        {
                                            name: 'Mixte RP HRP',
                                            description: 'hia fach katkhelet l hrp -hors RP- m3a RP w nta kathdr fl game',
                                        },
                                        {
                                            name: 'No Fear',
                                            description: 'hiya fach makatkhafch 3la rassk fach chi 7d yjbd 3lik pistolet wla dir fiha batman 1v5 , ila knti en voiture w w9af 3lik chi wahed andek l7a9 threb , ila 9tlek w nta hrban f had le cas mort RP',
                                        },
                                        {
                                            name: 'Carkill ',
                                            description: 'par exemple thz tonobil w tb9a tdrb bnadm',
                                        },
                                        {
                                            name: 'Force RP',
                                            description: 'hiya tforci 3la chi 7d ydirlk chi haja wla ydir m3ak chi haja w howa mabaghuich',
                                        },
                                        {
                                            name: 'Fair Play',
                                            description: 'huwa tkun sari7 in game , matkunch kat79ed  w ikun andk esprit zwin fl3b',
                                        },
                                        {
                                            name: 'Win Rp',
                                            description: 'hia tkun baghi gha trbe7 w matkunch katrda anak khsserti f chi action par exemple',
                                        },
                                        {
                                            name: 'Back To Safe Zone',
                                            description: 'hya par exemple chi wahed tab3k baghi igrisik ola ibraquique w Rje3ti l safe zones',
                                        },
                                        {
                                            name: 'Back To Red Zone',
                                            description: 'hya par exemple Chfrti Chi Dar Ola Drti iChi Brakage Otb3ok Police Ohrbti Lihom Ldrb Dyalkom',
                                        },
                                        {
                                            name: 'Legal/Ilegal',
                                            description: 'Hya par exemple Ana Perso Dyalk Legal Onta Glbtiha Ilegal Bla Wipe < T3awd Histoire Jdida',
                                        },
                                        {
                                            name: 'Use Bug & Cheating',
                                            description: 'Hya Tstaghl Chi Glitch Flgame Bla Ma T3lm Bih Team Dev Ola Dir Chi Hack Fserver Kima Kan No3 Dyalo',
                                        },
                                    ]
                                    rules.forEach(rule => {
                                        document.write('<div>')
                                        document.write(`<b>${rule.name}</b>`)
                                        document.write(`<p>${rule.description}</p>`)
                                        document.write('</div>')
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>