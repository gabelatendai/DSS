<?php
include "header.php";

$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB
$id = @$_GET['team'];

if(isset($_SESSION['sess_user'])){
  
   ?>		  			

   
   <h4 align="center">welcome <?=$_SESSION['sess_user']; }?></h4>



<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Add Players for <?php
		echo R::load('team', $id)->name; ?> </div>
       <div class="panel-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>FIRST NAME</label>
                    <input type="text" name="fname" class="form-control" required="required">
                </div>
				 <div class="form-group">
                    <label>LAST NAME</label>
                    <input type="text" name="sname" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>POSITION</label>
                    <input type="text" name="position" class="form-control" required="required">
                </div>
				  <div class="form-group">
                    <label>PHONE NUMBER</label>
                    <input type="text" name="cell_number"  onkeypress='return numbersOnly(this,event,false,true);' class="form-control" required="required">
                </div>
				  <div class="form-group">
                    <label>RESIDENTIAL ADDRESS</label>
                    <input type="text" name="address" class="form-control" required="required">
                </div>
				  <div class="form-group">
                    <label>DATE OF BIRTH</label>
                    <input type="date" name="dob" class="form-control"  placeholder= "2017-06-01" required="required">
                </div>
					<div class="form-group">
                    <label>NATIONAL ID NUMBER</label>
                    <input type="text" name="id_number" class="form-control" required="required">
                      </div>
					  <div class="form-group">
                    <label>NATIONALITY</label>
                    <input type="text" name="nationality" class="form-control" required="required">
                      </div>
				<div class="form-group">
				<label>Add Photo</label>
				<input name="image"  type="file" required="required">

				</div>
                <input type="hidden" name="id" value= "<?php echo $id; ?>"class="form-control">
                <span><?php echo @$message; ?></span>
				<p></p>
                <input type="submit" name="save" class="btn btn-primary pull-right" value="ADD PLAYER" style="background-color:green"/>
				<INPUT type="button" value="Cancel" class="btn btn-primary pull-left" onClick="window.location.href='info.php'"  style="background-color:green"/>
            </form>
        </div>
    </div>
</div>
<?php

if (isset($_POST['save'])) {
    
	
	
   $id = $_REQUEST['id'];
   $team = R::load('team', $id);

    $player_team =$team-> name;
    
	 $filetmp= $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['tmp_name'];
	$filepath= "uploaded_pictures/".$filename;
		 $date = date('Y-m-d H:i:s');

	
	move_uploaded_file( $filetmp,$filepath);
	
	
	  // $sql= "INSERT INTO player (img_name,image_path,img_type) VALUES ('$filename','$filepath','$filetype')";
	//  $result= mysql_query( $sql); 
	   
    $player = R::dispense('player');
    $player->fname = $_POST['fname'];
	    $player->sname = $_POST['sname'];
    $player->position = $_POST['position'];
	$player-> id_number = $_POST['id_number'];
	$player-> address = $_POST['address'];
	$player-> cell_number = $_POST['cell_number'];
	$player-> dob = $_POST['dob'];
	 	$player-> nationality = $_POST['nationality'];
	 $player-> img_name =$filename;
    $player-> team_name =$player_team;
	  $player-> date_registered = $date;
	 $player->image_path = $filepath;
	 $player-> img_type= $filetype;
    $team->ownProductList[] = $player;
    R::store($team);
	echo '<img src="img/492.png" /> &nbsp;! player information saved successfully';
	  // print ("<script>window.alert('player information saved')</
	  // print ("<script>window.location.assign('teaminfo.php')</script

}
include "footer.php";
?>

<script>
function numbersOnly(Sender,evt,isFloat,isNegative) {
            if(Sender.readOnly) return false;       

            var key   = evt.which || !window.event ? evt.which : event.keyCode;
            var value = Sender.value;

            if((key == 46 || key == 44) && isFloat){                
                var selected = document.selection ? document.selection.createRange().text : "";


                if(selected.length == 0 && value.indexOf(".") == -1 && value.length > 0) Sender.value += ".";
                return false;
            }
            if(key == 45) { // minus sign '-'
                if(!isNegative) return false;
                if(value.indexOf('-')== -1) Sender.value = '-'+value; else Sender.value = value.substring(1);
                if(Sender.onchange != null) {
                    if(Sender.fireEvent){
                        Sender.fireEvent('onchange');
                    } else {
                        var e = document.createEvent('HTMLEvents');
                            e.initEvent('change', false, false);
                        Sender.dispatchEvent(e);
                    }
                }

                var begin = Sender.value.indexOf('-') < -1 ? 1 : 0;
                if(Sender.setSelectionRange){
                    Sender.setSelectionRange(begin,Sender.value.length);
                } else {
                    var range = Sender.createTextRange();
                    range.moveStart('character',begin);
                    range.select();                 
                }

                return false;
            }
            if(key > 31 && (key < 48 || key > 57)) return false;
        }
		</script>