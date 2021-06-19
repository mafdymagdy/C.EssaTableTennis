<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
       
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
           
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
             
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
	if(preg_match("/^[0-9a-zA-Z_]{5,}$/", $_POST["username"]) === 0)
$username_err = '<p class="errText">User must be bigger that 5 chars and contain only digits, letters and underscore</p>';
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
       
        $sql = "INSERT INTO user (username, password,user_type_id) VALUES (?, ?,1)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            
            if(mysqli_stmt_execute($stmt)){
              //get the user id
                //$last_id = mysqli_insert_id($link);
                //insert student data in student table
                //insert cart in cart table with student id and tot price of 0
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<title>C.Essa Table Tennis</title>
  <?php require_once("navbar.php") ?>
    
<style>
		#hero {
		  background: url('images/all-icon/signup914.jpg') center center no-repeat;
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
  color: #FFA500;
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
  background-color: #FFA500;
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
  color: #FFA500;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: orange;
  color: black;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #FFF;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
    
</style>
    
<body>
    
	<div id="header-hero-container">
<!-- Header -->
<header>
            <div class="flex container">
                <a id="logo" href="#">C.Essa Table Tennis <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Sign-Up"</a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    
                    <ul id="nav-menu"> 
                        <li><a href="indexx.php"><img src="images/C.EssaTableTennis/Logo1.jpg" alt="Logo" style="width:70px;height:70px;  position:fixed; left:100px; top: 30px;"></a></li>
                        <div style = "position: fixed; right: 140px; top:55px;">
                        
                         <li><i class="fa fa-home"></i> <a href="indexx.php" style = "text-decoration: none;">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="login.php">Sign In</a></li> 
                        </div>
                    </ul>
                </nav>
            </div>
    </header>
 
<!-- section el sora (rowad) -->
 <section id="hero">
		<div class="fade"></div>
		<div class="hero-text">
				<h1> </h1>
			</div>
        </section>
	</div>

<!-- Register Section-->
	<section id="contact">
			<div class="container">
                <h2><font color="red">Registeration Form:</font></h2>	
				<div class="flex">
					<div id="form-container">
					
					<!--	<h2> Create a new account </h2> -->
						 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						 
							<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
	
			   <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  value="<?php echo $password; ?>" required>
                <span class="help-block"><?php echo $password_err; ?></span>
                </div>
				
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"required>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                 </div>
							<br>
							<button class="rounded" style="background-color: red;">Sign Up</button>
							<p>Already have an account? <a href="login.php">Login here</a>.</p>
						</form>
					</div>
					</div>
				</div>
		</section>	
    
<!-- Footer -->
        <?php require_once("Footer.php")?>
</body>
</html>