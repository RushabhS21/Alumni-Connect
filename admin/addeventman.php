<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Event Manager</title>
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
	font-size: 50px;
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

<?php
require("../config.php");
if(isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['password']))
{
    $name = secure($_POST['name']);
    $contact = secure($_POST['contact']);
    $email = secure($_POST['email']);
    $password = secure($_POST['password']);

    $sql = "INSERT INTO `eventmanagerlogin` (`name`, `contact`, `email`, `password`, `creatioDate`) VALUES ('$name',$contact,'$email','$password',NOW())";
    $mysqli->query($sql);
    echo '<script>alert("Event Manager Account Created Successfully");</script>'; 

}
?>
<?php 
		if(!isset($_SESSION['email'])) 
		{
   		header("location:adminlogin.php");
    	}
    			?>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">VP Alumni Connect</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<a href="updateadmin.php"><i class="fa fa-user" aria-hidden="true"></i></a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/admin.jpg">
				
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
					<a href="#">
						<i class="fa fa-address-book-o" aria-hidden="true"></i>
						<span>Add Event Manager </span>
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
			<h1> Create Event Manager Account </h1>
                <form name="eventman_acc" method="post"><br><br>
                   <b>Name</b> <br>
                   <input type="text" id="name" name="name" placeholder="Enter name of Event Manager"required><br>
                    <b>Contact</b><br>
                    <input type="phone" id="contact" name="contact" placeholder="Enter contact number of Event Manager" required><br>
                    <b>Email</b><br>
                    <input type="email" id="email" name="email" placeholder="Enter email of Event Manager" required><br>
                   <b>Password</b><br>
                   <input type="password" id="password" name="password" placeholder="Create Password for Event Manager" required><br><br>
                   <input type="submit" value="Create Event Manager">
                </form>
           			
		</section>
	</div>

</body>
</html>