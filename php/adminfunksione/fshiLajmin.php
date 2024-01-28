<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../adminFunksione/kontrolloAksesAdmin.php');
require_once('../CRUD/NewsCRUD.php');

if (isset($_SESSION['skeAksesAdmin']) == true) {
    echo '<script>document.location="../admin/index.php"</script>';
} else {
    $NewsCRUD = new NewsCRUD();

    $NewsCRUD->setLajmiID($_GET['lajmiID']);
    $NewsCRUD->fshijLajminSipasID();
}
?>