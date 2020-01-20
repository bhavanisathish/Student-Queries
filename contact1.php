<!DOCTYPE html>
<html>
<head>
    <title>Alumini</title>
<?php
    include("config.php");
    ?>
    <link rel="stylesheet" type="text/css" href="contact.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>
</head>
<body>
    <div class="container">
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
<h3>Contact Us</h3>

<div class="contai">
  <form action="contact.php" autocomplete="off" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="" required>
    <label for="lname">Email id</label>
    <input type="text" id="lname" name="lastname" placeholder="" required>
    <label for="country">Subject</label>
    <input type="text"  name="country" placeholder="">
          <label for="subject">Description</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required"></textarea>
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<?php
if(isset($_POST["submit"]))
{
    $a=$_POST["firstname"];
    $b=$_POST["lastname"];
    $c=$_POST["country"];
    $d=$_POST["subject"];
    mail("bhavanirangasamy@gmail.com","$c From $b","$d");
}
?>
</body>
</html>
