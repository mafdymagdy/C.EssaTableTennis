<?php
  require_once(__ROOT__ . "Controller/Controller.php");

class CourseController extends Controller
{
    public function insert() 
    {
        $course_faculty_id = $_REQUEST['course_faculty_id'];
        $course_name = $_REQUEST['course_name'];
        $course_price = $_REQUEST['course_price'];
        $img = $_REQUEST['img'];
            
              $this->model->insertCourse($course_faculty_id,$course_name,$course_price,$img);

    }
    
        public function insertcart() 
    {
	$user_id = $_REQUEST['user_id'];
	$user_name = $_REQUEST['user_name'];
	$course_id = $_REQUEST['course_id'];
	$course_name = $_REQUEST['course_name'];
	$course_pricee = $_REQUEST['course_pricee'];
      
              $this->model->insertCart($user_id,$user_name,$course_id,$course_name,$course_pricee);

    }
    
    public function edit()
    {
        $course_faculty_id = $_REQUEST['course_faculty_id'];
        $course_name = $_REQUEST['course_name'];
        $course_price = $_REQUEST['course_price'];
        $img = $_REQUEST['img'];
        $id =$_REQUEST['id'];
            
              $this->model->editCourse($course_faculty_id,$course_name,$course_price,$img,$id);
      
    }

    public function delete()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteCourse($id); 
    }

    public function deletecart()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteCart($id); 
    }
}
?>