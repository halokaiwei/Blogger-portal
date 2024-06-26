  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="css/authstyles.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
      <div class="login-page">
          <div class="form">
            @if(isset($errorMessage))
        <div>
            <span style = "color:red">{{$errorMessage}}</span>
        </div>
            @endif
              <font size="6"><b>User Login<br></font><font size="4"><br><a href="/viewPosts">View Posts Without Login</a></b></font><br><br>
              <form action="/userLogIn" class="login-form" method="post" >
                  @csrf
                  <input type="email" name="email" placeholder="Email" required />
                  <input type="password" name="password" placeholder="Password" required />
                  <button type="submit">Log In</button>
                  <p class="message">Not registered? <a href="/userRegistration">Create an account</a></p>
                  <p class="message">Forgot Password ? <a href="#">Click Here to sReset your Password</a></p>
              </form>
          </div>
      </div>
  </body>
  </html>
