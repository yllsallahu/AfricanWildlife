<?php
require_once('../db/dbcon.php');
if (!isset($_SESSION)) {
    session_start();
}

Class Modeli extends dbcon{
private $id;
private $nrleternjoftimit;
private $emri;
private $mbiemri;
private $aksesi;
private $passwordi;
private $numri;
private $dbConn;
public function __construct($id='', $nrleternjoftimit='', $emri='', $mbiemri='', $adresa='' ,$aksesi='', $passwordi='',$numri='', $dbConn='') {
    $this->id = $id;
    $this->nrleternjoftimit = $nrleternjoftimit;
    $this->emri = $emri;
    $this->mbiemri = $mbiemri;
    $this->adresa = $adresa;
    $this->aksesi=$aksesi;
    $this->passwordi=$passwordi;
    $this->numri=$numri;
    $this->dbcon = $this->connDB();
}
//Seters and geters
public function getId() {
    return $this->id;
} 

public function setId($id) {
    $this->id = $id;
}

public function getNrleternjoftimit() {
    return $this->nrleternjoftimit;
}

public function setNrleternjoftimit($nrleternjoftimit) {
    $this->nrleternjoftimit = $nrleternjoftimit;
}

public function getEmri() {
    return $this->emri;
}

public function setEmri($emri) {
    $this->emri = $emri;
}

public function getMbiemri() {
    return $this->mbiemri;
}

public function setMbiemri($mbiemri) {
    $this->mbiemri = $mbiemri;
}

public function getAdresa() {
    return $this->adresa;
}

public function setAdresa($adresa) {
    $this->adresa = $adresa;
}

public function getAksesi(){
    return $aksesi;
}
public function setAksesi($aksesi){
    $this->aksesi=$aksesi;
}

public function getPasswordi(){
    return $passwordi;
}
public function setPasswordi($passwordi){
    $this->passwordi=$passwordi;
}
public function getNumri(){
    return $numri;
}
public function setNumri($numri){
    $this->numri=$numri;
}

public function fshijPerdoruesin($id) {
    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

//Metoda per insertim Dhenave
public function insertoDhenat(){
try{
    $sql = "INSERT INTO `users` (`nrleternjoftimit`,`emri`,`mbiemri`,`numri`,`adresa`,`passwordi`) VALUES(?,?,?,?,?,?)";
    $stm = $this->dbcon->prepare($sql);
    $stm->execute([$this->nrleternjoftimit, $this->emri, $this->mbiemri,$this->numri, $this->adresa, $this->passwordi]);
    
    $_SESSION['regMeSukses'] = true;
}
    catch(Exception $e){
    return $e->getMessage();
        }
}

    
    public function kontrollo(){
        try {
            $sql = "SELECT * from `users` WHERE `nrleternjoftimit` = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function kontrolloLlogarin(){
        try {
            $sql = 'SELECT * from users WHERE nrleternjoftimit = ? and passwordi = ?';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit, $this->passwordi]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqiUserat(){
        try {
            $sql = "SELECT * FROM `users`";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();
  
            return $stm->fetchAll();
      
        } catch (Exception $e) {
            return $e->getMessage();
        }
       }
  
//Metoda per shfaqjen e te gjithe te dhenave te studentit
    public function shfaqSipasIDs(){
        try{
            $sql = "SELECT * FROM users where id=?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->id]);
            $dhenat = $stm->fetchAll();
            return $dhenat;
        }
    catch(Exception $e){
        return $e->getMessage();
    }
}
public function shfaqTeGjithePerdoruesit(){
        try {
            $sql = 'SELECT * from users';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function updateUser($id, $emri, $mbiemri, $aksesi) {
    try {
        $sql = "UPDATE users SET emri = :emri, mbiemri = :mbiemri, aksesi = :aksesi WHERE id = :id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':emri', $emri);
        $stmt->bindParam(':mbiemri', $mbiemri);
        $stmt->bindParam(':aksesi', $aksesi);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}




}
?>