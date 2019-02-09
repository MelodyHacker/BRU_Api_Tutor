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
$sqlall ="SELECT * FROM register";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
$ar = explode("----",base64_decode($token));
$ar2 = explode("_",$ar[1]);
// print_r($ar);
  while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC)){
  if($ar2[1]==$result['R_ID']){
    $name=$result['R_FristName'];
    $last_name=$result['R_LastName'];
    $gender=$result['R_Gender'];
    $tel=$result['R_Phon'];
    $line=$result['R_Line'];  
    $email=$result['R_Email'];
    $area=$result['R_DisName'];
    $study=$result['R_University'];
    $faculty=$result['R_Faculty'];
    $etc=$result['R_Description'];
    $date=$result['R_Date'];
    $image=$result['R_URLIMG'];

   if( $name == '' ) $name="empty";
   if($last_name == '' ) $last_name="empty";
   if($gender == '' ) $gender="empty";
   if($tel == '' ) $tel="empty";
   if($line == '' ) $line="empty";   
   if($email == '' ) $email="empty";   
   if($area == '' ) $area="empty";
   if($study == '' ) $study="empty";
   if($faculty == '' ) $faculty="empty";
   if($date == '' ) $date="empty";
   if($image == '' ) $image="empty";
  
    $data=$result['R_Username']."-".
    $name."-".
    $last_name."-".
    $gender."-".
    $tel."-".
    $line."-".
    $email."-". 
    $area."-".
    $study."-".
    $faculty."-".
    $etc."-".
    $date."-".
    $image;
  
    echo   $data;
    exit();
  }
}
mysqli_close($databaseconnect);
?>