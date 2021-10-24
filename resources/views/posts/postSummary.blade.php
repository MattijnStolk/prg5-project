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
    <a href="/profile/{{Auth::user()->id}}">Profile</a>
</nav>
{{--    Ik wil hier de waarde van de gekozen categorie meegeven, maar dat kan niet omdat die pas in de foreach uit de gehele array wordt gehaald--}}
{{--<form action="{{route('category.show',  1)}}" method="POST">--}}
{{--    @csrf--}}
{{--        <select name="categories" >--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{ $category->id }}"> {{$category->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    {{ method_field('PUT') }}--}}
{{--    <input type="submit">--}}
{{--</form>--}}
<article id="categories">
    <select name="" id="" onchange="location = this.value;">
    @foreach($categories as $category)
{{--        <a href="/category/{{ $category->id }}">{{$category->name}}</a>--}}
        <option value="/category/{{ $category->id }}"> {{$category->name}}</option>
    @endforeach
    </select>
</article>

@auth()
    @if(Auth::user()->is_admin)
        <a href="createpost">create a new post</a>
        <a href="/category/create">create new category</a>
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
