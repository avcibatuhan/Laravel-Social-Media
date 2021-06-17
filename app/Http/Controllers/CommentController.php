<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\PlaceComment;



class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comment = new Comment();
        $comment->user = $request->user;
        $comment->comment = $request->comment;
        $comment->post = $request->post;
        $comment->save();
        return redirect()->back()->with('commentPost', 'your message,here');   
        
    }

    public function placeComment(Request $request)
    {
        $comment = new PlaceComment();
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->place_id = $request->place_id;
        $comment->save();
        return redirect()->back()->with('commentPlace', 'your message,here'); 
        //return redirect('places')->with('success','Comment created successfully!');
    }
}
