<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\User;
use Illuminate\Pagination\Paginator;
use WithPagination;

class Search extends Component
{
    public $search;
    //public $users;
    public $currentPage=1;
    public function render()
    {
        $search= '%' . $this->search . '%';
        //$this->users=User::where('name','like',$search)->orderBy('name','asc')->get();
        return view('livewire.search',[
            'users'=>User::where('name','like',$search)->orderBy('name','asc')->paginate(5)
        ]);
    }
     public function setPage($url)
    {
        $this->currentPage=explode('page=',$url)[1];

        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    } 
}
