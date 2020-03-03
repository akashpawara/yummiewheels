


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YummieWheels</title>
    <meta name="description" content="Your Description Here">
    <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
    <meta name="author" content="ThemeForces.Com">

<meta name="theme-color" content="#646375">


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css"  href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="tf-home">
        <div class="overlay">
            <div id="sticky-anchor"></div>
            <nav id="tf-menu" class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>

                      <a href="#tf-home" class="navbar-brand logo">YummieWheels</a>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="#tf-service"><i class="fa fa-cutlery"></i>&nbsp&nbspRestaurants</a></li>
                        
                        <li><a href="#tf-snaps">About Us</a></li>
                        <li><a href="#tf-contact">Contact Us</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<i class="fa fa-users"></i></a>
                          <ul class="dropdown-menu">
                            <li><a href="login.php">Log in <i class="fa fa-sign-in"></i></a></li>
                            <li class="divider"></li>
                          </ul>
                        </li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container">
                <div class="content">
                    <h1>YummieWheels</h1>
                    <h3> Find the best restaurants, Cafes, and bars in Mumbai </h3>
                    <br>
                  
                    <div class="card-body row no-gutters align-items-center">
                                    
                                    <div class="col">
                                    

                                        <script>
                                            function showResult(str) {
                                              if (str.length==0) { 
                                                document.getElementById("livesearch").innerHTML="";
                                                document.getElementById("livesearch").style.border="0px";
                                                return;
                                              }
                                              if (window.XMLHttpRequest) {
                                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp=new XMLHttpRequest();
                                              } else {  // code for IE6, IE5
                                                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                              }
                                              xmlhttp.onreadystatechange=function() {
                                                if (this.readyState==4 && this.status==200) {
                                                  document.getElementById("livesearch").innerHTML=this.responseText;
                                                  document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                                                }
                                              }
                                              xmlhttp.open("GET","search.php?q="+str,true);
                                              xmlhttp.send();
                                            }
                                        </script>



                                        <input class="form-control form-control-lg form-control-borderless" onkeyup="showResult(this.value)" name="search" id="search" type="search" placeholder="Search topics or keywords">
                                        <div id="livesearch" style="text-align: left;"></div>
                                    </div>
                                    <div class="col-auto">    
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                    </div>
                    
                </div>
                <br><br><br><br>
            </div>
        </div>
    </div>

    <div id="tf-service">
      <h1 class="title" style="text-align: center;"><i class="fa fa-cutlery"></i>&nbsp&nbspRestaurants&nbsp&nbsp<i class="fa fa-cutlery"></i></h1>
      <div class="card">
                  <div class="products">
     
          <?php
          include("config.php");

          
         if(isset($_POST['submit'])) {


            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];

            
              $sql1 = "INSERT INTO review". "(name,email,msg)". "VALUES('$name','$email','$msg')"; ;

               $result1 = mysqli_query( $db, $sql1 );
               //move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);

               if( $result1 )
               {
                echo '<script>alert("Thank you for your Review!! :)")</script>';
                 header('location:wd.php');
               }
             }
             $q=1;
          $sql = "SELECT * FROM restaurant order by  id";
      $retval = mysqli_query( $db, $sql );
       while($row = mysqli_fetch_assoc($retval)){
       ?>
            

                
                    <?php 
                    if($q==1){
                    ?>
                    <div class="product active" product-id="<?php echo $q; ?>" >
                      <div class="thumbnail"><img src="<?php echo $row['image']; ?>"/></div>
                      <h1 class="title"><?php echo $row['resname']; ?></h1>
            <p class="card-text">Location:-<?php echo $row['ploc']; ?>&nbsp&nbspCategory:-<?php echo $row['cat']; ?><br><div class="test"><img id="myImg" src="<?php echo $row['image']; ?>"  />
              <div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"></div>
              &nbsp&nbsp
              <img id="myImg" src="<?php echo $row['image']; ?>"  />
              <div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"></div>
              <br>Menu</div>

             </p>
                    <p class="card-text"><small class="text-muted"><a href="login" class="btn"><i class="fa fa-tablet"></i>&nbsp&nbspBook a Table</a>
                    <a href="tel:+91<?php echo $row['tel']; ?>" class="btn"><i class="fa fa-phone"></i>&nbsp&nbspCall us to Order</a><a href="login" class="btn"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspReviews</a></small></p>
                  </div>
                   <?php
                   $q++;
                 }
                 else{
                   ?>
                  <div class="product" product-id="<?php echo $q; ?>" >
                      <div class="thumbnail"><img src="<?php echo $row['image']; ?>"/></div>
                      <h1 class="title"><?php echo $row['resname']; ?></h1>
            <p class="card-text">Location:-<?php echo $row['ploc']; ?><br>Category:-<?php echo $row['cat']; ?><br><div class="test"><img id="myImg" src="<?php echo $row['image']; ?>"  />
              <div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"></div>
              &nbsp&nbsp
              <img id="myImg" src="<?php echo $row['image']; ?>"  />
              <div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"></div>
              <br>Menu</div>
             </p>
                    <p class="card-text"><small class="text-muted"><a href="login" class="btn"><i class="fa fa-tablet"></i>&nbsp&nbspBook a Table</a>
                    <a href="tel:+91<?php echo $row['tel']; ?>" class="btn"><i class="fa fa-phone"></i>&nbsp&nbspCall us to Order</a><a href="login" class="btn"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspReviews</a></small>
                    </p>
                  </div>
                    <?php $q++; } ?>
                    
                  
            
            <!--
            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    <i class="fa fa-cutlery"></i>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Restraunt 2-</h4>
                    <p>
                      <img src="img/res.png" class="img-responsive">
                      <a href="#" class="btn btn-primary my-btn">Book a Table</a>
                    </p>
                  </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                     <i class="fa fa-cutlery"></i>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Restraunt 3-</h4>
                    <p>
                      <img src="img/res.png" class="img-responsive">
                      <a href="#" class="btn btn-primary my-btn">Book a Table</a>
                    </p>
                  </div>
                </div>

            </div>
          -->
        <?php
      }
      mysqli_close($db);
      ?>
   </div>
                  <div class="footer"><a class="btn" id="prev" href="#" ripple="" ripple-color="#666666">Prev</a><a class="btn" id="next" href="#" ripple="" ripple-color="#666666">Next</a></div>
                </div>

            </div>
