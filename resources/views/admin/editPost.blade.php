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
    <form action="{{route('editStoredPost.update')}}" method="POST">
        @csrf

        <label for="title">Titel</label>
        <input type="text" name="title" value="{{ $post->title }}">
        @error('title') <p> {{ $message }}</p> @enderror

        <br>
        <label for="content">Content</label>
        <input type="text" name="content" value="{{ $post->content }}">
        @error('content') <p> {{ $message }} </p> @enderror

        <input type="hidden" value="id" value="{{ $post->id }}">

        <input type="submit">
    </form>
</body>
</html>
