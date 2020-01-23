<?php
//gabela
include "header.php";

//R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB

//$id = $_GET['user'];
//$user = R::load('user');
  $conn = mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
//mysql_select_db("football") or DIE('Database name is not available!');


if(!isset($_SESSION['sess_user'])){
   header("Location: login.php");
   }else{
   ?>		  			

  

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>

<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">all users</div>
        <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
            <tr>
            <th><b>ID</th>
            <th><b>email</b></th>
            <th><b>role</b></th>
			            <th><b>Team ID</b></th>
			            <th><b>options</b></th>

			</tr>
      
<?php
$limit = 3;
@$p = $_GET['p'];
$get_total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM player "));
$total = ceil($get_total/$limit);
if(!isset($p) || $p <= 0)
{
$offset = 0;
}else {
$offset = ceil($p - 1 ) * $limit; 
}

$res =  mysqli_query($conn,"SELECT * FROM player LIMIT $offset,$limit ");


    while($row = mysqli_fetch_array($res))
    {
	        
       echo '<tr>
                 <td >' . $row['id'] .'</td>
           <td >' . $row['fname']. '</td>
		   <td >' . $row['sname'] . '</td> 
		      <td >' . $row['team_id'] . '</td> 
		   <td><a href="go.php?team_id='.$row['team_id']. '"><img  src="img/index upadte.jpg" width="40" height="40"></a><a href="delete.php?id='.$row['id'].'"><img  src="img/index.jpg" width="40" height="40"></a></td>

          </tr>';
    }
            
			
            ?>
       
        </table>
		<?php

		if ($get_total > $limit ){
		for($i=1; $i <= $total; $i++) {

		echo '<div class="pages"> ';
		
		echo ( $i == $p ) ? '<a class="active" >'. $i. '</a>' : '<a href="?p='.$i.'" style="color:#FFFFFF">'.$i.'</a>';
		echo '</div>';
		
		}
		
		
		}
		  ?>
	
    </div>
 
</div>
<button onclick="window.location.href='register.php'" class="btn">add user</button>

<div class=" Footer navbar  navbar-fixed-bottom " >
<div class="container">
<style>
div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
</style>
<?php
include "footer.php";
?> 
</div></div>
</div>