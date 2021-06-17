<div>
<div class="col md-4">
    <input type="text" style="border-radius:20px" wire:model="search" placeholder="Arkadaşını ara!"/>

    <div wire:loading>Kullanıcılar aranıyor...</div>
    <div wire:loading.remove>
        @if ($search == "")
        <div class="text-gray-500 text-sm">
            <strong>Arama yapmak için yazınız...</strong> 
        </div>
        @else
        @if($users->isEmpty()|| $search == " ")
        <div class="text-gray-500 text-sm">
            <strong>Sonuç bulunamadı!</strong> 
        </div>
        @else <br>
        <table class="table table-striped" style="text-align:center;">
                        <tbody>
        @foreach($users as $user)
        <tr> 
            <td> 
            <div class="flex flex-shrink-0">
            <a href="/profile/{{$user->id}}">  <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                            class="h-8 w-8 rounde-full object-cover"></a>
                </div>
            </td>
            <td>
            <div class="flex flex-grow overflow-hidden">
                        <span class="text-lg ml-3">
                        <a href="/profile/{{$user->id}}">  {{$user->name}}</a>
                        </span>
             </div>
            </td> 

        
        @endforeach
        </tbody>
</table>
        {{$users->onEachSide(1)->links('livewire-pagination')}}
        @endif
        @endif
       
    </div>
</div>
</div>
