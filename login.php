<?php include('users.php'); ?>
<?php include('validation.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <header>Login Form</header>
      <form action="validation.php" method="post">
        <div class="field email">
          <div class="input-area">
            <input type="text" placeholder="Email Address" name="email">
            <i class="icon fas fa-envelope"></i>
            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Email can't be blank</div>
        </div>
        <div class="field password">
          <div class="input-area">
            <input type="password" placeholder="Password" name="psw">
            <i class="icon fas fa-lock"></i>
            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Password can't be blank</div>
        </div>
        <div class="pass-txt"><a href="#">Forgot password?</a></div>
        <input type="submit" name="submit" value="Submit">
      </form>
      <div class="sign-txt">Not a member? <a href="#">Signup now</a></div>
    </div>
  </div>
   
  <script src="login/script.js"></script>
</body>
</html>
