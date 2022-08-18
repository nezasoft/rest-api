<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once("../config/database.php");
include_once("../class/db_operations.php");
$key = 'Test12345$';
$auth_key = $_POST['AuthKey'];
$user_id = $_POST['UserID'];

if($auth_key!=$key){
  echo json_encode(array("message"=>"Invalid Authentication Key!"));
  exit();
}

$db = new Database();
$db_conn = $db->getConnection();
$data = new DBOperation($db_conn);
$query ="SELECT * FROM users WHERE id='".$user_id."' ORDER BY id ASC LIMIT 1"; 
$stmt = $data->getData($query);
$item_count = $stmt->rowCount();
//echo json_encode($item_count);

  if($item_count>0){
    $data_array = array();
    $data_array['data']=array();
    //$data_array['itemCount']=$item_count;
     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
      $e = array("userID"=>$row["id"],"fName"=>$row['firstname'],"sName"=>$row['surname'],"Email"=>$row['email']);
      array_push($data_array["data"],$e);    
    }
    echo json_encode($data_array);     
  }else{
    http_response_code(404);
    echo json_encode(array("message"=>"No record found!"));
  
  }


?>