<?php
$con=new mysqli("localhost","root","","student");
session_start();
if ($con->connect_error)
 {
	echo $con->connect_error;
	die("sorry");
}

?>