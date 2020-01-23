


<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/25/2017
 * Time: 12:35 AM
 */

$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
?><!DOCTYPE html>


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



<?php include 'header.php';?>

<!-- Page Content -->
<div class="container">


            <hr>

        </div>

        <div class="col-sm-9">
            <div class="jumbotron">
                <h2 class="text-center"><b>Team Information</b> </h2>
                <div class="well">
        <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
            <tr>
                <th><b>Team Name</th>
                <th><b>From</b></th>
                <th><b>Manager</b></th>
                <th><b>Coach</b></th>
                <th><b>Contact Number</b></th>
                <th><b>Team Colors</b></th>
                 <th><b>Home Ground</b></th>

            </tr>

            <?php
           $id = $_REQUEST['id'];

            $res =  mysqli_query($db,"SELECT * FROM team Where id =".$id);


            while($row = mysqli_fetch_array($res))
            {

                echo '<tr>
                 <td >' . $row['name'] .'</td>
                 <td >' . $row['team_town'] . '</td> 
           <td >' . $row['team_manager']. '</td>
           
              <td >' . $row['team_coach'] . '</td> 
              <td >' . $row['phone_number'] . '</td> 
              <td >' . $row['jersy_color1'] . ' & '. $row['jersy_color2'] . '</td> 
           <td >' . $row['home_ground'] . '</td> 
            
          </tr>';
            }


            ?>

        </table>
       

        
<style>
    div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
</style>
</div>
</div>
</div>

</div>