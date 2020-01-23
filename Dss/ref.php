<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 10/15/2017
 * Time: 3:05 AM
 */

include "header.php";
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

R::setup('mysql:host=localhost;dbname=football', 'root', '');
if (isset($_GET['fixture'])) {
    $fixture = R::load('fixture', $_GET['fixture']);
    $team2 = $fixture->away;
    $team1 = $fixture->home;
}
if (isset($_POST['update'])) {

    $fixture_id = $fixture;
    $refree = $_POST['refree'];
    $assist_1 = $_POST['assist_1'];
    $assist_2 = $_POST['assist_2'];


    $match_details = R::dispense('match_details');
    $match_details->refree = $refree;
    $match_details->assist_1 = $assist_1;
    $match_details->assist_2 = $assist_2;
    $match_details->fixture_id = $fixture_id;
    R::store($match_details);


    //$message = "score updated";
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
</div>
<div class=" form-group col-md-6">
    <label><?php echo $fixture->away ?></label>
</div>
<div class=" form-group col-md-6">
    <label>Refree</label>
    <select name="refree" id="ref" class="form-control">
        <option value="<? echo $scorer->id  ; ?> ">Select Ref</option>

        <?php
        // $init = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2 . " ' AND '" .$team1 ."'");
        //$query = mysql_query("SELECT * FROM player WHERE team_name = '" .$team2."' AND team_name = '" .$team1 ."'");
        //$init = "SELECT * FROM player  ";
        //$init = R::findAll('player', 'team_name = ? AND team_name = ?', [$team2, $team1]);
        $init = R::findAll('refrees');

        foreach($init as $scorer){
            ?>
            <option value="<?php echo $scorer->fullname; ?>"> <?php echo $scorer->fullname ; ?></option>
        <?php }?>
    </select>

</div>
<div class=" form-group col-md-6">
    <label>Assistant Refree</label>
    <select name="assist_1" id="player" class="form-control">
        <option value="<? echo $scorer->id  ; ?> ">Select player</option>

        <?php

        $init = R::findAll('refrees');
        foreach($init as $scorer){
            ?>
            <option value="<?php echo $scorer->fullname; ?>"> <?php echo $scorer->fullname ; ?></option>
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
        <select name="assist_2" id="player" class="form-control">
            <option value="<? echo $scorer->id  ; ?> ">Select player</option>

            <?php

            $init = R::findAll('refrees');
                     foreach($init as $scorer){
                ?>
                <option value="<?php echo $scorer->fullname; ?>"> <?php echo $scorer->fullname ;?></option>
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
</div>