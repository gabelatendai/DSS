

<?php
include 'rb.php';
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

if (isset($_POST['record'])) {
   
    $fixture_id = $fixture;
    $away_yellow_id = $_POST['away_yellow_id'];
    $home_yellow_id = $_POST['home_yellow_id'];
      $away_red_id = $_POST['away_red_id'];
    $home_red_id = $_POST['home_red_id'];

    $warnings = R::dispense('warnings');
    $warnings->away_yellow_id = $away_yellow_id;
    $warnings->home_yellow_id = $home_yellow_id;
    $warnings->away_red_id = $away_red_id;
    $warnings->home_red_id = $home_red_id;
    $warnings->fixture_id = $fixture_id;

    R::store($warnings);

   // $message = "information upadated";
    echo '<img src="img/492.png" /> &nbsp;! score updated successfully';
    echo '<meta content="2;warnings.php" http-equiv="refresh" />';
    if (away_red_id == 1 ){

      echo "player is going to miss 3 matches";
    }
    elseif (home_red_id == 1 ){
       echo "player is going to miss 3 matches";
    }
}

?>
  <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color:green">Record Quetioned Players</div>
            <div class="panel-body">
                <form method="post" action="warnings.php">
                    <div class="form-group col-md-6">
                        <label><?php echo $fixture->home ?></label>
                       
                    </div>
                    <div class=" form-group col-md-6">
                        <label><?php echo $fixture->away ?></label>
                       
                    </div>
                    <div class=" form-group col-md-6">
                        <label>yellow card</label><img src=img/yellow.jpg width="30" height="40">
                        <select name="home_yellow_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>
                            <?php
                           $init = R::findAll('player', 'team_name = ?', [$team1]);
                               
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <div class=" form-group col-md-6 ">
                        <label>yellow card</label><img src=img/yellow.jpg width="30" height="40">
                        <select name="away_yellow_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>
                            <?php
                           $init = R::findAll('player', 'team_name = ?', [$team2]);
                               
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>
                         
                    </div> <div class=" form-group col-md-6">
                        <label>Red card</label><img src=img/red.jpg width="30" height="40">
                        <select name="home_red_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                           
                           $init = R::findAll('player', 'team_name = ?', [$team1]);
                               
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <div class=" form-group col-md-6">
                        <label>Red card</label><img src=img/red.jpg width="30" height="40">
                        <select name="away_red_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                           
                           $init = R::findAll('player', 'team_name = ?', [$team2]);
                                
                                foreach($init as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <div class=" form-group col-md-6">
                    <input type="hidden" name="fixture" value="<?php echo $_REQUEST['fixture'] ?>">
                    <span><?php echo @$message; ?></span>
                    <input type="submit" name="record" class="btn btn-primary pull-right" value="Record"style="background-color:green"/>
                    <INPUT type="button" value="Back" class="btn btn-primary" onClick="window.location.href='results.php'"  style="background-color:green"/>
                    </div> </form>
            </div>
        </div>
    </div>