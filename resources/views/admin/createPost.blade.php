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
    <p>create new post</p>
    <form action="{{route('storePost.store')}}" method="POST">
        @csrf
        <label for="title">Titel</label>
        <input type="text" name="title">
        @error('title') <p> {{ $message }}</p> @enderror

        <br>
        <label for="content">Content</label>
        <input type="text" name="content">
        @error('content') <p> {{ $message }} </p> @enderror

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @error('user_id') <p> {{ $message }} </p> @enderror

        <input type="submit">
    </form>
    <a href="/posts">Go back</a>

</body>
</html>

