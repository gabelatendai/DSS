<?php
include "header.php";
R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB
if (isset($_POST['save'])) {
    $name = $_POST['team'];
    $team_manager = $_POST['team_manager'];
    $team_town = $_POST['team_town'];
    $team_coach = $_POST['team_coach'];
    $phone_number = $_POST['phone_number'];
    $jersy_color1 = $_POST['jersy_color1'];
    $jersy_color2 = $_POST['jersy_color2'];
    $home_ground = $_POST['home_ground'];
    $init = R::findOne('team', ' name = ? ', [$name]);
    
    if ($init == null) {
        $team = R::dispense('team');
        $team->name = $name;
		$team->team_manager = $team_manager;
        $team->team_town = $team_town;
        $team->team_coach = $team_coach;
        $team->phone_number = $phone_number;
        $team->jersy_color1 = $jersy_color1;
        $team->jersy_color2 = $jersy_color2;
        $team->home_ground = $home_ground;
        $id = R::store($team);
        echo '<img src="img/492.png" /> &nbsp;! team information saved successfully';
        // print ("<script>window.alert('player information saved')</
        // print ("<script>window.location.assign('teaminfo.php')</script    } else {
		 		  

         print ("<script>window.alert('team already exists')</script>");
    }
}

 if(@$_SESSION['role']=="admin") 
{      
 ?>

  <h2  data-toggle="collapse" data-target="#demo"  align="center" style="color:#006600"><a href="#" style="color:#006600"><span class="glyphicon glyphicon-plus" style="color:#006600"></span>Add team</a></h2>
  <div id="demo" class="collapse">
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Add teams</div>
        <div class="panel-body">
            <form method="post" action="info.php">
                <div class="form-group">
                    <label>ENTER TEAM NAME</label>
                    <input type="text" name="team" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                    <label>TEAM TOWN</label>
                    <input type="text" name="team_town" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>CONTACT NUMBER</label>
                    <input type="text" name="phone_number" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>TEAM MANAGER</label>
                    <input type="text" name="team_manager" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label> TEAM COACH</label>
                    <input type="text" name="team_coach" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>HOME GROUND</label>
                    <input type="text" name="home_ground" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>TEAM COLOR 1</label>
                    <input type="text" name="jersy_color1" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label> TEAM COLOR 2</label>
                    <input type="text" name="jersy_color2" class="form-control" required="required">
                </div>
				
                <span><?php echo @$message; ?></span>
                <input type="submit"class="btn btn-primary pull-left" value="Cancel" style="background-color:green" onClick="window.location.href='info.php'" />

                <input type="submit" name="save" class="btn btn-primary pull-right" value="SAVE TEAM" style="background-color:green"/>
            </form>
        </div>
    </div>
</div>
  </div>
<?php } ?>
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Current teams</div>
        <ul class="list-group">
            <?php
            $teams = R::findAll('team');

            foreach ($teams as $team) {
                ?>
                <li class="list-group-item"><?php echo $team->name ?> 
                    <?php
                        
                    if (@$_SESSION['role'] == 'admin') {

                        ?>	<div class="input-group-btn">
<button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret pull-right"></span></button>
<ul class="dropdown-menu dropdown-menu-right">
          <li><a class="pull-right" role="menuitem" tabindex="-1" href="teaminformation.php?id=<?php echo $team->id ?>"><b>Team Info</b></a></li>
         
    <li><a role="menuitem" tabindex="-1" class="pull-right" href="teaminfo.php?team=<?php echo $team->id ?>"><b>View Players</b></a></li>
     <li><a class="pull-right" role="menuitem" tabindex="-1" href="addstaff.php?team=<?php echo $team->id ?>"><b> <p>Add Staff/Players</p></b></a></li>
 
          <li role="separator" class="divider"></li>
        </ul>

                    <?php
                 }else {
                    ?>
                    <div class="input-group-btn">
<button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret pull-right"></span></button>
<ul class="dropdown-menu dropdown-menu-right">
          <li><a class="pull-right" role="menuitem" tabindex="-1" href="teaminformation.php?id=<?php echo $team->id ?>"><b>Team Info</b></a></li>
    <li><a role="menuitem" tabindex="-1" class="pull-right" href="teaminfo.php?team=<?php echo $team->id ?>"><b>View Players</b></a></li>
    
          <li role="separator" class="divider"></li>
        </ul>
            </li>
                    <?php
                
				}
              
            }
			
            ?></ul>
							<INPUT type="button" value="Back" class="btn btn-primary pull-left" onClick="window.location.href='index.php'"  style="background-color:green"/>

        
    </div></div>

</br></br></br></br></br></br></br>
</br></br></br></br></br></br></br>
</br></br></br></br></br></br></br>

<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
