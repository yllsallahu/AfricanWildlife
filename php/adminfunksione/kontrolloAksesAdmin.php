<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['aksesi'] != 2) {
    $_SESSION['skeAksesAdmin'] = true;
}


?>