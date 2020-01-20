<?php
   include("config.php")
   ?>
<!DOCTYPE html>
<html>
<head>
<title>Student</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="queries.css">
<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script>
</head>
<body>
  <ul id="top">
            <li><a href="home.php">Home</a></li>
            <li><a href="chat.php">Chat</a></li>
            <li><a href="queries.php">Queries</a></li>
             
                <li><a href="feedback.php">feedback</a></li>
           
            <li><a href="contact.php">Contact Us</a></li>
                  <li><a href="index.php">Logout</a></li>
        </ul>
     
     <div class="container">
      <div class="g">
      	                 <div class="row">
              <form method="POST" action="queries.php" enctype="multipart/form-data" class="form-responsive form-horizontal">  
                  <div class="form-group"> 
                     <h3>ENTER YOUR QUERIES HERE</h3>
              </div>
        <div class="form-group">
          <label>ENTER THE SUBJECT </label>
        <input type="text"  name="subj" sclass="form-control col-xm-2"  required></textarea>
        </div>
        <div class="form-group">
          <label>ENTER THE DESCRIPTION</label>
        <textarea name="chat"  class="form-control col-xm-2" required></textarea>
        </div>
       <br>
        DID U WANT TO INSERT ANY VIDEO<br>
       <div class="form-group">
        <input type="file" name="file" class="form-control s">
      </div><br>
        DID U WANT TO INSERT ANY PIC<br>
        <div class="form-group">
        <input type="file" name="image" class="form-control s"></div><br>
<div class="form-group">
        <input type="submit" name="submit" value="submit"></div>
    </form> 
  </div>
     
    </div>
       <?php
                
            if(isset($_POST["submit"]))
            {
              $_s=$_POST["file"];
              $_p=$_POST['image'];
              $_r=$_POST["subj"];
              $_o=$_POST["chat"];
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


        $name = $_FILES['file']['name'];
       $target_dir = "user_video/";
       $target_file = $target_dir . $_FILES["file"]["name"];
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mp3");
       if( in_array($videoFileType,$extensions_arr) ){
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
             $que="INSERT INTO query(image,sub,chat,video,idno,flag) VALUES ('$userpic','$_r','$_o','$name','0','0')";
              $con->query($que);
            }
          }

       }else{
          echo "Invalid file extension.";
       }
        
    
     }  
               
            
    ?>

<?php
if(isset($_POST["submit"]))
header("location:queries.php");
?>
</body>
</html>
