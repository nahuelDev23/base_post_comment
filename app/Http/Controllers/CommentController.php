<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (Request $request,Post $post)
    {
        
        /**
         * Lo hago asi porq Post $post esta null, no toma las relaciones belogTo
         */
        $post = Post::where('id',$request->user_id)->with('user')->get();
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id
        ]);
       //$userObject = (object) array('id'=>1);
      $post[0]->user->notify(new InvoicePaid($post));
    }
}
