
<!DOCTYPE HTML>
<html>
  <head>
    <title>Bookings!!!!!!</title>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#646375">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    
    <link rel="stylesheet" href="css/form.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
  </head>
  <body>
   <?php
      include("session.php");
      if(isset($_GET['id']))
      {
      $id=$_GET['id'];
         if(isset($_POST['add'])) {

            $name = $_POST['name'];
            $resname = $_POST['resname'];
            $nop = $_POST['nop'];
            $date = $_POST['date'];
            $time = $_POST['time'];

              $sql = "INSERT INTO book". "(name,resname,nop,dt,t)". "VALUES('$name','$resname','$nop','$dt','$t')"; 

               $result = mysqli_query( $db, $sql );
               //move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);

               if( $result )
               {
                echo '<script>alert("Your bookings have been registered by us :)")</script>';
                 
                 header('location:wd-custom.php');
               }
               else{
                echo '<script>alert("Unsuccessfulll!!")</script>';
                header('location:wd-custom.php');
               }
/*
             }
             else {
               echo '<script type="text/javascript">'.
           'window.alert("Sorry this restaurant already exist in our world :( ");'.
           'window.location.href="resview.php";'.
           '</script>';
             }
            */
         
       }
   
 $sql1="select * from restaurant where id='$id'" ;
          $result1 = mysqli_query( $db, $sql1 );
         $row1 = mysqli_fetch_assoc($result1);
            ?>

  <input type="submit" onclick=window.location.href="wd-custom.php" value="Back">

    <div class="form">

      <h1>Book a table!!</h1>

            <form action="" method="post"  enctype="multipart/form-data">

              <div class="field-wrap">
              
                Name<span class="req">*</span>
              
              <input id="name" type="text" name="name" required autocomplete="off" " />
            </div>

              <div class="field-wrap">
              
                Restaurant name<span class="req">*</span>
              
              <input id="resname" type="text" name="resname" value="<?php echo $row1['resname']; ?>" required autocomplete="off" " />
            </div>

            <div class="field-wrap">
              <select name="nop" required>
                    <option disabled selected>Number of People</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>

            <div class="field-wrap">
                Time<span class="req">*</span>
              <input id="time" type="time" name="time" required autocomplete="off"" />
            </div>

      <div class="field-wrap">
                Date<span class="req">*</span>    
              <input id="date" type="date" name="date" required autocomplete="off"/ ">
            </div>          

            <button id="add" name="add" class="button button-block"/>Submit</button><br>
            <button type="reset" value="reset" class="button button-block" />Reset</button>

            </form>

          </div>

          </div>

        </div><!-- tab-content -->

  </div> <!-- /form -->
        
        <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>

      <?php
    }
    ?>
  </body>
</html>