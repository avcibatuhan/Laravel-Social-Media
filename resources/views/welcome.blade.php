<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/stil.css')}}">
    <title>Oxygen</title>
    </head>
    <body style="background-image: url('{{ asset('assets/images/btuu.jpeg')}}');">
    
    <div class="sidenav" id="welcomeSidenav">
        <div class="login-main-text">
        @if (Route::has('login'))
        @auth
        <a href="{{ route('home') }}" class="text-sm text-gray-700 underline">Anasayfa</a>
        @else
            <h2 id="para2">Kulübe <br>
                Hoş geldin...</h2>
            <p id="para1">Sosyal medya artık oksijen kadar değerli.</p>
        </div>
        <div class="login-main-text">
        <a href="{{route('login')}}" ><button type="submit" class="btn btn-outline-danger">Giriş Yap</button></a>
            @if (Route::has('register'))
            <a href="{{route('register')}}" class="button" ><button type="submit" class="btn btn-outline-light">Kaydol</button></a>
            @endif
                                @endauth
                                @endif
        </div>
    </div>
    <div class="main">
        <div class="col-md-12 ">
            <img id="o2" src="{{asset('assets/images/o2.png')}}"; alt="" align="right">
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


           
        </div>
    </body>
</html>
