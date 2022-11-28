<?php
require("config.php");

if(isset($_POST['email']))
{
    $email = secure($_POST['email']);
    $sql = "SELECT count(*) as `count` FROM `user` WHERE `email`='$email'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    $sql2 = "SELECT count(*) as `count1` FROM `alumnidata` WHERE `email`='$email'";
    $result1 = $mysqli->query($sql2);
    $row1 = $result1->fetch_assoc();
    
    if($row['count']==0 && $row1['count1']==0)
    {
        echo "unique";
    }
    else {
        echo "exists";
    }
}