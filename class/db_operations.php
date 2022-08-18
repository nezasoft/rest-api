<?php
class DBOperation{
  //Connection
  private $conn;
  //Db Connection
  public function __construct($db){
    if($db!=null){
    $this->conn=$db;
    }
    
  }

  //Get All Data
  public function getData($query){
  try{
    $stmt = $this->conn->prepare($query);
    $stmt->execute();    
    return $stmt; 
    
    }catch(PDOException $e){
    
    return "Database Error:-".$e->getMessage();
    
    } 
  }
  
  public function addData($query){
    $sql = $this->conn->prepare($query);
    
    if($sql->execute()){
      return true;
    
    }else{
      return false;
    }  
  }
  
  public function getSingleData($query){
    $sql = $this->conn->prepare($query);
    
    if($sql->execute()){
      return true;
    
    }else{
     return false;
    }  
  }
  public function deleteData($query){
    $sql = $this->conn->prepare($query);
    
    if($sql->execute()){
      return true;
    }else{
      return false;
    
    }
  
  }
  
  
}

?>