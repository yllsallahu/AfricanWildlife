<?php 
    session_start();
    echo "Pershendetje, ".$_SESSION['email'];
    echo "<button><a href='logout.php'>Logout</a></button>";

    if($_SESSION['roli']== "admin"){
    echo "<button><a href='=dashboard.php'>Dashboard</a></button>";
    }
?>