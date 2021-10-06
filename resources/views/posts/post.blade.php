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
        <p>
            {{ $post->content }} <br>
        <p>this is post number {{ $post->id }}</p>
        </p>
    </div>
    <div>
        <a href="/posts">
            go back
        </a>
    </div>
</article>
</body>
</html>



