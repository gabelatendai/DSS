


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

<?php include 'header.php';?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <br />
            <ol class="breadcrumb">
                <li ><a href="index.php">Home</a>
                </li> <li class="active"><a href="users.php">Users</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <a href="users.php"  class="list-group-item">Users</a>
                <a href="reg.php" class="list-group-item">Add Users</a>
            </div>
            <hr>

        </div>

        <div class="col-sm-9">
            <div class="jumbotron">
                <h2 class="text-center"><b>All Users</b> </h2>
                <div class="well">
<?php
$db=      mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
                      //Select the database
                 //     mysql_select_db("football") or DIE('Database name is not available!');


                      ?>
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
            $get_total = mysqli_num_rows(mysqli_query($db,"SELECT * FROM user "));
            $total = ceil($get_total/$limit);
            if(!isset($p) || $p <= 0)
            {
                $offset = 0;
            }else {
                $offset = ceil($p - 1 ) * $limit;
            }

            $res =  mysqli_query($db,"SELECT * FROM user LIMIT $offset,$limit ");


            while($row = mysqli_fetch_array($res))
            {

                echo '<tr>
                 <td >' . $row['id'] .'</td>
           <td >' . $row['email']. '</td>
		   <td >' . $row['role'] . '</td> 
		      <td >' . $row['team'] . '</td> 
		   <td><a href="edit.php?id='.$row['id']. '"><img  src="img/index upadte.jpg" width="40" height="40"></a><a href="delete.php?id='.$row['id'].'"><img  src="img/index.jpg" width="40" height="40"></a></td>

          </tr>';
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
    div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;
    }
</style>
</div>
</div>
</div>

</div>