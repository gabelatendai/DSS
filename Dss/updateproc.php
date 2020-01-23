<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/23/2017
 * Time: 3:31 AM
 */

include "config.php";

$id = $_REQUEST['id'];

$fname = $_POST['fname'];
$sname = $_POST['sname'];

$position = $_POST['position'];
$cell_number = $_POST['cell_number'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$id_number = $_POST['id_number'];
$nationality = $_POST['nationality'];

$filetmp= $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$filetype = $_FILES['image']['tmp_name'];
$filepath= "uploaded_pictures/".$filename;


mysql_query("UPDATE user SET id ='$id', fname ='$fname',
		 sname ='$sname' position ='$position',
		 cell_number ='$cell_number' , address ='$address',
		 dob ='$dob', id_number ='$id_number',
		 nationality ='$nationality' , image_path ='$$filepath',
		 img_name ='$filename' , img_type ='$filetype',
		")
or die(mysql_error());


print ("<script>window.alert('record updated')</script>");
print ("<script>window.location.assign('view_users.php')</script>");
?>