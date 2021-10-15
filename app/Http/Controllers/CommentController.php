<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'post_id' => 'required'
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'post_id' => $request->input('post_id'),
            'user_id' => $request->input('user_id')
        ]);

        return redirect('post/' . $request->post_id);
    }

    function createComment($id){
        $post = Post::findOrFail($id);

        return view('posts.createComment', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('comments')
           ->join('posts', 'comments.post_id', '=', 'posts.id')
           ->join('users', 'comments.user_id', '=', 'users.id')
           ->select('comments.*')
           ->where('posts.id', '=', $id)
           ->get();


        //join statement met de 2 tabellen en welke info welke is
        //select welke info je nodig hebt van allei de tabellen
        //select waar je deze info nodig hebt
        //get()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
