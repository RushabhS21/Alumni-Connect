<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alumni Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
	 .section-1 h1 {
	color: #000000;
	font-size: 60px;
}
/* .image {
  box-sizing: border-box;
}

.image {
  float: left;
  width: 33.33%;
  padding: 5px;
} */
#image{
	float:left;
}
#image img{
    width:341px;
    height:311px;
	border-radius: 8px;
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
		<i class="fa fa-power-off" aria-hidden="true"><span> Logout</span></i>		
		</a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="../img/alumni.png">
				<?php require("../config.php"); 
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:login.php");
    			}
    
    			?>
                <?php
                $sql="SELECT * from `gallery`";
                $data=$mysqli->query($sql);
                $total=mysqli_num_rows($data);
                
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
					<a href="">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>Chat</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Photo Gallary</span>
					</a>
				</li>
				<li>
					<a href="../viewevents.php">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<span>View Events</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>View Jobs</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-money" aria-hidden="true"></i>
						<span>Donate</span>
					</a>
				</li>
				
			</ul>
		</nav>
		<section class="section-1">
			<h1>Gallery</h1>
			<?php
            if($total!=0)
                {
                    while($result=mysqli_fetch_assoc($data))
                    {
						echo '<div name="image">';
                        echo "<img src='".$result['picsource']."' height='200' width='200'><br>";
						echo '</div>';
                    }
                }
                 else
                 echo "<br>No Records Found"; 
            ?>
		</section>
	</div>

</body>
</html>