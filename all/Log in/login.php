

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
<?php
$user1 = [
  "name" => "Yll",
  "surname" => "Sallahu",
  "email" => "bg@ubt-uni.net",
  "username" => "yllsallahu",
  "password" => "Learti123",
  "role" => "admin"
];

$user2 = [
  "name" => "Leart",
  "surname" => "Musa",
  "email" => "bg@ubt-uni.net",
  "username" => "leartmusa",
  "password" => "Ylli123",
  "role" => "user"
];

if (isset($_POST["submit"])) {
  // echo "Form submitted"; // Debug statement
  echo "<script>alert('Form submitted');</script>";

  $userName = $_POST['username'];
  $password = $_POST['psw'];

  echo "Username: $userName, Password: $password"; // Debug statement

  // Check user1 credentials
  if ($userName == $user1['username'] && $password == $user1['password']) {
      setcookie('login1', $userName, time() + 3600); // Use a unique cookie name for user1
      // header('Location: home.php');
      // exit();
  }

  // Check user2 credentials
  if ($userName == $user2['username'] && $password == $user2['password']) {
      setcookie('login2', $userName, time() + 3600); // Use a unique cookie name for user2
      // header('Location: home.php');
      // exit();
  }

  // If the credentials are not valid for any user
  echo "Nuk jeni kyqyr";
}

?>
  <div class="container">
    <div class="wrapper">
      <header>Login Form</header>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
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