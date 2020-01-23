<?php
//gabela
include "header.php";
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])) {
          if (preg_match("/^[ 0-9 a-zA-Z]+/", $_POST['fullname'])) {
              $fullname = $_POST['fullname'];
              //connect  to the database
              $db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

              //-query  the database table $result = mysql_query("SELECT * FROM Users WHERE UserName LIKE '$username'");
              $result = mysqli_query($db,"SELECT * FROM  player WHERE fname LIKE '%" . $fullname . "%' OR sname LIKE '%" . $fullname . "%' OR position LIKE '%" . $fullname . "%' OR dob LIKE '%" . $fullname . "%'Order by fname ASC ") or die ('I cannot connect to the database  because: ' . mysql_error());
         //     $numrows = mysql_num_rows($result);
             // $row = mysql_fetch_array($result);
              echo '<h2 align="center">Search results</h2><table width="800" border="8" cellpadding="2" align="center"  style="background-color: white"> ';
              echo '<h4 align="center"> search results for   --->:' . $fullname . '</h2>';

              echo '<tr style="color:black">';
              echo '<th > Player Name  </th>';
              echo '<th> Address </th>';
              echo '<th> Phone_Number </th>';
              echo '<th> Team Name  </th>';
              echo '</tr>';
              //-run  the query against the mysql query function
              //-create  while loop and loop through result set
              $row = mysqli_fetch_array($result);
              //-display the result of the array
            //  $age = date('Y-m-d H:i:s') - $row['dob'];
              echo '<tr style="color:black">';
              echo '<td>' . $row ['fname'] . '  ' . $row ['sname'] . ' </a></td> ';
              echo '<td>' . $row  ['address'] .  '</td> ';
              echo '<td>' . $row  ['cell_number'] . '</td> ';
              echo '<td>' . $row  ['team_name'] . '</td> ';
              echo '</tr>';

          } elseif ($fullname = !$_POST['fullname']) {
              echo '<div class="alert alert-success" role="alert" style="background-color:white">
<h3 align="center" style="color:black">Please enter a search query</h3></div>';
          } else  {

              echo '<div class="alert alert-success" role="alert" style="background-color:transparent">
<h3 align="center" style="color:white">Cant find your search query</h3></div>';
          }
      }

  } ?>
	</div>
	<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">

<?php
include "footer.php";
?> 
</div></div>
</div>
