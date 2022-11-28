<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Post Jobs</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="../img/VIT.ico"/>
	<style>
	 .section-1 h1 {
	color: black;
	font-size: 40px;
}
input[type=text] {
    width: 150%;
    padding: 12px 15px;
    margin: 10px 0;
    display: inline-block;
    border-bottom: 2px solid green;
    border-radius: 2px;
    box-sizing: border-box;
  }
 
input[type=submit] {
    width: 150%;
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
		<a href="updateadmin.php"><i class="fa fa-user" aria-hidden="true"></i></a>
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
        <?php  

	  if(isset($_POST['company'])&&isset($_POST['post'])&&isset($_POST['minquali'])&&isset($_POST['location'])&&isset($_POST['applylink']))
      {
        $company = secure($_POST['company']);          
        $post = secure($_POST['post']);
        $minquali = secure($_POST['minquali']);
        $location= secure($_POST['location']);
        $applylink = secure($_POST['applylink']);

        $sql = "INSERT INTO `jobs`(`company`, `post`, `minquali`,`location`,`applylink`) VALUES ('$company','$post','$minquali','$location','$applylink')";
        $mysqli->query($sql);
        echo "<script>alert('Job Posted');</script>";
      }
    ?>
        <h1>Post Jobs</h1>
           <form method="POST" ><br><br><br>
                   <b>Company</b> <br>
                   <input type="text" id="company" name="company" placeholder="Enter Company Name"required><br>
                    <b>Post</b><br>
                    <input type="text" id="post" name="post" placeholder="Enter Job Title"required><br>
                    <b>Minimum Qualification</b><br>
                    <input type="text" id="minquali" name="minquali" placeholder="Enter Minimum Qualifications required" required><br>
                    <b>Location</b><br>
                    <input type="text" id="location" name="location" placeholder="Enter Location of work" required><br>
                   <b>Apply Link</b><br>
                   <input type="text" id="applylink" name="applylink" placeholder="Enter the link to apply for this job"required>
                   
                   <input type="submit" name="submitBtn" value="Submit Job Post">
            </form>
            <br><br>
		</section>
	</div>

</body>
</html>