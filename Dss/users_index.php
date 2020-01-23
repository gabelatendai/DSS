<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/25/2017
 * Time: 12:13 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Digital Soccer System</title>

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
                    <li class="active"><a href="users_index.php">Home</a>
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
				<a href="res.php" class="list-group-item">Latest Results</a>

                        <a href="reg.php" class="list-group-item">Add Users</a>
                        <a href="standings.php" class="list-group-item">Log Standing</a>
                        <a href="users.php" class="list-group-item">All Users</a>
				</div>
				<hr>
				<?php include ('slider.php'); ?>
            </div>

            <div class="col-sm-9">
                <div class="jumbotron">
                    <div class="page-header">
                        <h1 style="color:black">Digital Soccer System </h1>
                    </div>

            <?php
            if(isset($_SESSION['sess_user'])){

            ?>


            <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>
                <br>

                            <div class="mainContent customDiv "><strong >ABOUT ZIFA MashEast Division 1 League</strong><br></br>
                                <p >Zimbabwe Football Association (ZIFA)  is the football governing body in MashonaLand East Province.
                                    Which controls all football activities in MashonaLand East Province.
                                    It controls Division One League which consist of 16 teams. Zifa does registration
                                    of clubs, scheduling of matches and also recording of match statistics. </p><br></br>
                                <img  src="../images/child.jpg" width="200"  height="150" />
                                <img src="../images/6.jpg" width="200"  height="150" /><img src="../images/7.jpg" width="200"  height="150" /></div>

                        </div></div></div>
                <div class="col-md-12 ">
                    <h2 align="center" style="color:white" >Get involved in the local league games now, and enjoy the sport!!</h2>
                </div>
                </br></br></br></br></br></br></br>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class=" icon-file-text"></i> Books
                        <span class="pull-right text-muted small"><em>gabriel musodza </em>
                                    </span>
                    </a>



            <style>
                .mainContent {
                    text-align:center;
                    font-size:18px;
                }

                ul{ list-style:none;}
                ul li a{ color:#000000}
                nav ul li a{ color:#000000}

            </style>


		</div>

        </div>
        <!-- /.row -->

        <hr>

<?php include ('footer.php'); ?>