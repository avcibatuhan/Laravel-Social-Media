@extends('layouts.body.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:50px"> 
            <div class="card">
                <div class="card-header" id="postGoster">{{ __('ETKİNLİK OLUŞTUR') }}</div><br>

                <div class="card-body" id="postGoster">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/activities" method="post">
                        @csrf
                        <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required>  
                        <div class="form-group">
                            <label for="">Etkinlik ismi</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for=""> Konum</label>
                            <textarea name="location" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for=""> Açıklama</label>
                            <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Tipi</label>
                            <input type="text" name="type" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Etkinlik Zamanı</label>
                            <input type="datetime-local" name="start_date" class="form-control">
                        </div>
                     
                        
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection