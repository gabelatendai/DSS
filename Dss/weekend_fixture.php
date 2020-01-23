<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/25/2017
 * Time: 12:35 AM
 */
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
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

                $hostname = "localhost";
    $dbusername = "root";
    $dbname = "football";
    $dbpassword = "";
    $db = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
if (!$db) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

$limit = 8;
@$p = $_GET['p'];
$get_total = mysqli_num_rows(mysqli_query($db,"SELECT * FROM fixture "));
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
                </li><li ><a href="fixture.php">fixture</a>
                </li><li class="active"><a href="weekend_fixture.php">match details</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
            <hr>
            <?php //include ('slider.php'); ?>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="panel-heading"  style="color:black">All Matches <br> <?php echo 'There Are <b>' . $get_total .'</b>  Matches for this season ' ; ?>
                </div>
                <div class="well">


            <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
                <tr>
                 
                    <th><b>home Team</th>
                    <th><b>Away Team</b></th>
                    <th><b>Match Date</th>
                    <th><b>Time</b></th>
                    <th><b>Venue</b></th>
                    

                </tr>

                <?php

 //$result=mysql_query("select * from refrees ");

//while($row=mysql_fetch_array($result)){
  //  $ref= $row ['fullname'];

                $sql="SELECT * FROM fixture , team WHERE fixture.home =team.name  LIMIT $offset,$limit ";
            
  $results = $db-> query ($sql);
   if ($results->num_rows) 
    {
  while($row = $results ->fetch_object())
    {
        
               $time = "15:00 Hrs";
                    
     echo'<tr>';
        
                 echo '<td >'  . $row-> home . ' </td>';
                  echo '<td >'. $row -> away. '</td>'; 
                   echo '<td >' .$row -> match_date .' </td>';
                    echo '<td >' .$time . '</td>';
                   echo ' <td>'. $row-> home_ground .'</td> '; 
                     // echo ' <td>'. $ref .'</td> '; 
                
             
                
             echo'  </tr>';



            }

}
            ?>

        </table>
<?php
                  if ($get_total > $limit ){
                    for($i=1; $i <= $total; $i++) {

                    echo '<div class="pages"> ';
                        echo ( $i == $p ) ? '<a class="active" >'. $i. '</a>' : '<a href="?p='.$i.'" style="color:black"><b>Week'.$i.'</a>';
                        echo '</b></div>';

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