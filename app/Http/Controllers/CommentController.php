<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }

   public function store(Project $project)
   { 
     
        request()->validate([
            'content' => 'required|min:5'
        ]);

        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;

        $project->comments()->save($comment);

        return redirect()->route('trellos.show', ['trello'=>$project->id]);
   }

}
