<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<article>
    <h1>
        <p>
            {{ $post->title }}
        </p>
    </h1>
    <div>
        <p>{{ $post->content }}</p>
        <p>this is post number {{ $post->id }}</p>

    </div>
    <div>
        @yield('successPost')
        @if(!Auth::check())
            <a href="/login"> login </a>
        @endif
        @auth()
        <a href="/post/createComment/{{ $post->id }}">
            addcomment
        </a>

        @yield('addComment')
        @endauth
    </div>
    <div>
        <a href="/posts">
            go back
        </a>
    </div>
    <div>
        @dd($comments)
    </div>

</article>
</body>
</html>



