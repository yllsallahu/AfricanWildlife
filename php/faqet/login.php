<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../../css/login.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body class="login-body">
    <section class="login">
        <div class="login-box">
            <div class="login-box-inside">
                <h2>Log In</h2>
                <form name="LoginForm" onsubmit="validimiLogIn();" action='../funksione/loginUser.php' method="POST">
      <?php
      if (isset($_SESSION['PasswordGabim'])) {
        echo '
                  <script>alert("Passwordi eshte gabim!");</script>
            ';
      }
      if (isset($_SESSION['nrleternjoftimitGabim'])) {
        echo '
        <script>alert("Passwordi eshte gabim!");</script>
            ';
      }
      ?>
      <input type="text" name="nrleternjoftimit" class="field" placeholder="Your Id">
      <input type="password" name="passwordi" class="field" placeholder="Your Password">
      <div class="reg">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <input class="button" onclick="validimiLogIn();" type="submit" name="login">
      </div>
      
                
                
            </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
unset($_SESSION['nrleternjoftimitGabim']);
unset($_SESSION['PasswordGabim']);
?>