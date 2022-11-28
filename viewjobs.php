<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Jobs</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="img/VIT.ico"/>
</head>
<style>
	.section-1 h1 {
	color: black;
	font-size: 30px;
}
table{
border-collapse: collapse;
width: 100%;
}
td, th {
  border: 1px solid #fff;
  padding: 8px;
}

tr{background-color: #fff;}

tr:hover {background-color: #fff;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
 
}
a{
	color:black;
}
a:hover{
	color:blue;
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
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/alumni.png">
				<?php require("config.php"); 
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:alumnilogin.php");
    			}
    
    			?>
				<h4>Welcome <?php echo $_SESSION['fname']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="update_alumni.php">
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
					<a href="#">
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
                <h1> View Jobs</h1><br><br>
                <table>
        <thead>
            <tr>
                <th>Sr</th>
                <th>Company</th>
                <th>Post</th>
                <th>Minimum Qualification</th>
                <th>Location</th>
                <th>Apply Link</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT * FROM `jobs`";
            $result = $mysqli->query($sql);
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $i++;
            ?>

            <tr> 
                <td><?php echo $i; ?></td>
                <td><?php echo $row['company']; ?></td>
                <td><?php echo $row['post']; ?></td>
                <td><?php echo $row['minquali']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td>
                <a target="_blank" href="<?php echo $row['applylink']; ?>">Click here to apply</a>               
                </td>
            </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		</section>
	</div>

</body>
</html>