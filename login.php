<?php
   include("config.php");
   session_start();

  if(isset($_POST['logsubmit']))
  {
     $myusername = mysqli_real_escape_string($db,$_POST['username']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']);

     $sql = "SELECT * FROM login WHERE username = '$myusername' and pass = '$mypassword'";
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


     $count = mysqli_num_rows($result);

     // If result matched $myusername and $mypassword, table row must be 1 row

     if($count == 1) {

        $_SESSION['login_user'] = $myusername;
        $_SESSION['access']=$row['access'];
        if($row['access'] == "custom")
        {
          echo '<script type="text/javascript">'.

      'window.location.href="wd-custom.php";'.
      '</script>';
    }
    elseif ($row['access'] == "Admin") {
      echo '<script type="text/javascript">'.

      'window.location.href="resview.php";'.
      '</script>';
    }

     }
     else
     {

           echo '<script type="text/javascript">'.
         'window.alert("Sorry you made some mistake with your username or password :( ");'.
         'window.location.href="login";'.
         '</script>';

     }
  }

  if(isset($_POST['signsubmit']))
  {

     $name = ($_POST['name']);
     $user = ($_POST['user']);
     $email = ($_POST['email']);
     $pass = ($_POST['pass']);
     $cpass = ($_POST['cpass']);
     $tel = ($_POST['tel']);
     $resadd = ($_POST['resadd']);
    
    $access = "custom";
     $sql = "SELECT * FROM login WHERE username = '$user'";
     $result = mysqli_query($db,$sql);


     if(!$row = mysqli_fetch_array($result))
     {
       
          $query = "INSERT INTO login". "(name,email,username,pass,tel,useradd,access)". "VALUES('$name','$email','$user','$pass','$tel','$resadd','$access')";
          $data = mysqli_query ($db,$query);

          if($data)
          {
            echo '<script type="text/javascript">'.
        'window.alert("You are now a member of YummieWheels :) Please Login to enjoy your benefits!! ");'.
        'window.location.href="login";'.
        '</script>';
          }
        
     }
     else
     {
       echo '<script type="text/javascript">'.
   'window.alert("Seems like this username already exists!! :( ");'.
   'window.location.href="login";'.
   '</script>';
     }
}
   




  ?>

  <!DOCTYPE html>
  <html >
  <head>
    <meta charset="UTF-8">
    <title>Wheeler's Login</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


        <link rel="stylesheet" href="css/log.css">




  </head>

  <body>
    <input type="submit" onclick=window.location.href="wd.php" value="Back">

    <div class="form">
      <h1>Wheeler's Login Panel!!</h1>
        <ul class="tab-group">
          <li class="tab active"><a href="#login">Login</a></li>
          <li class="tab"><a href="#signup">Sign Up</a></li>
        </ul>

        <div class="tab-content">


          <div id="login">


            <form action="" method="post">

              <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input type="text" name="username" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="'Upper case', 'a lower case', 'number/special char' and min '8 chars'" required autocomplete="off"/>
            </div>



            <button type="Submit" name="logsubmit" class="button button-block"/>Log In</button>

            </form>

          </div>

          <div id="signup">

            <form action="" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  Name<span class="req">*</span>
                </label>
                <input type="text" name="name" required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label>
                  Username<span class="req">*</span>
                </label>
                <input type="text" name="user" required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" id="pass" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="'Upper case', 'a lower case', 'number/special char' and min '8 chars'" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Confirm Password<span class="req">*</span>
              </label>
              <input type="password" id="cpass" name="cpass" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Contact no.<span class="req">*</span>
              </label>
              <input type="tel" id="tel" name="tel" required autocomplete="off"/>
            </div>

            <div class="field-wrap">

              <textarea id="resadd" rows="4" cols="30" name="resadd" placeholder="Complete Address..."></textarea>
            </div>

            <button type="submit" name="signsubmit" class="button button-block"/>Sign Up</button>

            </form>

          </div>

        </div><!-- tab-content -->

  </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="js/log.js"></script>
      <script>
      $(function()
      {
       var pass = document.getElementById("pass");
       var cpass = document.getElementById("cpass");
       $(':password').change(function()
       {

         if(pass.value != cpass.value)
         {
           cpass.setCustomValidity("Did you forgot what you wrote above? :( ");
         }
         else
         {
           cpass.setCustomValidity('');
         }
       }
       );
      }
      );
      </script>


  </body>
  </html>
