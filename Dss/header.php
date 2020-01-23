<?php
include 'rb.php';
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width">
<link href="css/bootstrap.min.css" rel="stylesheet"  />
<link href="css/DT_bootstrap.css" rel="stylesheet"  />
<link href="css/PaymentStyle.css" rel="stylesheet"  />
<link rel="stylesheet" href="css/nivo-slider.css"s type="text/css" media="screen" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/chatStyle.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/index.png" type="image/jpg">
<script  src="js/sliding.form.js" ></script>
<script  src="js/functions.js" ></script>
<script  src="js/bootstrap.min.js" ></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
    <title>Digital Soccer System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index"><img  src="../images/3.png" height=" 80" width="130" ></a><?php
if(isset($_SESSION['sess_user'])){
  
   ?>		  			
   Signed in as <?=$_SESSION['sess_user']; }?></p>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav  navbar-right">
                <li><a href="index"><i><b>Home</a></b></i></li>
				<li><a   href="info"><i><b>Teams</b></i></a></li>
               <li><a href="fixture"><i><b>Matches</b></i></a></li>
                <li><a href="results"><i><b>Results</b></i></a></li>
                <li><a href="log"><i><b>Log Standings</b></i></a></li>
                <!--<li><a href="contact_us"><i><b>Contact Us</b></i></a></li>-->
				<?php
					  if (@$_SESSION['role'] == 'registrar'){
 		?>
						<li><a href="teams"><i><b>Add Players</i></b></a></li>

                        <?php
						
                    }
					 		
	
      if (@$_SESSION['role'] == 'admin'){
 		?><li><a href="users"><i><b>Users</b></i></a>
                   <!-- <ul class="dropdown-menu">
                        <li><a href="view_users.php"><i><b>Users</i></b></a></li>
                        <li><a href="register.php"><i><b>Add Users</i></b></a></li>
                    </ul></li>-->
          </li>
          <li><a href="view_players"><i><b>All Players</b></i></a></li>


          <?php
						
                    }
                if (isset($_SESSION['role'])) {
                   ?>
                    <li><a href="logout"><i><b>Log out</b></i></a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="login"><i><b>Log in</b></a></i></li>
                    <?php
             
            
                    }
                if (isset($_SESSION['role'])) {
                   ?>
                    <li><a href="chat_index"><i><b>Start Chat</b></i></a></li>
                    <?php
                } else {
                    ?>
                   <li><a href="chat_name"><i><b>Live Chat</b></i></a></li>
                    <?php
                }
                ?>
                <!--
		 <form  method="post" action="search.php?go" class="navbar-form navbar-left" id="searchform"> 
		  <div class="form-group">
      <input  type="text" name="fullname" class="form-control" placeholder="search"> 
	  </div>
      <input  type="submit" name="submit" value="Search" class="form-control" > 
    </form> -->
           
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?php

$conn=mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

//session_start();
if (isset($_SESSION['sess_user'])){
$user_id=$_SESSION['sess_user'];
$result=mysqli_query($conn,"select * from user where email='$user_id'")or die("Connection  failed");
$row=mysqli_fetch_array($result);

$FirstName=$row['role'];
$LastName=$row['email'];
?>
<div style="float:right; margin-right:24px;" ; class="profile">
  <?php
echo '<img src="img/admin.png" width="60" height="60"><font color="green"> &nbsp;<b>'.$FirstName." ".$LastName .' </b></font>';
} if (isset($_SESSION['role'])) {
                    echo '<p  style="color:red"><a href="account.php?id='.$row['id']. '">Profile</a>'
  ?>
 <a href="logout.php" class="logout">Logout</a></p>
<?php
if((time() -@$_SESSION['last_login_timestamp']) > 500)
{
    print ("<script>window.location.assign('logout.php')</script>");

}
else
{
@$_SESSION['last_login_timestamp'] = time();
}
?>

  <style>
  .profile{ border:solid; border-color:#003300 ; width:150px; height:100px;}
  
  </style> </br> </br> </br>
          <h4 style="color:#FFFFFF">Registerd Teams</h4>

  <marquee behavior="scroll" direction="up"  height="300" scrollamount="1" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);" style="color:#CCCCCC"><h4>
            <?php
							$team=mysqli_query($conn,"select * from team ORDER BY name ASC ");
							$gets=mysqli_fetch_array($team);
							$counts=mysqli_num_rows($team);
							$num=1;
							echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['name'].'<br/>';
							$num=2;

							while($gets=mysqli_fetch_array($team)){

							echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['name'].'<br/>';
							$num++;
							}
							}
							?>
       </h4>     </marquee>
			
</div>
<link href="css/bootstrap.min.css" rel="stylesheet"  />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script><br> 
<style >
body{ margin-top:100px; height:800px;}
.nav ul li a{ display:block; width:100px; height:100px;}

</style>

                    <div class="container">
<body background="img/d.jpg">


