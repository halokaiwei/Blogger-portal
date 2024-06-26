<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

if (session()->has('admin')) {
    $user = session('admin')->username;
}
else if (session()->has('user')) {
    $user = session('user')->name;
}

$highestPostNumber = Post::max('id');
$newPostNumber = $highestPostNumber + 1;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create New Post</title>
	<link href="css/createpoststyles.css" rel="stylesheet">
</head>
<body>
<header id='menu'>
    @if(session()->has('user'))
        <p class='a_left'>Hi {{ session('user')->name }}, Welcome</p>
    @elseif(session()->has('admin'))
        <p class='a_left'>Hi {{ session('admin')->username }}, Welcome</p>
	@else
		<p class='a_left'>You're not logged in!</p>
    @endif 
    <nav>
        <p align='right'></p>
        <p class='a_right'>
            Menu: 
            @if(session()->has('admin'))
                <a href='/admin/dashboard'>Dashboard</a> | 
                <a href='/createPost'>Create New Post</a> | 
                <a href='/adminLogout'>Log Out</a>
            @elseif(session()->has('user'))
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
<center><font size="5" face="arial"><h2>Create New Post</h2></font>
<br>
<form method="POST" action="/createPost">
@csrf
	<table border="1" align="center" id="t1">
		<tr>
			<td>Post Number <?php echo $newPostNumber; ?>
			<br><br>
			Subject : 
			<input type="text" name="subject" class="textInput" style="width:500px;font-size:10pt;" pattern=".{3,}" required  title="3 characters minimum">
			<br><br>
			Post Content : <br>
			<textarea name="content" rows="20" cols="69" minlength="5"></textarea>
			<br><br>
			<p align="right">
            <input type="submit" name="post_submit_btn" value=" Post "></p></td>
		</tr>
	</table>


</form>
</font>
</body>
</html>

