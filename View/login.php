<?php
require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
       
        $sql = "SELECT id, username, password ,user_type_id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_username);
         
            $param_username = $username;
         
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                   
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$user_type_id);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password))
                        {
                            // Password is correct, so start a new session
                            
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["type"]=$user_type_id;
							
                           if($user_type_id=="1")
                            header("location: Student.php");
						else
                            if($user_type_id=="2")
							header("location: Admin.php");
                         else   
                            if($user_type_id=="3")
                             header("location: Auditor.php");
                            else
                             header("location: HR.php"); 
                            
                        } else{
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    
                    $username_err = "No account found with that username.";
                }
            } else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<title> Login </title>
<?php require_once("navbar.php") ?>

<style>
		#hero {
		  background: url('images/all-icon/signin914.png') center center no-repeat;
		  background-size: cover;
		  position: absolute;
		  top: 0;
		  left: 0;
		  z-index: 1;
		  height: 100%;
		  width: 100%;
	  }
	  
 .sidepanel {
  height: 1000px; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  right: 0;
  background-color: #FFF; /* white*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidepanel a:hover {
  color: #FF0000;
}

/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #808080;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #FF0000;
}	

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
 right: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #111;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #FF0000;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: red;
  color: black;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #FFF;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down 
{
  float: right;
  padding-right: 8px;
}   
</style>
    
<body> 
	<div id="header-hero-container">
        
<!-- Header -->
<header>
            <div class="flex container">
                <a id="logo" href="#">C.Essa Table Tennis <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Sign-In"</a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    
                    <ul id="nav-menu"> 
                        <li style="text-align: right"><a href="indexx.php"><img src="images/C.EssaTableTennis/Logo1.jpg" alt="Logo" style="width:70px;height:70px;  position:fixed; left:100px; top:30px;"></a></li>
                        <div style = "position: fixed; right: 140px; top:55px;">
                             <li><i class="fa fa-home"></i> <a href="indexx.php" style = "text-decoration: none;">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="Signup.php">Sign Up</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
    </header>
 
<!-- section el sora (join us) --> 
 <section id="hero">
		<div class="fade"></div>
		<div class="hero-text">
				<h1>  </h1>
			</div>
        </section>
	</div>

<!-- section Login -->
	<section id="contact">
			<div class="container">
        <!-- <h2>Login form</h2> -->
                <h2><font color="red">Login Form:</h2>
				<div class="flex">
					<div id="form-container">
						
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							
							<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
							<br>
							<button class="rounded" style="background-color:red;  ">Login</button>
                            
							<p>Don't have an account? <a href="Signup.php">Sign up now</a>.</p>
						</form>
					</div>
                </div>
			</div>
		</section>
    
<!-- Footer -->
        <?php require_once("Footer.php") ?>
</body>
</html>