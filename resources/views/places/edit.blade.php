@extends('layouts.body.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mekanı Düzenle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/place/{{$place->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Mekan ismi</label>
                            <input type="text" name="name" class="form-control" value="{{$place->name}}">
                        </div>

                        <div class="form-group">
                            <label for="">Mekan Adresi</label>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control">{{$place->address}}</textarea>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection