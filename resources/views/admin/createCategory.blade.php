@extends('layouts.adminLayout')

<form action="{{route('category.store')}}" method="POST">
    @csrf

    <input type="text" name="name">
    @error('name') <p> {{ $message }} </p> @enderror

    <input type="submit">

</form>
