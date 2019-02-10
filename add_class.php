<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
require 'connect.php';
// OP0012
// 8
// คณิตสาตร์เพิ่มเติม
// เคมี
// ประฐมศึกษา
// เมือง
// 200
// mmmm
// 0

$id_tutor = $_POST['id_tutor'];
$name = $_POST['name'];
$class = $_POST['class'];
$degree = $_POST['degree'];
$area = $_POST['area'];
$clash = $_POST['clash'];
$etc = $_POST['etc'];
$status = "0";
mysqli_set_charset($databaseconnect,"utf8");
$resultArray = array();
$sql ="SELECT * FROM openclass WHERE R_ID='$id_tutor' and Op_Status='0' ";   
$status = "Some Wrong";
$queryall= mysqli_query($databaseconnect,$sql);
$id = substr(uniqid(OP),0,6);
if (!$queryall) {
   printf("Error: %s\n", $databaseconnect->error);
   echo "Some Worng!!!";
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
   if($name==$result['Op_NameCourse']){
    echo "Name Class To Use";   
    exit();
   }  
$id = ((int)$result['Op_ID'])+1;
}
$sql_in = "INSERT INTO `openclass`(`Op_ID`, `R_ID`, `Op_NameCourse`, `Sub_name`, `C_Name`, `Dis_Name`, `Op_Price`, `Op_Description`, `Op_Status`)
VALUES ( '$id',$id_tutor,'$name','$class','$degree','$area','$clash','$etc','0')";

// echo $sql_in;
// exit();


$query_insert= mysqli_query($databaseconnect,$sql_in);
if (!$query_insert) {
   printf("Error: %s\n", $databaseconnect->error);
   echo "Some Worng!!!";
exit();
}
echo "Succsss";
mysqli_close($databaseconnect);
?>