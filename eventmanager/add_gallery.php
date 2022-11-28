<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Gallary</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="../img/VIT.ico"/>
	<script src="../alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../alert/sweetalert.css">
	<style>
  .section-1 h1 {
	color: #000000;
	font-size: 60px;
}
input[type=file]{
  border: 1px solid green;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
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
    <?php 
		// require("../config.php"); 
        //  if(!isset($_SESSION['email'])) 
        //  {
        //      header("location:eventmanagerlogin.php");
        //  }
	?>
	<?php
	include("../config.php");
	if($_POST['submit'])
	{
	$filename=$_FILES["uploadfile"]["name"];
	$tempname=$_FILES["uploadfile"]["tmp_name"];
	$folder="gallery/".$filename;
	move_uploaded_file($tempname,$folder);
	
	if($filename!="")
	{
		$sql="INSERT INTO `gallery` (`picsource`) VALUES ('$folder')";
		$data=$mysqli->query($sql);

		if($data)
		{
			echo '<script>swal("Inserted!", "Image added to the Gallery !", "success");</script>'; "<br>";			
		}
	
	}
	else
	{
		echo '<script>swal("Not Inserted !", "Select the image first !", "error");</script>';
	}	
}
    ?>
	
    <h4>Welcome <?php echo $_SESSION['name']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="update_eventman.php">
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
					<a href="">
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
        <h1> Upload Images </h1>
            <form method="post" enctype="multipart/form-data"><br><br>
				<input type="file" name="uploadfile" accept="image/png, image/jpeg">
				<input type="submit" value="Upload" name="submit">
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
            </form>
           
			
		</section>
	</div>

</body>
</html>