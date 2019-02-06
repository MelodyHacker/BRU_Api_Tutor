<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
$id_tutor = $_POST['id_tutor'];
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM class LEFT JOIN user ON class.id_tutor_class = user.id_user WHERE class.status_class = 'open' and user.id_user = '$id_tutor'";   
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