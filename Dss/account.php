<?php

include "header.php";

$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

$id = $_REQUEST['id'];
?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">My Account</div>
        
      
 <?

//$res =  mysql_query("SELECT * FROM user WHERE id=".$id);

  //  while($row = mysql_fetch_array($res))
 

$result = mysqli_query($db,"SELECT * FROM user WHERE id=".$id);

$row=mysqli_fetch_array($result);



 if (isset($_SESSION['sess_user'])){

 ?>


	    <h4 align="center">welcome <?= $_SESSION['sess_user']; ?></h4>


        <?php
        $id = $row['id'];
        echo
            '<img src="img/admin.png" width="60" height="60">
                 <p > <strong> ID:  </strong> ' . $row['id'] . '<p>
           <p> <strong> Email: </strong>  ' . $row['email'] . '</p>
		   <p> <strong>Role:</strong>' . $row['role'] . '</p> ';

        if (isset($_SESSION['role'])) {
            ?><a href="go.php?team_id='.$row['team_id']. '"></a>
		    <h4><a href="edit?id=<?php echo $id; ?>"> <strong>Update: </strong> <img src="img/index upadte.jpg"
		                                                                             width="40" height="40"></a></h4>

            <?php
        }

        ?>


	    <tr>
		    <td colspan=2>
			    <center>
				    <INPUT type="button" value="Back"
				           onClick="window.location.href='index.php'"/></center>
		    </td>
	    </tr>
	    </table>
    </div>
</div>
<?php

include "footer.php";
	?>