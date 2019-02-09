
<?php
	$databaseconnect=mysqli_connect('localhost','tanon','wine','tutor_project') or die('Connect Error'.mysqli_connect_error());
		mysqli_set_charset($databaseconnect,'utf8');