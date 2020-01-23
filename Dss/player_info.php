<head>	<script type="text/javascript" >
function printplayer(layer)
{
var generator =window.open(",'name,");
var layetext =document.getElementById(layer);
generator.document.write(layetext.innerHTML.replace("Print Me"));

generator.document.close();
generator.print();
generator.close();
}
</script></head>
<?php
include 'header.php';
include 'dbconn.php';

if(isset($_SESSION['sess_user'])){
  
   ?>		  			

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>

<title>player Info</title>
<body>
 
 <?php
$id = $_REQUEST['id'];

$sql = "SELECT * FROM player WHERE id=  '$id' ";
    $results = $db-> query ($sql);
	if ($results->num_rows) 
	{
	while($row = $results ->fetch_object())
    {
	$team = $db-> query ("SELECT * FROM team WHERE id = {$row -> team_id}");
		$team = $team-> fetch_object();
	     
				?>
			<h4>
<a href="#" id="print" onClick="javascript:printplayer('div-id-name')">Print</a></h4>
				<div class="col-md-8 col-md-offset-3">
    <div class="panel panel-primary" id="div-id-name">        <div class="panel-heading" style="background-color:green">Player Information</div>

  <table class="table"   background="../images/4.jpg" width="600px">
		   <div class="display">       
 <p align="center">Zimbabwe Footbal Association MASHEAST </p>
<p align="center"><script>document.write(new Date().getFullYear());</script> 
</p>                 

 <tr align="center"><td rowspan="5">
<img  class="img-circle " src="<?php echo ''. $row->image_path .'' ;?>"height="150"  width="130"></td>
 </tr>
 <tr width="300"><td width="300">
  <strong> FullName </strong> : <span><?php echo '' . $row->fname . '   '.  $row->sname.'' ;?></span></td></tr>
<tr><td width="300">
   <b>CLUB  :</b>  <span><?php echo '' .$team->name .''; ?></span>
  </td>
<tr><td width="300"> 
 <b>D.O.B :</b> <span><?php echo ''. $row->dob .' '; ?></span>
</td>
<tr><td width="300">
 <b>ID Number :</b> <span><?php echo ''. $row->id_number .''; ?></span>
  </td>
<tr><td>
</div>
<?php
			}
			}else {
			echo 'no results';
			}?>
<style></style>