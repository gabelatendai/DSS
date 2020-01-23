<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<?php
include "header.php";


R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB


if (isset($_POST['save'])) {
$_SESSION['last_login_timestamp'] = time();

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $activity="Log in";
            $Time=time();
/*
----------------------------    gabela ---------------------------------------------*/

    $init = R::findOne('user', 'email = ? AND password = ?', [$email, $password]);



    if ($init == null) {
     //   $message = "invalid details";
        print ("<script>window.alert('invalid details')</script>");
			   	   print ("<script>window.location.assign('login.php')</script>");


    } else

        $_SESSION['role'] = $init->role;
        $_SESSION['email'] = $init->email;
   		$_SESSION['sess_user']=$email;
		$_SESSION['team'] = $init->team;

 
   // $fixture_id = $fixture;
    $email = $_POST['email'];
    $act =  $activity;
     $Time=time();

    $audit = R::dispense('audit');
    $audit->user_email = $email;
   // $audit->home_scorer_id = $home_scorer_id;
    $audit->activity = $act;
    $audit->time_used = $Time;
    R::store($audit);
		   //print ("<script>window.alert('login successfull')</script");<div class="alert alert-warning alert-dismissible" role="alert">
	echo '<div class="alert alert-success" role="alert" style="background-color:transparent">...<h2  style="color:white"> <img src="img/492.png" /><img src="../images/4.jpg" width="200"  height="150" />
!login successfull ' .  $_SESSION['role'].  ' </h2></div>';

		echo '  <h2 align="center">
          <meta content="2;index.php" http-equiv="refresh" />
        </h2> ';

		//  print ("<script>window.location.assign('index.php')</script");
					 		}
?>
<div class="form-wrapper">

       <h3 style="color:#FFFFFF" align="center">Login Here</h3>
            <form method="post" action="login.php">
                <div class="form-group form-item" >
                    <input type="email" name="email" class="form-control "  placeholder=" Email Address"  AUTOCOMPLETE=OFF autofocus required>
                </div>
                <div class="form-group form-item">
                    <input type="password" name="password" class="form-control" placeholder="PASSWORD">
                </div>

 <div class="button-panel">
                <span><?php echo @$message; ?></span>
                <input type="submit" name="save" class="button" value="LOG IN" style="background-color:green"/>
				<INPUT type="button" value="Cancel" class="button" class="btn btn-primary pull-left" onClick="window.location.href='index.php'"  style="background-color:green"/>
				        </div>

            </form>
</div>
    </div>
</header></div> 
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>
</html>