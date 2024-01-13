<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <!-- Add your CSS file or inline styles here -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 24px;
    }

    .logout-button {
      margin-top: 20px;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <header>Welcome, <?php echo $_SESSION['email']; ?></header>
  <div class="logout-button">
    <button class="button"><a href="logout.php">Logout</a></button>
  </div>

  <?php 
  if ($_SESSION['roli'] == "admin") {
      echo '<div class="dashboard-button"><button class="button"><a href="dashboard.php">Dashboard</a></button></div>';
  }
  ?>
</body>
</html>
