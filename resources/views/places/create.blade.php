@extends('layouts.body.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:50px">
            <div class="card" id="postGoster">
                <div class="card-header"  >Mekan Oluştur</div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/place" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Mekan İsmi</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mekan Adresi</label>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div> 
 
                        
                        <div class="custom-file">
                                        <input type="file" name="place_image" class="custom-file-input" id="customFile"><br>
                                        <label class="custom-file-label" for="customFile">Mekan Resmi</label> <br>
                                    </div> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection