<?php
include('session.php');
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];

$sql = "DELETE FROM restaurant WHERE id='$id' ";

 $result = mysqli_query( $db, $sql );

header("Location: resview.php");
}
else {
  echo "ERROR!";
}


?>
