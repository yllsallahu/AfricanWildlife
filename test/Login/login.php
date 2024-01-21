<?php
include('users.php');
include('validation.php');
include('login_connection.php');

if (isset($_POST['submit'])) {
    $Email = $_POST['email'];
    $Password = $_POST['psw'];

    $sql = "SELECT * FROM users WHERE Email ='$Email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row) {
            // Check if the key "password" exists in the $row array
            if (array_key_exists("password", $row)) {
                if (password_verify($Password, $row["password"])) {
                    session_start();
                    $_SESSION['user_id'] = $row['ID'];
                    $_SESSION['user_email'] = $row['Email'];
                    header("Location: home.php");
                    exit; // Ensure that the script stops execution after redirection
                } else {
                    echo '<script>
                    alert("Invalid password !!");
                    </script>';
                }
            } else {
                echo '<script>
                alert("Invalid array key !!");
                </script>';
            }
        } else {
            echo '<script>
            alert("Invalid username or password !!");
            </script>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection after use
    mysqli_close($conn);
}
?>

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
        <form action="login.php" method="post">
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