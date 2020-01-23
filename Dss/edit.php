<?php

include "header.php";
include "config.php";


$id = $_GET['id'];

$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

//$res =  mysql_query("SELECT * FROM user WHERE id=".$id);

  //  while($row = mysql_fetch_array($res))

$result = mysqli_query($db,"SELECT * FROM user WHERE id=".$id);


while($row=mysqli_fetch_array($result))
{


//$result = mysql_query("SELECT * FROM user WHERE id=".$id);

//while($row=mysql_fetch_array($result))
//{


if(isset($_SESSION['sess_user'])){
  
   ?>		  			

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>

<html>
<body>
<form name="frm" method="POST"action="">

<div class="col-md-4 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Update user</div>
        <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
<tr>
<td> ID</td><td><INPUT type="text" name="id" value="<?php echo $row['id']?> " readonly> </td></tr>
<tr>
<td> EMAIL:</td><td><INPUT type="text" name="email" value="<?php echo $row['email']?> "> </td></tr>
<tr>
<td> ROLE:</td><td><INPUT type="text" name="role" value="<?php echo $row['role']?> "> </td></tr>
<td><INPUT type="hidden" name="id" value="<?php echo $row['id']?>" /> </td>
</tr>
<tr>


<tr><td colspan=2><center>
<INPUT type="submit" value="Update" name="update" />
<INPUT type="button" value="Back"
onClick="window.location.href='users.php'" /></center></td></tr>
</table>
</div>
</form>
</html>
</body>
<?php }

if (isset($_POST['update'])) {

    $email = $_POST['email'];
    $role = $_POST['role'];
//$team = $_POST['team'];
    mysqli_query($db,"UPDATE user SET email ='$email',
		 role ='$role'  WHERE id = '$id'");
    ?>

	<script>
		alert('Record Succsessfully Updated');
		window.location = "users.php";
	</script>

    <?php
}
include "footer.php";
?>