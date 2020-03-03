
<!DOCTYPE HTML>
<html>
	<head>
		<title>Add a Restraunt</title>
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
         if(isset($_POST['add'])) {


            $resname = $_POST['resname'];
            $cat = $_POST['cat'];
            $tel = $_POST['tel'];
            $approx = $_POST['approx'];
            $ploc = $_POST['ploc'];
            $resadd = $_POST['resadd'];

            $name = $_FILES['image']['name'];
            $name1 = $_FILES['menu1']['name'];
            $name2 = $_FILES['menu2']['name'];
             $target_dir = "image/";
             $target_file = $target_dir . basename($_FILES["image"]['name']);
             $target_file1 = $target_dir . basename($_FILES["menu1"]['name']);
             $target_file2 = $target_dir . basename($_FILES["menu2"]['name']);

             // Select file type
             $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
             $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
             $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

             // Valid file extensions
             $extensions_arr = array("jpg","jpeg","png","gif");

            if( in_array($imageFileType and $imageFileType1 and $imageFileType2,$extensions_arr) ){

          
                $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                $image_base641 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                $image_base642 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                $menu1 = 'data:image/'.$imageFileType1.';base64,'.$image_base641;
                $menu2 = 'data:image/'.$imageFileType2.';base64,'.$image_base642;







  //$f=addcslashes(file_get_contents($_FILES['image']['tmp_name']));
 //$fp=base64_encode($f);
              $sql = "INSERT INTO restaurant". "(resname,cat,tel,approx,ploc,resadd,image,menu1,menu2)". "VALUES('$resname','$cat','$tel','$approx','$ploc','$resadd','$image','$menu1','$menu2')"; 

               $result = mysqli_query( $db, $sql );
               //move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);

               if( $result )
               {
                echo '<script>alert("Image Inserted into Database")</script>';
                 header('location:resview.php');
               }
               else{
                echo '<script>alert("Unseddfulll!!")</script>';
                header('location:resadd.php');
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
}
            ?>

	<input type="submit" onclick=window.location.href="resview.php" value="Back">

    <div class="form">

      <h1>Add a Restaurant</h1>

            <form action="" method="post" enctype="multipart/form-data">

              <div class="field-wrap">
              
                Restaurant Name<span class="req">*</span>
              
              <input id="resname" type="text" name="resname" required autocomplete="off" placeholder="Restaurant name..." />
            </div>

            <div class="field-wrap">
            	<select name="cat" required>
                    <option disabled selected>Choose a Category</option>
                <option value="Cafe">Cafe</option>
            		<option value="Veg Restaurant">Veg Restaurant</option>
            		<option value="Bakery">Bakery</option>
            		<option value="Family Restaurant">Family Restaurant</option>
            		<option value="Pub">Pub</option>
            	</select>
            </div>

            <div class="field-wrap">
                Contact no.<span class="req">*</span>
              <input id="tel" type="tel" name="tel" required autocomplete="off" placeholder="Telephone..." />
            </div>

			<div class="field-wrap">
                Approx for 2<span class="req">*</span>    
              <input id="approx type="number" name="approx" required autocomplete="off"/ ">
            </div>          

            <div class="field-wrap">
              <select name="ploc" required>
                    <option disabled selected>Choose an Area</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Pune">Pune</option>
                <option value="Delhi">Delhi</option>
              </select>
            </div>  

            <div class="field-wrap">
                Address<span class="req">*</span>
              <textarea id="resadd" rows="4" cols="30" name="resadd" placeholder="Complete Address..."></textarea>
            </div>

            <div class="field-wrap">
                Insert Image<span class="req">*</span>
              <input id="image" type="file" name="image" accept="image/*"/>
            </div>
            <div class="field-wrap">
                Insert Menu 1<span class="req">*</span>
              <input id="menu1" type="file" name="menu1" accept="image/*"/>
            </div>
            <div class="field-wrap">
                Insert Menu 2<span class="req">*</span>
              <input id="menu2" type="file" name="menu2" accept="image/*"/>
            </div>
            <button id="add" name="add" class="button button-block"/>Submit</button><br>
            <button type="reset" value="reset" class="button button-block" />Reset</button>

            </form>

          </div>

          </div>

        </div><!-- tab-content -->

  </div> <!-- /form -->
  <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
				
				<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>