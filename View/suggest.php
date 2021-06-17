<!DOCTYPE html>
<html>
    
<title> Suggest Course </title>
<?php 
    session_start();
    require_once("navbar.php") 
?>

  <?php
  define('__ROOT__', "../");
  require_once(__ROOT__ . "Model/ContactsModel.php");
  require_once(__ROOT__ . "Controller/ContactController.php");

  $model = new ContactsModel();
  $controller = new ContactController($model);

if (isset($_GET['action']) && !empty($_GET['action'])) 
{
  $controller->{$_GET['action']}();
}

?>
    
<?php
$id = $_SESSION["id"];
foreach ($model->contacts as $c)
{
    if ($c->getID() == $id)
    {
        $courseImage = $c->getCourseImage();
        $courseID = $course->getID();
    }
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
    background: url('images/all-icon/message.png') center center no-repeat;
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
.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
    
.column {
  float: left;
  width: 15%;
  margin-bottom: 10px;
  padding:  8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (width: 65 px) {
  .column {
    width: 50%;
    display: ;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
    .container {
  padding: 16px;
}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}
    
</style>
    
<!-- Header -->
<header>
            <div class="flex container">
                <a id="logo" href="#">Product Inquiry</a>
                <nav>
                    <button id="nav-toggle" class="hamburger-menu">
                        <span class="strip"></span>
                        <span class="strip"></span>
                        <span class="strip"></span>
                    </button>
                    
                    <ul id="nav-menu"> 
                        
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style = "position: fixed; right: 60px; top:45px;">
                        <li><a href="Student.php"><img src="images/C.EssaTableTennis/Logo1.jpg" alt="Logo" style="width:70px;height:70px;  position:fixed; left:100px; top:20px;"></a></li>
                        <li><i class="fa fa-home"></i> <a href="Student.php" style = "text-decoration: none;">Home</a></li>
                        <li><a href="SearchCourses.php"> Search Products </a></li>
                        
                        <li><a href="WriteQuestion.php"> Write Question </a></li>
                        <li><a href="AllQuestions.php"> All Questions </a></li>
                        <li><a href="MessageHistory.php?id=<?php echo $_SESSION["id"];?>" > Messages History </a></li> 
                        <li><a href="MyCart.php?id=<?php echo $_SESSION["id"];?>" > My Cart </a></li>
                        <li><a href="ViewProfile.php?id=<?php echo $_SESSION["id"];?>" > MyProfile </a></li> 
                        
                        <li><a href="logout.php"> Logout </a></li> 
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
    
<!-- Table form -->
<form  method = "post" action="suggest.php?action=insertCourseSuggestion">
<div class="container jumbotron text-left">
<div class="divTable paleBlueRows">
<div class="divTableHeading">
<div class="divTableRow">
    <div class="divTableHead">Product Image</div>
    <div class="divTableHead">Product Name</div>
    <div class="divTableHead">Level</div>
    <div class="divTableHead">Your Inquiry</div>
</div>
</div>
<div class="divTableBody">

<div class="divTableRow">
    <div class="divTableCell"> 
        <img src='images/Courses/<?php echo $courseImage ?>' id='disp_img' height="100px" width="100px">
        <br>
        <label>Product Image </label>
        <input type="file"  id="course_img"  name="course_img" onchange="change_img(this)" required>
    </div>
    <div class="divTableCell"> 
    <input type="varchar" maxlength="250" id="Product Name" placeholder="Product Name" name="Product Name" required>
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
    <input type="varchar" maxlength="250" id="Type Your Message Here...." placeholder="Type Your Message Here...." name="Type Your Message Here...." required>
    </div>
    
        <div class="divTableCell"> 
    <input type="hidden" name="user_id" value="<?php echo $_SESSION["id"];?>" >
    </div>
    
    
    <div class="divTableCell"> <button type="submit" class="btn btn-default"> Send Inquiry</button> </div>

</div>
      
</div>
</div>
    </div>
</form>  
    
<!-- Footer -->
        <?php require_once("Footer.php") ?>
</body>
       
</html> 