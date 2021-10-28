@extends('layouts.adminLayout')
<div>
        @foreach($posts as $post)
        <form action="/admin/layout/edit" method="POST">
            @csrf
            <p>{{ $post->title }}</p>
            <p>written by {{ $post->user->name }}</p>
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="submit" @if($post->is_active) value="zet uit" @else value="zet aan" @endif>
        </form>
        @endforeach
</div>
