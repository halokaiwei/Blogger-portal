<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    a {
        color: blue;
        text-decoration: none;
    }
    
    a:hover {
        text-decoration: underline;
    }

    header {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: grey;
        color: white;
        padding: 10px 0;
        text-align: center;
        z-index: 1000;
    }

    header .a_left {
        float: left;
        margin-left: 20px;
    }
    
    header .a_right {
        float: right;
        margin: 15px;
    }
    
    header .a_right a {
        color: blue;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    header .a_right a:hover     {
        text-decoration: underline;
    }

    div {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    div p.a_left {
        float: left;
        margin-left: 20px;
    }

    div p.a_right {
        float: right;
        margin-right: 20px;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-top: 80px;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #ffffff;
    }

    table th, table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    table th {
        background-color: rgb(40, 39, 71);
        color: #fff;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table td form {
        display: inline-block;
    }

    table td form input[type="submit"] {
        padding: 8px 12px;
        background-color: #f44336;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }

    table td form input[type="submit"]:hover {
        background-color: #d32f2f;
    }

    @media screen and (max-width: 768px) {
        table {
            width: 100%;
        }
    }

    </style>
</head>
<body>
<header id="menu">
@if(session()->has('admin'))
    <p class='a_left'>Hi {{ session('admin')->username }}, Welcome</p>
    <p class='a_right'>Menu :
        <a href="/createPost">Create New Post</a> |
        <a href="/viewPosts">View Posts</a> |
        <a href="/addUser">Add New User</a> |
        <a href="/adminLogout">Log Out</a>
    </p>
@else 
    <p class='a_left'>You're not logged in!</p>
@endif
</header>

<br><br>
<h2>Users Data</h2>

<br><br>
<table border="1" align="center">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>IP</th>
        <th>EMAIL CONFIRMED</th>
        <th>ACTION</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->ip }}</td>
            <td>{{ $user->confirmed ? 'YES' : 'NO' }}</td>
            <td>
                <form method="post" action="/deleteUser/{{ $user->id }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="hidden" name="delete" value="0">
                    <input type="submit" name="delete_btn" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>