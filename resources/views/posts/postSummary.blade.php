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
<h1>this is the about page</h1>
@auth()
    @if(Auth::user()->is_admin)
    <a href="createpost">create a new post</a>
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
