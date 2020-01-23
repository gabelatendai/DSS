<head>		 <script type="text/javascript" >
function printlayer(layer)
{
var generator =window.open(",'name,");
var layetext =document.getElementById(layer);
generator.document.write(layetext.innerHTML.replace("Print Me"));

generator.document.close();
generator.print();
generator.close();
}
function myFunction() {
var d = new Date();
    document.getElementById("demo").innerHTML = Date();
}
</script>

</head>
<body onLoad="myFunction()">

<?php

include "header.php";
R::setup('mysql:host=localhost;dbname=football', 'root', '');


                  ?>
<div class="button-panel">
	<INPUT type="button" value="Back" class="btn btn-primary pull-left" onClick="window.location.href='index.php'"  style="background-color:green"/>

<INPUT type="button"value="Print" class="btn btn-primary pull-left" id="print" onClick="javascript:printlayer('div-id-name')" style="background-color:green">
</div>
        <div id="div-id-name">

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color:green">Latest League Results of <b>  PLAYED MATCHES</b></div>
            <ul class="list-group">
                <?php
				/*$limit = 3;
$p = $_GET['p'];
				$get_total = mysql_num_rows(mysql_query("SELECT * FROM fixture "));
				$total = ceil($get_total/$limit);
if(!isset($p) || $p <= 0)
{
$offset = 0;
}else {
$offset = ceil($p - 1 ) * $limit;
}$init = R::findOne('fixture', 'away = ? AND home = ?', [$team2, $team1]);
@$team2 = $_SESSION['away'];
@$team1 = $_SESSION['home'];
$res =  mysql_query("SELECT * FROM fixture LIMIT $offset,$limit ");
               // $fixtures = R::findAll('fixture','status = "P"', $offset,$limit);
			   // $fixtures = R::findAll('fixture','status = "P" : LIMIT : limit'
				//		 , array (':limit'=>$limit , ': fixture' =>$fixture  )); */
                             $fixtures = R::findAll('fixture','status = "P"  LIMIT 8 ');
			    foreach ($fixtures as $fixture) {

                   // $_SESSION['away'] = $fixture->away;
                  //  $_SESSION['home'] = $fixture->home;
                    ?>
   <li class="list-group-item"><?php 
   if ($fixture->status=="P") { 
   echo ' <a href="score_info.php?id='.$fixture->id. '">' .  $fixture->home . "<strong> " . $fixture->homescore . "  :  " . $fixture->awayscore . " </strong>" . $fixture->away . '</a>'; ?>
   	<p class="pull-right" ><?php echo "MATCH PLAYED " ; ?> </p>
<?php

	}
	else if ($fixture->status=="TBP"){ 
	echo $fixture->home . "       <strong> Vs </strong>       " . $fixture->away ;?>
	<p class="pull-right" ><?php echo $fixture->status  ?> </p>
<?php
	}
      /*if (@$_SESSION['role'] == 'admin'){
 		?>
                        <a class="pull-right" href="updatescore.php?fixture=<?php echo $fixture->id ?>">  Update</a></li>
                        <?php
                    }
                    elseif (@$_SESSION['role'] == 'commissioner'){
                        ?>
                        <a class="pull-right" href="updatescore.php?fixture=<?php echo $fixture->id ?>">  Update</a></li>
                        <?php
                    }*/
                    if (@$_SESSION['role'] == 'admin' || @$_SESSION['role'] == 'refree' || @$_SESSION['role'] == 'commissioner'){
                        ?>
					    <a class="pull-right" href="updatescore.php?fixture=<?php echo $fixture->id ?>">  Update</a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
	<?php /*

		if ($get_total > $limit ){
		for($i=1; $i <= $total; $i++) {

		echo '<div class="pages"> ';
		
		echo ( $i == $p ) ? '<a class="active">'. $i. '</a>' : '<a href="?p='.$i.'">'.$i.'</a>';
		echo '</div>';
		
		}
		
		
		} */

    if (@$_SESSION['role'] == 'admin' || @$_SESSION['role'] == 'refree' || @$_SESSION['role'] == 'commissioner'){
 		?>
                    	
				 <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color:green">League Results</div>
            <ul class="list-group">
                <?php
               // $id = ($fixtures['status']=="TBP");
               $fixtures = R::findAll('fixture' ,'status ="TBP" LIMIT 10 ');



                foreach ($fixtures as $fixture) {
                    ?>
   <li class="list-group-item"><?php 
   if ($fixture->status=="P") { 
   echo "played matches </b>". $fixture->home . "<strong> " . $fixture->homescore . "  :  " . $fixture->awayscore . " </strong>" . $fixture->away ;?>
   	<p class="pull-right" ><?php echo "MATCH PLAYED"; ?></br> </p>
<?php
	}
	else if ($fixture->status=="TBP"){ 
	echo  $fixture->home . "       <strong> Vs </strong>       " . $fixture->away ;?>
	<p class="pull-right" ><?php echo $fixture->status  ?> </p>
<?php
	}
      //if (@$_SESSION['role'] == 'admin'){
                    if (@$_SESSION['role'] == 'admin' || $_SESSION['role'] == 'refree' || $_SESSION['role'] == 'commissioner'){
 		?>
                        <a class="pull-right" href="updatescore.php?fixture=<?php echo $fixture->id ?>">  Update</a></br></br></li>
                        <?php
                    }
                   } 
                }
                 ?>
	       </ul>
          </div>
  </div></div>
</br></br></br></br></br></br></br>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br>

</br></br></br></br></br></br></br>
<div class=" Footer navbar  navbar-fixed-bottom ">
<body class="container">
</body>
<?php
include "footer.php";
?> 
</div></div>
</div>

