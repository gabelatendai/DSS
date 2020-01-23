<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/30/2017
 * Time: 3:00 PM
 */

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
                <div class="panel-heading"  style="color:black">All Players</div>
                <div class="well">
                    <?php
                    $hostname = "localhost";
                    $dbusername = "root";
                    $dbname = "football";
                    $dbpassword = "";
                    $db = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                    if (!$db) {
                        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
                    }

                    ?>

                    <table class="table table-condensed" width="300" border="1" cellpadding="1" cellspacing="1" align="center">
                        <tr>
                            <th><b>Fullname</th>
                            <th><b>Position</b></th>
                            <th><b>ID_Number</th>
                            <th><b>Address</b></th>
                            <th><b>Cell Number</b></th>
                            <th><b>DOB</b></th>
                            <th><b>Age</b></th>


                        </tr>

                        <?php
                        $id = $_REQUEST['id'];

                        // table_name;
                        $sql = "SELECT SUM(goals) FROM player WHERE id = $id" ;
                        $results = $db-> query ($sql);
                        if ($results->num_rows)
                        {
                            while($row = $results ->fetch_object())
                            {
                                $team = $db-> query ("SELECT * FROM scores WHERE id = {$row -> id}");
                                $team = $team-> fetch_object();

                                $age = date('Y-m-d H:i:s') -  $row -> dob ;

                                echo'<tr>';
                                echo '<td >' . $row->fname . '   '. $row->sname .' </td>';
                                echo '<td >'. $row -> position. '</td>';
                                echo '<td >' .$row -> id_number .' </td>';
                                echo '<td >' .$row -> address . '</td>';
                                echo '<td >' .$row -> cell_number .'  </td>';
                                echo	' <td >'.$row -> dob .' </td>';
                                echo '<td >' . $age . '   </td>';
                                // echo '	<td>'. $team -> name . '</td> ';

                                echo'	</tr>';

                            }
                        }else {
                            echo 'no results';
                        }


                        ?>

                    </table>

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