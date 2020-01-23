<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search Engine - Search</title>
</head>

<body>

<h2>  Search Engine </h2>
<form action='./thesearch.php' method='get'>
<input type="text" name="k" size="100" value=' <?php echo $_GET['k']; ?>' required/>
<input type="submit" value="Search" />
</form>
<hr />
<?php 
$k = $_GET['k'];
$terms = explode(" ", $k);
$query = "SELECT * FROM search WHERE ";

foreach ($terms as $each) {

@$i++;
if ($i == 1)
$query .= "keywords LIKE '%$each%' ";
else
$query .= " OR keywords LIKE '%$each%' ";

//echo $each;
}
mysql_connect("localhost", "root", "") ;
// Select the database
mysql_select_db("football") ;

$query= mysql_query($query);
$numrows = mysql_num_rows($query);
if ($numrows > 0) {
while($row=mysql_fetch_assoc($query))
{
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$keywords = $row['keywords'];
$link = $row['link'];
 echo  "<h2><a href='$link'> $title</a></h2>$description </br>";
 }
}
else {
echo "NO results found for \"<b> $k</b>\"";

}
 ?>
</body>
</html>
