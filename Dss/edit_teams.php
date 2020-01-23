<?php
//gabela
include "header.php";
$id = $_REQUEST['id'];

R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for db connection 'mysql '
 $teams = R::findAll('team'); 
// $id = $_REQUEST['team'];
 $team = R::load('team', $id); 
if(isset($_SESSION['sess_user'])){
  
   ?>		  			

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>

<h2  data-toggle="collapse" data-target="#demo"  align="center"><a href="addstaff.php?team=<?php echo $team->id ?>"><span class="glyphicon glyphicon-plus"></span>Add players</a></h2>  
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary" id="div-id-name">
        <div class="panel-heading" style="background-color:green" >Roster for <?php echo $team->name; ?></div>
        <table class="table table-condensed" width="350" border="1" cellpadding="1" cellspacing="1" align="center">
            <thead>
            <td><b>Full Name</\</td>
            <td><b>Position</b></td>
            <td><b>Age</b></td>
			     <td><b>Address</b></td>
				 <td><b>DOB</b></td>
			     <td><b>Cell_number</b></td><td><b>Date Registered</b></td>
				 			     <td><b>Club_ID</b></td>  <?php
                    if (@$_SESSION['role'] == 'admin'){
 		?>
								 <td><b>Print</b></td>
				 			     <td><b>Update</b></td>
								 
  <?php 
            }
			
            ?>
        </thead>

        <script type="text/javascript" >
function printlayer(layer)
{
var generator =window.open(",'name,");
var layetext =document.getElementById(layer);
generator.document.write(layetext.innerHTML.replace("Print Me"));

generator.document.close();
generator.print();
generator.close();
}
</script>
            <?php
            
            foreach( $team->ownPlayerList as $player ) {
			
			 @$age = date('Y-m-d H:i:s') -  $player -> dob ; 
                ?>
				
        <tr>
                <td ><?php echo $player->fname.'  '.  $player->sname?> </a></td>
                <td ><?php echo $player->position ?> </td>
                <td ><?php echo $age ?> </td>
				   <td ><?php echo $player->address ?></td>
				   <td ><?php echo $player->dob ?> </td>
                <td ><?php echo $player->cell_number ?> </td>
                <td ><?php echo $player->date_registered ?> </td>
				                <td ><?php echo $team->name; ?> </td>

				   <?php
                    if (@$_SESSION['role'] == 'admin'){
 		?>
		 <td ><a href="#" class="pull-right" id="print" onclick="javascript:printlayer('div-id-name')">Print</a></td>

                        <td ><a class="pull-right" href="update_player.php">  Update</a></td>
			  </tr>
                <?php 
            }
			}
			
            ?>
			 <tr>
        </table>
    </div>
</div> 
<INPUT type="button" value="Back" class="btn btn-primary pull-left" onClick="window.location.href='teams.php'"  style="background-color:green"/>

<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>