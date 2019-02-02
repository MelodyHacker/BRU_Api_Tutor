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
  if($username==$result['username']){
    echo $username." == ".$result['username'];
    echo "username has is registered chang username!!!";
    exit();
  }
}
echo "succss";
$file = $file . uniqid() . ".png";
$current = file_get_contents($file);
$current .= $image;
file_put_contents($file, $current);
$sql="INSERT INTO `user`(`id`, `username`, `password`, `name`, `last_name`, `address`, `tel`, `etc`, `status` , `image`) 
VALUES (NULL,'$username','$password','$name','$last_name','$address','$tel','$etc','$status','$file')";
$query= mysqli_query($databaseconnect,$sql);
if (!$query) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
mysqli_close($databaseconnect);
?>