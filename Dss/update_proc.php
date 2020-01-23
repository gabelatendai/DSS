<?php
require_once('config.php');


/*/$id = $_POST['id'];
$fullname = $_POST['fullname'];
$position = $_POST['position'];
$age = $_POST['age'];
$id_number = $_POST['id_number'];
$cell_number = $_POST['cell_number'];
$address = $_POST['address'];
$dob = $_POST['dob'];


	mysql_query("UPDATE user SET  fullname ='$fullname', position ='$position' ,age ='$age',
		 id_number ='$id_number' , cell_number ='$cell_number', address ='$address', dob ='$dob' WHERE id = '$id'")
				or die(mysql_error()); 
				
				
				  print ("<script>window.alert('record updated')</script>");
			   		   print ("<script>window.location.assign('view_users.php')</script>");
					   <?php
					   */

if (isset($_POST['save'])) {


    $id = $_REQUEST['id'];
    $team = R::load('team', $id);
    $filetmp = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
    $filepath = "uploaded_pictures/" . $filename;

    move_uploaded_file($filetmp, $filepath);


    // $sql= "INSERT INTO player (img_name,image_path,img_type) VALUES ('$filename','$filepath','$filetype')";
    //  $result= mysql_query( $sql);


    $player = R::dispense('player');
    $player->fullname = $_POST['fullname'];
    $player->position = $_POST['position'];
    $player->id_number = $_POST['id_number'];
    $player->address = $_POST['address'];
    $player->cell_number = $_POST['cell_number'];
    $player->dob = $_POST['dob'];
    $player->age = $_POST['age'];
    $player->img_name = $filename;
    $player->image_path = $filepath;
    $player->img_type = $filetype;
    $team->ownProductList[] = $player;
    R::store($team);
    echo '<img src="img/492.png" /> &nbsp;! player information saved successfully';
    echo '<meta content="2;teaminfo.php" http-equiv="refresh" />';

}
?>