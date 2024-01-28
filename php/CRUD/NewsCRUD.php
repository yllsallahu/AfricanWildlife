<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}
Class NewsCRUD extends dbcon{
    private $lajmiID;
    private $titulli;
    private $pershkrimi;
    private $fotolajmit;
    private $contentfoto;
    private $content;
    private $kategorialajmit;
    private $datainsertimit;
    private $dbConn;

    public function __construct($lajmiID='',$titulli='',$pershkrimi='',$fotolajmit='',$contentfoto='',$content='',$kategorialajmit='',$datainsertimit='',$dbConn=''){
        $this->lajmiID=$lajmiID;
        $this->titulli=$titulli;
        $this->pershkrimi=$pershkrimi;
        $this->fotolajmit=$fotolajmit;
        $this->contentfoto=$contentfoto;
        $this->content=$content;
        $this->kategorialajmit=$kategorialajmit;
        $this->datainsertimit=$datainsertimit;
        $this->dbcon = $this->connDB();
        
    }

    public function getLajmiID(){
        return $this->lajmiId;
    }
    public function setLajmiID($lajmiID){
        $this->lajmiID=$lajmiID;
    }
    public function getTitulli() {
        return $this->titulli;
      }
    
      public function setTitulli($titulli) {
        $this->titulli = $titulli;
      }
    
      public function getPershkrimi() {
        return $this->pershkrimi;
      }
    
      public function setPershkrimi($pershkrimi) {
        $this->pershkrimi = $pershkrimi;
      }
    
      public function getFotolajmit() {
        return $this->fotolajmit;
      }
    
      public function setFotolajmit($fotolajmit) {
        $this->fotolajmit = $fotolajmit;
      }
    
      public function getContentfoto() {
        return $this->contentfoto;
      }
    
      public function setContentfoto($contentfoto) {
        $this->contentfoto = $contentfoto;
      }
    
      public function getContent() {
        return $this->content;
      }
    
      public function setContent($content) {
        $this->content = $content;
      }
      public function getKategorialajmit() {
        return $this->kategorialajmit;
      }
    
      public function setKategorialajmit($kategorialajmit) {
        $this->kategorialajmit = $kategorialajmit;
      }
      public function getDatainsertimit() {
        return $this->datainsertimit;
      }
    
      public function setDatainsertimit($datainsertimit) {
        $this->datainsertimit = $datainsertimit;
      }


      //Metoda per regjistrimin e lajmeve ne databaze
      public function InsertLajmin()
    {
        try {
            $this->barteFotonNeFolder();
            $this->barteFotonNeFolderContent();

            $sql = "INSERT INTO `lajmi`(`titulli`, `pershkrimi`, `fotolajmit`, `contentfoto`, `content`,`kategorialajmit`) VALUES (?,?,?,?,?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->titulli, $this->pershkrimi, $this->fotolajmit, $this->contentfoto, $this->content, $this->kategorialajmit]);

            $_SESSION['LajmiUinsertua'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
      
      
     //Metoda e cila i shfaq te gjitha lajmet e regjistruara ne databaze
    public function shfaqiLajmet(){
      try {
          $sql = "SELECT * FROM `lajmi`";
          $stm = $this->dbcon->prepare($sql);
          $stm->execute();

          return $stm->fetchAll();
    
      } catch (Exception $e) {
          return $e->getMessage();
      }
     }

     //Metoda e cila shfaq Lajmin sipas ID te marrur nga SESSIONI
     public function shfaqLajminSipasID()
    {
        try {
            $sql = "SELECT * FROM lajmi WHERE lajmiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->lajmiID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function barteFotonNeFolder()
    {
        try {
            $foto = $_SESSION['fotolajmit'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png', 'svg');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $emriUnikFotos = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/lajmet/index/' . $emriUnikFotos;
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

                    $this->setFotolajmit($emriUnikFotos);
                } else {
                    $_SESSION['problemNeBartje'] = true;
                }
            } else {
                $_SESSION['fileNukSuportohet'] = true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function barteFotonNeFolderContent()
    {
        try {
            $foto = $_SESSION['contentfoto'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png', 'svg');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $emriUnikFotosContent = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/lajmet/content/' . $emriUnikFotosContent;
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

                    $this->setContentfoto($emriUnikFotosContent);
                } else {
                    $_SESSION['problemNeBartje'] = true;
                }
            } else {
                $_SESSION['fileNukSuportohet'] = true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaq4LajmetEFunditLAJME(){
        try {
            $sql = "SELECT * FROM (SELECT * FROM `lajmi` where kategorialajmit='lajme' ORDER BY `lajmiID` DESC LIMIT 4 ) AS lajmetEFundit ORDER BY lajmetEFundit.lajmiID DESC";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    public function shfaq3LajmetEFunditCFAREBEJMNE(){
      try {
          $sql = "SELECT * FROM (SELECT * FROM `lajmi` where kategorialajmit='Cfarebejmne' ORDER BY `lajmiID` DESC LIMIT 3 ) AS lajmetEFundit ORDER BY lajmetEFundit.lajmiID DESC";
          $stm = $this->dbcon->prepare($sql);
          $stm->execute();

          return $stm->fetchAll();
      } catch (Exception $e) {
          return $e->getMessage();
      }
  }
  

public function fshijLajminSipasID(){
        try {
            $lajmi = $this->shfaqLajminSipasID();
            unlink('../../img/lajmet/index/' . $lajmi['fotolajmit']);
            unlink('../../img/lajmet/content/' . $lajmi['contentfoto']);

            $sql = "DELETE FROM lajmi WHERE lajmiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->lajmiID]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="../admin/lajmet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
    public function editoLajmin($kaFoto)
    {
        try {
            if ($kaFoto == false) {
                $sql = "UPDATE `lajmi` SET `titulli`=?,`pershkrimi`=?,`kategorialajmit`=?,`content`=?,`datainsertimit`=current_timestamp() WHERE lajmiID = ?";
                $stm = $this->dbcon->prepare($sql);
                $stm->execute([$this->titulli, $this->pershkrimi, $this->kategorialajmit, $this->content, $this->lajmiID]);
            } else {
                $lajmi = $this->shfaqLajminSipasID();
                unlink('../../img/lajmet/index/'. $lajmi['fotolajmit']);
                unlink('../../img/lajmet/content/' . $lajmi['contentfoto']);
                $this->barteFotonNeFolder();
                $this->barteFotonNeFolderContent();

                $sql = "UPDATE `lajmi` SET `titulli`=?,`pershkrimi`=?,`kategorialajmit`=?,`fotolajmit`=?,`contentfoto`=?,`datainsertimit`=current_timestamp(),`content`=? WHERE lajmiID = ?";
                $stm = $this->dbcon->prepare($sql);
                $stm->execute([$this->titulli, $this->pershkrimi, $this->kategorialajmit, $this->fotolajmit, $this->contentfoto, $this->content, $this->lajmiID]);
            }

            $_SESSION['mesazhiMeSukses'] = true;
            echo '<script>document.location="../admin/lajmet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

  }


?>