<!DOCTYPE html>
<html>
<title> Admin </title>
<?php 
    session_start();
    require_once("navbar.php") 
?>  

<!-- Style -->
<style>
  #hero {
    background: url('images/about/TableTennisTablee.jpg') center center no-repeat;
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

<!-- Header -->
<header>
            <div class="flex container">
                <a id="logo" href="#" style = "position:absolute; left:80px; top:20px"> ADMIN </a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    
                    <ul id="nav-menu"> 
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style = "position: fixed; right: 200px; top:30px;">
                        <li><a href="Courses.php"> A/E/D Product </a></li>
                        <li ><a href="SearchOrders.php"> Search Orders </a></li>            
                        <li ><a href="RespondQuestions.php"> Message History </a></li>
                        <li><a href="AddAdmin.php"> Add Admins </a></li>
                        <li><a href="AllAdmins.php"> Delete Admins </a></li>
                        <li><a href="Allprofiles.php"> All Traniee Profiles </a></li>
                        <li ><a href="logout.php"> Logout </a></li> 
                        </div>
                    </ul>
                </nav>
            </div>
    </header>    
                                                
<!-- Body -->
<body>
    <div id="header-hero-container">
        <div class="page-header">
        <h4> Welcome Admin <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> to C.EssaTableTennis Website.</h4>
    </div>
    <div id="header-hero-container">
        
  <section id="hero">
      <div class="fade"></div>
      <div class="hero-text">
          
<!-- <a href="Admin.php"><img src="images/miu-logo.jpg" alt="Logo" style="width:150px;height:150px;"></a> -->
       </div>
      </section>
  </div>
</div> 
    
<!-- Footer -->
<?php require_once("Footer.php") ?>
</body> 
</html> 