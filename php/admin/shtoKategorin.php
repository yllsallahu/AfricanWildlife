<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$katCRUD = new kategoriaCRUD();

if (isset($_POST['shtoKategorin'])) {
  $_SESSION['emriKategorise'] = $_POST['emriKategorise'];
  $_SESSION['pershkrimiKategorise'] = $_POST['pershkrimiKategorise'];
  $katCRUD->insertoKategorinLajmit ();

  $_SESSION['katUShtua'] = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Kategorive</title>
  
</head>

<body>
  <div class="forms">
    <form class="form-each" name="shtoKategorin" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua']) == true) {
        echo '
        <script>alert("Kategoria u shtua me sukses");</script>
        ';
      }
      ?>
      <h1 class="form-title">Kategoria e Lajmeve</h1>
      <input class="form-input" name="emriKategorise" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategorise" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shto Kategorin" name='shtoKategorin'>
    </form>

    <a href="dashboard.php" class="goBack">Go Back to Dashboard</a>
  </div>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>