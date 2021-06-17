@extends('layouts.body.layout')
@section('content')


    <div class="container">
    <div class="row justify-content-center">    
    <div class="col-12"  style="margin-top:50px;">
    <h1>Yerler :</h1>

    @if (\Session::has('addPlace'))
    <div class="alert alert-success">
        <b>Mekan başarıyla eklendi</b>
    </div>
    @endif
    @if (\Session::has('updatePlace'))
    <div class="alert alert-success">
        <b>Mekan başarıyla güncellendi</b>
    </div>
    @endif
    @if (\Session::has('destroyPlace'))
    <div class="alert alert-danger">
        <b>Mekan silindi</b>
    </div>
    @endif
                <a href="place/create" class="btn btn-primary mb-2">Mekan Oluştur</a> 
                <br>


                @foreach($places as $place)
<!-- Postların geleceği yer -->
<div id="postGoster" class="card gedf-card">

  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-between align-items-center">

      </div>
    </div>

  </div>
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a class="card-link" href="place/{{$place->id}}">
            <h5 class="card-title">{{ $place->name }}</h5>
          </a>
        </div>
        <div class="col-md-6">
          <div class="text-muted h7 mb-2" id="tarihIcon"> <i
              class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($place->created_at)->diffForhumans() }}

          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="card-text">
          <i class="fa fa-map-marker" aria-hidden="true" style='color:red'></i> {{ $place->address }}
          </p>
        </div>
        <div class="col-md-6" id="tarihIcon">
          @if($place->place_image)
          <img class="h-30 w-30 object-cover" src="http://localhost:8000/{{ $place->place_image}}" /><br>
          @endif

        </div>
      </div>
    </div>
  </div>

  <div class="card-footer">
    <a id="comments" href="place/{{$place->id}}" class="card-link"><i class="fa fa-comment"></i> Göster</a>
    @if(Auth::user()->type ==='admin')
    <a href="place/{{$place->id}}/edit" class="btn btn-primary">Düzenle</a>
    <form action="place/{{$place->id}}" method="post" class="d-inline">
      {{ csrf_field() }}
      @method('DELETE')
      <button class="btn btn-danger" type="submit">Sil</button>
    </form>
    @endif
  </div>
</div>
@endforeach

            </div> 
    </div>
</div>
@endsection