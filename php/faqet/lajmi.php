<?php
include_once('../CRUD/NewsCRUD.php');

$lajmi = new NewsCRUD();
if (isset($_GET['lajmiID'])) {
    $lajmi->setLajmiID($_GET['lajmiID']);

    $teDhenatELajmit = $lajmi->shfaqLajminSipasID();

    $_SESSION['lajmiID'] = $teDhenatELajmit['lajmiID'];
    $_SESSION['titulli'] = $teDhenatELajmit['titulli'];
    $_SESSION['contentfoto'] = $teDhenatELajmit['contentfoto'];
    $_SESSION['content'] = $teDhenatELajmit['content'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/news.css">
    <title>Lajmi</title>
</head>

<body>
    <div class="containerOrder">
        <div>
            <?php
            echo ' <img src="../../img/lajmet/content/' . $_SESSION['contentfoto'] . '">
            <p>' . $_SESSION['titulli'] . '</p>
            <p>' . $_SESSION['content'] . '</p>';
            
            

            ?> 
        </div>
          
        </div>
    </div>
</body>


</html>