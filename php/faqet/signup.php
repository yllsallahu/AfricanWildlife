<?php
if (!isset($_SESSION)) {
    session_start();
}

require('../CRUD/Modeli.php');

if (isset($_POST['submit'])) {
  $Modeli = new Modeli();

  $Modeli->setNrleternjoftimit($_POST['nrleternjoftimit']);

  $kontrollo = $Modeli->kontrollo();
  if ($kontrollo==true) {
    $_SESSION['nrleternjoftimitEkziston'] = true;
    session_destroy();
  } else {
    $Modeli->setNrleternjoftimit($_POST['nrleternjoftimit']);
    $Modeli->setEmri($_POST['emri']);
    $Modeli->setMbiemri($_POST['mbiemri']);
    $Modeli->setNumri($_POST['numri']);
    $Modeli->setAdresa($_POST['adresa']);
    $Modeli->setPasswordi($_POST['passwordi']);

    $Modeli->insertoDhenat();
    session_destroy();
    
    
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../../css/signup.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>

<body class="signup-body">
    <section class="signup">
        <div class="signup-box">
            <div class="signup-box-inside">
            <form id="signupform" name="SignUpForm" action='' method="POST">
              <?php
            if (isset($_SESSION['regMeSukses'])) {
              echo '<script>alert("U regjistrua me sukses!");</script>';
      }
      if (isset($_SESSION['emailkziston'])) {
        echo '<script>alert("Email ekziston");</script>';
      }
      elseif(isset($_SESSION['nrleternjoftimitEkziston'])) {
        echo '<script>alert("Numri leternjoftimit ekziston");</script>';
      }
      ?>         
                
                <h2>Sign Up</h2>
                <input name="nrleternjoftimit" id="id" type="id" class="field" placeholder="Your ID">
                <input name="emri" id="emri" type="text" class="field" placeholder="First Name">
                <input name="mbiemri" id="mbiemri" type="text" class="field" placeholder="Last Name">
                <input name="numri" id="numri" type="number" class="field" placeholder="Your Number">
                <input name="adresa" id="adress" type="text" class="field" placeholder="Your Address">
                <input name="passwordi" id="passwordi" type="password"  class="field" placeholder="Password">
                
                
                
                <input type="submit" onclick="Valido()" name="submit"class="signup-button"value="Sign Up">
                <a href="login.php">Log In.</a>
                </form>
       
    </section>
    <script src="../../js/regex.js"></script>
</body>
</html>

<?php

unset($_SESSION['regMeSukses']);
unset($_SESSION['nrleternjoftimitEkziston']);
?>

