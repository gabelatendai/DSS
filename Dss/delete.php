<html>
<body bgcolor=black>
<?php
require_once('config.php');
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');

$id = $_REQUEST['id'];
mysqli_query($db,"DELETE FROM user where id= '$id'");
echo "<script> alert('1 record deleted');
window.location.href='view_users.php';
</script>";
?>
</body>
</html>