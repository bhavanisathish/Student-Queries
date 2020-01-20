<?php
   include("config.php")
   ?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="index.css"></head>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<title>Student</title>

</head>
<body>
      <div class="container">
         <span class="h2">LOGIN HERE</span>
     <br>
         <br>
        <div class="g">
          <br>
             <form  class="m form-horizontal" method="POST" action="sign.php">
              <div class="form-group h">
                <img src="per.png"  class="img-responsive">
                  </div>
                  <br>
                  <br>
          
                      <div class="form-group">
                              <label class="control-label col-xs-2">Username</label>
                                     <input type="text" name="name" class="tb4 form-control col-xs-2">
                                         </div><br>
                  <div class="form-group">
                   <label class="control-label col-xs-2">Password</label>
                         <input type="password" name="password" class="tb4 form-control col-xs-2">
                                                                </div><br><br>
                  <div class="form-group">
                        <div class="col-xm-3 ">
                 <input type="reset" class="k btn btn-primary btn-group-horizontal" value="Clear" name="clear">
                 <input type="submit" class=" l btn btn-primary btn-group-horizontal" value="Login" name="submit">
                          </div>
                               </div>
                               <br>
                               <div class="form-group">
                        <div class="col-xm-3 ">
                           <a href="1.php" class="btn  btn-group-horizontal">Forget password?</a>
                           <a href="newuser.php" class=" q btn btn-group-horizontal">New User Registration</a>
                                      </div>
                                </div><br>
                                  <div class="col-sm-3 "><a href="help.php">Help!</a></div>
                      
                       
                         
 
</div>
     
        </form> 
      
</div>
                

 <?php
      if (isset($_POST["submit"])) 
      {
         $_SESSION["name"]=$_POST["name"];
         $_SESSION["pass"]=$_POST["password"];
        $name=$_POST["name"];
              $password=$_POST["password"];
        if ($name!=""&&$password!="")
        {
          $sql="SELECT USERNAME,PASSWORD FROM user WHERE USERNAME='$name' AND PASSWORD='$password'";
          $result=$con->query($sql);
          if ($result->num_rows>0) {
            $_SESSION["name"]=$name;
             mail("bhavanirangasamy@gmail.com","student","$name has been logged in");
            header("location:home.php");
          }
          else{
            echo "<p class='error'>Invalid User or Password</p>";
          }
        }
        else
        {
          echo "<p class='error'>Please Enter all details</p>";
        }
      }
      else
      {
        echo "<p></p>";
      }
 ?>
     

</body>
</html>