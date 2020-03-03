<?php
include('session.php');
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];

$sql = "DELETE FROM book WHERE id='$id' ";

 $result = mysqli_query( $db, $sql );

header("Location: booking.php");
}
else {
  echo "ERROR!";
}


?>
