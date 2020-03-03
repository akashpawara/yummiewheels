<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Restruants</title>
    <link rel="stylesheet"  href="css/panel.css" />
  </head>
  <body>
    <input type="button" value="Logout" onclick="window.location.href='logout.php';"/><br><br>
    <input type="button" value="Back to Homepage" onclick="window.location.href='wd.php';"/><br><br>
    <input type="button" value="check out reviews" onclick="window.location.href='review';"/><br><br>
    <input type="button" value="check out bookings" onclick="window.location.href='booking';"/><br><br>
    <input type="button" value="Add a Restruant" onclick="window.location.href='resadd';"/><br><br>


<?php

   include("session.php");
$q=1;
       $sql = "SELECT * FROM restaurant order by  id";
      $retval = mysqli_query( $db, $sql );


?>
<table>
  <caption>Restaurants</caption>
  <thead>
  <tr>
    <th><label>ID</label></th>
    <th><label>Restaurant Name</label></th>
    <th><label>Contact no.</label></th>
    <th><label>Category</label></th>
    <th><label>Approx for 2</label></th>
    <th><label>Prime location</label></th>
    <th><label>Address</label></th>
    <th><label>Image</label></th>
    <th><label>Delete</label></th>
    <th><label>Edit</label></th>
  </tr>
</thead>

<?php
      while($row = mysqli_fetch_assoc($retval)){
        $id = $row['id'];
        //$name = $row['resname'];
        //$image = "img/".$name;
        //header("Content-type: image/jpeg");
?>

  <tr>
      <td> <label><?php echo $q; ?></label> </td>
        <td> <label><?php echo "{$row['resname']}" ?> </label></td>
          <td> <label><?php echo "{$row['tel']}" ?> </label></td>
            <td> <label><?php echo "{$row['cat']}" ?> </label></td>
              <td> <label><?php echo "{$row['approx']}" ?> </label></td>
                <td> <label><?php echo "{$row['ploc']}" ?> </label></td>
                  <td> <h3><?php echo "{$row['resadd']}" ?> </h3></td>
                  <td> <?php echo '<img src="'.$row['image'] .'"  height="200" width="200" />'; ?> </td>
                  <?php

                      echo '<td><a href="resdel.php?id=' . $row['id'] . '">Delete</a></td>';
                      echo "<td><a href='resedit.php?id=".$row['id']."'>Edit</a></td>";

                  ?>

    </tr>
    <?php
$q++;
     }




      mysqli_close($db);
?>
</body>
</html>
