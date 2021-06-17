<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use App\Models\Post;

use Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendships=Auth::user()->friends;        
        $kullanicilar = User::all()->except(Auth::id());

        $results = DB::select('SELECT * FROM users WHERE id NOT IN (SELECT friends.friend_id FROM users LEFT JOIN friends ON users.id=friends.user_id WHERE users.id = :id)', ['id' => Auth::id()]);
       
       

        
        
        return view('friends.showfriends',compact(['kullanicilar','friendships','results']));
    }
    public function myfriends()
    {
        
        $friendships=Auth::user()->friends;       

       
             
        
        return  view('friends.myfriends',compact('friendships'));
    }

    public function addFriend(Friend $friend,Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'friend_id' => 'required',
            ]);
        $friend = new Friend();
        $friend->user_id = $request->user_id;
        $friend->friend_id = $request->friend_id;

        $friend->save();
        return redirect()->back()->with('addFriend', 'your message,here');   
        
    }

    public function deleteFriendship(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'friend_id' => 'required',
            ]);
        $deleteFriendship= Friend::where('user_id',Auth::user()->id)->where('friend_id',$request->friend_id)->delete();
        return redirect()->back()->with('deleteFriend', 'Artık arkadas değilsin');   

    }
    public function seeProfile($id)
    {
        $user=User::find($id);        
        $postlar = Post::where('user', $user->id)->get();

        return view('userProfiles.index',compact('user','postlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
