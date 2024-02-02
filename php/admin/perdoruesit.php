<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/Modeli.php');

$Modeli = new Modeli();

// Handle Update Request
if (isset($_GET['updateId'])) {
    // Update operation
    $id = $_GET['updateId'];
    $emri = $_GET['emri'];
    $mbiemri = $_GET['mbiemri'];
    $aksesi = $_GET['aksesi'];

    if ($Modeli->updateUser($id, $emri, $mbiemri, $aksesi)) {
        $_SESSION['aksesiUPerditesua'] = true;
    } else {
        $_SESSION['error'] = "Unable to update user.";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle Delete Request
if (isset($_GET['deleteUserID'])) {
    if ($Modeli->fshijPerdoruesin($_GET['deleteUserID'])) {
        $_SESSION['userDeleted'] = true;
    } else {
        $_SESSION['error'] = "Unable to delete user.";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdoruesit</title>
</head>
<body>
    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['aksesiUPerditesua'])) {
            echo '<div class="mesazhiSuksesStyle"><p>Llogaria u ndryshua!</p></div>';
            unset($_SESSION['aksesiUPerditesua']);
        }
        if (isset($_SESSION['userDeleted'])) {
            echo '<div class="mesazhiSuksesStyle"><p>Përdoruesi u fshi me sukses!</p></div>';
            unset($_SESSION['userDeleted']);
        }
        if (isset($_SESSION['error'])) {
            echo '<div class="mesazhiErrorStyle"><p>' . $_SESSION['error'] . '</p></div>';
            unset($_SESSION['error']);
        }
        ?>
        <h1 class="adminPageH1">Lista e Perdoruesve</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Aksesi</th>
                <th>Funksione</th>
            </tr>
            <?php
            $perdoruesit = $Modeli->shfaqTeGjithePerdoruesit();
            foreach ($perdoruesit as $perdoruesi) {
                echo "<tr>
                    <td>{$perdoruesi['id']}</td>
                    <td><input type='text' id='emri_{$perdoruesi['id']}' value='{$perdoruesi['emri']}'></td>
                    <td><input type='text' id='mbiemri_{$perdoruesi['id']}' value='{$perdoruesi['mbiemri']}'></td>
                    <td><input type='number' id='aksesi_{$perdoruesi['id']}' min='0' max='2' value='{$perdoruesi['aksesi']}'></td>
                    <td>
                        <button onclick=\"ndryshoTeDhenat('{$perdoruesi['id']}');\">Edito</button>
                        <button onclick=\"fshijPerdoruesin('{$perdoruesi['id']}');\">Fshij</button>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <a href="dashboard.php">Go Back to Dashboard</a>

    <script>
        function ndryshoTeDhenat(idUser) {
            var emri = encodeURIComponent(document.getElementById("emri_" + idUser).value);
            var mbiemri = encodeURIComponent(document.getElementById("mbiemri_" + idUser).value);
            var aksesi = encodeURIComponent(document.getElementById("aksesi_" + idUser).value);
            if (emri === "" || mbiemri === "") {
                alert("Emri dhe mbiemri nuk duhet të jenë të zbrazët!");
            } else {
                window.location.href = `?updateId=${idUser}&emri=${emri}&mbiemri=${mbiemri}&aksesi=${aksesi}`;
            }
        }

        function fshijPerdoruesin(idUser) {
            var confirmation = confirm("A jeni i sigurt që dëshironi të fshini këtë përdorues?");
            if (confirmation) {
                window.location.href = `?deleteUserID=${idUser}`;
            }
        }
    </script>
</body>
</html>
