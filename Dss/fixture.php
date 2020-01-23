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
var name = "Designed by: Gabriel Musodza";
    document.getElementById("demo").innerHTML = Date();
	  document.getElementById("demo").innerHTML = name;
}
</script>

</head>
<body onLoad="myFunction()">
<div>

<?php

include "header.php";

R::setup('mysql:host=localhost;dbname=football', 'root', ''); //for both mysql or mariaDB

function show_fixtures($names)
{
    $teams = sizeof($names);



    ?>		  			

   
<button onClick="javascript:printlayer('div-id-name')"  align="center">Print Fixture</button>
<button onClick="window.location.href='weekend_fixture.php'" class="pull-right"  align="center">View weekend fixture</button>
       <div id="div-id-name">
		<img src="../images/4.jpg" width="100" height="150">
	
<?php

    print "<h3 align='center' style='background-color:green'>Fixtures for $teams teams.</h3>";

$date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("7 days"));
$time = date_format($date,"Y-m-d");
$ref = R::findAll('refrees');
//foreach ($ref as $refu) {

//for ($x=0; $x<=10; $x++) {
    //echo "The number is: $refu <br>";
//}
//refrees code
// If odd number of teams add a "ghost".
    $ghost = false;
    if ($teams % 2 == 1) {
        $teams++;
        $ghost = true;
    }

// Generate the fixtures using the cyclic algorithm.
    $totalRounds = $teams - 1;
    $matchesPerRound = $teams / 2;
    $rounds = array();
    for ($i = 0; $i < $totalRounds; $i++) {
        $rounds[$i] = array();
    }

    for ($round = 0; $round < $totalRounds; $round++) {
        for ($match = 0; $match < $matchesPerRound; $match++) {
            $home = ($round + $match) % ($teams - 1);
            $away = ($teams - 1 - $match + $round) % ($teams - 1);
// Last team stays in the same place while the others
// rotate around it.
            if ($match == 0) {
                $away = $teams - 1;
            }
            $rounds[$round][$match] = team_name($home + 1, $names)
                . " v " . team_name($away + 1, $names);
        }
    }

// Interleave so that home and away games are fairly evenly dispersed.
    $interleaved = array();
    for ($i = 0; $i < $totalRounds; $i++) {
        $interleaved[$i] = array();
    }

    $evn = 0;
    $odd = ($teams / 2);
    for ($i = 0; $i < sizeof($rounds); $i++) {
        if ($i % 2 == 0) {
            $interleaved[$i] = $rounds[$evn++];
        } else {
            $interleaved[$i] = $rounds[$odd++];
        }
    }

    $rounds = $interleaved;

// Last team can't be away for every game so flip them
// to home on odd rounds.
    for ($round = 0; $round < sizeof($rounds); $round++) {
        if ($round % 2 == 1) {
            $rounds[$round][0] = flip($rounds[$round][0]);
            
        }
    }


