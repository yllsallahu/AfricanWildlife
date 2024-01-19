<?php
include("signup.php");

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Check if username already exists
    $sql = "SELECT * FROM signup WHERE username ='$name'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    // Check if email already exists
    $sql = "SELECT * FROM signup WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if($count_user == 0 && $count_email == 0){
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        error_reporting(E_ALL);
ini_set('display_errors', 1);

        // Insert new user into the database
        $sql = "INSERT INTO signup (username, surname, email, password) VALUES ('$name', '$surname', '$email', '$hash')";
        $result = mysqli_query($conn, $sql);

        if($result){
            // Close the database connection
            mysqli_close($conn);
            
            // Redirect to welcome.php
            header("Location: welcome.php");
            exit();
        }
    } else {
        if($count_user > 0){
            echo '<script>
                alert("Username already exists");
                window.location.href="signup.php";
            </script>';
            exit();
        }

        if($count_email > 0){
            echo '<script>
                alert("Email already exists");
                window.location.href="signup.php";
            </script>';
            exit();
        }
    }
}

// Close the database connection if not already closed
if ($conn) {
    mysqli_close($conn);
}

// Redirect to signup.php in case of any issues
header("Location: signup.php");
exit();
?>
