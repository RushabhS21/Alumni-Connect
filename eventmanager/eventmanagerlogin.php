<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager Login</title>
    <link href="Content/bootstrap.css" rel="stylesheet"/>
<link href="Content/site.css" rel="stylesheet"/>
<link rel="icon" type="image/png" href="../img/VIT.ico"/>
    <script src="Scripts/modernizr-2.8.3.js"></script>
    <script src="../alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../alert/sweetalert.css">

</head>
<body>
<?php
    require("../config.php");

    if(isset($_SESSION['email'])) {
        header("location:eventmanagerwelcome.php");
    }

    if(isset($_POST['email'])&&isset($_POST['password']))
    {
        $email = secure($_POST['email']);
        $password = secure($_POST['password']);

        $sql = "SELECT * FROM `eventmanagerlogin` WHERE `email`='$email' AND `password`='$password'";
        $result = $mysqli->query($sql);
        if($row = $result->fetch_assoc())
        {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];         
            
            if (isset($_POST['remember_me'])) {
                setcookie('email', $row['email'], time() + 60 * 5);
                setcookie('name', $row['fname'], time() + 60 * 5);               
            }
            
            header("location:eventmanagerwelcome.php");
        }
        else {
            echo '<script>swal("Invalid Username/Password", "Try again", "error");</script>';

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
                <a class="navbar-brand" href="../index.html">VIT Alumni Connect</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="" id="eeducation" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">About Us</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="../developers.html">Developers</a>
                            </li>
                            <li>
                                <a href="../aboutvp.html">About VIT</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="../contact.html">Contact</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">Login</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="../alumnilogin.php">Alumni</a>
                            </li>
                            <li>
                                <a href="../admin/adminlogin.php">Admin</a>
                            </li>
                            <li>
                                <a href="eventmanagerlogin.php">Event Manager</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid body-content">
        

    <div class="jumbotron">
        <h1>Event Manager Login</h1>
        <p class="lead">
        <br>
        <form method="post">

        <b>Email:</b> <input type="email" id="email" name="email" placeholder="Enter your Email" required><br>
        <b>Password: </b><input type="password" id="password" name="password" placeholder="Enter your Password" required><br>
        <label><input type="checkbox" name="remember_me" id="remember_me"> Remember Me</label><br>
        <input type="submit" value="LOGIN">

        </form>
        </p>
    </div>
     <hr />
        <footer>
            <p>&copy; 2021 - VIT Alumni Connect</p>
        </footer>
    </div>

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