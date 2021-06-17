<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Aktivite Et</title>
    <style>
    .col-md-4{
        text-align: center;
        margin-top: 250px;
        border-radius:40px;
    }
    #xd{
        border-radius:40px;
    }
    body{
        background-color: blueviolet;
        
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body style="background-image: url('{{ asset('assets/images/btu.jpeg') }}'); background-repeat:no-repeat; background-position:center;background-size:cover;width:100%;height:100vh" >
    
 <div class="form-gap"></div>
<div class="container">
    <div class="row" >
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" id="xd">
              <div class="panel-body" >
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Email Aktivite Etme</h2>
                  <div class="panel-body">
                    <div class="mb-4 text-sm text-gray-600">
                     <p> Kayıt olduğunuz için teşekkürler.Devam etmeden önce lütfen gönderdiğimiz emaili aktive edebilir misiniz? Eğer maili almadıysanız aşağıdaki butona tıklayarak yeni linki alabilirsiniz</p>
                  </div> <br>
                    @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                    <p> Yeni link emailinize gönderildi!</p> 
                    </div>
                  @endif
                    <form method="POST" action="{{ route('verification.send') }}">
                      @csrf
      
                      <div>
                          <button type="submit" class="btn btn-primary">Linki Yeniden Gönder</button>
                      </div>
                  </form> <br>
      
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
      
                      <button type="submit" class="btn btn-danger">
                          Çıkış Yap
                      </button>
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