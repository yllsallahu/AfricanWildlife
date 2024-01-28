<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');

$kategoria = new kategoriaCRUD();
$NewsCRUD = new NewsCRUD();

if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['shtoLajmin'])) {

          $NewsCRUD->setTitulli($_POST['lajmiName']);
          $NewsCRUD->setPershkrimi($_POST['pershkrimi']);
          $NewsCRUD->setContent($_POST['content']);
          $NewsCRUD->setKategorialajmit($_POST['kategoria']);
          $_SESSION['fotolajmit'] = $_FILES['lajmiPhoto'];
          $_SESSION['contentfoto'] = $_FILES['contentPhoto'];

          $NewsCRUD->InsertLajmin();
          echo $NewsCRUD->getTitulli();
          echo $NewsCRUD->getPershkrimi();
          echo $NewsCRUD->getContent();
          echo $NewsCRUD->getFotolajmit();
          echo $NewsCRUD->getContentfoto();
          
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Lajmeve</title>
  <style>

.goBack {
    color: white;
    padding: 15px;
    background-color: rgb(184,29,29);
    text-decoration: none;
    border-radius: 10px;
    transition: 300ms;
    margin: 10px;
}
.goBack:hover {
  background-color: rgba(184,29,29, 0.7);
}
    .formLajmi {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-title {
      text-align: center;
      color: rgb(184,29,29);
      font-weight: 100;
    } 
    .form-input {
      padding: 15px;
      border-radius: 10px;
      box-shadow: 3px 3px 5px gray;
      border:none;
      margin:20px;
      outline:none;
      transition: 300ms;
      background-color: rgb(250,250,250);
    }
    .form-input:focus {
      border: 1px solid rgb(184,29,29);
      box-shadow: none;
      background-color: white;
    }
    .form-lajmi-each .button {
      color: white;
      background-color: rgb(184,29,29);
      box-shadow: none;
      cursor: pointer;
      border:none;
      border-radius: 10px;
      padding: 15px;
      margin: 10px;
      transition: 300ms;
    }
    .form-lajmi-each .button:hover {
      background-color: rgba(184,29,29,0.7)
    }
.form-lajmi-each {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.form-input-file {
  margin: 20px;
}

  </style>
</head>

<body>
  <div class="formLajmi">
    <form name="shtoLajmin" onsubmit="return validimiShtimiLajmit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['LajmiUinsertua'])) {
        echo '
                  <script>alert("Lajmi u shtua me sukses");</script>
            '; 
      }
      if (isset($_SESSION['madhesiaGabim'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Madhesia e fotos eshte shume e madhe!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      if (isset($_SESSION['problemNeBartje'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Ndodhi nje problem ne bartjen e fotov!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      if (isset($_SESSION['fileNukSuportohet'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Ky file nuk supportohet!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
          ';
      }
      ?>
      <h1 class="form-title">Vendosja e Lajmit</h1>
      <div class="form-lajmi-each">
      <input class="form-input" name="lajmiName" type="text" placeholder="Titulli i Lajmit" required>
      <input class="form-input" name="pershkrimi" type="text" placeholder="Pershkrimi" required>
      <input class="form-input-file" name="lajmiPhoto" accept="image/*" type="file" value="Foto e Lajmit" required>
      <input class="form-input-file" name="contentPhoto" accept="image/*" type="file" value="Foto e Contentit" required>
      <input class="form-input" name="content" type="text" placeholder="content" required>
      <?php $kategoria->shfaqKategorinSelektim(); ?> 
      <input class="button" type="submit" value="Shtoni Lajmin" name='shtoLajmin'>
      <a href="dashboard.php" class="goBack">Go Back to Dashboard</a class="form-input">
    </div>
    </form>
  </div>
  <?php include('../funksione/Skriptat.php') ?>
</body>
</html>
<?php
unset($_SESSION['LajmiUinsertua']);
unset($_SESSION['madhesiaGabim']);
unset($_SESSION['problemNeBartje']);
unset($_SESSION['fileNukSuportohet']);
?>