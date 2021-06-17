<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Doğrula</title>
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
                  <h2 class="text-center">Şifre Onaylama</h2>
                  <div class="panel-body">
    
                    <form method="POST" action="{{ route('password.confirm') }}">
                      @csrf    
                      <div class="form-group">
                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <input id="password" name="password" placeholder="Şifreniz" class="form-control"  type="password" required>
                          </div>
                          <br>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Onayla" type="submit">
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