<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Restruants</title>
    <link rel="stylesheet"  href="css/panel.css" />
  </head>
  <body>
       <input type="button" value="Back to Homepage" onclick="window.location.href='resview.php';"/><br><br>
   

<?php

   include("session.php");
$q=1;
       $sql = "SELECT * FROM review order by  id";
      $retval = mysqli_query( $db, $sql );


?>
<table>
  <caption>Review</caption>
  <thead>
  <tr>
    <th><label>ID</label></th>
    <th><label>Name</label></th>
    <th><label>Email</label></th>
    <th><label>Message</label></th>
    <th><label>Delete</label></th>
 
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
        <td> <label><?php echo "{$row['name']}" ?> </label></td>
          <td> <label><?php echo "{$row['email']}" ?> </label></td>
            <td> <label><?php echo "{$row['msg']}" ?> </label></td>
           
                  <?php

                      echo '<td><a href="revdel.php?id=' . $row['id'] . '">Delete</a></td>';
                      

                  ?>

    </tr>
    <?php
$q++;
     }




      mysqli_close($db);
?>
</body>
</html>
