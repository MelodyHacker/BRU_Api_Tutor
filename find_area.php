<?php
require 'connect.php';
$area = $_POST['area'];
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM class LEFT JOIN user ON class.id_tutor_class = user.id_user WHERE class.status_class = 'open' and class.area_class = '$area'";   



// $sql ="SELECT * FROM class WHERE status = 'open' and  area ='อำเภอเมืองบุรีรัมย์' LEFT JOIN user ON class.id_tutor = user.id";   


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