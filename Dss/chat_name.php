
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
<div class="col-md-12 ">
  <h2 align="center" style="color:green" >Get involved in the local league games now, and enjoy the sport!!</h2>
</div>
<div class="container">


            <hr>

        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h1 class="text-center"><b>Live Chat</b> </h1>
                <div class="well">

	</br></br><a href="index.php">Goto Home Page</a>

		<div id="loginform">
			<form action="chat_index.php" method="post">
			<hr/>
				<label for="name">Please Enter Your Name To Continue</label>

				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" autofocus required/>
				 <div class="button-panel">
				<input type="submit"  class="button" name="enter" id="enter" value="Enter" style="background-color:green" />
				<INPUT type="button" value="Cancel" class="button" class="btn btn-primary pull-left" onClick="window.location.href='index.php'"  style="background-color:green"/>
				</div>
			</form>
		</div>
	</div>

	<style>
    div.pages a{ float:left; padding:5px; padding-left:19px; border:solid; border-color:#000000;}
</style>
</div>
</div>
</div>

</div>