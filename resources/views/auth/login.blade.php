<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Giriş Sayfası</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/login.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/stil.css')}}">


</head>

<body style="background-image: url('{{ asset('assets/images/btuu.jpeg')}}');">
<div class="sidenav" id="welcomeSidenav">
  <div class="header"> 
  <a href="{{url('/')}}" id="bag" type="submit" ><h2>OXYGEN</h2></a>
  </div>
        <div class="login-main-text">
            <div class="login-form">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div style="color:red;font-size:20px;" >{{$error}}</div>
              @endforeach
            @endif
                <form method="POST" action="{{ route('login') }}">
            @csrf
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="okulno@ogrenci.btu.edu.tr" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                  placeholder="Şifre" required autocomplete="current-password">                     </div>
                    <button type="submit" class="btn btn-outline-danger">Giriş Yap</button>
                </form>
            </div>
        </div>
        <div class="login-main-text">
            <a href="{{route('register')}}" id="bag" type="submit" class=" outline-danger"><button type="submit" class="btn btn-outline-light">Sen Hala Üye olmadın mı?</button></a><br><br>
            <a href="{{ route('password.request') }}" id="bag" type="submit" class=" outline-light">            <button type="submit" class="btn btn-outline-light">Şifremi unuttum</button>
</a>
        </div>
    </div>
    <div class="main">
        <div class="col-md-12 ">
            <img id="o2" src="{{asset('assets/images/o2.png')}}" ; alt="" align="right">
        </div>
    </div>



  

</body>

</html>