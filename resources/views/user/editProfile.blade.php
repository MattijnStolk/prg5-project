@extends('layouts.profileLayout')

{{--This one should go to the update function in the controller--}}
<form action="{{route('user.update', $user->id)}}" method="POST">
    @csrf
    <input type="text" value="{{ $user->name }}" name="name">
    @error('name') <p> {{ $message }} </p> @enderror

    <input type="text" value="{{ $user->email }}" name="email">
    @error('email') <p> {{ $message }} </p> @enderror
{{--    <input type="text" value="password?" name="name">--}}
    <input type="submit">
    {{ method_field('PUT') }}
</form>
