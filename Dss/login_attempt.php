<?php
include "config.php";
$id = $_REQUEST['id'];
$id = $_POST['id'];

$name = $_POST['name'];
//$role = $_POST['role'];
//$team = $_POST['team'];
mysql_query("UPDATE team SET  name ='$name'
    WHERE id = '$id'")
or die(mysql_error());


print ("<script>window.alert('record updated')</script>");


?>