<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select * from login where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:login");
   }
   $_SESSION['access']=$row['access'];
   if($row['access'] != "custom")
   {
       header("login");
   }
   elseif($row['access'] != "Admin")
   {
       header("login");
   }
?>
