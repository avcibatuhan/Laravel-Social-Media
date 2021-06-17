<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;



class PostController extends Controller
{
    public function index()
    {
        $user_friends = Auth::user()->friends;
        $user_friends_id = $user_friends->pluck('id')->toArray();
        $postlar = Post::whereIn('user', $user_friends_id)->get();

        $posts = Post::latest()->get();        
        
        return view('posts.index', compact('posts','postlar'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user=$request->user;
        $post->published_at = $request->published_at;

        if($request->hasFile('image'))
        {
            $imageName=$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('postImages'),$imageName);
            $post->post_image='postImages/'.$imageName; 
        }

        $post->save();
        return redirect('/home')->with('success','Post created successfully!');
    }

    public function show(Post $post)
    {   
        //echo $post->id;
        $paylasim=Post::find($post->id);
        //print_r($paylasim->getUser);
        //echo $paylasim->title .' - posted by ' . $paylasim->getUser->name;
        /* $paylasimm=Post::find(2);
        echo $paylasimm->title ."<br>";
        echo $paylasimm->body ."<br>";
        echo "Yorumlar : <br>";

        foreach($paylasimm->getComments as $comment)
        {
            echo $comment->comment." - ".$comment->getUser->name . "<br>";
        } */
        return view('posts.show', compact(['post','paylasim']));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->published_at = $request->published_at;

        $post->save();
        return redirect('/home')->with('updatePost','Gönderi başarıyla güncellendi');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/home')->with('deletePost','Post deleted successfully!');
    }
}