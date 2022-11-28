<?php
date_default_timezone_set("Asia/Kolkata");
$date=date('F j, Y g:i:a');

//mysqli procedural
$conn=mysqli_connect("localhost","root","","vp_alumni_connect");
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
?>