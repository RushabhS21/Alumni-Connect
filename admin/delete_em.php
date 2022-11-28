<?php

require('../config.php');

if(isset($_GET['id']))
{
    $id = secure($_GET['id']);
    $sql = "DELETE FROM `eventmanagerlogin` WHERE `id`= $id";
    $mysqli->query($sql);
    header("location:manageusers.php");
}

?>
