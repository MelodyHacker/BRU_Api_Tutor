<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM `register` WHERE `R_Status` = 'tutor'";   

// echo $sql;
$queryall= mysqli_query($databaseconnect,$sql);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC)){
   $sql_tutor = "SELECT * FROM `ratting` WHERE `ID_Tutor` = ".$result['R_ID'];
   $query= mysqli_query($databaseconnect,$sql_tutor);
    if (!$queryall) {	printf("Error: %s\n", $databaseconnect->error); exit(); }
        $count_rate = 0;
        while($row = mysqli_fetch_array($queryall,MYSQLI_ASSOC)){
        $count_rate = $count_rate + 1;
    }
    $data =array();
    $data['id']  =  $result['R_ID'];
    $data['name']  =  $result['R_FristName'];
    $data['last_name']  = $result['R_LastName'];
    $data['rate']  = $count_rate ;
    $data['url']  = $result['R_URLIMG'];

    array_push($resultArray,$data);  
}
mysqli_close($databaseconnect);
echo json_encode(array('list_ratting' => $resultArray), JSON_UNESCAPED_UNICODE);
?>