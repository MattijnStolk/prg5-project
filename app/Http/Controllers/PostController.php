<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //get the right id from the url
    //send the right post to post.blade
    function index($id){
        $posts = Post::findOrFail($id);

//        $correctPost = '';
//        foreach ($posts as $key => $post){
//            if ($post->id == $id){
//                $correctPost = $post;
//            }
//        }

        return view('posts/post', [
            'post' => $posts
        ]);
    }
    function showAllPosts(){
        $posts =  Post::all();

        return view('posts/postSummary', [
            'posts' => $posts
        ]);
    }

    function createComment($id){
        $post = Post::findOrFail($id);

        return view('posts.createComment', [
            'post' => $post
        ]);
    }

    function success($id){
        $post = Post::findOrFail($id);

        return view('posts.successPost', [
            'post' => $post
        ]);
    }

}
