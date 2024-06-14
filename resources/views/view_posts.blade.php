<!DOCTYPE html>
<html>
<head>
    <title>View Posts | Member's Area | Arijit Banerjee</title>
    <style> 
    body {
        display: block;
        margin: 8px;
    }
    center {
        display: block;
        text-align: -webkit-center;
        unicode-bidi: isolate;
    }

    h2 {
        display: block;
        font-size: 1.5em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        unicode-bidi: isolate;
        text-align:center;
    }
    font[Attributes Style] {
        font-family: verdana, arial;
    }
    table[Attributes Style] {
        border-top-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-right-width: 1px;
        margin-inline-start: auto;
        margin-inline-end: auto;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        unicode-bidi: isolate;
        border-color: inherit;
    }


    
    </style>
</head>
<body>
<center>
<font face="verdana,arial">

<style type="text/css">
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
        else {
            echo "<p class='a_right'>Menu : <a href='/userLogin'>LogIn</a> | <a href='/userRegistration'>Registration</a>";

        }
        ?>
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
        <br>
        <h2>POSTS</h2>
        <br><br>
        <table border="1" align="center" id="t1">
            <tr>
                <th>Post Number</th>
                <th>Date and Time</th>
                <th>Subject</th>
                <th>Post</th>
                <th>Posted By</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td><center>{{ $post->id }}</center></td>
                    <td><center>{{ $post->date_time }}</center></td>
                    <td><center>{{ $post->subject }}</center></td>
                    <td>{{ $post->post }}</td>
                    <td><center>{{ $post->posted_by }}</center></td>
                    <?php if (session()->has('admin')): ?>
                        <td>
                            <a href="/editPost/{{ $post->id }}">Edit</a> | 
                            <a href="/deletePost/{{ $post->id }}">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            @endforeach
        </table>
        <br><br>
    </div>
    </center>
</body>
</html>

<!-- HTMLS CODE ENDS HERE -->
