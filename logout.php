<?php
session_start();
session_destroy();
setcookie("email" , "" , time()-60*5);
setcookie("fname" , "" , time()-60*5);
setcookie("lname" , "" , time()-60*5);
header("location:alumnilogin.php");
?>