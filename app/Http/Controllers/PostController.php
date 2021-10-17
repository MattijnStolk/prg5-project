<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index($id){

    }

    function show($id) {
        // toont details van een Post
        $post = Post::findOrFail($id);

        //$post->comments()->first()->user->name;
        $comments = $post->comments;

        return view('posts.post', compact('post', 'comments'));
    }
    function showAllPosts(){
        $posts =  Post::all();

        return view('posts/postSummary', compact('posts'));
    }

    function create(){
        if(!Auth::user()->is_admin){
            return redirect('posts');
        }
        return view('admin.createPost');
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required'
        ]);

        $storePost = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);
        return redirect('/posts');
    }

    public function edit($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) return redirect('posts');
        $post = Post::findOrFail($id);


        return view('admin/editPost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        //
    }

}
