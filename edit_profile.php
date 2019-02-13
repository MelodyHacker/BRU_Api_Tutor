<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
// $username=$_POST['username'];
// $password=$_POST['password'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$phone=$_POST['tel'];
$etc=$_POST['etc'];
$area=$_POST['address'];
$line=$_POST['line'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$faculty=$_POST['faculty'];
$file = '/var/www/html/dev/tutor/img/';
// $image = base64_decode($_POST['image']);
$token=$_POST['token'];
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$id=$ar2[1];
// $name_img= uniqid();
// $name_file =  $name_img . ".png";
// $file = $file .$name_file;
// $current = file_get_contents($file);
// $current .= $image;
// file_put_contents($file, $current);
$sql="UPDATE `register` SET 
`R_FristName`='$name',
`R_LastName`='$last_name',
`R_Phon`='$phone',
`R_Line`='$line',
`R_Email`='$email',
`R_Gender`='$gender',
`R_University`='$address',
`R_Faculty`='$faculty',
`R_Description`='$etc'
WHERE R_ID='$id' ";
$query= mysqli_query($databaseconnect,$sql);
if (!$query) {
	printf("Error: %s\n", $databaseconnect->error);
  echo "You Can Not User  !!!!!!!!!!";
  exit();
}
echo "Chang Succss";
mysqli_close($databaseconnect);
exit();    

echo $sql;//"Some One Wrong !!!!!!!!!!".
?>