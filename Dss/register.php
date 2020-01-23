<?php
include "header.php";

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
        $user->role = 'regular';
		$user->team = $teamid;
        $id = R::store($user);
        $message = "new user saved";
    } else{
        $message = "user already exists";
    }

}
?>
<div class="form-wrapper">
        <h3 style=" color:#FFFFFF" align="center">AddUser</h3>
            <form method="post" action="register.php">
                <div class="form-group form-item">
                    <input type="email" name="email" class="form-control" placeholder=" Email Address" autofocus required>
                </div>
                <div class="form-group form-item">
                    <input type="password" name="password" class="form-control" placeholder=" PASSWORD">
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
</div>    </div>


