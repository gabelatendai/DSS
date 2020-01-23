<?php
/**
 * developed by gabela.
 * Date: 08/06/2017
 */
include "header.php";

R::setup('mysql:host=localhost;dbname=football', 'root', '');

if (isset($_GET['fixture'])) 
{
    $fixture = R::load('fixture', $_GET['fixture']);
   $team2 = $fixture->away;
   $team1 = $fixture->home;
  //echo '<h1>' .$team2 .'<br>';
  //  echo $team1 . '</h1>';
  //  $activity="Update Score";
}

if (isset($_POST['update'])) {

    $fixture = R::load('fixture', $_POST['fixture']);
    $date = date('Y-m-d H:i:s');
    $fixture->homescore = $_POST['home'];
    $fixture->awayscore = $_POST['away'];
    $fixture->status = 'P';
    $fixture-> time_updated_score = $date;
    R::store($fixture);
    //$message = "score updated";

    $goals = 1;
    $fixture_id = $fixture;
    $goal_id = $_POST['goal_id'];
   
    $scores = R::dispense('scores');
    $scores->goal_id = $goal_id;
    $scores->fixture_id = $fixture_id;
    $scores->goals = $goals;
    R::store($scores);

  $fixture_id = $fixture;
  @$warning = $_POST['warning'];
    $player_idy = $_POST['player_idy'];
    

    $warnings = R::dispense('warnings');
    $warnings->player_idy = $player_idy;
    $warnings->warning =  $warning;
     $warnings->fixture_id = $fixture_id;
    R::store($warnings);
   // $message = "information upadated";
    echo '<img src="img/492.png" /> &nbsp;! score updated successfully';
    echo '<meta content="2;results.php" http-equiv="refresh" />';
}


?>


    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color:green">Update Scores for the match</div>
            <div class="panel-body">
                <form method="post" action="updatescore.php">
                <table>
                    <div class="form-group col-md-6">
                        <label><?php echo $fixture->home ?></label>
                        <input type="text" name="home" value="<?php echo $fixture->homescore ?>" class="form-control" onkeypress="filterDigits(event)">
                    </div>
                    <div class=" form-group col-md-6">
                        <label><?php echo $fixture->away ?></label>
                        <input type="text" name="away" value="<?php echo $fixture->awayscore ?>" class="form-control" onkeypress="filterDigits(event)">
                    </div>
                    <div class=" form-group col-md-6">
                        <label>Goal Scorer</label>
                        <select name="goal_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                           // $init = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2 . " ' AND '" .$team1 ."'");
                    //$query = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2."' AND team_name = '" .$team1 ."'");
   						//$init = "SELECT * FROM player  ";
                             //$init = R::findAll('player', 'team_name = ? AND team_name = ?', [$team2, $team1]);
                           $init = R::findAll('player', 'team_name = ?', [$team1]);
                                 //$init = R::findAll('player');
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <div class=" form-group col-md-6">
                        <label>Goal Scorer</label>
                        <select name="goal_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                           // $init = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2 . " ' AND '" .$team1 ."'");
                    //$query = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2."' AND team_name = '" .$team1 ."'");
                        //$init = "SELECT * FROM player  ";
                             //$init = R::findAll('player', 'team_name = ? AND team_name = ?', [$team2, $team1]);
                           $init = R::findAll('player', 'team_name = ?', [$team2]);
                                 //$init = R::findAll('player');
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <tr>
                   <div class=" form-group col-md-6">
<input type="radio" name="warning" value="yellow" > <img src=img/yellow.jpg width="30" height="40">Yellow 
  <input type="radio" name="warning" value="red"><img src=img/red.jpg width="30" height="40"> Red
  </div>

    
                    <div class=" form-group col-md-6">

                        <label>Select player</label>
                        <select name="player_idy" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                           // $init = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2 . " ' AND '" .$team1 ."'");
                    //$query = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2."' AND team_name = '" .$team1 ."'");
                        //$init = "SELECT * FROM player  ";
                             //$init = R::findAll('player', 'team_name = ? AND team_name = ?', [$team2, $team1]);
                       // $init= ("Select * FROM player WHERE team_name IN ". $team1 . "  " . , . $team2 );
                          $init = R::findAll('player');
                                 //$init = R::findAll('player');
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
				</tr>
                    <div class=" form-group col-md-6">
                    <input type="hidden" name="fixture" value="<?php echo $_REQUEST['fixture'] ?>">
                    <span><?php echo @$message; ?></span>
                    <input type="submit" name="update" class="btn btn-primary pull-right" value="Record Statistics"style="background-color:green"/>
                    <INPUT type="button" value="Back" class="btn btn-primary" onClick="window.location.href='results.php'"  style="background-color:green"/>
                    </div> </table></form>
            </div>
        </div>
    </div>
    </div> <script type="text/javascript">
            function filterDigits(eventInstance) {
                eventInstance = eventInstance || window.event;
                    key = eventInstance.keyCode || eventInstance.which;
                if ((47 < key) && (key < 58) || key == 8) {
                    return true;
                } else {
                        if (eventInstance.preventDefault) 
                             eventInstance.preventDefault();
                        eventInstance.returnValue = false;
                        return false;
                    } //if
            } //filterDigits
        </script>
<?php
include "footer.php";
?>