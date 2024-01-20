<?php include('users.php'); ?>
<?php include('validation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;

        }

        .login {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 30%;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: flex;
            align-self: start;
            margin: 10px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            width: 60%;
            box-sizing: border-box;
            border-radius: 10px;
        }

        input[type="submit"] {
            background-color: #e97200;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .lgo{
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }

     
    </style>
<body>
    <div class="login">
        <p class="lgo">Login</p>
        <form action="" method="post">
            <label for="">Email :</label>
            <input type="email" name="email"> <br>
            <label for="">Password :</label>
            <input type="password" name="psw"><br>
            <input type="submit" name="submit" value="SUBMIT">
        </form>
        <br><br>
    </div>
</body>
</html>