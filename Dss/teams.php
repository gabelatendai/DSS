<?php
//gabela


include "header.php";
@$teamid = $_SESSION['team'];
//R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB

//$id = $_GET['user'];
//$user = R::load('user');
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
//mysql_select_db("football") or DIE('Database name is not available!');

//var_dump($_SESSION['$teamid']);
if(isset($_SESSION['sess_user'])){
  
   ?>		  			

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>

<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">All Tams</div>
        <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
		
            <tr>
            <th><b>Register Players For </th><?php
                    if (@$_SESSION['role'] == 'admin'){
 		?>
								 
				<a onClick="" href="edit_teams.php?id='.$row['id']. '">			     <td><b>Update</b></td>
								 
  <?php 
            }
		
//if($_SESSION['teamid'] ==$teamid)
$res =  mysqli_query($db,"SELECT * FROM team WHERE id = '$teamid' ");


    while($row = mysqli_fetch_array($res))
    {
	        
       echo '<tr>
           <td ><a href="edit_teams.php?id='.$row['id']. '">' . $row['name']. '</td> </tr>';
		  
		  
		   }
      if (@$_SESSION['role'] == 'admin'){
 		
               
		  '<td><a href="edit.php?id='.$row['id']. '"><img  src="img/index upadte.jpg" width="40" height="40"></a><a href="delete.php?id='.$row['id'].'"><img  src="img/index.jpg" width="40" height="40"></a></td>

          </tr>';
    }
            
			
            ?>
       
        </table>

    </div>
 
</div> 

         
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">
<style>
div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
</style>
<?php
include "footer.php";
?> 
</div></div>
</div>