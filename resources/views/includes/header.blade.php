<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/headerstyles.css" rel="stylesheet">

</head>
<body>
<header id='menu'>
    @if(session()->has('user'))
        <p class='a_left'>Hi {{ session('user')->name }}, Welcome</p>
    @else
        <p class='a_left'>You are not logged in!</p>
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
            @else
                <a href='/userLogin'>Login</a> | 
                <a href='/userRegistration'>Registration</a>
            @endif
        </p>
    </nav>
</header>

</body>
</html>