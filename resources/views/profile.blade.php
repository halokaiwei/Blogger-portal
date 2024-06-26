<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile</title>
	<link href="css/profilestyles.css" rel="stylesheet">
</head>
<body>
<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

if (!Auth::check()) {
    return view('/userLogin');
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
	<title>User Profile</title>
</head>
<body>
@include('includes.header')

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

</body>
</html>