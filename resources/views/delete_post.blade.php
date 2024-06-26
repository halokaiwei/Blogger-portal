<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Post</title>
</head>
<body>
    <h2>Delete Post Confirmation</h2>
    <p>Are you sure you want to delete this post?</p>
    <form action="{{ route('deletePost', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Confirm Delete</button>
    </form>
</body>
</html>
