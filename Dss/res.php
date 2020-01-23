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

    <title>VNHS Online Public Access Catalog</title>

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

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="users_index.php">Digital Soccer System</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="users_index.php">Home</a>
                </li>
                <!---         <li>
                           <a href="about.php">About</a>
                       </li>
                   -->
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <br />
            <ol class="breadcrumb">
                <li class="active"><a href="users_index.php">Users</a>
                </li><li class="active"><a href="reg.php">Add User</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <a href="reg.php" class="list-group-item">Add Users</a>
                <a href="standings.php" class="list-group-item">Log Standing</a>
                <a href="users.php" class="list-group-item">Intitutional Values</a>
            </div>
            <hr>
            <?php include ('slider.php'); ?>
        </div>

        <div class="col-sm-9">
            <div class="jumbotron">
                <h2 class="text-center"><b>Register User</b> </h2>
                <div class="well">
                    <div class="col-md-10 col-md-offset-1"><br></br>
                        <div><h3> <a href="results.php" style="color:white">Latest League Results<span class="badge">0</span></a></h3></div>
                        <ul class="list-group">
                            <?php
                            include 'rb.php';
                            $fixtures = R::findAll('fixture' ,'status = "P"');
                            foreach ($fixtures as $fixture) {
                            ?>
                            <li class="list-group-item"><?php
                                echo ' <a href="score_info.php?id='.$fixture->id. '">' .   $fixture->home . "<strong> " . $fixture->homescore . "  :  " . $fixture->awayscore . " </strong>" . $fixture->away .'</a>' ;?>
                                <?php



                                }
                                ?>
                            </li>               </ul>

                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <?php include ('footer.php'); ?>