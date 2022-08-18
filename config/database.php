<?php
class Database{
  private $host = "localhost";
  private $db_name = "maindb_rel";
  private $username = "root";
  private $password = "fr0nt!er";
  public $conn;
  
  public function getConnection(){
    $this->conn = null;
    try{
     $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';charset=utf8',$this->username,$this->password);
    }catch(PDOException $e ){
      die("Database could not be connected:".$e->getMessage());    
    }
    return $this->conn;
  }
}

?>