<?php

include "header.php";

 $con=mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
//mysql_select_db("football") or DIE('Database name is not available!');
$id = $_REQUEST['id'];

?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:green">Match Results</div>
        
      


<?php

$count_user=mysqli_query($con,"select warning from warnings Where  warning = 'yellow' AND fixture_id_id=". $id);
              $count = mysqli_num_rows($count_user);
          //   echo $count .'<br>' ; 
$result=mysqli_query($con,"select * from fixture Where id=". $id);
$res=mysqli_query($con,"select * from warnings Where id=". $id);

$row=mysqli_fetch_array($result);
$row1=mysqli_fetch_array($res);
$home=$row['home'];
$away=$row['away'];
$scorea=$row['awayscore'];
$scoreh=$row['homescore'];
$homeRed='0';
$awayRed='0';

$awayYellow = '0' ;
$time=$row['time_updated_score'];


 
echo $home.  "   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$away .'</font></br>';
echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>" . $scoreh .  "   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;goals&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"    .$scorea.  '</b></font></br>';
echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $count . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src=img/yellow.jpg width='30' height='40'>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .$awayYellow. '</font></br>';
echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $homeRed . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src=img/red.jpg width='30' height='40'>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .$awayRed. '</font></br>';


?>
 
<tr><td colspan=2><center>
<INPUT type="button" value="Back"
onClick="window.location.href='results.php'" /></center></td></tr>
</table>
</div>
</form>
</html>
</body>