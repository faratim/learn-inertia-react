<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->latest()->get();

        return Inertia::render('Posts/Index', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    public function store(StorePostRequest $request) {
        sleep(3);
        // auth()->user()->posts()->create($request->validated());

        return redirect()->route('posts.index')->with('message', [
            'type' => 'success', 
            'body' => 'Post created successfully!'
        ]);
    }
}