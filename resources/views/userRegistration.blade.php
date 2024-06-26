<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="css/authstyles.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style> 

    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <font size="6">
               <b>Member Registration</b>
                <br>
            </font>
            <b>
            <font size="4">
                <br>
                <a href="/viewPosts"> View Posts Without Login</a> 
            </font>
            </b>
            <br><br>
            <form class="login-form" method="POST" action="/userRegister"> 
                @csrf
            
                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus class="form-control" />
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required class="form-control" />
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <input type="password" name="password" placeholder="Password" required class="form-control" />
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="form-control" />
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <button type="submit" name="register_btn" class="btn btn-lg btn-primary btn-block">Create Account</button>
                <p class="message">Already registered? <a href="/userLogin">Log In</a></p>
            </form>
        </div>
    </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
