<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sqlall ="SELECT * FROM `register` WHERE `R_Status` = 'tutor'";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
  array_push($resultArray,$result);  
}
mysqli_close($databaseconnect);
echo json_encode(array('list_tutor' => $resultArray), JSON_UNESCAPED_UNICODE);

?>