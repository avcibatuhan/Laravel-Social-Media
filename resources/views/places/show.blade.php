@extends('layouts.body.layout')
@section('content')
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
                    @if (session('commentPlace'))
                    <div class="alert alert-success" role="alert">
                        <b>Yorumunuz eklendi!</b>
                    </div>
                    @endif

                    <div class="card gedf-card" id="postGoster">

                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="ml-2">
                                        <div class="h1 m-0">{{$place->name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-6">
                              
                              <h3><i class="fa fa-map-marker" aria-hidden="true" style='color:red'></i>
                              {{ $place->address }}
</h3>
                              
                              </div>
                              <div class="col-md-6">
                              @if($place->place_image)
                              <img class="h-30 w-30 object-cover"
                                  src="http://localhost:8000/{{ $place->place_image}}" /><br>
                              @endif
                              </div>
                            </div>
                          </div>

                            

                        </div>


                    </div>





                    Yorumlar : <br>

                    @foreach($place->getComments as $comment)
                    <div class="card-header" id="postYorum">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="/profile/{{$comment->getUser->id}}">
                                        @if($comment->getUser->profile_photo_path != NULL)
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="http://localhost:8000/storage/{{ $comment->getUser->profile_photo_path }}" /><br>
                                        @else
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="http://localhost:8000/storage/profile-photos/pp.jpg" /> <br>
                                        @endif </a>
                                </div>
                                <div class="ml-2">
                                    <a href="/profile/{{$comment->getUser->id}}">{{$comment->getUser->name}}</a>
                                </div>
                            </div>
                            <div class="text-muted h7 mb-2" id="tarihIcon"> <i
                                    class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($comment->created_at)->diffForhumans()
                                }}

                            </div>

                        </div><br>
                        <p class="card-text">
                            {{$comment->comment}}
                        </p>
                    </div><br>
                    @endforeach



                    <form action="/placeComment" method="post">
                        @csrf
                        <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required>

                        <div class="form-group">
                            <hr>
                            <label>Yorumunuz :</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="post" name="place_id" value="{{$place->id}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Yorum Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection