@extends('layouts.adminLayout')
    <form action="{{route('storePost.update', $post->id)}}" method="POST">
        @csrf

        <label for="title">Titel</label>
        <input type="text" name="title" value="{{ $post->title }}">
        @error('title') <p> {{ $message }}</p> @enderror

        <br>
        <label for="content">Content</label>
        <input type="text" name="content" value="{{ $post->content }}">
        @error('content') <p> {{ $message }} </p> @enderror

        {{ method_field('PATCH') }}

        <input type="submit">
    </form>
