<?php
  require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class CourseModel extends Model 
{
    public $id;
    public $course_faculty_id;
    public $course_name;
    public $course_price;
    public $img;
    
    function __construct($id) 
  {
    $this->id = $id;
    if($id != null)
    {
      $this->readCourse($id);
    }else
    {
      $this->id =$id;  
      $this->course_faculty_id = $course_faculty_id;
      $this->course_name = $course_name;
      $this->course_price = $course_price;
      $this->img = $img;
    }
  }

    function getCourseFacultyId() 
  {
    return $this->course_faculty_id;
  }

  function setCourseFacultyId($course_faculty_id) 
  {
    return $this->course_faculty_id = $course_faculty_id;
  } 
    
  function getCourseName() 
  {
    return $this->course_name;
  }

  function setCourseName($course_name) 
  {
    return $this->course_name = $course_name;
  }

  function getCoursePrice() 
  {
    return $this->course_price;
  }
    
  function setCoursePrice($course_price) 
  {
    return $this->course_price = $course_price;
  }
     function getImg() 
  {
    return $this->img;
  }

  function setImg($img) 
  {
    return $this->img = $img;
  }

  function getID() {
    return $this->id;
  }

  function readCourse($id)
  {
    $sql = "SELECT * FROM courses where id=".$id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->course_faculty_id = $row["course_faculty_id"];
        $this->course_name = $row["course_name"];
        $this->course_price = $row["course_price"];
        $this->img = $row["img"];
    }
    else 
    {
        $this->course_faculty_id = "";
        $this->course_name = "";
        $this->course_price = "";
        $this->img = "";
    }
  }
}
?>