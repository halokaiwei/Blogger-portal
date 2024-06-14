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
	<title>Create New Post |  Member's Area | Arijit Banerjee</title>

</head>
<body>

<font face="verdana,arial">

<style type='text/css'>
	.a_left {
	  float: left;
	  #width:33.33333%;
	  text-align:left;
	}
	.a_center {
	  float: center;
	  #width:33.33333%;
	  text-align:center;
	}
	.a_right {
	 float: right;
	 #width:33.33333%;
	 text-align:right;
    }
</style>

<div id='menu'>
        <?php 
        if (session()->has('admin')) { 
                echo "<p class='a_right'>Menu : <a href='/admin/dashboard'>Dashboard</a> | <a href='/createPost'>Create New Post</a> | <a href='/adminLogout'>Log Out</a>";
        }
        else if (session()->has('user')){
            echo "<p class='a_right'>Menu : <a href='/home'>Home</a> | <a href='/profile'>My Profile</a> | <a href='/createPost'>Create New Post</a> | <a href='/userLogout'>Log Out</a></p>";
        }
        ?>
        </div>
        <br><br><br><br>

<style>
    
table#t1 {
   border-collapse: collapse;
}
th, td {
    padding: 11px;
}
</style>

<center><font size="5" face="arial"><b>CREATE NEW POST</b></font>
<br><br><font color='red'><b>[ PLEASE USE DOUBLE QUOTES ( " ) ONLY! DO NOT USE SINGLE QUOTES ( ' )! ]</b></font></center>
<br>
<form method="POST" action="/createPost">
@csrf
	<table border="1" align="center" id="t1">
		<tr>
			<td>Post Number <?php echo $newPostNumber; ?>
			<br><br>
			Subject : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type="text" name="subject" class="textInput" style="width:500px;font-size:10pt;" pattern=".{3,}" required  title="3 characters minimum">
			<br><br>
			Post Content : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<textarea name="content" rows="20" cols="69" minlength="5"></textarea>
			<!--<input type="text" name="content" class="textInput" style="height:300px;width:500px;font-size:12pt;" required>-->
			<br><br>
			<p align="right">
            <input type="submit" name="post_submit_btn" value=" Post "></p></td>
		</tr>
	</table>


</form>
</font>
</body>
</html>

