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
            
//         if(!preg_match( '/^[0-9]+$/', $course_name) && is_numeric($course_price) && !empty($name) && !empty($price) && !empty($img))
//         {
              $this->model->insertCourse($course_faculty_id,$course_name,$course_price,$img);
//        }else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }

    }
    
        public function insertcart() 
    {
	$user_id = $_REQUEST['user_id'];
	$user_name = $_REQUEST['user_name'];
	$course_id = $_REQUEST['course_id'];
	$course_name = $_REQUEST['course_name'];
	$course_pricee = $_REQUEST['course_pricee'];
      
//        if(!preg_match(!empty($question)))
//         {
              $this->model->insertCart($user_id,$user_name,$course_id,$course_name,$course_pricee);
//        }
//        else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }
    }
    
    public function edit()
    {
        $course_faculty_id = $_REQUEST['course_faculty_id'];
        $course_name = $_REQUEST['course_name'];
        $course_price = $_REQUEST['course_price'];
        $img = $_REQUEST['img'];
        $id =$_REQUEST['id'];
            
//         if(!preg_match( '/^[0-9]+$/', $course_name) && is_numeric($course_price) && !empty($name) && !empty($price) && !empty($img))
//         {
              $this->model->editCourse($course_faculty_id,$course_name,$course_price,$img,$id);
//        }else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }

      
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