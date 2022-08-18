<?php
header("Content-Type: application/json");
// create curl resource
$ch = curl_init();
// set url
curl_setopt($ch, CURLOPT_URL, "http://192.168.20.230/rest-api/api/all_data.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"AuthKey=Test12345$");
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $output contains the output string
$output = curl_exec($ch);
// close curl resource to free up system resources
curl_close($ch);  
echo $output;

$response = json_decode($output,true);

//echo $response->data;
//print_r($response);
foreach($response as $data){
  foreach($data as $item){
  echo "User ID: ".$item['userID']." First Name: ".$item['fName']." Last Name: ". $item['sName']."\t \n";
 
  }
}
//var_dump($response);   
?>