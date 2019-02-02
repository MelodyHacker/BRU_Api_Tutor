<?php
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM class WHERE status = 'open'";    
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
echo $status;
mysqli_close($databaseconnect);
echo json_encode(array('list_class' => $resultArray), JSON_UNESCAPED_UNICODE);
?>