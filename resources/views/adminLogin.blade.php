<!DOCTYPE html>
<html>
<head>
	<title>Admin LogIn | Members Area | Arijit Banerjee</title>

</head>
<body>

<center>
<div class="head">
	<h1>
	<font face="verdana">
	Member's Area | ADMIN PORTAL<br><font face="arial" size="4"></font>
	</font><br><br>
	</h1>
</div>
<!-- IF VISITOR TRIES TO GET OVER TO ANY FILE DIRECTLY -->

<form method="post" action="/admin/login"><b>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @csrf
	<table><br>
		<tr>
			<td>Admin Username : </td>
			<td><input type="text" name="username" class="textInput" placeholder="Enter your Admin Username" required></td>
		</tr>
		<tr>
			<td>Admin Password : </td>
			<td><input type="password" name="password" class="textInput" placeholder="Enter your Admin Password" required></td>
		</tr>
		<tr>
			<td></td>
			<td><br><input type="submit" name="login_btn" value="Log In"></td>
		</tr>
	</table>
	@if(session()->has('error'))
	<div style="background-color: red; color: white; padding: 10px;">
			{{ session('error') }}
		</div>
	@endif
<br><br>
<font color='red'><b>THIS IS ADMINISTRATORS PORTAL!<br>ANY UN-AUTHORISED LOGIN TRIALS MAY CAUSE<br>POLICE F.I.R. IF NEEDED!</b></center></font></a></td>
	</b>
</form><br>
<br>
<div class="head">
	<font face="verdana" size="2"><center><b>
	Copyrights 2019 &copy; Arijit Banerjee
	</b></center></font>
</div>

</body>
</html>


