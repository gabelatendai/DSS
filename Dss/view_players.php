<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/25/2017
 * Time: 12:35 AM
 */
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="fonts/font-awesome.min.css"    rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
//gabela
include "header.php";

$db=mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

//$db = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

$limit = 4;
@$p = $_GET['p'];
$get_total = mysqli_num_rows(mysqli_query($db,"SELECT * FROM player "));
$total = ceil($get_total/$limit);
if(!isset($p) || $p <= 0)
{
    $offset = 0;
}else {
    $offset = ceil($p - 1 ) * $limit;

}

?><div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <br />
            <ol class="breadcrumb">
                <li class="active"><a href="index.php">Home</a>
                </li><li class="active"><a href="view_players.php">Players</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <a href="view_players.php" class="list-group-item">Registered PLayers</a>

                <a href="info.php" class="list-group-item">Add Players</a>
            </div>
            <hr>
            <?php //include ('slider.php'); ?>
        </div>

        <div class="col-sm-9">
            <div class="jumbotron">
                <div class="panel-heading"  style="color:black">All Players <br> <?php echo 'There Are <b>' . $get_total .'</b> Players in the Database' ; ?>
                    <form  method="post" action="search.php?go" class="navbar-form navbar-right" id="searchform">
                        <div class="form-group">
                            <input  type="text" name="fullname" class="form-control" placeholder="search">
                        </div>
                        <input  type="submit" name="submit" value="Search" class="form-control" >
                    </form><br> </div>
                <div class="well">


            <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
                <tr>
                    <th><b>Fullname</th>
                    <th><b>Position</b></th>
                    <th><b>ID_Number</th>
                    <th><b>Address</b></th>
                    <th><b>Cell Number</b></th>
                    <th><b>DOB</b></th>

                    <th><b>Team Name</b></th>

                </tr>

                <?php

$sql = "SELECT * FROM player LIMIT $offset,$limit";
    $results = $db-> query ($sql);
	if ($results->num_rows) 
	{
	while($row = $results ->fetch_object())
    {
	$team = $db-> query ("SELECT * FROM team WHERE id = {$row -> team_id}");
		$team = $team-> fetch_object();
//$sc = $row->id();

			//   $age = date('Y-m-d H:i:s') -  $row -> dob ;
					
	 echo'<tr>';
                 echo '<td >'  . $row->fname . '   '. $row->sname .' </td>';
				  echo '<td >'. $row -> position. '</td>'; 
				   echo '<td >' .$row -> id_number .' </td>';
				    echo '<td >' .$row -> address . '</td>';
				    echo '<td >' .$row -> cell_number .'  </td>';
				 echo	' <td >'.$row -> dob .' </td>';

			 echo '	<td>'. $team -> name . '</td> ';  
				
			 echo'	</tr>';


    }
			}else {
			echo 'no results';
			}


            ?>

        </table>
<?php
                  if ($get_total > $limit ){
                    for($i=1; $i <= $total; $i++) {

                    echo '<div class="pages"> ';
                        echo ( $i == $p ) ? '<a class="active" >'. $i. '</a>' : '<a href="?p='.$i.'" style="color:black">'.$i.'</a>';
                        echo '</div>';

                    }


                    }
?>
                    <style>
                        div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
                    </style>
    </div>
</div> 
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>