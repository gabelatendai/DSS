<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search Engine - Home</title>
</head>

<body>
<center>
<h2>  Search Engine </h2>
<form action='./thesearch.php' method='get'>
<input type="text" name="k" size="100" value=' <?php echo $_GET['k']; ?>' required />
<input type="submit" value="Search" />
</form>
</center>
</body>
</html>
