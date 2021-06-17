@extends('layouts.body.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Etkinliği Düzenle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/activities/{{$activity->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Activity İsmi</label>
                            <input type="text" name="name" class="form-control" value="{{$activity->name}}">
                        </div>

                        <div class="form-group">
                            <label for="">Aktivite Adresi</label>
                            <textarea name="location" id="" cols="30" rows="10" class="form-control">{{$activity->location}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="">Activite Tipi</label>
                            <input type="text" name="type" class="form-control" value="{{$activity->type}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection