<?php
include 'header.php';
require('db.php');
?>
<head>

   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="css/login.css" />
</head>
<?php
	
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $pss = $_POST['pss'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$pss = stripslashes($pss);
		$pss = mysql_real_escape_string($pss);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `chat_users` WHERE username='$username' and pss='$pss'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: choose.php"); // Redirect user to index.php
            }else{
            	 //print ("<script>window.alert('invalid details')</script>");
			   	  
				echo "<div class='form'><h3>Username or password is incorrect.</h3>";
				 print ("<script>window.location.assign('login.php')</script>");
				}
    }else{
?>

<div class="form-wrapper  form-wrapper2 ">

       <h3 style="color:#FFFFFF" align="center">Start Live Chat</h3>
            <form method="post" action="" name="login">
                <div class="form-group form-item" >
                    <input type="number" name="username" class="form-control "  placeholder="registration number" autofocus required>
                </div>
                <div class="form-group form-item">
                    <input type="pss" name="pss" class="form-control" placeholder="PASSWORD" required>
                </div>

 <div class="button-panel">
                <span><?php echo @$message; ?></span>
                <input type="submit" name="submit" class="button" value="LOG IN" style="background-color:green"/>
				<INPUT type="button" value="Cancel" class="button" class="btn btn-primary pull-left" onClick="window.location.href='index.php'"  style="background-color:green"/>
				        </div>
 <div class="form-group form-item">
        
<h4 style="color:white" >Not registered yet? <a href='registration.php'>Register Here</a></h4>
<h4 style="color:white" align="right">Forgot Password? Click <a href="#" onClick="MyWindow=window.open('pwordrecover.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></h4>
<?php } ?></div>
    </div></div> 
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>
</html>
