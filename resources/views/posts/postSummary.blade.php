<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
</head>
<body>
<h1>this is the about page</h1>
<nav>
    @auth()
    <a href="/profile/{{Auth::user()->id}}">Profile</a>
    @endauth
    @if(!Auth::check())
        <a href="/home">Login of registreer</a>
    @endif
</nav>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<article id="categories">
    <select name="" id="" onchange="location = this.value;">

    @foreach($categories as $category)
{{--        <a href="/category/{{ $category->id }}">{{$category->name}}</a>--}}
        <option value="/category/{{ $category->id }}"> {{$category->name}}</option>
    @endforeach
    </select>
</article>

<form action="/search" method="GET" role="search">
    <input type="text" name="search" placeholder="Search for posts" @if($_GET)value="{{ $_GET['search'] }}"@endif>
    <input type="submit">
</form>

<a href="/posts">clear search</a>

@auth()
    @if(Auth::user()->is_admin)
<<<<<<< Updated upstream
        <a href="createpost">create a new post</a>
        <a href="/category/create">create new category</a>
        <a href="/admin/layout">Ga naar het post overzicht voor admins</a>
=======
        <div>
            <a href="createpost">create a new post</a>
            <br>
            <a href="/category/create">create new category</a>
        </div>
>>>>>>> Stashed changes
    @endif
@endauth

<div>
    @foreach($posts as $post)
        <p>{{ $post -> title }}</p>
        <p>{{ $post -> content }}</p>
        <a href="post/{{$post->id}}">go to post</a>
    @endforeach
</div>


</body>
</html>
