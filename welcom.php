<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php require("config.php"); 
    
    if(!isset($_SESSION['email'])) {
        header("location:login.php");
    }
    
    ?>
    
    Welcome <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>. You are logged in.<br><br>

    <a href="logout.php">Logout</a>
</body>
</html>