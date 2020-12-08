<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $list_post = Post::all();
        return Inertia::render('posts/index',[
            'notifications' => $notifications,
            'list_post'=>$list_post,
        ]);
    }
    public function show(Post $post)
    {
        $post = Post::with('user')->get();
        return Inertia::render('posts/show',[
            'post'=>$post,
        ]);
    }

    public function store (Request $request,Post $post)
    {
        Post::create($request->all());
        return back();
    }
}
