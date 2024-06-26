<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link href="css/authstyles.css" rel="stylesheet">
	<style>
		body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form {
            background: #aaaaaa;
            max-width: 360px;
            padding: 20px;
            text-align: center;
            border-radius: 10%;
        }

        .form input[type="text"],
        .form input[type="password"] {
            width: 85%;
			margin-bottom: 15px;
			padding: 10px 0;
            text-indent:10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        .form input[type="text"]:focus,
        .form input[type="password"]:focus {
            outline: none;
            border-color: black;
        }

        .form button {
            width: 100%;
            margin-top: 10px;
			margin-bottom: 10px;
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .form button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 15px;
            font-size: 14px;
        }

        .message a {
            color: blue;
            text-decoration: none;
            transition: color 0.3s;
        }

        .message a:hover {
            color: #1e88e5;
        }

	</style>
</head>
<body>
<div class="login-page">
    <div class="form">
			<h2>Admin Login</h2>
			<form action="/admin/login" class="login-form" method="post" >
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
				<input type="text" name="username" class="textInput" placeholder="Enter your Admin Username" required>
				<input type="password" name="password" class="textInput" placeholder="Enter your Admin Password" required></td>
                <button type="submit">Log In</button>
              </form>
			</div>
	</div>
	@if(session()->has('error'))
	<div style="background-color: red; color: white; padding: 10px;">
		{{ session('error') }}
	</div>
	@endif
</body>
</html>