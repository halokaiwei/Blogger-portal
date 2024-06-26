<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Post</title>
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
		transition: color 0.3s ease;
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
		margin: 0 15px;
	}
	
	header .a_right a {
		color: blue;
		margin: 0 10px;
		transition: color 0.3s ease;
	}

	header .a_right a:hover     {
		text-decoration: underline;
	}

	h2 {
		color: #aaa;
		margin-top: 120px;
		text-align: center;
	}

	form {
		max-width: 800px;
		margin: 20px auto;
		padding: 20px;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	form table {
		width: 100%;
		border-collapse: collapse;
	}

	form table td {
		padding: 10px;
	}

	form table textarea {
		width: 80%;
		margin-top:10px;
		padding: 10px;
		font-size: 12pt;
		border-radius: 5px;
		border: 1px solid #ccc;
		resize: none;
	}

	form table .textInput {
		width: calc(100% - 20px);
		padding: 10px;
		font-size: 12pt;
		border-radius: 5px;
		border: 1px solid #ccc;
	}

	form table input[type="submit"] {
		background-color: #4CAF50;
		color: white;
		border: none;
		padding: 10px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
		border-radius: 5px;
		cursor: pointer;
	}

	form table input[type="submit"]:hover {
		background-color: #45a049;
	}

	center {
		margin-top: 20px;
	}

	</style>
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

<h2>Edit Post</h2>
<form method="POST" action="/updatePost">
@csrf
	<table border="1" align="center" id="t1">
		<tr>
			<td>
			POST Number : <?php echo $post->id; ?>
			<br><br>
			First Posted On : <?php echo $post->date_time; ?>
			<br><br>
			Posted By : <?php echo $post->posted_by; ?>
			<br><br>
			Subject : 
			<input type="text" name="subject" class="textInput" style="width:500px;font-size:10pt;" value="<?php echo $post->subject; ?>" required>
			<br><br>
			Post Content : <br>
			<textarea name="content" rows="20" cols="69" required><?php echo $post->subject; ?></textarea>
			<br><br>
			<input type="hidden" name="id" value=<?php echo $post->id; ?>>
			<p align="right"><input type="submit" name="post_edit_submit_btn" value=" UPDATE "></p></td>
		</tr>
	</table>
</form>
</font>
</body>
</html>