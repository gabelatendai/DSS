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

<!-- Navigation -->
<?php  include 'header.php';?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <br />
            <ol class="breadcrumb">
                <li class="active"><a href="index.php">Home</a>
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

                <a href="users.php" class="list-group-item">Users</a>
            </div>
            <hr>
            <?php// include ('slider.php'); ?>
        </div>

        <div class="col-sm-9">
            <div class="jumbotron">
                <h2 class="text-center"><b>Add User</b> </h2>
                <div class="well">
<?php

//include ('rb.php');
        R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB

//by gabriel 3 / 9 /2017, 04:28
if (isset($_POST['save'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $teamid = $_POST['team'];
    $init = R::findOne('user', 'email = ? ', [$email]);

    if ($init == null) {

        $user = R::dispense('user');
        $user->email = $email;
        $user->password = $password;
        $user->role = $_POST['role'];
        $user->team = $teamid;
        $id = R::store($user);
        $message = "new user saved";
    } else
        $message = "user already exists";
}
?>

    <form method="post" action="reg.php">
        <div class="form-group form-item">
            <input type="email" name="email" class="form-control" placeholder=" Email Address" autofocus required>
        </div>
        <div class="form-group form-item">
            <input type="password" name="password" class="form-control" placeholder=" PASSWORD">
        </div>
        <div class="form-group form-item">
	        <select name="role" class="form-control" required>
		        <option value="">Select role</option>
		        <option value="refree">Refree</option>
		        <option value="registrar">Registrar</option>
	        </select>
        </div>
        <div class="form-group form-item">
            <select name="team" id="team" class="form-control">
                <option value="">Select Team</option>
                <?php  $myteam = R::findAll('team');
                foreach($myteam as $myteams){
                    ?>
                    <option value="<?php echo $myteams->id; ?>"> <?php echo $myteams->name;?></option>
                <?php }?>
            </select>
        </div>
        <span><?php echo @$message; ?></span>
        <div class="button-panel">

            <input type="submit" name="save" class="button" value="SAVE USER" style="background-color:green" class="btn btn-primary pull-right"/>
            <INPUT type="button" value="Cancel" class="button" class="btn btn-primary pull-left" onClick="window.location.href='view_users.php'"  style="background-color:green"/>
        </div>
    </form>
    <!-- <p style="color:#FFFFFF">Already have an account? Sign in <a href="login.php" style="color:red">here</a></p>-->
   </div>
            </div>
        </div>
    </div>

</div>