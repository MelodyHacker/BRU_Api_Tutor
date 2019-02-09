<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$tel=$_POST['tel'];
$etc=$_POST['etc'];
$status=$_POST['status'];
$file = '/var/www/html/dev/tutor/img/';
$image = base64_decode($_POST['image']);
$token=$_POST['token'];
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
$id=$ar2[1];

while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
  {
    if($ar2[1]==$result['id_user'] and $ar2[0]==$result['status_user']){
      $status="susscc----".$result['status_user']."_".$result['id_user'];
      $status=base64_encode($status);
      echo $status;

$sqlall ="SELECT * FROM user";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
$name_file =  uniqid() . ".png";
$file = $file .$name_file;
$current = file_get_contents($file);
$current .= $image;
file_put_contents($file, $current);
$sql="UPDATE `user` SET `username_user`=$username,
`password_user`='$password',
`name_user`='$name',
`last_name_user`='$last_name',
`address_user`='$address',
`tel_user`='$tel',
`etc_user`='$etc',
`status_user`='$status',
`image_user`='$name_file' 
WHERE id_user='$id' ";
$query= mysqli_query($databaseconnect,$sql);
if (!$query) {
	printf("Error: %s\n", $databaseconnect->error);
  echo "You Can Not User  !!!!!!!!!!";
  exit();
}
echo "succss";
mysqli_close($databaseconnect);
exit();    
}}}
echo "Some One Wrong !!!!!!!!!!";
?>