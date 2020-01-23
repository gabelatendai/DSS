<?php
include "header.php";

//by gabriel


$db=mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
//mysql_select_db("football") or DIE('Database name is not available!');

$id = $_REQUEST['id'];


$result = mysql_query("SELECT * FROM player WHERE id=".$id);

while($row=mysql_fetch_array($db,$result)) {

    ?>

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color:green">Update Information For<?php
                echo $row['fname'] ?> </div>
            <div class="panel-body">
                <form method="post" action="updateproc.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>FIRST NAME</label>

                        <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ?>">
                    </div>
                    <label>SECOND NAME</label>

                    <input type="text" name="sname" class="form-control" value="<?php echo $row['sname'] ?>">
            </div>
            <div class="form-group">
                <label>POSITION</label>
                <input type="text" name="position" class="form-control" value="<?php echo $row['position'] ?>">
            </div>
            <div class="form-group">
                <label>PHONE NUMBER</label>
                <input type="text" name="cell_number" class="form-control" value="<?php echo $row['cell_number'] ?>">
            </div>
            <div class="form-group">
                <label>RESIDENTIAL ADDRESS</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>">
            </div>
            <div class="form-group">
                <label>DATE OF BIRTH</label>
                <input type="date" name="dob" class="form-control" value="<?php echo $row['dob'] ?>">
            </div>
            <div class="form-group">
                <label>NATIONAL ID NUMBER</label>
                <input type="text" name="id_number" class="form-control" value="<?php echo $row['id_number'] ?>">
            </div>
            <div class="form-group">
                <label>NATIONALITY</label>
                <input type="text" name="nationality" class="form-control" value="<?php echo $row['nationality'] ?>">
            </div>
            <div class="form-group">
                <label>Add Photo</label>
                <input name="image" type="file">

            </div>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control">
            <span><?php echo @$message; ?></span>
            <input type="submit" name="update" class="btn btn-primary pull-right" style="background-color:green" value="UPDATE PLAYER"/>
            <INPUT type="button" value="Cancel" class="btn btn-primary pull-left" onClick="window.location.href='info.php'"  style="background-color:green"/>
            </form>
        </div>
    </div>
    </div>
    <?php
}

include "footer.php";
?>