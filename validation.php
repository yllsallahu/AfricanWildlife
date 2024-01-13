<?php 
if (isset($_POST['submit'])) {
   
    for ($i = 0; $i < sizeof($users); $i++) {
      
        if ($_POST['email'] == $users[$i][0] && $_POST['psw'] == $users[$i][1]) {
            session_start();
            $_SESSION['email'] = $users[$i][0];
            $_SESSION['password'] = $users[$i][1];
            $_SESSION['roli'] = $users[$i][2];

            header("Location: home.php");
            exit(); 
        }
    }
}
?>