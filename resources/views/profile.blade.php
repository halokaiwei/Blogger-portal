<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Assuming the user is authenticated
// You can adjust this logic based on your authentication system
if (!Auth::check()) {
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
        float:right;
        width:33.3333%;
        text-align:right;
    }
</style>

<div id='menu'>
	<!--<p class='a_left'>Hi <?php echo $name; ?>, Welcome<p align='right'></p>-->
	<p class='a_right'>Menu : <a href='/home'>Home</a> | <a href='/profile'>My Profile</a> | <a href="/changePassword">Change Password</a> | <a href='/userLogout'>Log Out</a></p>
</div>
<br><br><br><br>

<style>
table#t1 {
   border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>
<center>
<br><br><h2>MY PROFILE</h2><br><br>
</center>
<table border="1" align="center" id="t1">

<tr>
	<th>
		NAME
	</th>
	<th>
		EMAIL
	</th>
	<th>
		PASSWORD
	</th>
	<th>
		IP Address
	</th>
</tr>

<?php

// PRINTING DATA OUTPUT IN TABLE


	echo "<tr>";

	echo "<td><center> $name </center></td>";
	echo "<td><center> $email </center></td>";
	echo "<td><center> $pass </center></td>";
	echo "<td><center> $ip </center></td>";

	echo "<tr>";

?>

</table>
</body>
</html>
