@extends('layouts.postLayout')

<div>
    @foreach($posts as $post)
        <h1>
            <p>
                {{ $post->title }}
            </p>
        </h1>
        <div>
            <p>{{ $post->content }}</p>
            <p>this is post number {{ $post->id }}</p>

        </div>
    @endforeach
</div>
