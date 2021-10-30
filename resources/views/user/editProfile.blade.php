@extends('layouts.profileLayout')
<form action="{{route('user.update', $user->id)}}" method="POST">
    @csrf
    <input type="text" value="{{ $user->name }}" name="name">
    @error('name') <p> {{ $message }} </p> @enderror

    <input type="text" value="{{ $user->email }}" name="email">
    @error('email') <p> {{ $message }} </p> @enderror
    <input type="submit">
    {{ method_field('PUT') }}
</form>
