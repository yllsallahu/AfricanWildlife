<?php
require_once('../CRUD/Modeli.php');
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $Modeli = new Modeli();
    $Modeli->setNrleternjoftimit($_POST['nrleternjoftimit']);
    $kontrollo = $Modeli->kontrollo();


    if ($kontrollo == true) {
        $Modeli->setPasswordi($_POST['passwordi']);
        $kontrolloLlogarin = $Modeli->kontrolloLlogarin();

        if ($kontrolloLlogarin == true) {
            $_SESSION['aksesi'] = $kontrolloLlogarin['aksesi'];
            $_SESSION['id'] = $kontrolloLlogarin['id'];
            $_SESSION['emri'] = $kontrolloLlogarin['emri'];
            $_SESSION['mbiemri'] = $kontrolloLlogarin['mbiemri'];
            echo "<script>document.location='../faqet/index.php'</script>";
        } else {
            $_SESSION['PasswordGabim'] = true;
            echo "<script>
            document.location='../faqet/login.php';
            </script>";
        }
    } else {
        $_SESSION['nrleternjoftimitGabim'] = true;
        echo "<script>
        document.location='../faqet/login.php';
        </script>";
    }
}
?>