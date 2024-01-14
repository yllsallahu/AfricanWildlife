<?php  session_start(); ?>
<?php
  if(isset($_POST['loginbtn'])){
    if(empty($_POST['username']) || empty($_POST['psw'])){
      echo "Please fill the required fields!";
    }else{
        //validate
        $username = $_POST['username'];
        $password = $_POST['password'];

        include_once 'users.php';
        $i=0;
        
        foreach($users as $user){
          if($user['username'] == $username && $user['psw'] == $password){
            session_start();
      
            $_SESSION['username'] = $username;
            $_SESSION['psw'] = $password;
            $_SESSION['role'] = $user['role'];
            $_SESSION['loginTime'] = date("H:i:s");
            header("location:home.php");
            exit();
          }else{
            $i++;
            if($i == sizeof($users)) {
              echo "Incorrect Username or Password!";
              exit();
            }
          }
        }
    }
  }
?>

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
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="field email">
          <div class="input-area">
          <input type="text" placeholder="Username" name="username">
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
        <input type="submit" name="submit" value="Login">
      </form>
      <div class="sign-txt">Not a member? <a href="#">Signup now</a></div>
    </div>
  </div>
   
  <script src="login/script.js"></script>
</body>
</html>
