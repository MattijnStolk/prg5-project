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
@include('partials.alerts')

<article>
    <div>
    <h1>
        <p>
            {{ $post->title }}
        </p>
    </h1>
        <p>{{ $post->content }}</p>
        <p>this is post number {{ $post->id }}</p>
        <p>deze post heeft {{ count($likes) - count($dislikes) }} @if(count($dislikes) > count($likes)) dislikes @else likes @endif</p>
    </div>

    @auth()
        <form action="/like">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="ispositive" value="1">
            <input type="submit" value="like">
        </form>
        <form action="/like">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="ispositive" value="0">
            <input type="submit" value="dislike">
        </form>
        <form action="/clearlike">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="submit" value="clear your like/dislike">
        </form>
    @else
        <p> <a href="/login">login</a> om deze post een like/dislike te geven! </p>
    @endauth

    <div>
        @if($categories->first())
            <p>Deze post heeft de volgende categorieen</p>
            @foreach($categories as $category)
                <p> {{ $category->name }}</p>
            @endforeach
        @endif
    </div>
    <div>
        @auth()
            @if(Auth::user()->is_admin)
                <p>
                    Hi admin, <a href="/editpost/{{ $post->id }}">Edit this post</a>.
                </p>
            @endif
        @endauth
    </div>
    <div>
        @if(!Auth::check())
            <p> <a href="/login">login</a> to create a comment! </p>
        @endif
        @auth()
            @if($allowedComment == 1)
                <form action="{{route('comment.store')}}" method="POST">
                    @csrf

                    <input type="text" name="content">
                    @error('content') <p> {{ $message }} </p> @enderror

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    @error('post_id') <p> {{ $message }} </p> @enderror

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @error('user_id') <p> {{ $message }} </p> @enderror

                    <input type="submit">
                </form>
                @else
                    <p>Je moet minimaal 3 likes hebben mocht je een comment willen plaatsen!</p>
                @endif
        @endauth
    </div>
    <div>
        <a href="/posts">go back</a>
    </div>
    <div>
        <h2>comments</h2>
        @foreach($comments as $comment)
            <p>{{ $comment->content }}</p>
            <p>written by {{ $comment->user->name }}</p>
            @auth()
                @if($comment->user->id == Auth::user()->id)
                    <a href="">edit (werkt absoluut wel klik er vooral op)</a>
                @endif
            @endauth
            <br>
        @endforeach
    </div>
</article>
</body>
</html>



