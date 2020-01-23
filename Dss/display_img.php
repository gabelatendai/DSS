<?php
mysql_connect("localhost", "root", "") or DIE('Connection to host is failed, perhaps the service is down!');
 //Select the database
mysql_select_db("football") or DIE('Database name is not available!');


$res =  mysql_query("SELECT * FROM player ");
		echo "<table>";

    while($row = mysql_fetch_array($res))
    {
	echo "<tr>";
	
    echo "<td>"; ?> <img src=" <?php echo $row["image_path"]; ?>"  height="100"  width="100" <?php echo  "</td>";
	
	echo "<td>" ;echo  $row['img_name']; echo  "</td>";
		echo "</tr>";

    }
	echo "</table>";
    ?>
