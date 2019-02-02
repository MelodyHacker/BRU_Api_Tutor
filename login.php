
<?php
require 'connect.php';
mysqli_set_charset($databaseconnect,"utf8");
$username=$_POST['username'];
$password=$_POST['password'];
$status="";
$resultArray = array();
$sqlall ="SELECT * FROM user";    
$queryall= mysqli_query($databaseconnect,$sqlall);
if (!$queryall) {
	printf("Error: %s\n", $databaseconnect->error);
exit();
}
$resultArray = array();
while($result =mysqli_fetch_array($queryall,MYSQLI_ASSOC))
{
  if($username==$result['username'] and $password==$result['password']){
    $status=$result['status']."-".$result['id'];
  }
}
echo $status;
mysqli_close($databaseconnect);
?>