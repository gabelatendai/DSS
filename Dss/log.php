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
// by gabela
include "header.php";

R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql/

$teams = R::findAll('team');
sort($teams);

$logTable = array();

for ($i = 0; $i < sizeof($teams); $i++) {

    $tableRecord = array();
    $totalPoints = 0;
    $goalsfor = 0;
    $goalsagainst = 0;
    $w = 0;
    $d = 0;
    $l = 0;

    $team = $teams[$i]->name;


    //get all the games played at home by team
    $homegames = R::getAll('SELECT * FROM fixture WHERE home = :home AND status = :status',[':home' => $team, ':status' => 'P']);

    foreach ($homegames as $homegame) {
        if ($homegame['homescore'] > $homegame['awayscore']) {
            $totalPoints += 3;
            $goalsfor += $homegame['homescore'];
            $goalsagainst += $homegame['awayscore'];
            $w++;
        }
		elseif ($homegame['homescore'] == $homegame['awayscore']) {
            $totalPoints += 1;
            $goalsfor += $homegame['homescore'];
            $goalsagainst += $homegame['awayscore'];
            $d++;
        }
		 elseif ($homegame['homescore'] < $homegame['awayscore']){
            $l++;
            $goalsfor += $homegame['homescore'];
            $goalsagainst += $homegame['awayscore'];
        }
    }


    //get all the games played at home by team
    $awaygames = R::getAll('SELECT * FROM fixture WHERE away = :away AND status = :status',
        [':away' => $team, ':status' => 'P']);

    foreach ($awaygames as $awaygame) {
        if ($awaygame['awayscore'] > $awaygame['homescore']) {
            $w++;
            $totalPoints += 3;
            $goalsfor += $awaygame['awayscore'];
            $goalsagainst += $awaygame['homescore'];
		
		        }
		
		elseif  ($awaygame['awayscore'] == $awaygame['homescore']) {
            $totalPoints += 1;
            $goalsfor += $awaygame['homescore'];
            $goalsagainst += $awaygame['awayscore'];
            $d++;
        }
		 elseif($awaygame['awayscore'] < $awaygame['homescore'])  {
            $l++;
            $goalsfor += $awaygame['awayscore'];
            $goalsagainst += $awaygame['homescore'];

        }
    }
//by gabela
    $totalPlayed = count($homegames) + count($awaygames);
    $tableRecord["played"] = $totalPlayed;
    $tableRecord["team"] = $team;
    $tableRecord["w"] = $w;
    $tableRecord["l"] = $l;
	 $tableRecord["d"] = $d;
	$tableRecord["gf"] = $goalsfor;
	 $tableRecord["ga"] = $goalsagainst;
    $tableRecord["gd"] = $goalsfor - $goalsagainst;
	//$tableRecord["g"] = $homegame['homescore'] + $homegame['awayscore'];
    $tableRecord["points"] = $totalPoints;
	
if(array_push($logTable, $tableRecord)){

usort($logTable, function ($a, $b) {
        return $b['points'] - $a['points'];

    });
	} 
	elseif ( usort($logTable, function ($a, $b) {
              return $b['gd'] - $a['gd'];

    })); 
  
elseif    (usort($logTable, function ($a, $b) {
	    return $a['team'] - $b['team'];
    }));
  
}

?>
<a href="#" class="pull-right" id="print" onClick="javascript:printlayer('div-id-name')"><h1 style="color:#000000">Print</h1></a>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary" id="div-id-name">
            <div class="panel-heading" style="background-color:green">League Table as at <?php
		                $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?> </p></div>
			 <div class="table-responsive">
        <table border="1"  width="730" class="table table-striped table-condensed table-hover dataTables table-bordered" >
                <thead>
                <td width=" 15"><b>#</b></td>
                <td><b>Team</b></td>
                <td><b>Played</b></td>
                <td><b>W</b></td>
                <td><b>D</b></td>
			   <td><b>L</b></td>
			    <td><b>GF</b></td>	
			   <td><b>GA</b></td>
                <td><b>G/D</b></td>
                <td><b>Points</b></td>
                </thead>
                <tbody>
		
                <?php
                for ($i = 0; $i < sizeof($logTable); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $logTable[$i]["team"] ?></td>
                        <td><?php echo $logTable[$i]["played"] ?></td>
                        <td><?php echo $logTable[$i]["w"] ?></td>
                        <td><?php echo $logTable[$i]["d"] ?></td>
						 <td><?php echo $logTable[$i]["l"] ?></td>
						 <td><?php echo $logTable[$i]["gf"] ?></td>
						 <td><?php echo $logTable[$i]["ga"] ?></td>
                        <td><?php echo $logTable[$i]["gd"] ?></td>
                        <td><?php echo $logTable[$i]["points"] ?></td>
						
                    </tr>
                <?php }
				 ?>
				 
                </tbody>
            </table><td ></td> 
</div><?
                 ?>  
			<div class="col-md-10 col-md-offset-1"><br></br>
            <div><h3> <a href="results.php" style="color:green">Latest League Results<span class="badge badge-info"><?php 

include "config.php";
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');


                 $count = mysqli_num_rows(mysqli_query($db,"select * from fixture WHERE status = 'P'"));

             echo $count ; ?></span></a></h3></div> 
            <ul class="list-group">
                <?php
				
                $fixtures = R::findAll('fixture' ,'status = "P"');
                foreach ($fixtures as $fixture) {
                    ?>
   <li class="list-group-item"><?php 
   echo ' <a href="score_info.php?id='.$fixture->id. '">' .   $fixture->home . "<strong> " . $fixture->homescore . "  :  " . $fixture->awayscore . " </strong>" . $fixture->away .'</a>' ;?>
<?php
	
                    
                    
                }
                ?>
			</li>               </ul>   

        </div>
    </div>
	</br></br></br></br></br></br></br>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br>

</br></br></br></br></br></br></br>
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>