<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 9/30/2017
 * Time: 2:42 AM
 */

include "header.php";
include "config.php";


@$id = $_REQUEST['id'];

$result = mysql_query("SELECT * FROM team WHERE id=".$id);


while($row=mysql_fetch_array($result))
{
?>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Add teams</div>
        <div class="panel-body">
            <form method="post" action="login_attempt.php">
                <div class="form-group">
                    <label>ENTER TEAM NAME</label>
                    <input type="text"value="<?php echo $row['name']?> "  name="team" class="form-control">
                </div>

                <span><?php echo @$message; ?></span>
                <input type="submit"class="btn btn-primary pull-left" value="Cancel" style="background-color:green" />

                <input type="submit" name="save" class="btn btn-primary pull-right" value="SAVE TEAM" style="background-color:green"/>
            </form>
        </div>
    </div>
</div>
</div>
<?php }


?>