<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   
</head>

<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif; 
        }

        .dashboardSidebar {
            text-align: center; 
            background-color: #fff; 
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            border-radius: 5px;
        }

        .dashboardSidebar div {
            margin-bottom: 10px;
        }

        .dashboardSidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333; 
            border: 1px solid #ddd; 
            border-radius: 5px;
            transition: background-color 0.3s; 
        }

        .dashboardSidebar a:hover {
            background-color: #ddd; 
        }

        .goBack {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
<body>
    <a href="../faqet/index.php" class="goBack">Go Back</a>
<div class="dashboardSidebar">
   <div> <a href="shtoKategorin.php">Shto Kategorin</a></div>
   <div> <a href="shtoLajmin.php">Shto Lajmin</a></div>
   <div> <a href="perdoruesit.php">Perdoruesit</a></div>
   <div> <a href="lajmet.php">Lajmet</a></div>
</div>
</body>
</html>
