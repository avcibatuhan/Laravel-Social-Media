@extends('layouts.body.layout')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
<div class="container">
  <div class="row">
    <div class="col-md-12" style="margin-top:50px;">
      <div id="content" class="content content-full-width">
        <div class="profile" >
          <div class="profile-header" >
            <div class="profile-header-cover"></div>
            <div class="profile-header-content" >
              <div class="profile-header-img">
              @if($user->profile_photo_path != NULL)  
                      <img src="http://localhost:8000/storage/{{ $user->profile_photo_path }}"/><br>
            @else
                    <img src="http://localhost:8000/storage/profile-photos/pp.jpg" /> <br>                       
              @endif
              </div>
              <div class="profile-header-info">
                <h4 class="m-t-10 m-b-5">{{$user->name}}</h4>
                <p class="m-b-10"><h5>Katilim tarihi : {{$user->created_at->diffForHumans()}}</h5></p>
                @if(Auth::user()->id == $user->id)
                <a href="{{url('user/profile')}}" class="btn btn-sm btn-info mb-2">Profili Düzenle</a>
                @else
                  <br><br>
                @endif
              </div>
            </div>

            
          </div>
        </div><br> <br>
        @foreach($postlar as $post)
                <!-- Postların geleceği yer -->
                <div class="card gedf-card" id="postGoster">

<div class="card-header">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex justify-content-between align-items-center">
      <div class="mr-2">
        @if($post->getUser->profile_photo_path != NULL)
        <img class="h-10 w-10  rounded-full"
          src="http://localhost:8000/storage/{{ $post->getUser->profile_photo_path}}" /></td>
        @else
        <img class="h-10 w-10 rounded-full object-cover"
          src="http://localhost:8000/storage/profile-photos/pp.jpg" /> <br>
        @endif
      </div>
      <div class="ml-2">
        <div class="h5 m-0">{{$post->getUser->name}}</div>
      </div>
    </div>
  </div>

</div>
<div class="card-body">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <a class="card-link" href="/post/{{$post->id}}">
    <h5 class="card-title">{{ $post->title }}</h5>
  </a>
      </div>
      <div class="col-md-6">
      <div class="text-muted h7 mb-2"> <i
      class="fa fa-clock-o" id="tarihIcon">{{\Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</i></div>
      </div>
    </div>
  </div>



    <div class="container">
      <div class="row">
        <div class="col-md-6">
        {{ $post->body }}
        </div>
        <div class="col-md-6">
        @if($post->post_image)
          <img class="h-30 w-30 object-cover" src="http://localhost:8000/{{ $post->post_image}}" /><br>
          @endif
        </div>
      </div>
    </div>
    
  
</div>
<div class="card-footer">
  <a id="comments" href="/post/{{$post->id}}" class="card-link"><i class="fa fa-comment"></i> Göster</a>
  @if(Auth::user()->type ==='admin')
  <a href="post/{{$post->id}}/edit" class="btn btn-primary">Düzenle</a>
  <form action="post/{{$post->id}}" method="post" class="d-inline">
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
</div>
@endsection