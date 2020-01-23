<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/28/2017
 * Time: 10:11 AM
 */

/**
 * developed by gabela.
 * Date: 08/06/2017
 */
include "header.php";
//include 'config.php';

R::setup('mysql:host=localhost;dbname=football', 'root', '');

if (isset($_GET['fixture'])) {
    $fixture = R::load('fixture', $_GET['fixture']);


    if (isset($_POST['update'])) {
        $goals = 1;
        $fixture_id= $fixture;
        $scorer_id = $_POST['scorer_id'];
       // $fixture_id = $_POST['fixture_id'];
       // $init = R::findOne('scores', 'scorer_id = ? ', [$scorer_id]);


            $scores = R::dispense('scores');
            $scores->scorer_id = $scorer_id;
           $scores->fixture_id = $fixture_id;
            $scores->goals = $goals;
            R::store($scores);
            $message = "information upadated";
        }
}
    // into scores()
   // mysql_query (" INSERT INTO scores ( id, player_home , fixture, goal) Values (NULL '$player_home' , '$fixture','$goal')");
 //ON DUPLICATE KEY UPDATE goal = goal + 1");
//$player_home = $_POST['player_home'];
  //  $goal = $score + $_POST['goal'];
    //mysql_query("UPDATE scores SET goal =$goal + 1  WHERE player_home = '$player_home'");





    //  print ("<script>window.alert('successfuly updated')
    //  print ("<script>window.location.assign('results.php')
?>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading " style="background-color:green">Update Scores for the match </div>
            <div class="panel-body">
                <form method="post" action="">

                    <?php   /*  echo $scorer->id; ?> ">Select player</option>
                            <?php
							$id = $_GET['fixture'];
                              //  $sql = "SELECT * FROM fixture WHERE id =". $id ;


                               $results = $db-> query ($sql);
                                if ($results->num_rows)
                                {
                                while($row = $results ->fetch_object()) {
                                    $team = $db->query("SELECT * FROM fixture WHERE home = {$row->home}");
                                    $team = $team->fetch_object();
                            $player = R::findAll('player' );
                            foreach($player as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>*/
                    ?>
                    <div class=" form-group col-md-6">

                        <select name="scorer_id" id="player" class="form-control">
                            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

                            <?php
                            $player = R::findAll('player');
                            foreach($player as $scorer){
                                ?>
                                <option value="<?php echo $scorer->id; ?>"> <?php echo $scorer->fname . '  '. $scorer->sname ; ?></option>
                            <?php }?>
                        </select>

                    </div>
                    <input type="hidden" name="fixture" value="<?php echo $_REQUEST['fixture'] ?>">
                    <span><?php echo @$message; ?></span>
                    <input type="submit" name="update" class="btn btn-primary pull-right" value="Update Score" onClick="window.location.href='results.php'"  style="background-color:green"/>
                    <INPUT type="button" value="Back" class="btn btn-primary pull-left" onClick="window.location.href='results.php'"  style="background-color:green"/>

                </form>
            </div>
        </div>
        <?php
        /* $date=date_create("2013-03-15");
         date_add($date,date_interval_create_from_date_string("7 days"));
         echo date_format($date,"Y-m-d");
       */  ?>

    </div> <script type="text/javascript"><!--
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
    --></script>
<?php
include "footer.php";
?>