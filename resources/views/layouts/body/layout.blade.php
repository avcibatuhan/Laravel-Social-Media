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
    <link rel="stylesheet" href="{{ asset('assets/css/mainpage.css')}}">
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
        <title>Oxygen</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased" id="layoutBody">
    <nav class="navbar navbar-light bg-black" id="navbar">
        <img src="{{ asset('assets/images/o2.png')}}" alt="Oxygen" style="width: 3%;height: 3%;">
        <a href="{{ route('home')}}" class="navbar-brand" style="text-align: center;"><h2>OXYGEN</h2></a>
        <!-- Settings Dropdown -->
        <div class="ml-3 relative" >
                    <x-jet-dropdown align="right" width="48" style="z-index:6">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-11 w-11 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                    </x-jet-dropdown>
                </div>
        
        
    </nav>

 


            <!-- Sol taraf-->
    <div class="container-fluid gedf-wrapper"  style="border-radius:20px;">
    
        <div class="row" >
            <div class="col-md-3" style="border-radius:20px;">
                <div class="card" style="border-radius:20px; background-color: transparent; position: fixed; margin-top:50px">
                    <div class="card-body" style="border-radius:20px; background-color: transparent;">
                        <div class="d-flex justify-content-between align-items-center" >
                            <div class="mr-2" style="background-color: transparent; border-radius:20px;border-width:2px;border-color:black;">
                            <div class="container" >
                                <div class="row">
                                    <div class="col-md-6">
                                    <a id="solList" href="/profile/{{ Auth::user()->id }}"><img class="h-12 w-12 rounded-full object-cover"  src="{{ Auth::user()->profile_photo_url }}" alt=""></a>

                                    </div>
                                    <div class="col-md-6">
                                    <a id="solList" href="/profile/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>

                                    </div>

                                </div>
                            </div>

                            </div>

                        </div>

                    </div>
                    <ul class="list-group list-group-flush" style="border-radius:20px; ">
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a id="solList" href="{{route('home')}}">Anasayfa</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a id="solList" href="{{route('activities')}}">Etkinlikler</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a id="solList" href="{{route('places')}}">Yerler</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a id="solList" href="{{route('friends')}}">Arkadaşlarını Bul</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted">
                                <a id="solList" href="{{url('user/profile')}}">Kullanıcı Ayarları</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="h5 text-muted" style="border-radius:20px;">
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a id="solList" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">Çıkış Yap</a>
                            </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 gedf-main"  >
            <div class="py-6" >
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 @yield('content')
                </div>
            </div>         
            </div>

            <!-- Sağ taraf-->
            <div class="col-md-3" id="rightSidenav" >
 
            
            <div class="card gedf-card" style="border-radius:20px;">
            
            <div class="card-body" style="border-radius:20px;">
            
                <h5 class="card-title">
                                <h4>Arkadaşlarım</h4> <hr>
                                <div class="friendlist">
                                <table class="table table-striped" style="text-align:center;">

                                <tbody>
                                    @foreach($friends as $friend)
                                    <tr>
                                    <td>
                                        @if($friend->profile_photo_path != NULL)  
                        <img class="h-10 w-10 rounded-full object-cover" src="http://localhost:8000/storage/{{ $friend->profile_photo_path }}"/><br>
                        @else
                        <img class="h-10 w-10 rounded-full object-cover" src="http://localhost:8000/storage/profile-photos/pp.jpg" /> <br>                       
                        @endif
                    </td>
                    <td><a href="/profile/{{ $friend->id }}">{{ $friend->name}}<br></a> </td>
                    <td>
                    <form action="/deleteFriendship" method="post">
                        @csrf
                            <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required> 
                            <input type="hidden" id="user" name="friend_id" value="{{ $friend->id }}" required> 
                            <button type="submit" class="btn btn-danger">Arkadaşlıktan Çıkar</button> 
                        </form>

                    </td>
                    </tr>
                    
                    @endforeach
                    </tbody>
</table>     
                                </div>
                            </h5>
                            
            </div>
            </div>
            </div>
        </div>
</div>


        @livewireScripts
    </body>
</html>