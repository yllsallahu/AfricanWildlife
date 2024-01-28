<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
$kategoria = new kategoriaCRUD();
$NewsCRUD = new NewsCRUD();

$NewsCRUD->setLajmiID($_GET['lajmiID']);
$lajmi = $NewsCRUD->shfaqLajminSipasID();
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['editoLajmin'])) {
  $NewsCRUD->setLajmiID($_GET['lajmiID']);
  $NewsCRUD->setTitulli($_POST['titulli']);
  $NewsCRUD->setPershkrimi($_POST['pershkrimi']);
  $NewsCRUD->setKategorialajmit($_POST['kategoria']);
  $NewsCRUD->setContent($_POST['content']);
  
  if ($_FILES['lajmiPhoto']['name'] == '' || $_FILES['contentPhoto']['name'] == '' ) {
    $NewsCRUD->editoLajmin(false);
  } else{
    $_SESSION['contentfoto'] = $_FILES['contentPhoto'];
    $_SESSION['fotolajmit'] = $_FILES['lajmiPhoto'];
    $NewsCRUD->editoLajmin(true);
  }
}
if (isset($_POST['anulo'])) {
  echo '<script>document.location="lajmet.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editimi i Lajmit</title>
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
  <?php
  echo '<div class="containerDashboard">';
  echo '</div>';
  ?>
  <div class="formLajmi">
    <form name="editoLajmin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
      <h1 class="form-title">Editimi i Lajmit</h1>
      <div class="form-lajmi-each">
      <input class="form-input" name="titulli" type="text" placeholder="Titulli i lajmit"value='<?php echo $lajmi['titulli'] ?>' required>
      <input class="form-input" name="pershkrimi" type="text" placeholder="Pershkrimi i lajmit"value='<?php echo $lajmi['pershkrimi'] ?>' required>
      <?php
      $kategorit = $kategoria->shfaqKategorin();

      echo '<select name="kategoria" class="form-input">
              <option value="lajme">Zgjedhni Kategorin</option>
          ';
      foreach ($kategorit as $kategoria) {
        echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
      }
      echo '<option selected hidden value="' . $lajmi['kategorialajmit'] . '">' . $lajmi['kategorialajmit'] . '</option> </select>';
      ?>
       <input class="form-input" name="content" type="text" placeholder="Content" value='<?php echo $lajmi['content'] ?>' required>
      <input class="form-input-file" name="lajmiPhoto" accept="image/*" type="file" placeholder="Fotolajmit">
      <input class="form-input-file" name="contentPhoto" accept="image/*" type="file" placeholder="ContentPhoto">
      <input class="button" type="submit" value="Editoni Lajmin" name='editoLajmin'>
      <input class="button" type="submit" value="Anulo" name='anulo'>
      <a href="dashboard.php" class="goBack">Go Back to Dashboard</a class="form-input">
    </div>
    </form>
  </div>
</body>

</html>