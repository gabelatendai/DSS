
<?php  include '../header.php'; ?>
	<title>Live chat </title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>

</br>
 <div class="col-md-12 ">
  <h2 align="center" style="color:green" >Get involved in the local league games now, and enjoy the sport!!</h2>
</div>

<?php

function loginForm() {
    echo '
	<div class="form-group">
	<th class="nav" align="center"><img src="images/logo.jpg" width="200" height="150"></th>
	</div>
	</br></br><a href="../index.php">Goto Home Page</a>
		<div id="loginform">
			<form action="index.php" method="post">
			<h1>Live Chat</h1><hr/>
				<label for="name">Please Enter Your Name To Continue</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "log.html", 'a' );
        fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat.</i><br></div>" );
        fclose ( $cb );
    } else {
    	 print ("<script>window.alert('Please Enter a Name')</script>");
       // echo '<span class="error">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat.</i><br></div>" );
    fclose ( $cb );
    session_destroy ();
    header ( "Location: ../index.php" );
}
?>



<?php
	if (! isset ( $_SESSION ['name'] )) {
	loginForm ();
	} else {
?>
<div id="wrapper">
	<div id="menu">
	<h1>Live Chat!</h1><hr/>
		<p class="welcome"><b>HI - <a><?php echo $_SESSION['name']; ?></a></b></p>
		<p class="logout"><a id="exit" href="#" class="btn btn-default">Exit Live Chat</a></p>
	<div style="clear: both"></div>
	</div>
	<div id="chatbox">
	<?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
		$handle = fopen ( "log.html", "r" );
		$contents = fread ( $handle, filesize ( "log.html" ) );
		fclose ( $handle );

		echo $contents;
		}
	?>
	</div>
<form name="message" action="">
	<input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Create A Message" />
	<input name="submitmsg" class="btn btn-default" type="submit" id="submitmsg" value="Send" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are You Sure You Want To Leave This Page?");
        if(exit==true){window.location = 'index.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script>
<?php
}
?>
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "../footer.php";
?> 
</div></div>
</div>
</html>
