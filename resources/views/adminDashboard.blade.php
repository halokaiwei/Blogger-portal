<!DOCTYPE html>
<html>
<head>
    <title>ADMIN PORTAL | Member's Area | Arijit Banerjee</title>
    <style type="text/css">
        .a_left {
            float: left;
            /* #width:33.33333%; */
            text-align: left;
        }
        .a_right {
            float: right;
            width: 66.66666%;
            text-align: right;
        }

        table#t1 {
            border-collapse: collapse;
        }

        th, td {
            padding: 11px;
        }
    </style>
</head>

<body>
<div>
@if(session()->has('admin'))
    <p class='a_left'>Hi {{ session('admin')->username }}, Welcome</p>
@endif
    <p class='a_right'>Menu :
        <a href="/createPost">Create New Post</a> |
        <a href="/viewPosts">View Posts</a> |
        <a href="/addUser">Add New User</a> |
        <a href="/adminLogout">Log Out</a>
    </p>
</div>

<br><br><br><br>

<br><br>
<center><font size="5" face="arial"><b>USERS DATA</b></font></center>

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
