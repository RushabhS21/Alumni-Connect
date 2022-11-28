<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" type="image/png" href="../img/VIT.ico"/>
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
					<a href="addeventman.php">
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
		<h1> Manage Alumni </h1>
		<br>
        <table>
        <thead>
            <tr>
                <th>Sr</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT * FROM `user`";
            $result = $mysqli->query($sql);
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $i++;
            ?>
   
            <tr> 
                <td><?php echo $i; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td> 
                <a class="delete" href="delete_user.php?id=<?php echo $row['id']; ?>" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
                            
            </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
	<br><br>
	<h1> Manage Event Managers </h1>
	<br><br>
<table>
<thead>
	<tr>
		<th>Sr</th>
		<th>Name</th>
		<th>Contact</th>
		<th>Email</th>
		<th>Delete User</th>
	</tr>
</thead>
<tbody>
	
	<?php
	$sql = "SELECT * FROM `eventmanagerlogin`";
	$result = $mysqli->query($sql);
	$i=0;
	while($row = $result->fetch_assoc())
	{
		$i++;
	?>

	<tr> 
		<td><?php echo $i; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['contact']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td> 
		<a class="delete" href="delete_em.php?id=<?php echo $row['id']; ?>" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
					
	</tr>

	<?php
	}
	?>
</tbody>
</table>
<br><br><br><br>
		</section>
	</div>

</body>
</html>