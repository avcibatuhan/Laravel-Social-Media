@extends('layouts.body.layout')
@section('content')

    

    <div class="container">
    <div class="row justify-content-center">    
    <div class="col-md-12" style="margin-top:50px;">
    <h1>Etkinlikler :</h1>
    @if (\Session::has('addActivity'))
        <div class="alert alert-success">
             <b>Etkinlik başarıyla eklendi</b> 
        </div>
    @endif
    @if (\Session::has('updateActivity'))
        <div class="alert alert-success">
            <b>Etkinlik başarıyla güncellendi</b> 
        </div>
    @endif
    @if (\Session::has('destroyActivity'))
        <div class="alert alert-danger">
            <b>Etkinlik silindi</b> 
        </div>
    @endif
                <a href="activities/create" class="btn btn-primary mb-2">Etkinlik Oluştur</a> 
                <br>
                @foreach($activities as $activity)
                <div id="postGoster" class="card gedf-card">

<div class="card-header">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex justify-content-between align-items-center">
      <div class="mr-2">
        @if($activity->getCreator->profile_photo_path != NULL)
        <img class="h-10 w-10  rounded-full"
          src="http://localhost:8000/storage/{{ $activity->getCreator->profile_photo_path}}" /></td>
        @else
        <img class="h-10 w-10 rounded-full object-cover" src="http://localhost:8000/storage/profile-photos/pp.jpg" />
        <br>
        @endif
      </div>
      <div class="ml-2">
        <a href="/profile/{{ $activity->getCreator->id }}"><div class="h5 m-0">{{ $activity->getCreator->name }}</div></a>
      </div>
 
      
    </div>
    <div class="float-right">
          <i>{{ $activity->type }}</i>
      </div>
  </div>

</div>

<div class="card-body">
  <div class="text-muted h7 mb-2"> <i
      class="fa fa-clock-o"></i>{{$activity->start_date}}</div>
  <a class="card-link" href="activities/{{$activity->id}}">
    <h5 class="card-title">{{ $activity->name }}</h5>
  </a>

  <p class="card-text">
  <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $activity->aciklama }}
  </p>

  <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true" style='color:red'></i>
    {{ $activity->location }}
  </p>

  

</div>

<div class="card-footer">
  <a id="comments" href="activities/{{$activity->id}}" class="card-link"><i class="fa fa-comment"></i> Göster</a>
  @if(Auth::user()->type ==='admin')
  <a href="post/{{$activity->id}}/edit" class="btn btn-primary">Düzenle</a>
  <form action="activities/{{$activity->id}}" method="post" class="d-inline">
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