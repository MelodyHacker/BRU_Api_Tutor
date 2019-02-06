<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$token = $_POST['token'];
$data="Empty";
$name="Empty";
$last_name="Empty";
$address="Empty";
$tel="Empty";
$etc="Empty";
$image="Empty";
$sqlall ="SELECT * FROM user";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
// print_r($ar);
  while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC)){
  if($ar2[1]==$result['id_user']){
    $name=$result['name_user'];
    $last_name=$result['last_name_user'];
    $address=$result['address_user'];
    $tel=$result['tel_user'];
    $etc=$result['etc_user'];
    $image=$result['image_user'];
   if( $name == '' ) $name="empty";
   if($last_name == '' ) $last_name="empty";
   if($address == '' ) $address="empty";
   if($tel == '' ) $tel="empty";
   if($etc == '' ) $etc="empty";
   if($image == '' ) $image="empty";
    $data=$result['username_user']."-".
    $name."-".
    $last_name."-".
    $address."-".
    $tel."-".
    $etc."-".
    $image;
  
    echo   $data;
    exit();
  }
}
mysqli_close($databaseconnect);
?>