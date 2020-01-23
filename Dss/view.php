<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "football";
$datatable = "team"; // MySQL table name
$results_per_page = 4; // number of results per page
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT * FROM team ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
$rs_result = $conn->query($sql); 
?> 
<table border="1" cellpadding="8">
<tr>
    <td bgcolor="#CCCCCC"><strong>ID</strong></td>
    <td bgcolor="#CCCCCC"><strong>Name</strong></td></tr>
<?php 
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><? echo $row["id"]; ?></td>
            <td><? echo $row["name"]; ?></td>
            </tr>
<?php 
}; 
?> 
</table>
<input id="date" type="date">