<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Alumni</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" type="image/png" href="img/VIT.ico"/>
	<style>
	button{
  background-color: #F0F8FF;
  color: black;
  padding: 10px 30px;
  cursor: pointer;
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid green;
  border-radius: 4px;
}
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
<?php
           require("config.php"); 
		   if(isset($_POST['search']))
		   {
			   $searchKey=$_POST['search'];
			   $sql="SELECT * from `alumnidata` WHERE `fname` LIKE '%$searchKey%'";
		   }
		   else{
		   $sql="SELECT * from `alumnidata`";
		   $searchKey="";
		   }
		   $result=$mysqli->query($sql);
	   ?>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">VP Alumni Connect</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<a href="admin/updateadmin.php"><i class="fa fa-user" aria-hidden="true"></i></a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="admin/img/admin.jpg">
				<?php
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:admin/adminlogin.php");
    			}
    
    			?>
				<h4>Welcome <?php echo $_SESSION['name']; ?></h4>
			</div>
			<ul>
				<li>
					<a href="#">
						<i class="fa fa-search" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
				<li>
					<a href="admin/addeventman.php">
						<i class="fa fa-address-book-o" aria-hidden="true"></i>
						<span>Add Event Manager</span>
					</a>
				</li>
				<li>
					<a href="admin/manageusers.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Manage Users</span>
					</a>
				</li>
				<li>
					<a href="eventmanager/adminviewgallery.php">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Photo Gallary</span>
					</a>
				</li>
				<li>
					<a href="admin/postjobs.php">
						<i class="fa fa-briefcase" aria-hidden="true"></i>
						<span>Post Jobs</span>
					</a>
				</li>
				
				<li>
					<a href="admin/logout.php">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
		
		<h1>Search Alumni</h1>
		<form action="" method="POST"> 
						<input type="text" name="search" placeholder="Search By Name" value="<?php echo $searchKey; ?>" > 
				
						<button class="btn">Search</button>
					<br>
		</form>

		<table>
        <thead>
            <tr>
                <th>Sr</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Diploma College</th>
				<th>Diploma Branch</th>
				<th>Diploma Passout Year</th>
				<th>Identity Card</th>
				<th>Company Working</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
           
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $i++;
			
            ?>

            <tr> 
                <td><?php echo $i; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['dipcollege']; ?></td>
				<td><?php echo $row['branch']; ?></td>
				<td><?php echo $row['dippassout']; ?></td>
				<td> <img width= 100 height= 100 src="<?php echo $row['identitycard']; ?>" /> </td>				
				<td><?php echo $row['companyworking']; ?></td>		
            </tr>
				
			<?php
            }
            ?>	
        </tbody>
    </table>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</section>
	</div>

</body>
</html>