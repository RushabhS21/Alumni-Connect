<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Event Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="../img/VIT.ico"/>
	<style>

   input[type=date], input[type=time],input[type=text], input[type=phone] {
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
	font-size: 60px;
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
  
  table{
border-collapse: collapse;
width: 100%;
}
td, th {
  border: 1px solid #fff;
  padding: 8px;
}

tr:nth-child(even){background-color: #fff;}

tr:hover {background-color: #fff;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
 
}
    </style>
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
				<?php require("../config.php"); 
    
				if(!isset($_SESSION['email'])) 
				{
        			header("location:eventmanagerlogin.php");
    			}
    
    			?>
				<h4>Welcome <?php echo $_SESSION['name']; ?></h4>
			</div>
            <?php
      

        if(isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['date'])&&isset($_POST['time'])&&isset($_POST['status'])&&isset($_GET['id']))
        {
            $id = secure($_GET['id']);
            $title = secure($_POST['title']);
            $description = secure($_POST['description']);
            $date = secure($_POST['date']);
            $time = secure($_POST['time']);
            $status = secure($_POST['status']);
    
            $sql = "UPDATE `events` SET `title`='$title',`description`='$description',`date`='$date',`time`='$time',`status`='$status' WHERE `id`=$id";
            $mysqli->query($sql);
            header("location:scheduleevent.php");
        }
    ?>

    <?php

    if(isset($_GET['id']))
    {
        $id = secure($_GET['id']);

        $sql = "SELECT * FROM `events` WHERE id=$id";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>
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
					<a href="add_gallery.php">
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
		<h1> Edit Event Details</h1>
        <form method="POST" ><br><br>
                   <b>Title</b> <br>
                   <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
                    <b>Description</b><br>
                    <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>"><br>
                    <b>Date</b><br>
                    <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>"><br>
                   <b>Time</b><br>
                   <input type="time" id="time" name="time" value="<?php echo $row['time']; ?>">
                   <b>Status</b><br>
                   <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>"><br><br>
                   
                   <input type="submit" name="submitBtn" value="Save Changes">
            </form>
		</section>
	</div>

</body>
</html>