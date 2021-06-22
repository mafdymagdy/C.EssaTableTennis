<!DOCTYPE html>
<html>
<title>C.Essa Table Tennis</title>
<?php
session_start();
require_once("navbar.php")
?>
<?php
define('__ROOT__', "../");
require_once(__ROOT__ . "Model/FacultyModel.php");
require_once(__ROOT__ . "Model/UserTypesModel.php");
require_once(__ROOT__ . "Model/UsersModel.php");
require_once(__ROOT__ . "Controller/UserController.php");
require_once(__ROOT__ . "View/ViewAllProfiles.php");

$model = new UsersModel();
$controller = new UserController($model);
$view = new ViewAllProfiles($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
  $controller->{$_GET['action']}();
}

?>
<?php

$id = $_GET['id'];
foreach ($model->users2 as $user) {
  if ($user->getID() == $id) {
    $studentImage = $user->getImage();
    $studentName = $user->getUserName();
    $studentFacultyId = $user->getFacultyId();
    $studentCreatedAt = $user->getCreatedAt();
    $studentUserTypeId = $user->getUserTypeId();
    $studentID = $user->getID();

    $faculty = new FacultyModel($studentFacultyId);
    $faculty_name = $faculty->faculty;
    $usertype = new UserTypesModel($studentUserTypeId);
    $usertype_name = $usertype->type;
  }
}
?>

<!-- Style -->
<style>
  #hero {
    background: url('images/all-icon/MyProfile.png') center center no-repeat;
    background-size: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    height: 100%;
    width: 100%;
  }

  .sidepanel {
    height: 1000px;
    /* Specify a height */
    width: 0;
    /* 0 width - change this with JavaScript */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Stay on top */
    top: 0;
    right: 0;
    background-color: #FFF;
    /* white*/
    overflow-x: hidden;
    /* Disable horizontal scroll */
    padding-top: 60px;
    /* Place content 60px from the top */
    transition: 0.5s;
    /* 0.5 second transition effect to slide in the sidepanel */
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
  .sidenav a,
  .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #111;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }

  /* On mouse-over */
  .sidenav a:hover,
  .dropdown-btn:hover {
    color: #FFA500;
  }

  /* Main content */
  .main {
    margin-left: 200px;
    /* Same as the width of the sidenav */
    font-size: 20px;
    /* Increased text to enable scrolling */
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
    <a id="logo" href="#"> My Personal Profile </a>
    <nav>
      <button id="nav-toggle" class="hamburger-menu">
        <span class="strip"></span>
        <span class="strip"></span>
        <span class="strip"></span>
      </button>

      <ul id="nav-menu">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="position: fixed; right: 60px; top:45px;">
          <li><a href="Trainee.php"><img src="images/C.EssaTableTennis/Logo1.jpg" alt="Logo" style="width:70px;height:70px;  position:fixed; left:100px; top:7px;"></a></li>
          <li><i class="fa fa-home"></i> <a href="Trainee.php" style="text-decoration: none;">Home</a></li>

          <li><a href="AllCourses.php"> Products </a></li>
          <li><a href="WriteQuestion.php"> Write Question </a></li>
          <li><a href="AllQuestions.php"> Message History </a>

          <li style="text-align: left"><a href="editProfile.php?id=<?php echo $_SESSION["id"]; ?>"> Edit My Profile </a></li>

          <li style="text-align: left"><a href="logout.php"> Logout </a></li>
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
  <div class="details-price">
    <div class="col-md-4">
      <img src='images/Trainees/<?php echo $studentImage ?>' id='disp_img' height="350px" width="350px" mar>
    </div>

    <div class="details-price">
      <h1> <label> UserName: </label> <?php echo $studentName ?> </h1>
    </div>

    <div class="row details">
      <h1> <label> Created At: </label> <?php echo $studentCreatedAt ?> </h1>
    </div>
    <div class="row details">
      <?php
      $mysqli = new MySQLi('localhost', 'root', '', 'work3');
      $result = $mysqli->query("select * from levels");
      ?>

      <?php
      while ($rows = $result->fetch_assoc()) {
        $faculty = $rows['faculty'];
        $id = $rows['id'];
      }
      ?>

      <h1> <label> Level: </label> <?php echo $faculty_name ?> </h1>
    </div>

    <div class="row details">
      <?php
      $mysqli = new MySQLi('localhost', 'root', '', 'work3');
      $result = $mysqli->query("select * from usertypes");
      ?>

      <?php
      while ($rows = $result->fetch_assoc()) {
        $type = $rows['type'];
        $id = $rows['id'];
      }
      ?>
      <h1> <label> Type: </label> <?php echo $usertype_name ?> </h1>
    </div>
  </div>

  <!-- Footer -->
  <?php require_once("Footer.php") ?>
</body>

</html>