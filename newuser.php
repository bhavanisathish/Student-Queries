<?php
     include("config.php");
     ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<link rel="stylesheet" type="text/css" href="newcss.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script>

<body>
     
      <div class ="container">
      	          <center><h2>New User Sign in page</h2></center><br>
                  <div class="g">
                         <div class="q">
              	       <legend><center>New User</center></legend>
                       
                       <form method="POST" action="newuser.php" class="form-horizontal form-responsive">
                            <table  class="table-responsive">
                                  <tr class="form-group">
                                      <td class="s">Name</td>
                                      <td  class="t"><input type="text" name="name" class="form-control"></td>
                                  </tr>
                                  <tr class="form-group">
                                      <td class="s">Username</td>
                                      <td class="t"><input type="text" name="username" class="form-control"></td>
                                  </tr>
                                   <tr class="form-group">
                                      <td class="s">Email</td>
                                      <td class="t"><input type="text" name="email" class="form-control"></td>
                                  </tr>
                                  <tr class="form-group">
                                      <td class="s">Password</td>
                                      <td class="t"><input type="password" name="password" class="form-control"></td>
                                  </tr>
                                                                    <tr class="form-group">
                                      <td class="s">Confirm Password</td>
                                      <td class="t"><input type="password" name="cpassword" class="form-control"></td>
                                  </tr>
                                  <tr class="form-group">
                                      <td class="s">Security Question</td>
                                 <td class="t">
                                       <select name="question">
                                        <option value="What is Your Nick Name?">What is Your Nick Name?</option>
                                         <option value="What is Your Fav color?">What is Your Fav color?</option>
                                          <option value="What is Your Fav Book?">What is Your Fav Book?</option>
                                           <option value="What is Your Fav Subject?">What is Your Fav Subject?</option>
                                            <option value="What is Your Pet Name?">What is Your Pet Name?</option>
                                      </select></td>
                                  </tr>
                                  <tr class="form-group">
                                      <td class="s">Answer</td>
                                      <td class="t"><input type="text" name="answer" class="form-control"></td>
                                  </tr>
                                 
                                  <tr class="form-group">
                                      <td id="color" ><input type="reset" id="s" value="Clear" name="clear" class="btn btn-primary"></td>
                                      <td id="color" ><input type="submit" id="r" value="Save" name="submit" class="btn btn-primary"></td>
                                  </tr>
                                  <tr class="form-group">
                                      <td id="hover" ><a href="help.php">Help?</a></td>
                                      <td id="hover"><a href="sign.php">Already a User</a></td>
                                  </tr>
                            </table>
                </div>
     

</form>
</fieldset>
</div>
</div>

              <?php
                if (isset($_POST["submit"])) 
                {
                                        $name=$_POST["name"];
                     $username=$_POST["username"];
                     $password=$_POST["password"];
                     $cpassword=$_POST["cpassword"];
                     $question=$_POST["question"];
                     $answer=$_POST["answer"];

                     if ($name!=""&&$username!=""&&$password!=""&&$cpassword!=""&&$question!=""&&$answer!="")
                      {
                           if ($password==$cpassword)
                            {
                                $sql="INSERT INTO user(NAME,USERNAME,PASSWORD,QUESTION,ANSWER)
                                VALUES
                                ('$name','$username','$password','$question','$answer')";
                               
                                if ($con->query($sql))
                                 {
                                   mail("snnithish124@gmail.com","student","A New User($name) Has Been Registered");
                                 header("location:sign.php?mes=<p class='correct'>added.please login here.</p>");
                                }
                                else{
                                   echo "<p class='error'>try again later</p>";
                                }
                            }
                           else
                            {
                              echo "<p class='error'>Password must be same";
                            }
                     }

                    else
                    {
                         echo "<p class='error'> Required";
                     }


                }
                else
                {
                   echo "<p class='error'>";
                }
                
    
                 ob_end_flush();   
              ?>
    
</body>
</html>
