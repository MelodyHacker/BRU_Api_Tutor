<?php
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
$sqlall ="SELECT * FROM user";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
  if($username==$result['username_user']){
    // echo $username." == ".$result['username_user'];
    echo "username has is registered chang username!!!";
    exit();
  }
}
echo "succss";
$name_file =  uniqid() . ".png";
$file = $file .$name_file;
$current = file_get_contents($file);
$current .= $image;
file_put_contents($file, $current);
$sql="INSERT INTO `user`(`id_user`, `username_user`, `password_user`, `name_user`, `last_name_user`, `address_user`, `tel_user`, `etc_user`, `status_user` , `image_user`) 
VALUES (NULL,'$username','$password','$name','$last_name','$address','$tel','$etc','$status','$name_file')";
$query= mysqli_query($databaseconnect,$sql);
if (!$query) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
mysqli_close($databaseconnect);
?>