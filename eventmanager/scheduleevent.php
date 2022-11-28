<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Schedule Events</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" type="image/png" href="../img/VIT.ico"/>
  <style>
  a.edit {
    color: #FFC107;
}
a.delete {
    color: #E34724;
}
   input[type=password], input[type=email],input[type=text], input[type=phone],input[type=date], input[type=time] {
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
		<a href="logout.php">
		<i class="fa fa-sign-out" aria-hidden="true"><span> Logout</span></i>		
		</a>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/eventmanager.png">	
    <?php require("../config.php"); 
    
   
	  if(isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['date'])&&isset($_POST['time'])&&isset($_POST['status']))
      {
        $title = secure($_POST['title']);          
        $description = secure($_POST['description']);
        $date = secure($_POST['date']);
        $time = secure($_POST['time']);
        $status = secure($_POST['status']);

        $sql = "INSERT INTO `events`(`title`, `description`, `date`, `time`, `status`) VALUES ('$title','$description','$date','$time','$status')";
        $mysqli->query($sql);
        
      }
    ?>
    <?php 
				if(!isset($_SESSION['email'])) 
				{
        			header("location:eventmanagerlogin.php");
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
					<a href="add_gallery.php">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
						<span>Update Gallary</span>
					</a>
				</li>
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
        <h1>Schedule Events</h1>
           <form method="POST" ><br><br>
                   <b>Title</b> <br>
                   <input type="text" id="title" name="title" placeholder="Enter title of the event" required><br>
                    <b>Description</b><br>
                    <input type="text" id="description" name="description" placeholder="Enter description of the event" required><br>
                    <b>Date</b><br>
                    <input type="date" id="date" name="date" required><br>
                   <b>Time</b><br>
                   <input type="time" id="time" name="time" required>
                   <b>Status</b><br>
                   <input type="text" id="status" name="status" placeholder="Enter status of the event" required><br><br>
                   
                   <input type="submit" name="submitBtn" value="Schedule">
            </form>
            <br> <br>
    <h2 style="color:white">View Event Info</h2>
    <table>
        <thead>
            <tr>
                <th>Sr</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT * FROM `events`";
            $result = $mysqli->query($sql);
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $i++;
            ?>
              
            <tr> 
                <td><?php echo $i; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td> <a class="edit" href="edit_event.php?id=<?php echo $row['id']; ?>" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> 
                <a class="delete" href="delete_event.php?id=<?php echo $row['id']; ?>" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>
                            
            </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
		</section>
	</div>

</body>
</html>