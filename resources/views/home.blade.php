
<!-- PHP CODE STARTS HERE -->
<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Assuming the user is authenticated
// You can adjust this logic based on your authentication system
if (!(session()->has('user'))) {
    // Redirect the user to login page if not logged in
    return view('/userLogin');
}

// Get user data
$user = Auth::user();
$name = $user->name;
$email = $user->email;
$pass = $user->password; // You might want to avoid showing the password directly
$ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member's Area | Arijit Banerjee</title>
    <style>
    font[Attributes Style] {
        font-family: verdana, arial;
    }
</style>
</head>
<body>
<font face="verdana,arial">

<style type='text/css'>
	.a_left {
        float: left;
        width:33.33333%;
        text-align:left;
	}
	.a_right {
        float:right;
        width:66.6666%;
        text-align:right;
    }
</style>

<div id='menu'>
        @if(session()->has('user'))
        <p class='a_left'>Hi {{ session('user')->name }}, Welcome</p>
    @else
    <p class='a_left'>You are not logged in!</p>
    @endif 
    <p> 
    <p align='right'></p>
	<p class='a_right'>Menu : <a href='/profile'>My Profile</a> | <a href="/viewPosts">View Posts</a> | <a href="/createPost">Create New Post</a> | <a href='/userLogout'>Log Out</a></p>
</div>

<br><br><br><br><br><br>

<style>
table#t1 {
   border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>

<!--<center>-->
<table border="2" align="center" id="t1">
<th>
<h1>MENU</h1>
</th>
<tr>
<td>
<font size="5">
<ul>
	<li><a href="/viewPosts">View Posts</a> </li>
	<li><a href="/createPost">Create New Post</a> &nbsp;&nbsp;</li>
	<li><a href="/profile">My Profile</a> </li>
</ul>
<!--</center>-->
</font>
</td>
</tr>

</body>
</html>

<!-- HTML CODE ENDS HERE -->

