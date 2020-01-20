
<html>
<head>
  <title>Student</title>
  <link rel="stylesheet" type="text/css" href="chat.css">
</head>
 <div id="header">
        <ul id="top">
          <li><a href="home.php">Home</a></li>
          <li><a href="chat.php">Chat</a></li>
            <li><a href="queries.php">Queries</a></li>
            
                          <li><a href="feedback.php">feedback</a></li>
                <li><a href="contact.php">Contact Us</a></li>
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
      	<form method="POST" action="chat.php" id="messageForm">
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
                $con->query($que1);

    header("location:chat.php"); 
ob_end_flush();
}
  ?>
</div>

</body>
</html>