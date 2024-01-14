<?php
  session_start();
  $hide="";
  if(!isset($_SESSION['username']))
    header("location:login.php");
  else{
    if($_SESSION['role'] == "admin")
      $hide = "";
    else
      $hide = "hide";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            width:100vw;
            height:100vh;

        }
        header{
            width:100%;
            height:10%;
            display:flex;
            justify-content:space-between;
            background:indigo;
            align-items:center;
        }
        header>a{
            color:white;
            font-size:40px
        }
        header h1{
          color: white;
          margin-left: 10px;
        }
        header ul{
            display:flex;
            justify-content:space-evenly;
            list-style:none;
            width:50%;
            height:100%;
            align-items:center;
            font-size:24px;
        }
        header ul li a{
            color:white;
            text-decoration:none;
        }
        .hide{
            display:none;
        }
    </style>
</head>
<body>
    <header>
      <h1>HOME</h1>
      <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="dashboard.php" class="<?php echo $hide?>">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
      </ul>
    </header>

    <h3><?php echo "Username: ".$_SESSION['username']."<br>" ?></h3>
    <h3><?php echo "Login Time: ".$_SESSION['loginTime']."<br>"?></h3>
</body>
</html>

<?php
  }
?>