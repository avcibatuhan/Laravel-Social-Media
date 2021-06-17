<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Sıfırla</title>
    <style>
    .col-md-4{
        text-align: center;
        margin-top: 250px;
    }
    body{
        background-color: blueviolet;
        
    }
</style>
</head>
<body >
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Şifremi Sıfırla</h2>
                  <p>Şifreni buradan sıfırlayabilirsin</p>
                  <div class="panel-body">
    
                    <form method="POST" action="{{ route('password.update') }}">
                      @csrf
                      <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <x-jet-label for="email" value="{{ __('Email') }}" />
                          <input id="email" name="email" placeholder="Emailiniz" class="form-control"  type="email" required>
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <input id="password" name="password" placeholder="Yeni Şifreniz" class="form-control"  type="password" required>
                          </div>
                          <br>

                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <input id="password_confirmation" name="password_confirmation" required placeholder="Şifrenizi Tekrar Giriniz" class="form-control"  type="password">
                          </div>

                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Şifremi Sıfırla" type="submit">
                      </div>                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
</body>
</html>