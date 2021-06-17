<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kayıt Ol</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body style="background-image: url('{{ asset('assets/images/btu.jpeg')}}');">
<div class="sidenav">
<div class="header"> 
  <a href="{{url('/')}}" id="bag" type="submit" ><h2>OXYGEN</h2></a>
  </div>
  <div class="login-main-text">

    <div class="login-form">
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <ul>
      <li><div style="color:red;font-size:20px;" >{{$error}}</div></li>
      </ul>
          
      @endforeach
  @endif
  <h1 class="login-title">Kayıt Ol</h1>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
          <label for="name">İsim</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="İsminiz">
       
        </div>

        <div class="form-group">
          <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="okulno@btu.edu.tr">
              
        </div>

        <div class="form-group">
          <label for="password">Şifre</label>
          <input type="password" name="password" id="password" class="form-control"
            placeholder="Şifre">
        </div>

        <div class="form-group mb-4">
          <label for="password">Şifre Tekrar</label>
          <input type="password" name="password_confirmation" id="password" class="form-control"
            placeholder=" Şifre Tekrar">
        </div>

        <button type="submit" class="btn btn-outline-light">Kayıt ol</button>
      </form>
      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Zaten hesabım var?') }}
    </a>
    </div>
  </div>
</div>
<div class="main">
  <div class="col-md-12 ">
    <img id="o2" src="{{asset('assets/images/o2.png')}}" ; alt="" align="right">
  </div>
</div>

</body>

</html>