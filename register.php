<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Sign Up</title>
    <link href="Content/bootstrap.css" rel="stylesheet"/>
<link href="Content/site.css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="img/VIT.ico"/>
   <script src="Scripts/modernizr-2.8.3.js"></script>
   <script src="alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="alert/sweetalert.css">
  <style>
  input[type=number],select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border-bottom: 2px solid green;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>
</head>
<body>
<?php

require("config.php");

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['contact'])&&isset($_POST['email'])&&isset($_POST['password']))
{
    
    $fname = secure($_POST['fname']);
    $lname = secure($_POST['lname']);
    $contact = secure($_POST['contact']);
    $branch= secure($_POST['branch']);
    $passout= secure($_POST['passout']);
    $email = secure($_POST['email']);
    $password = secure($_POST['password']);
    $sqln = "SELECT * FROM `passout` WHERE `fname`='$fname' AND `lname`='$lname' AND `branch`='$branch' AND `passout`=$passout";
    $resultn = $mysqli->query($sqln);
    if($rown = $resultn->fetch_assoc())
    {
    $sql = "INSERT INTO `user`(`fname`, `lname`, `contact`, `branch`, `passout`, `email`, `password`, `creatioDate`) 
    VALUES ('$fname','$lname',$contact,'$branch','$passout','$email','$password',NOW())";
    $sql2 = "INSERT INTO `alumnidata`(`fname`, `lname`, `contact`, `email`,`branch`, `dippassout`)
    VALUES ('$fname','$lname',$contact,'$email','$branch','$passout')";
    $res1=$mysqli->query($sql2);
    $res=$mysqli->query($sql);
    if($res1&&$res)
    {
        echo '<script>swal("Congrats!", "Your account is created!", "success");</script>'; 
        }
        else{
            echo '<script>swal("Sorry", "Email you entered already exists", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Sorry", "User not validated", "error");</script>';
    }
    
    
}

?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">VIT Alumni Connect</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="/en/Home/EEducation" id="eeducation" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">About Us</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="developers.html">Developers</a>
                            </li>
                            <li>
                                <a href="aboutvp.html">About VIT</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
        
                    <li class="dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">Login</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="alumnilogin.php">Alumni</a>
                            </li>
                            <li>
                                <a href="admin/adminlogin.php">Admin</a>
                            </li>
                            <li>
                                <a href="eventmanager/eventmanagerlogin.php">Event Manager</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid body-content">
        


    <div class="jumbotron">
        <h1>Alumni Registration</h1>
        <p class="lead">
        <form method="POST" name="signup">

        <b>First Name: </b><input type="text" id="fname" name="fname" placeholder="Enter your First Name" onkeypress="return allowOnlyLetters(event,this);" required><br><br>
        <b>Last Name: </b><input type="text" id="lname" name="lname" placeholder="Enter your Last Name" onkeypress="return allowOnlyLetters(event,this);" required><br><br>
        <b>Contact: </b><input type="number" id="contact" name="contact" placeholder="Enter your Indian phone number" min="1" max=required><br><br>
        <b>Branch</b><br>
 					<select name="branch">
 					<option disabled>---Select Branch of Degree--</option>
 						<option value="Information Technology">Information Technology</option>
 						<option value="Computer Engineering">Computer Engineering</option>
 						<option value="Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
						<option value="Electronics Engineering">Electronics Engineering</option>
 					</select><br>
                        <br>
                     <b>Passout Year</b><br>
                   <select name="passout">
 					<option disabled>---Select Passout Year--</option>
 						<option value="2015">2015</option>
						 <option value="2016">2016</option>
						 <option value="2017">2017</option>
						 <option value="2018">2018</option>
						 <option value="2019">2019</option>
						 <option value="2020">2020</option>
						 <option value="2021">2021</option>
						 <option value="2022">2022</option>
						 <option value="2023">2023</option>
						 <option value="2024">2024</option>
						 <option value="2025">2025</option>
 					</select><br>
                     <br>   
        <b>Email: </b><input type="text" id="email" name="email" placeholder="Enter your Email" required><span id="err"> </span><br><br>
        <b>Password: </b><input type="password" id="password" name="password" placeholder="Enter your Password" required><br><br>
        <input type="submit" value="Create Account">

        </form>
        </p>
        <h3>Already have an account ? <a href="alumnilogin.php" class="badge badge-light"><h4>Click here to Login</h4></a></h3>
    </div>

        <hr />
        <footer>
            <p>&copy; 2021 - VIT Alumni Connect</p>
        </footer>
    </div>

    <script>    
    
    function allowOnlyLetters(e, t)   
    {    
       if (window.event)    
       {    
          var charCode = window.event.keyCode;    
       }    
       else if (e)   
       {    
          var charCode = e.which;    
       }    
       else { return true; }    
       if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))    
           return true;    
       else  
       {    
          alert("Please enter only alphabets");    
          return false;    
       }           
    }      

    </script> 
     <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
    <script>
    
     $("#email").keyup(function(){
        $.ajax({
            type: "post",
            data: {
                email: $("#email").val()
            },
            url: "checkUnique.php",
            success: function(result) {
                if(result=="exists") { $("#err").html("<b style='color:red'>This Email already exists<b>"); } 
            }
        })
    });
    </script>
    <script src="Scripts/jquery-3.3.1.js"></script>

    <script src="Scripts/bootstrap.js"></script>

    <script>

        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function () {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function () {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function () {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off();
            }
        });

    </script>

</body>
</html>

