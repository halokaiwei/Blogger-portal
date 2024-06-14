<!-- resources/views/addUser.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h1>Add New User</h1>
    <form method="POST" action="/addUser">
        @csrf
        <label for="user_name">Name:</label><br>
        <input type="text" id="user_name" name="user_name" required><br>
        <label for="user_email">Email:</label><br>
        <input type="email" id="user_email" name="user_email" required><br>
        <label for="user_pass">Password:</label><br>
        <input type="password" id="user_pass" name="user_pass" required><br><br>
        <input type="submit" name="submit_btn" value="Submit">
    </form>
</body>
</html>
