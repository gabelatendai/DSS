<html>
<body bgcolor=black>
<?php
require_once('config.php');
$id = $_REQUEST['id'];
mysqli_query("DELETE FROM team WHERE id= '$id'");
echo "<script> alert('team deleted');
window.location.href='info.php';
</script>";
?>
</body>
</html>