<!--
    <div id="tf-snaps">
        <div class="container">
            <div class="section-title">
                <h3>Call us to Order</h3>
                <hr>
            </div>

            <div class="space"></div>

            <div class="row">
                <div class="col-md-6">
                    <img src="img/ajpquiz" class="img-responsive">
                </div>

                <div class="col-md-6">
                    <img src="img/ajpresult" class="img-responsive">
                </div>


            </div>

            <div class="row toppadding">


                <div class="col-md-6">
                    <img src="img/viewajp" class="img-responsive">
                </div>

                <div class="col-md-6">
                    <img src="img/editajp" class="img-responsive">
                </div>
            </div>

        </div>
    </div>
-->
    <div id="tf-snaps">

            <div class="container">

                    <div class="section-title">
                        <h3>ABOUT US</h3>
                        <br>
                        <h9>
                          YummieWheels is an Indian restaurant search and discovery service 
                          founded in 2018 by INFT C. 
                          It currently operates in VIT. 
                          It provides information and reviews on restaurants, 
                          including images of restaurants where the restaurant does not have its own website.
                        </h9>
                        <br>

                    </div>

            </div>

    </div>


    <div id="tf-contact">
        <div class="container">
            <div class="section-title">
                <h3>CONTACT US</h3>
                <p>If you have any query, any suggestions, specify your email and message along with your name regarding it and we will try
                  to revert back as soon as possible!!</p>
                <hr>
            </div>

            <div class="space"></div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="contact" method = "post">

                      <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" rows="4" id="msg" name="msg" placeholder="Message"></textarea>
                      </div>
                      <button type="submit" name="submit" id="submit" class="btn btn-primary my-btn dark">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>



    <nav id="tf-footer">
        <div class="container">
             <div class="pull-left">

            </div>
            <div class="pull-right">
                <ul class="social-media list-inline">
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script type="text/javascript" src="js/bootstrap.js"></script>

     <!-- Javascripts
     ================================================== -->
     <script type="text/javascript" src="js/main.js"></script>
     <script type="text/javascript" src="js/test.js"></script>
     <script type="text/javascript" src="js/modal.js"></script>
  </body>
</html>
