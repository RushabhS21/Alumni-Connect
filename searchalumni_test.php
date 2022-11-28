<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alumni Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
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
	</style>
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
		<h2 class="u-name">VP Alumni Connect
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
				<img src="img/alumni.png">
				<?php
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:login.php");
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
					<a href="">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Search Alumni</span>
					</a>
				</li>
				<li>
					<a href="">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>Chat</span>
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
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>View Jobs</span>
					</a>
				</li>
				
				
			</ul>
		</nav>
		<section class="section-1">
		<h1>Search Alumni</h1>
		<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Name" value="<?php echo $searchKey; ?>" > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>
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
				<th>Diploma Passout Year</th>
				<th>Degree/Other College</th>
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
				<td><?php echo $row['dippassout']; ?></td>
				<td><?php echo $row['degrcollege']; ?></td>
				<td> <img width= 100 height= 100 src="<?php echo $row['identitycard']; ?>" /> </td>
				<!-- <td>
				 <?php 
				// $sql="SELECT `identitycard` from `alumnidata`";
    			// $data=$mysqli->query($sql);
    			// $total=mysqli_num_rows($data); 
				
				// if($total!=0)
                // {
                    //while(
						// $result=mysqli_fetch_assoc($data);
                    //{
                        // echo "<img src='".$result['identitycard']."' height='100' width='100'><br>";
                   // }
                       
                // }
                //  else
                //  echo "<br>No Records Found"; 
				?>

				</td> -->
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