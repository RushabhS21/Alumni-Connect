<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Alumni Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="img/VIT.ico"/>
	<script src="alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="alert/sweetalert.css">
</head>
<style>
input[type=email],input[type=text], input[type=phone],input[type=number],select{
    width: 120%;
    padding: 9px 20px;
    margin: 10px 0;
    display: inline-block;
    border-bottom: 2px solid green;
    border-radius: 2px;
    box-sizing: border-box;
  }
  input[type=file]{
    width: 120%;
  border: 1px solid green;
  border-radius: 2px;
  padding: 5px 8px;
  outline: none;
  cursor: pointer;
}
input[type=submit] {
    width: 120%;
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
	.section-1 h1 {
	color: black;
	font-size: 30px;
} 
	</style>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">VP Alumni Connect
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<a href="logout.php">
		<i class="fa fa-sign-out" aria-hidden="true"><span> Logout</span></i>		
		</a>
	</header>
    <?php
    require("config.php");
    if(isset($_POST['update']))	 
	 {
		$email = secure($_POST['email']);	 
        $dippassout = secure($_POST['dippassout']);
		$contact = secure($_POST['contact']);
		$dipcollege = secure($_POST['dipcollege']);
		$branch = secure($_POST['branch']);
        $companyworking = secure($_POST['companyworking']);
		
		$filename=$_FILES["identitycard"]["name"];
		$tempname=$_FILES["identitycard"]["tmp_name"];
		$folder="IDCard/".$filename;
		move_uploaded_file($tempname,$folder);

		$sql = "UPDATE `alumnidata` SET `contact`=$contact,`dipcollege`='".$dipcollege."',`branch`='".$branch."',`dippassout`=$dippassout,`companyworking`='".$companyworking."', `identitycard`= '".$folder."' WHERE `email`='".$email."'";
		$mysqli->query($sql);

		echo '<script>swal("Congrats !", "Your account is updated successfully !", "success");</script>'; 
        //  header("update_alumni.php");
	 }
    ?>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/alumni.png">
				<?php 
				if(!isset($_SESSION['email'])) 
				{
        			header("location:alumnilogin.php");
    			}
    			?>
				<h4>Welcome <?php echo $_SESSION['fname']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="#">
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<span>Update Details</span>
					</a>
				</li>
				<li>
					<a href="searchalumni.php">
						<i class="fa fa-search" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
			
				<li>
					<a href="eventmanager/gallery.php">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Photo Gallary</span>
					</a>
				</li>
				<li>
					<a href="viewevents.php">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<span>View Events</span>
					</a>
				</li>
				<li>
					<a href="viewjobs.php">
						<i class="fa fa-briefcase" aria-hidden="true"></i>
						<span>View Jobs</span>
					</a>
				</li>
				<li>
					<a href="home.php">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<span>Chat</span>
					</a>
				</li>
				
			</ul>
		</nav>
		<section class="section-1">
                <h1> Update Alumni Details</h1>
                <form method="POST" enctype="multipart/form-data"><br>
                   <b>First Name</b> <br>
                   <input type="text" id="fname" name="fname" value="<?php echo $_SESSION['fname']; ?>" readonly><br>
                    <b>Last Name</b> <br>
                    <input type="text" id="lname" name="lname" value="<?php echo $_SESSION['lname']; ?>" readonly><br>
                    <b>Email</b><br>
                    <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly><br>
                   <b>Mobile Number</b><br>
                   <input type="phone" id="contact" name="contact" placeholder="Enter your Mobile Number" required><br>
                   <b>Degree College Name</b><br>
                   <input type="text" id="dipcollege" name="dipcollege" value="Vidyalankar Institute of Technology" readonly><br>
				   
				   <b>Branch of Degree</b><br>
 
 					<select name="branch" >
 					<option disabled>---Select Branch of Degree--</option>
 						<option value="Information Technology" >Information Technology</option>
 						<option value="Computer Engineering">Computer Engineering</option>
 						<option value="Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
						<option value="Electronics Engineering">Electronics Engineering</option>
 					</select><br>
                   
				   <b>Degree Passout Year</b><br>
                   <select name="dippassout">
 					<option disabled>---Select Passout Year--</option>
 						<option value="2015">2015</option>
						 <option value="2016">2016</option>
						 <option value="2017">2017</option>
						 <option value="2018">2018</option>
						 <option value="2019">2019</option>
						 <option value="2020">2020</option>
						 <option value="2021">2021</option>
						 <option value="2022">2022</option>
						 <option value="2023">2023</option>
						 <option value="2024">2024</option>
						 <option value="2025">2025</option>
 					</select><br>
                   <b>Identity Card of Company</b><br>
                   <input type="file" id="identitycard" name="identitycard" accept="image/png, image/jpeg"><br>
                   <b>Company Name</b><br>
                   <input type="text" id="companyworking" name="companyworking" placeholder="Enter Company Name where you are working"><br>
                   
                   <input type="submit" name="update" value="Update">
            </form>
		
			
		</section>
	</div>

</body>
</html>