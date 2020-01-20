<?php
   include("config.php")
   ?>
<!DOCTYPE html>
<html>
<head>
<title>Alumini</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="event.css">
<?php
   error_reporting( ~E_NOTICE );

?>

<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script>
</head>
<body>
  <div id="header" >
        <ul id="top">
          <li><a href="home1.php">Home</a></li>
          <li><a href="chat1.php">Chat</a></li>
            <li><a href="alumini.php">Queries</a></li>
                <li><a href="event.php">Event</a></li>
             <li><a href="feedback1.php">feedback</a></li>
                       <li><a href="contact1.php">Contact Us</a></li>
                            <li><a href="index.php">Logout</a></li>
        </ul>
      </div>
     
     <div class="container">
            	                 <div class="row">
              <form method="POST" action="event.php" enctype="multipart/form-data" class="form-responsive form-horizontal">  
                         <div class="form-group">
          <label>ENTER THE CONTENT</label>
        <input type="text"  name="subj" sclass="form-control col-xm-2"  required></textarea>
        </div>
         DID U WANT TO INSERT ANY PIC<br>
        <div class="form-group">
        <input type="file" name="image" class="form-control s"></div><br>
<div class="form-group">
        <input type="submit" name="submit" value="submit"></div>
    </form> 
  </div>
  <hr>
      
    </div>
       <?php
              
            if(isset($_POST["submit"]))
            {
              $_p=$_POST['image'];
              $_r=$_POST["subj"];
               $maxsize = 5242880; // 5MB
  $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    if(empty($imgFile)){
      $errMSG = "Please Select Image File.";
    }
    else
    {
 $upload_dir = 'user_image/';   
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));  
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
          $userpic = rand(1000,1000000).".".$imgExt;
          if(in_array($imgExt, $valid_extensions)){     
            if($imgSize < 5000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          // $que="UPDATE query SET image=$userpic";
            //  $con->query($que);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
 
}
 $que="INSERT INTO event(image,sub) VALUES ('$userpic','$_r')";
              $con->query($que);

        
     }  
             
            
    ?>
    <?php 
      $sqle="SELECT *FROM event";
$countt=$con->query($sqle);
      while($aMessages=$countt->fetch_array())  
    {
                $sMessages .= '<form class="form-responsive  form-horizontal" action="event.php"  method="POST"><div class="row"><div class="form-group d">   <img src="user_image/'.$aMessages['image'] .'  " class="img-responsive" width="100%" height="50%" >'. '</div><div class="form-group k"> ' .'<h2>' .$aMessages['sub'].'</h2>'.'<br>' .'</div></div></form><hr>';

   }
   echo $sMessages;
          ?>

</body>
</html>
