@extends('layouts.profileLayout')

@include('partials.alerts')

    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
    <p>You created your profile at {{ $user->created_at }}</p>
    <p>You last updated your profile ar {{ $user->updated_at }}</p>
    @if($user->is_admin)
    <p>You are an administrator!</p>
    @endif




<a href="/profile/edit/{{$user->id}}">edit your profile</a>
