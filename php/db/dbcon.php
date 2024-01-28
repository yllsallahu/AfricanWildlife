<?php
Class dbcon{
private $conn = null;
private $host = 'localhost';
private $dbname = 'africalwildlife';
private $username = 'root';
private $password = '';
public function connDB(){
try {
$this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",
$this->username, $this->password,
[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
//echo "Lidhja me: {$this->dbname} - {$this->host}: eshte ralizuar me sukses!";
} catch (PDOException $pdoe) {
 die("Nuk mund të lidhej me bazën e të dhënave {$this->dbname} :" . $pdoe->getMessage());
}
return $this->conn;
}
}
$testDB = new dbCon();
$testDB->connDB();
?>