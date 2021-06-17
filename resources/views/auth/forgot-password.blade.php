<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifremi Unuttum</title>
    <style>
    .col-md-4{
        text-align: center;
        margin-top: 250px;
        background-color:steelblue;
  background-image: linear-gradient(to bottom right, navy,steelblue,powderblue,powderblue,Azure,Azure,whitesmoke);
        border-radius:40px;
    }
    #xd{
        border-radius:40px;
    }
    body{
        background-color: blueviolet;
        opacity: inherit;
    }
</style>
</head>
<body style="background-image: url('{{ asset('assets/images/btu.jpeg') }}'); background-repeat:no-repeat; background-position:center;background-size:cover;width:100%;height:100vh">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">

	<div class="row">
            @if (session('status'))
        <div class="">
            {{ session('status') }}
        </div>
        @endif
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" id="xd" style="  background-color:steelblue;
  background-image: linear-gradient(to bottom right, navy,steelblue,powderblue,powderblue,Azure,Azure,whitesmoke);border:none">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Şifremi Unuttum</h2>
                  <p>Şifreni buradan sıfırlayabilirsin</p>
                  <div class="panel-body" >
    
                    <form method="POST" action="{{ route('password.email') }}">
                      @csrf

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Email adresiniz" class="form-control"  type="email" required autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <input  class="btn btn-lg btn-primary btn-block" value="Şifremi Sıfırla" type="submit">
                      </div>
                      
                     
                    </form>
                 <a href="{{url('/')}}"><button class="btn btn-info">Anasayfa</button></a> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>