<?php
   include("config.php")
   ?>
<!DOCTYPE html>
<html>
<head>
<title>Alumini</title>
<link rel="stylesheet" type="text/css" href="feedback.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php
error_reporting(~E_NOTICE);
?>

<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script>
</head>
<body>
  <ul id="top">
            <li><a href="home1.php">Home</a></li>
            <li><a href="chat1.php">Chat</a></li>
            <li><a href="alumini.php">Queries</a></li>
             <li><a href="event.php">Event</a></li>
                <li><a href="feedback1.php">feedback</a></li>
          
             <li><a href="contact1.php">Contact Us</a></li>
                  <li><a href="index.php">Logout</a></li>
        </ul>
     <div class="container">
       <div class="g">
                         <div class="row">
              <form method="POST" action="feedback1.php" enctype="multipart/form-data" class="form-responsive form-horizontal">  
                  <div class="form-group"> 
                     <h3>ENTER YOUR FEEDBACK HERE</h3>
              </div>
        <div class="form-group">
          <input type="text"  name="subj" sclass="form-control col-xm-2"  required></textarea>
        </div>
        <div class="form-group"> <center id="button">
        <input type="submit" name="submit" value="submit"></div></center>
            </form> 
    <?php
    $b=$_POST["subj"];
     if(isset($_POST["submit"]))
        mail("bhavanirangasamy@gmail.com","feedback","$b");
    ?>
</body>
</html>
