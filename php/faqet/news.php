<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/NewsCRUD.php');
$NewsCRUD = new NewsCRUD();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/allnews.css">
  <title>Lajmet</title>
</head>

<body>
  <div class="container-lajmi">

    <?php
    
      $lajmet = $NewsCRUD->shfaqiLajmet();
      foreach ($lajmet as $lajmi) {
        echo '<div class="lajmi-each">
                    <div><img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" /></div>
                    <div class="lajmi-text"><h1>' . $lajmi['titulli'] . '</h1></div>
                    <div class="lajmi-text"><p>' . $lajmi['pershkrimi'] . '</p></div>
                    <a href="./lajmi.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Lexo më shumë </button></a>
                 </div>';
      }
    ?>
  </div>

</body>

</html>