// Display the fixtures
    for ($i = 0; $i < sizeof($rounds); $i++) {
      //for ($ref = 0; $ref < 6; $ref++) {
if ($i==1 ){
            $date=date_create("2019-04-06");
            date_add($date,date_interval_create_from_date_string("14 days"));

 $time =  date_format($date,"Y-m-d");

}elseif ($i==2){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("21 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==3){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("28 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==4){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("35 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==5){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("42 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==6){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("49 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==7){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("56 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==8){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("63 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==9){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("70 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==10){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("77 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==11){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("84 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==12){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("91 days"));
$time = date_format($date,"Y-m-d");

}  elseif ($i==13){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("98 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==14){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("105 days"));
$time = date_format($date,"Y-m-d");

}  elseif ($i==15){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("112 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==16){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("119 days"));
$time = date_format($date,"Y-m-d");

}  elseif ($i==17){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("126 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==18){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("133 days"));
$time = date_format($date,"Y-m-d");

} 
elseif ($i==19){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("140 days"));
$time = date_format($date,"Y-m-d");

}  elseif ($i==20){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("147 days"));
$time = date_format($date,"Y-m-d");

} elseif ($i==21){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("154 days"));
$time = date_format($date,"Y-m-d");

}

echo "<div class='col-md-6'> <div class='panel panel-primary' >";
        print "<div class='panel-heading' style='background-color:green'><p>Match Day " . ($i + 1) . ' <br>  '. $time ."</p></div>";
         //     $result=mysql_query("select * from refrees ");
 //$ref = R::findAll('refrees');
 // for ($ref = 0; $ref < sizeof($teams); $ref++) {
//for ($ref=0; $ref<=sizeof($teams); $ref++) {


//for ($x=0; $x<=10; $x++) {
            //echo "The number is: $refu <br>";

            foreach ($rounds[$i] as $r) //foreach ($r as  $ref)
               // foreach ($ref as $refu)
               {

                   // for ($refu = $pieces ;$refu<=sizeof($pieces); $refu++) {
                       // print $refu->fullname . "<br />";
                    //}

                print $r  . "<br />";

                        $pieces = explode(" v ", $r);
                   // print $refu->fullname . "<br />";
//echo $r;


                $init = R::findOne('fixture', ' home = ? AND away = ?', [$pieces[0], $pieces[1]]);

                if ($init == null) {

                    $fixture = R::dispense('fixture');
                    $fixture->home = $pieces[0];
                    $fixture->away = $pieces[1];
                    $fixture->status = "TBP";
                    $fixture->match_date = $time;
                    $fixture->homescore = 0;
                    $fixture->awayscore = 0;
                    R::store($fixture);
                }

            }
            print "</div></div>";

    }
    print "<br /><div class='col-md-12'><h1 align='center' style='background-color:green'>Second half of the season</h1></div>";
    $round_counter = sizeof($rounds) + 1;
    for ($i = sizeof($rounds) - 1; $i >= 0; $i--) {
         if ($round_counter==12 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("91 days"));
$time = date_format($date,"Y-m-d");
}
  if ($round_counter==13 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("98 days"));
$time = date_format($date,"Y-m-d");
}  if ($round_counter==14 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("105 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==15 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("112 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==16 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("119 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==17 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("126 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==18 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("133 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==19 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("140 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==20 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("147 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==21 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("154 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==22 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("161 days"));
$time = date_format($date,"Y-m-d");
}
 if ($round_counter==24 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("168 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==25 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("175 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==26 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("182 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==27 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("189 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==28 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("196 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==29 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("203 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==30 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("210 days"));
$time = date_format($date,"Y-m-d");
}
if ($round_counter==31 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("217 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==32 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("224 days"));
$time = date_format($date,"Y-m-d");
}
if ($round_counter==33 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("231 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==34 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("238 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==35 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("245 days"));
$time = date_format($date,"Y-m-d");
}
if ($round_counter==36 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("252 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==37 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("259 days"));
$time = date_format($date,"Y-m-d");
}
 if ($round_counter==38 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("266 days"));
$time = date_format($date,"Y-m-d");
}
if ($round_counter==39 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("273 days"));
$time = date_format($date,"Y-m-d");
} if ($round_counter==40 ){
            $date=date_create("2019-04-06");
date_add($date,date_interval_create_from_date_string("280 days"));
$time = date_format($date,"Y-m-d");
}
        echo "<div class='col-md-6'> <div class='panel panel-primary'>";
        print "<div class='panel-heading' style='background-color:green'><p>Match Day " . $round_counter . ' <br>  '. $time ."</p></div>";
        $round_counter += 1;
        foreach ($rounds[$i] as $r) {
            print flip($r) . "<br />";

            $pieces = explode(" v ", flip($r));

            $init = R::findOne('fixture', ' home = ? AND away = ?', [$pieces[0], $pieces[1]]);

            if ($init == null) {

                $fixture = R::dispense('fixture');
                $fixture->home = $pieces[0];
                $fixture->away = $pieces[1];
                 $fixture->match_date = $time;
                $fixture->status = "TBP";
                $fixture->homescore = 0;
                $fixture->awayscore = 0;
                R::store($fixture);
            }

        }
        print "</div></div>";
    }
    print "<br />";

    if ($ghost) {
        print "Matches against team " . $teams . " are byes.";
    }


}

function flip($match)
{
    $components = explode(' v ', $match);
    return $components[1] . " v " . $components[0];
}

function team_name($num, $names)
{
    $i = $num - 1;
    if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
        return trim($names[$i]);
    } else {
        return $num;
    }
}

$teams = R::findAll('team');

$names = array();

foreach ($teams as $name) {
    array_push($names, $name->name);
}

show_fixtures($names);

include "footer.php";
?>
