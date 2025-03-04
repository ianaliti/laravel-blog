<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="{{ route('edit-post', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
        <textarea name="body" id="body">{{ $post->body }}</textarea>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary m-1" type="submit">Submit</button>
        </div>
    </form>
</body>
</html>