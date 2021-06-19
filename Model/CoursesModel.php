<?php
  require_once(__ROOT__ . "Model/Model.php");
  require_once(__ROOT__ . "Model/CourseModel.php");
?>

<?php
class CoursesModel extends Model 
{
    public $courses;
    private $dbh;
  function __construct() 
  {
      $this->fillArray();
  }

  function fillArray() {
    $this->courses = array();
    $this->dbh = $this->connect();
    $result = $this->readCourses();
    while ($row = $result->fetch_assoc()) {
     array_push($this->courses, new CourseModel($row["id"],$row["course_faculty_id"],$row["course_name"],$row["course_price"],$row["img"]));
    }
  }

  function getCourses() {
    return $this->courses;
  }

  function readCourses(){
    $sql = "SELECT * FROM courses";
    
    $result = $this->dbh->query($sql);
    if ($result->num_rows > 0)
    {
        return $result;
    }
    else 
    {
        return false;
    }
  }

  function insertCourse($course_faculty_id,$course_name,$course_price,$img)
  {
        // Attempt insert query execution
        $course_name = $this->dbh->getConn()->real_escape_string($course_name);
        $course_price = $this->dbh->getConn()->real_escape_string($course_price);
        $sql = "INSERT INTO courses (course_faculty_id, course_name, course_price, img) VALUES ('$course_faculty_id', '$course_name', '$course_price', '$img')";

        if($this->dbh->query($sql) === true){
            echo "Course inserted successfully.";
            header("location:../View/Courses.php");    
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }
  
  function editCourse($course_faculty_id,$course_name,$course_price,$img, $id)
  {

    $sql = "UPDATE courses
            SET course_faculty_id = '$course_faculty_id' , course_name = '$course_name' , course_price = '$course_price' , img = '$img'
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Course edited successfully.";
        header("location:../View/Courses.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }

  function deleteCourse($id)
  {
    
    $sql = "DELETE FROM Courses 
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Course deleted successfully.";
        header("location:../View/Courses.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
      function deleteCart($id)
  {
    
    $sql = "DELETE FROM cartdetails 
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        //echo "Cart deleted successfully.";
        header("location:../View/MyCart.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
        function insertCart($user_id, $user_name, $course_id, $course_name, $course_pricee)
    {
        $sql = "INSERT INTO cartdetails (user_id, user_name, course_id, course_name, course_pricee) VALUES ('$user_id', '$user_name', '$course_id', '$course_name' ,'$course_pricee')";
		if($this->dbh->query($sql) === true)
        {
			//echo "Records inserted successfully.";
            header("location:../View/MyCart.php");
			$this->fillArray();
		} 
		else
        {
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
    
   public function CSC()
	{
		$sql="SELECT * FROM courses WHERE course_faculty_id=1";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new CourseModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
    
       public function ECE()
	{
		$sql="SELECT * FROM courses WHERE course_faculty_id=2";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new CourseModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
    
           public function SelectAllCourses()
	{
		$sql="SELECT * FROM courses";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new CourseModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
    
           public function UserCoursesPrice()
	{
		$sql="SELECT course_price FROM courses WHERE course_faculty_id=2";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new CourseModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}   
}