@extends('layouts.adminLayout')
    <p>create new post</p>
    <form action="{{route('storePost.store')}}" method="POST">
        @csrf
        <label for="title">Titel</label>
        <input type="text" name="title">
        @error('title') <p> {{ $message }}</p> @enderror

        <br>
        <label for="content">Content</label>
        <input type="text" name="content">
        @error('content') <p> {{ $message }} </p> @enderror

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @error('user_id') <p> {{ $message }} </p> @enderror

        <br>
        @foreach($categories as $category)
            <label for="categories[]">{{ $category->name }}</label>
            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            <br>
        @endforeach

        <input type="submit">
    </form>


