<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

if (!(session()->has('user'))) {
    return view('/userLogin');//to login page if not logged in
}

$user = Auth::user();
$name = $user->name;
$email = $user->email;
$pass = $user->password;
$ip = $_SERVER['REMOTE_ADDR']; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/uhomestyles.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
@include('includes.header')

        <br><br>
        <h2>POSTS</h2>
        <br><br>

<table border="1" align="center" id="t1">
            <tr>
                <th>Post Number</th>
                <th>Date and Time</th>
                <th>Content</th>
                <th>Post</th>
                <th>Posted By</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td><center>{{ $post->id }}</center></td>
                    <td><center>{{ $post->date_time }}</center></td>
                    <td><center>{{ $post->subject }}</center></td>
                    <td>{{ $post->post }}</td>
                    <td><center>{{ $post->posted_by }}</center></td>
                    <?php if (session()->has('admin')): ?>
                        <td>
                            <a href="/editPost/{{ $post->id }}">Edit</a> | 
                            <a href="/deletePost/{{ $post->id }}">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            @endforeach
        </table>

</body>
</html>

<!-- HTML CODE ENDS HERE -->

