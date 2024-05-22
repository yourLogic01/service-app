<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body'=> 'required',   
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['post_id'] =intval($request->post_id);
        
        $slug = $request->slug;
        Comment::create($validatedData);

        return redirect('/post/detail/'. $slug)->with('success', 'Your comment has been added!'); 
    }
}
