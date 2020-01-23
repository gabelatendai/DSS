<?php
function loginForm() {
    echo '
	<div class="form-group">
	<th class="nav" align="center"><img src="images/logo.jpg" width="200" height="150"></th>
	</div>
	</br></br><a href="index.php">Goto Home Page</a>
		<div id="loginform">
			<form action="chat_index.php" method="post">
			<h1>Live Chat</h1><hr/>
				<label for="name">Please Enter Your Name To Continue</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />
			</form>
		</div>
	</div>
   ';
}
?>