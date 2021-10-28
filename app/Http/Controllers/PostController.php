<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index($id){

    }

    function show($id) {
        // toont details van een Post
        $post = Post::where('id', '=', $id)->where('is_active', '=', 1)->firstOrFail();
        $categories = $post->categories;

        //$post->comments()->first()->user->name;
        $comments = $post->comments;

        $data = User::where('created_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())->get();

        dd($data);

        return view('posts.post', compact('post', 'comments', 'categories'));
    }
    function showAllPosts(){
        $posts =  Post::where('is_active', '=', 1)->get();
        $categories = Category::all();

        return view('posts/postSummary', compact('posts', 'categories'));
    }

<<<<<<< Updated upstream
    function showAdminLayout(){
        if (!Auth::check() || !Auth::user()->is_admin) return redirect('/posts');
        $posts = Post::all();

        return view('admin.adminPanel', compact('posts'));
    }

    function editActivePost(Request $request){
        if (!Auth::check() || !Auth::user()->is_admin) return redirect('/posts');

        $postid = $request->input('id');

        $post = Post::findOrFail($postid);;

        $post->is_active = !$post->is_active;
        $post->save();

        return redirect('/admin/layout');
=======
    function searchPost(Request $request){
        $searchResult = $request->get('search');
        if(isset($searchResult) && $searchResult !== ' '){
            $categories = Category::all();

            $contentQuery = Post::where('content', 'LIKE', '%'. $searchResult. '%');

            $posts = Post::where('title', 'LIKE', '%'. $searchResult. '%')
                ->union($contentQuery)
                ->get();

            $request->session()->flash('searched');

            return view('posts/postSummary', compact('posts', 'categories'));
        }else{
            return redirect('/posts');
        }
>>>>>>> Stashed changes
    }

    function create(){
        if(!Auth::user()->is_admin){
            return redirect('posts');
        }
        $categories = Category::all();
        return view('admin.createPost', compact('categories'));
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

        $storePost->categories()->sync($request->categories);

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
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $correctPost = Post::findOrFail($id);

        $correctPost->update($request->except(['_token', '_method']));

        $request->session()->flash('success', 'Post is bewerkt');

        return redirect('/post/'.$id);
    }

}
