
<!-- HTML CODE STARTS HERE -->
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL |  Member's Area | Arijit Banerjee</title>
</head>
<body>
<center>
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
        #width:33.3333%;
        text-align:right;
    }
</style>

<div id='menu'>
    <p class='a_left'>Hi <?php echo  session('admin')->username  ?>, Welcome</p>
    <p class='a_right'>Menu : <a href='/admin/dashboard'>Dashboard</a> | <a href='/createPost'>Create New Post</a> | <a href='/adminLogout'>Log Out</a> | <a href='/admin/dashboard'>Admin Dashboard</a></p>
</div>
<br><br><br><br>

<style>
table#t1 {
   border-collapse: collapse;
}
th, td {
    padding: 8px;
}
</style>

<center><font size="5" face="arial"><b>EDIT POST</b></font></center>
<br><font color='red'><b>[ PLEASE USE DOUBLE QUOTES ( " ) ONLY! DO NOT USE SINGLE QUOTES ( ' )! ]</b></font><br><br>
<form method="POST" action="/updatePost">
@csrf
	<table border="1" align="center" id="t1">
		<tr>
			<td>
			EDIT : <br><br>
			POST Number : <?php echo $post->id; ?>
			<br><br>
			First Posted On : <?php echo $post->date_time; ?>
			<br><br>
			Posted By : <?php echo $post->posted_by; ?>
			<br><br>
			Subject : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type="text" name="subject" class="textInput" style="width:500px;font-size:10pt;" value="<?php echo $post->subject; ?>" required>
			<br><br>
			Post Content : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<textarea name="content" rows="20" cols="69" required><?php echo $post->subject; ?></textarea>
			<!--<input type="text" name="content" class="textInput" style="height:300px;width:500px;font-size:12pt;" required>-->
			<br><br>
			<input type="hidden" name="id" value=<?php echo $post->id; ?>>
			<p align="right"><input type="submit" name="post_edit_submit_btn" value=" UPDATE "></p></td>
		</tr>
	</table>
</form>
</font>
</body>
</html>
