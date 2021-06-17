@extends('layouts.body.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:50px">

            <div class="card-body">
                <div id="postGoster" class="card gedf-card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    @if($post->getUser->profile_photo_path != NULL)
                                    <img class="h-10 w-10  rounded-full"
                                        src="http://localhost:8000/storage/{{ $post->getUser->profile_photo_path}}" />
                                    </td>
                                    @else
                                    <img class="h-10 w-10 rounded-full object-cover"
                                        src="http://localhost:8000/storage/profile-photos/pp.jpg" />
                                    <br>
                                    @endif
                                </div>
                                <div class="ml-2">
                                    <a href="/profile/{{$post->getUser->id}}">
                                        <div class="h5 m-0">{{$post->getUser->name}}</div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">

                                    <h3 class="card-title">{{ $post->title }}</h3>

                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted h7 mb-2" id="tarihIcon"> <i
                                            class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($post->created_at)->diffForhumans()
                                        }}

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">
                                        {{ $post->body }}
                                    </p>
                                </div>
                                <div class="col-md-6" id="tarihIcon">
                                    @if($post->post_image)
                                    <img class="h-30 w-30 object-cover"
                                        src="http://localhost:8000/{{ $post->post_image}}" /><br>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <h3>Yorumlar</h3>
            @foreach($paylasim->getComments as $comment)
                <div class="card-header" id="postYorum">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                @if($comment->getUser->profile_photo_path != NULL)
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="http://localhost:8000/storage/{{ $comment->getUser->profile_photo_path }}" />
                                @else
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="http://localhost:8000/storage/profile-photos/pp.jpg" />
                                @endif
                            </div>
                            <div class="ml-2">
                                <a href="/profile/{{$comment->getUser->id}}">{{$comment->getUser->name}}</a>
                            </div>

                        </div>
                        <div class="text-muted h7 mb-2" id="tarihIcon"> <i
                                class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($comment->created_at)->diffForhumans()
                            }}

                        </div>

                    </div> <br>
                    <p class="card-text">
                        {{$comment->comment}}
                    </p>
                </div><br>
            @endforeach

            <form action="/comment" method="post">
                @csrf
                <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}" required>

                <div class="form-group">
                    <label>Yorumunuz :</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" id="post" name="post" value="{{$paylasim->id}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Yorum Ekle</button>
            </form>



        </div>
    </div>
</div>
@endsection