<!DOCTYPE html>
<html>
<title> All Courses </title>
<?php require_once("navbar.php") ?>
    
    <?php
  define('__ROOT__', "../");
  require_once(__ROOT__. "View/navbar.php");
  require_once(__ROOT__ . "Model/CoursesModel.php");
  require_once(__ROOT__ . "Controller/CourseController.php");
  require_once(__ROOT__ . "View/ViewAllCourses.php");
  require_once(__ROOT__ . "Model/FacultyModel.php");

  $model = new CoursesModel();
  $controller = new CourseController($model);
  $view = new ViewAllCourses($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) 
{
  $controller->{$_GET['action']}();
}

?>
    
<!-- CSS -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/work3/lib/css/mycss.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/LMS_Project/lib/css/mycss.css">
</head>

<!-- Style -->
<style>
  #hero {
    background: url('images/all-icon/course.jpg') center center no-repeat;
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
                <a id="logo" href="#" style = "position:absolute; left:100px; top:20px"> All Products </a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    
                    <ul id="nav-menu"> 
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style = "position: fixed; right: 40px; top:30px;">
                        
                        <li><a href="Admin.php"><img src="images/C.EssaTableTennis/Logo1.jpg" alt="Logo" style="width:70px;height:70px;  position:fixed; left:20px; top:10px;"></a></li>
                        
                        <li><i class="fa fa-home"></i> <a href="Admin.php" style = "text-decoration: none;">Home</a></li>
                        
                        <li ><a href="SearchOrders.php"> Search Orders </a></li>            

                        <li ><a href="RespondQuestions.php"> Message History </a></li>
                        
                        <li><a href="AddAdmin.php"> Add Admins </a></li>
                        
                        <li><a href="AllAdmins.php"> Delete Admins </a></li>
                        
                        <li><a href="Allprofiles.php"> All Traniee Profiles</a></li>
                        
                        <li ><a href="logout.php"> Logout </a></li> 
                        </div>
                    </ul>
                </nav>
            </div>
    </header>

<!-- Body -->
<body>
    <div id="header-hero-container">

  <section id="hero">
      <div class="fade"></div>
      <div class="hero-text">
          
<!-- F el noss -->  
       </div>
      </section>
  </div>
    
 <!-- Table Form --> 
    <form  method = "post" action="Courses.php?action=insert">
<div class="container jumbotron text-left">
<div class="divTable paleBlueRows">
<div class="divTableHeading">
<div class="divTableRow">
    <div class="divTableHead">Image</div>
    <div class="divTableHead">Faculty</div>
    <div class="divTableHead">Product Name</div>
    <div class="divTableHead">Product Price</div>
    <div class="divTableHead">Edit</div>
    <div class="divTableHead">Delete</div>
</div>
</div>
<div class="divTableBody">

<?php
      echo $view->output();

?>

<div class="divTableRow">
    <div class="divTableCell"> 
        <label>Choose Image:</label>
        <input type="file"  id="img" name="img" required>
    </div>
    
        <div class="divTableCell"> 
        <!--input type="text"  id="colorid" placeholder="Enter Color" name="colorid"  -->
            <?php 
    $mysqli=new MySQLi('localhost','root','','work3');
    $result= $mysqli ->query("select * from levels");
?>
            <select id= "course_faculty_id"name="course_faculty_id">
            
                <?php 
                while ($rows=$result->fetch_assoc())
                {
                    $faculty=$rows['faculty'];
                    $id=$rows['id'];
                    echo "<option value='$id'>$faculty</option>";
                }
            ?>
            </select>
    </div>
    
    <div class="divTableCell"> 
        <input type="varchar" maxlength="30" id="course_name" placeholder="Enter Course name" name="course_name" required> 
    </div>
    
    <div class="divTableCell"> 
    <input type="Number" min="0" max="20000" id="course_price" placeholder="Enter Course Price" name="course_price" required>
    </div>
    <div class="divTableCell"> <button type="submit" class="btn btn-default">Add New Course</button> </div>
</div>
</div>
</div>
    </div>
</form>  
    
<!-- Footer -->
        <?php require_once("Footer.php") ?>
</body> 
</html> 