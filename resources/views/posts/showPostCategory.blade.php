@extends('layouts.postLayout')

<div>
    @if(!$posts->first())
        <p>Deze categorie is leeg</p>
    @endif
    @foreach($posts as $post)
        <p>{{ $post -> title }}</p>
        <p>{{ $post -> content }}</p>
        <a href="/post/{{$post->id}}">go to post</a>
    @endforeach
</div>
<div>
        <a href="/posts">Je kunt hier teruggaan naar alle posts</a>
</div>
