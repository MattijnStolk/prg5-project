<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //get the right id from the url
    //send the right post to post.blade
    function index($id){
        $posts = Post::all();

        $correctPost = '';
        foreach ($posts as $key => $post){
            if ($post->id == $id){
                $correctPost = $post;
            }
        }
        return view('posts/post', [
            'post' => $correctPost
        ]);
    }
    function showAllPosts(){
        $posts =  Post::all();

        return view('posts/postSummary', [
            'posts' => $posts
        ]);
    }
}
