
<html>
<head>
  <title>Alumini</title>
  <link rel="stylesheet" type="text/css" href="chat.css"></head>
 <div id="header">
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
</html>
<?php
 ob_start();
error_reporting( ~E_NOTICE );
include("config.php");
 $v="SELECT *from chat ORDER BY  time(Date) DESC,YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC";
    $countt=$con->query($v);
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
    $_a="snnithish";
    while($aMessages=$countt->fetch_array())
    {
        if($aMessages['sender']=="nithish")
        {
                       $sMessages .= '<div class="col-sm-12 message-main-sender">
                          <div class="sender">' . $aMessages['sender'] . '<div class="message-text"> ' . $aMessages['msg'] . '</div></div></div>'.'<br><br>'; 
                    
        }
        else
        {
           $sMessages .= '<div class="col-sm-12 message-main-receiver">
            <div class="receiver">' . $aMessages['sender'] . '<div class="message-text"> ' . $aMessages['msg'] . '</div></div></div>'.'<br><br>';
        }
   }
  echo ' <div id="chatBox"><div class="row message-body">'.$sMessages.'</div></div>'; 
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
    
  
  </head>
<body>
  <div class="container">
       <div class="a" >
      	<form method="POST" action="chat1.php" id="messageForm">
    NAME	
		<input type="name" name="name"><br><br>MESSAGE
        <textarea name="msg" class="message"></textarea><br><br>
         <input type="submit" name="send" value="send" class="g">
  </form>
</div>
 </div>
	<?php
    
  if(isset($_POST['send']))
  {
       $name=$_POST["name"];
    $msg=$_POST["msg"];
    $imgFile = $_FILES['image']['name'];
              $tmp_dir = $_FILES['image']['tmp_name'];
              $imgSize = $_FILES['image']['size'];
               $que1="INSERT INTO `chat` (`sender`, `msg`, `date`, `time`) VALUES ('$name', '$msg', CURRENT_DATE(), CURRENT_TIME())";
                $con->query($que1);/*
                if(empty($imgFile)){
               $que1="INSERT INTO `chat` (`sender`, `msg`, `date`, `time`) VALUES ('$name', '$msg', CURRENT_DATE(), CURRENT_TIME())";
                $con->query($que1);
                }
               else
               {
                   $upload_dir = 'user_image/';   
                   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));  
                  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                  $userpic = rand(1000,1000000).".".$imgExt;
                  $us=$userpic;
                  $que="INSERT INTO chat(sender,msg) VALUES ('$name','$us')";
                   $con->query($que);
                  if(in_array($imgExt, $valid_extensions)){     
                  if($imgSize < 5000000)        {
                  move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                       }
                     else{
                     $errMSG = "Sorry, your file is too large.";
                     }
                   }
                   else{
                    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
                    }
 
               }*/

    header("location:chat1.php"); 
ob_end_flush();
}
  ?>
</div>

</body>
</html>