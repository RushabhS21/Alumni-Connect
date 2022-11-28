<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Admin Account</title>
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
		<a href="updateadmin.php"><i class="fa fa-user" aria-hidden="true" title="Update your Account"></i></a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/admin.jpg">
				<?php require("../config.php"); 
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:adminlogin.php");
    			}
    
    			?>
				<h4>Welcome <?php echo $_SESSION['name']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="../adminsearchalumni.php">
						<i class="fa fa-search" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
				<li>
					<a href="addeventman.php">
						<i class="fa fa-address-book-o" aria-hidden="true"></i>
						<span>Add Event Manager</span>
					</a>
				</li>
				<li>
					<a href="manageusers.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Manage Users</span>
					</a>
				</li>
				<li>
					<a href="../eventmanager/adminviewgallery.php">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Photo Gallary</span>
					</a>
				</li>
				<li>
					<a href="postjobs.php">
						<i class="fa fa-briefcase" aria-hidden="true"></i>
						<span>Post Jobs</span>
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
        <h1> Update Your Admin Account </h1>
        <?php
        if(isset($_POST['update']))	 
	 {
		 $name = secure($_POST['name']);
		 $contact = secure($_POST['contact']);
		 $email = secure($_POST['email']);
		 $password = secure($_POST['password']);
		 
		 $sql = "UPDATE `adminlogin` SET `contact`=$contact,`email`='".$email."',`password`='".$password."' WHERE `name`='".$name."'";
		 $mysqli->query($sql);
		 echo '<script>alert("Account Updated Successfully");</script>'; 
	 }
    ?>
            <form method="post" action="updateadmin.php"><br><br>
                   <b>Name</b> <br>
                   <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>"readonly><br>
                    <b>Contact</b><br>
                    <input type="phone" id="contact" name="contact" placeholder="Enter new Contact Number" required><br>
                    <b>Email</b><br>
                    <input type="email" id="email" name="email" placeholder="Enter new Email" required><br>
                   <b>Password</b><br>
                   <input type="password" id="password" name="password" placeholder="Enter new Password" required><br><br>
                   <input type="submit" name="update" value="Update Details">
            </form>
           

		</section>
	</div>

</body>
</html>