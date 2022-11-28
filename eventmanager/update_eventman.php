<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Event Manager Account</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="../img/VIT.ico"/>
	<style>
   input[type=password], input[type=email],input[type=text], input[type=phone] {
    width: 200%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border-bottom: 2px solid green;
    border-radius: 2px;
    box-sizing: border-box;
  }
  .section-1 h1 {
	color: #000000;
	font-size: 40px;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
input[type=submit]:hover {
    background-color: #45a049;
  }
    </style>
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">VP Alumni Connect</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<a href="logout.php">
		<i class="fa fa-sign-out" aria-hidden="true"><span> Logout</span></i>		
		</a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
			<img src="img/eventmanager.png">		
    <?php require("../config.php"); 
    
            if(!isset($_SESSION['email'])) 
            {
                 header("location:eventmanagerlogin.php");
            }
	?>
	<?php
	 if(isset($_POST['update']))	 
	 {
		 $name = secure($_POST['name']);
		 $contact = secure($_POST['contact']);
		 $email = secure($_POST['email']);
		 $password = secure($_POST['password']);
		 
		 $sql = "UPDATE `eventmanagerlogin` SET `contact`=$contact,`email`='".$email."',`password`='".$password."' WHERE `name`='".$name."'";
		 $mysqli->query($sql);
		 echo '<script>alert("Your Account Updated Successfully");</script>'; 
	 }
    ?>
	
    <h4>Welcome <?php echo $_SESSION['name']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="#">
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<span>Update Details</span>
					</a>
				</li>
				<li>
					<a href="../eventmansearchalumni.php">
						<i class="fa fa-search" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
				
				<li>
					<a href="add_gallery.php">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Update Gallary</span>
					</a>
				</li>
				
				<li>
                <a href="scheduleevent.php">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<span>Schedule Events</span>
					</a>
				</li>
                
                <li>
                <a href="logout.php">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
                </li>
			</ul>
		</nav>
		<section class="section-1">
        <h1> Update Event Manager Account </h1>
	
            <form method="post" action="update_eventman.php"><br><br>
                   <b>Name</b> <br>
                   <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>"readonly><br>
                    <b>Contact</b><br>
                    <input type="phone" id="contact" name="contact" placeholder="Enter new contact number"required><br>
                    <b>Email</b><br>
                    <input type="email" id="email" name="email" placeholder="Enter new email" required><br>
                   <b>Password</b><br>
                   <input type="password" id="password" name="password" placeholder="To change, Enter new password" required><br><br>
                   <input type="submit" name="update" value="Update Details">
            </form>
           
			
		</section>
	</div>

</body>
</html>