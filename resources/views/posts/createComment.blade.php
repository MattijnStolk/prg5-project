@extends('posts.post')

@section('addComment')

    <form action="{{route('comment.store')}}" method="POST">
        @csrf

        <input type="text" name="content">
        @error('content') <p> {{ $message }} </p> @enderror

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        @error('post_id') <p> {{ $message }} </p> @enderror

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @error('user_id') <p> {{ $message }} </p> @enderror

        <input type="submit">
    </form>

@endsection
