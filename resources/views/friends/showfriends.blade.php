@extends('layouts.body.layout')
@section('content')




  <div class="col-md-12" style="background-color:transparant;margin-top:50px;">
  <h1>Tüm Kullanıcılar :</h1>
  @if (\Session::has('addFriend'))
  <div class="alert alert-success">
    <b>Başarıyla arkadaş oldunuz</b>
  </div>
  @endif
  <div class="card gedf-card" style="border-radius:20px;">
  <div class="card-body">

    @livewire('search') 
    </div>
    </div>
 
      <table class="table" cellspacing="0" cellpadding="0" id="tableFriends">
        <tbody>
          @foreach($results as $kullanici)
          @if($kullanici->id != Auth::user()->id)

          @if($loop->index %2 == 1)
          <tr id="trFriends">
            <td>
              @if($kullanici->profile_photo_path != NULL)
              <img class="h-10 w-10 rounded-full object-cover"
                src="http://localhost:8000/storage/{{ $kullanici->profile_photo_path }}" />
              @else
              <img class="h-10 w-10 rounded-full object-cover"
                src="http://localhost:8000/storage/profile-photos/pp.jpg" />
              @endif
            </td>
            <td>
              {{$kullanici->name}}
            </td>
            <td>
              <form action="/addFriends" method="post">
                @csrf
                <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required>
                <input type="hidden" id="friend_id" name="friend_id" value="{{ $kullanici->id }}" required>
                <button type="submit" class="btn btn-primary">Arkadaş Ekle</button>
              </form>
            </td>

            @elseif($loop->index %2 == 0)
            <td>
              @if($kullanici->profile_photo_path != NULL)
              <img class="h-10 w-10 rounded-full object-cover"
                src="http://localhost:8000/storage/{{ $kullanici->profile_photo_path }}" />
              @else
              <img class="h-10 w-10 rounded-full object-cover"
                src="http://localhost:8000/storage/profile-photos/pp.jpg" />
              @endif
            </td>
            <td>
              {{$kullanici->name}}
            </td>
            <td>
              <form action="/addFriends" method="post">
                @csrf
                <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}" required>
                <input type="hidden" id="friend_id" name="friend_id" value="{{ $kullanici->id }}" required>
                <button type="submit" class="btn btn-primary">Arkadaş Ekle</button>
              </form>
            </td>

          </tr>
          @endif
          @endif
          @endforeach
        </tbody>
      </table>
    



  </div>



@endsection