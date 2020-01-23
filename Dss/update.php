<?php
include "config.php";
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

$id = $_REQUEST['id'];

$id = $_POST['id'];

$email = $_POST['email'];
$role = $_POST['role'];
//$team = $_POST['team'];
mysqli_query($db,"UPDATE user SET id ='$id', email ='$email',
		 role ='$role'  WHERE id = '$id'")
				or die(mysql_error()); 
				
				
				  print ("<script>window.alert('record updated')</script>");
			   		   print ("<script>window.location.assign('view_users.php')</script>");


?>