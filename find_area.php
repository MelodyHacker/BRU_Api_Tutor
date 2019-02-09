<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
$area = $_POST['area'];
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM openclass LEFT JOIN register ON 
openclass.R_ID = register.R_ID
WHERE openclass.Op_Status = '1' 
and openclass.Dis_Name = '$area'";   

// echo $sql;
$queryall= mysqli_query($databaseconnect,$sql);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
$resultArray = array();
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
  
    array_push($resultArray,$result);  
}
// echo $status;
mysqli_close($databaseconnect);
echo json_encode(array('list_class' => $resultArray), JSON_UNESCAPED_UNICODE);
?>