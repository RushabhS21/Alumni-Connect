<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gallary</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="../img/VIT.ico"/>
	<style>
		 .section-1 h1 {
	color: black;
	font-size: 30px;
}

.image {
  float: left;
  width: 50%;
  padding: 10px;
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
		<a href="../admin/updateadmin.php"><i class="fa fa-user" aria-hidden="true"></i></a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="../admin/img/admin.jpg">
				<?php require("../config.php"); 
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:../admin/adminlogin.php");
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
					<a href="../admin/addeventman.php">
						<i class="fa fa-address-book-o" aria-hidden="true"></i>
						<span>Add Event Manager</span>
					</a>
				</li>
				<li>
					<a href="../admin/manageusers.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Manage Users</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Photo Gallary</span>
					</a>
				</li>
				<li>
					<a href="../admin/postjobs.php">
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
		<h1> View Gallary </h1>
        <?php
                $sql="SELECT * from `gallery`";
                $data=$mysqli->query($sql);
                $total=mysqli_num_rows($data);
                
            if($total!=0)
                {
                    while($result=mysqli_fetch_assoc($data))
                    {


						
						echo "<img class='image' src='".$result['picsource']."'/>";
				
						 
                    }
                }
                 else
                 echo "<br>No Records Found"; 
            ?>
			
		</section>
	</div>

</body>
</html>