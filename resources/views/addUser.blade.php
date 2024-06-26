<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link href="css/adduserstyles.css" rel="stylesheet">

</head>
<body>
<header id='menu'>
    @if(session()->has('admin'))
        <p class='a_left'>Hi {{ session('admin')->username }}, Welcome</p>
    @else
        <p class='a_left'>You are not logged in!</p>
    @endif 
    <nav>
        <p align='right'></p>
        <p class='a_right'>
            Menu: 
            @if(session()->has('admin'))
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
<h1>Add New User</h1>
    <form method="POST" action="/addUser">
        @csrf
        <label for="user_name">Name:</label><br>
        <input type="text" id="user_name" name="user_name" required><br>
        <label for="user_email">Email:</label><br>
        <input type="email" id="user_email" name="user_email" required><br>
        <label for="user_pass">Password:</label><br>
        <input type="password" id="user_pass" name="user_pass" required><br><br>
        <input type="submit" name="submit_btn" value="Submit">
    </form>
</body>
</html>