<?php

$conn=mysql_connect("localhost", "root", "") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
mysql_select_db("football",$conn) or DIE('Database name is not available!');
?>

<form enctype="multipart/form-data" action="" method="post" >
<input name="image"  type="file">
<input value="submit" type="submit"  name="upload">
<?php
if(isset($_POST['upload']))
{


    $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
	$filepath= "uploaded_pictures/".$filename;
	
	move_uploaded_file( $filetmp,$filepath);
	
	
	   $sql= "INSERT INTO player (img_name,image_path,img_type) VALUES ('$filename','$filepath','$filetype')";
	  $result= mysql_query( $sql); 
	   
	   echo "file upload successfull";
	   }else {
	   	   echo "there was an error in uploading file";

	   }
 ?>
	