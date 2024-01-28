<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['aksesi'] == 0) {
    echo '<script>alert("Nuk ke akses ne kete meny!")</script>';
}


?>