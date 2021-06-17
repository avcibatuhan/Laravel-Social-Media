@extends('layouts.body.layout')
@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12" style="margin-top:50px">
<div class="card">
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('addUserActivity'))
                        <div class="alert alert-success" role="alert">
                            <b>Etkinlikte görüşmek üzere </b>
                        </div>
                    @endif
                    @if (session('deleteUserActivity'))
                        <div class="alert alert-danger" role="alert">
                            <b>Aktiviteden ayrıldınız</b>
                        </div>
                    @endif


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
  <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>{{$activity->start_date}}</div>
  
    <h2 class="card-title">{{ $activity->name }}</h2>
  

  <h4 class="card-text">
  <i class="fa fa-info-circle" aria-hidden="true"></i>
{{ $activity->aciklama }}
</h4>
   <h4><i class="fa fa-map-marker" aria-hidden="true" style='color:red'></i>
  {{ $activity->location }}
  </h4>
  
   

</div>


</div>
<div>Katılımcılar</div>

@foreach($katilimcilar as $katilimci)
<div class="card-header" id="activityKatilimci">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex justify-content-between align-items-center">
      <div class="mr-2"><a href="/profile/{{ $katilimci->getKatilimci->id }}">
        @if($katilimci->getKatilimci->profile_photo_path != NULL)
        <img class="h-10 w-10  rounded-full"
          src="http://localhost:8000/storage/{{ $katilimci->getKatilimci->profile_photo_path}}" /></td>
        @else
        <img class="h-10 w-10 rounded-full object-cover" src="http://localhost:8000/storage/profile-photos/pp.jpg" />
        <br>
        @endif
        </a>
      </div>

      <div class="ml-2">
      <a href="/profile/{{ $katilimci->getKatilimci->id }}"><div class="h5 m-0">{{$katilimci->getKatilimci->name}}</div></a>
      </div>

    </div>
    <i class="fa fa-thumbs-o-up " aria-hidden="true" style="align:right"></i>
  </div>

</div>
<br>
@endforeach

                    @if($katilimDurumu)
                        <form action="/deleteUserActivities" method="post">
                        @csrf
                            <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required> 
                            <div class="form-group">                            
                            <input type="hidden" id="post" name="activity_id" value="{{$activity->id}}" required>                            
                        </div>      
                        <button type="submit" class="btn btn-danger">Etkinlikten Ayrıl</button> 
                        </form>
                    @else
                    <form action="/userActivities" method="post">
                    @csrf
                        <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required>                            

                        
                        <div class="form-group">                            
                            <input type="hidden" id="post" name="activity_id" value="{{$activity->id}}" required>                            
                        </div>
                        <div class="form-group">                            
                            <input type="hidden" id="post" name="response" value=1 required>                            
                        </div>
                        

                           
                       
                            <button type="submit" class="btn btn-primary">Etkinliğe Katıl</button>
                    @endif 
                    </form>      

</div>
</div>
</div>
</div>
</div>

@endsection