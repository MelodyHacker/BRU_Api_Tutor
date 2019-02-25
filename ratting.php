<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$token = $_POST['token'];
$id = $_POST['id'];
$rat = $_POST['rat'];

$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$sql_check = "
SELECT * FROM `ratting` 
";
$queryall= mysqli_query($databaseconnect,$sql_check);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($row = mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
    if($row['ID_Tutor'] == $id and $row['ID_Student'] == $ar2[1]){
        echo "fail you give ratting to tutor ";
        exit();
    }
}

$sql = "
INSERT INTO `ratting`
(`ID_Tutor`, `ID_Student`, `rate`) VALUES 
('$id','$ar2[1]','$rat')";
$queryall= mysqli_query($databaseconnect,$sql);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}


echo "succss ";
?>