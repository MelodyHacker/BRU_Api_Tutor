<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
// tutor c3Vzc2NjLS0tLXR1dG9yXzE=
// student  c3Vzc2NjLS0tLXN0dWRlbnRfMg==
$token = $_POST['token'];
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$id_user = $ar2[1];
$name_class = $_POST['name_class'];
$degree = $_POST['degree'];
$area = $_POST['area'];
$name_class = $_POST['name_class'];
$time = "08:00";//$_POST['time'];
$position = " ";// $_POST['position'];
$clash = $_POST['clash'];
$etc = $_POST['etc'];
$date = date("r");





$id = uniqid();
$id = substr($id,0,6);

$sql ="SELECT * FROM announcements";   
$queryall= mysqli_query($databaseconnect,$sql);
if (!$queryall) {
   printf("Error: %s\n", $databaseconnect->error);
   echo "Some Worng!!!";
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
   if($id_user ==  $result['An_IdStudent'] and $name_class == $result['An_Subjects'] and "1" == $result['An_Subjects']){
    echo "You to register for this class";   
    exit();
   }  
}

$sql_in = "INSERT INTO `announcements`
(`An_ID`, `An_IdStudent`, `An_Subjects`, `An_Class`, `An_District`, 
`An_Time`, `AN_Position`, `An_Price`, `An_Details`, `An_Date`, `AN_Status`) VALUES 
('$id','$id_user','$name_class','$degree','$area','$time','$position','$clash','$etc',NULL,'0')";
echo $sql_in;


$query_insert= mysqli_query($databaseconnect,$sql_in);
if (!$query_insert) {
   printf("Error: %s\n", $databaseconnect->error);
   echo "Some Worng!!!";
exit();}

echo "Succsss";
mysqli_close($databaseconnect);
?>