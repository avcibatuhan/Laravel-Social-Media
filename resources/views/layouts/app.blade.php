<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/mainpage.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$header}} - {{ config('app.name', 'Oxygen') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
        body{
            background: #aa4b6b;
            background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
            background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
        }

        </style>
    </head>
    <body class="font-sans antialiased" >
        <x-jet-banner />
        <nav class="navbar navbar-light bg-black" style="background: darkslateblue;">
        <img src="assets/images/o2.png" alt="Oxygen" style="width: 5%;height: 5%;">
        <a href="{{route('home')}}" class="navbar-brand" style="text-align: center;">Oxygen</a>
        
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                       
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Sol taraf-->
    <div class="container-fluid gedf-wrapper">
    
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" src="{{ Auth::user()->profile_photo_url }}" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">
                                    <a href="{{url('user/profile')}}">{{ Auth::user()->name }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a href="{{route('activities')}}">Etkinlikler</a>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a href="{{route('places')}}">Yerler</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a href="#"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }} 
                </div>
            </div>
            
                
             
        </div>
        </div>
</div>
<!-- Sağ taraf-->
<div class="col-md-3">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="friends.html">Arkadaşlar</a>
                            <div class="friendlist">
                                <ul>
                                    <li>

                                    </li>
                                    <li>

                                    </li>
                                </ul>
                            </div>
                        </h5>
                    </div>
                </div>
            </div>



        @stack('modals')

        @livewireScripts
    </body>
</html>
