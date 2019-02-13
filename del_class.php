<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$name_class=$_POST['name_class'];
$token = $_POST['token'];

$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$id = $ar2[1];

$sql = "UPDATE `openclass` SET `Op_Status`= 1 WHERE R_ID = $id and Op_NameCourse = '$name_class'";
$queryall= mysqli_query($databaseconnect,$sql);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
echo "Del Succss";
mysqli_close($databaseconnect);
?>