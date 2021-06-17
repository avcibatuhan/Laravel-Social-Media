@extends('layouts.body.layout')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <b>Gönderiniz başarıyla oluşturuldu</b>
      </div>
      @endif
      @if (\Session::has('updatePost'))
      <div class="alert alert-success">
        <b>Gönderiniz başarıyla güncellendi</b>
      </div>
      @endif
      @if (\Session::has('deletePost'))
      <div class="alert alert-danger">
        <b>Gönderiniz silindi</b>
      </div>
      @endif
      <div class="col-md-12 gedf-main">


        <!-- Post paylaşımı -->
        <div class="card gedf-card" id="postGoster" style="margin-top:50px;">
          <div class="card-header">

          </div>

          <div class="card-body">
          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel"
                                aria-labelledby="posts-tab">

                                <form action="/post" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}" required>  
                                <div class="form-group">
                                    <label class="sr-only" for="message"></label>
                                    <input type="text" class="post-title" id="message"
                                    placeholder="Bir Başlık Ver" name="title">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="message"></label>
                                    <textarea class="form-control" id="message" rows="3"
                                        placeholder="Ne Düşünüyorsun?" name="body"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Resim Yükle</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Paylaş</button>
                                </form>

                            </div>
                        </div>
            <div class="btn-toolbar justify-content-between">
              <div class="btn-group">
                
              </div>
            </div>
          </div>
        </div>
        @foreach($postlar as $post)
        <!-- Postların geleceği yer -->
        <div id="postGoster" class="card gedf-card">

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
              <a class="card-link" href="post/{{$post->id}}">
              <h5 class="card-title">{{ $post->title }}</h5>
            </a>
              </div>
              <div class="col-md-6">
              <div class="text-muted h7 mb-2" id="tarihIcon"> <i class="fa fa-clock-o" ></i>{{\Carbon\Carbon::parse($post->created_at)->diffForhumans() }}

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
                          <img class="h-30 w-30 object-cover" src="http://localhost:8000/{{ $post->post_image}}" /><br>
                          @endif

                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <a id="comments" href="post/{{$post->id}}" class="card-link"><i class="fa fa-comment"></i> Göster</a>
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

