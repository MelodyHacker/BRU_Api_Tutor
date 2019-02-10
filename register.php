<?php

// error_reporting(-1);
// ini_set('display_errors', 'On');
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
// params.put("image", image);
// params.put("username", username.getText().toString());
// params.put("password", password.getText().toString());
// params.put("name", name.getText().toString());
// params.put("last_name", last_name.getText().toString());
// params.put("address", address.getText().toString());
// params.put("tel", tel.getText().toString());
// params.put("etc", etc.getText().toString());
// params.put("faculty", faculty.getText().toString());
// params.put("e_mail", email.getText().toString());
// params.put("line", line.getText().toString());
// params.put("gender", gender_spin.getSelectedItem().toString());
// params.put("status", status);
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$tel=$_POST['tel'];
$status=$_POST['status'];
$line=$_POST['line'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$study=$_POST['study'];
$faculty=$_POST['faculty'];
$etc=$_POST['etc'];
$date=date("r");
$file = '/var/www/html/dev/tutor/img/';




echo $date;
$image = base64_decode($_POST['image']);
$sqlall ="SELECT * FROM register";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
  if($username==$result['R_Username']){
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
$sql="INSERT INTO `register`(`R_ID`, `R_FristName`, `R_LastName`, `R_Username`, `R_Password`, `R_DisName`, `R_URLIMG`, `R_Phon`, `R_Line`, `R_Email`, `R_Status`, `R_Gender`, `R_University`, `R_Faculty`, `R_Description`, `R_Date`) 
VALUES (NULL,'$name','$last_name',$username,$password,'$area','$file',$tel,'$line','$email','$status','$gender','$study','$faculty','$etc',NULL)";
// echo $sql;
$query= mysqli_query($databaseconnect,$sql);
if (!$query) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
mysqli_close($databaseconnect);
?>