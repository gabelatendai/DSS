<?php
 $hostname = "localhost";
    $dbusername = "root";
    $dbname = "football";
    $dbpassword = "";
    $db = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname); 
if (!$db) { 
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); 
    } 
	?>