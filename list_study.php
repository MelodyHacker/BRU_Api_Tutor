<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
require 'connect.php';
$token = $_POST['token'];
// echo $token;
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$id = $ar2[1];
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM `announcements` WHERE `An_IdStudent` = '$id'";   
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
// echo $sql;
mysqli_close($databaseconnect);
echo json_encode(array('list_study' => $resultArray), JSON_UNESCAPED_UNICODE);
?>