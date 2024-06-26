<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
    <link href="css/viewstyles.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header id='menu'>
    @if(session()->has('user'))
        <p class='a_left'>Hi {{ session('user')->name }}, Welcome</p>
    @elseif(session()->has('admin'))
        <p class='a_left'>Hi {{ session('admin')->username }}, Welcome</p>
    @else
        <p class="a_left">You're not logged in!</p>
    @endif 
    <nav>
        <p align='right'></p>
        <p class='a_right'>
            Menu: 
            @if(session()->has('user'))
                <a href='/profile'>My Profile</a> | 
                <a href="/viewPosts">View Posts</a> | 
                <a href="/createPost">Create New Post</a> | 
                <a href='/userLogout'>Log Out</a>
            @elseif(session()->has('admin'))
                <a href='/admin/dashboard'>Dashboard</a> | 
                <a href='/createPost'>Create New Post</a> | 
                <a href='/adminLogout'>Log Out</a>
            @else
                <a href='/userLogin'>Login</a> | 
                <a href='/userRegistration'>Registration</a>
            @endif
        </p>
    </nav>
</header>

        <br><br>
        <h2>POSTS</h2>
        <br><br>

        <table border="1" align="center" id="t1">
            <tr>
                <th>Post Number</th>
                <th>Date and Time</th>
                <th>Subject</th>
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
                            <a href="/editPost/{{ $post->id }}" class="action-link edit-link">Edit</a>
                            <a href="/deletePost/{{ $post->id }}" class="action-link delete-link">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            @endforeach
        </table>
        <br><br>
    </div>
    </center>
</body>
</html>
