<?php
include("config.php");
$sql = "SELECT * FROM restaurant order by  id";
$retval = mysqli_query( $db, $sql );
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
while($row = mysqli_fetch_assoc($retval))
{
	echo "<res>";
	echo "<name>".$row['resname']."</name>";
	echo "<tel>".$row['tel']."</tel>";
	echo "<ploc>".$row['ploc']."</ploc>";
	echo "</res>";
}
mysqli_close($db);
?>