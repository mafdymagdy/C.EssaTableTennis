<?php
  require_once(__ROOT__ . "controller/Controller.php");

class ContactController extends Controller
{
    public function insertCourseSuggestion() 
    {
    
	$user_id = $_REQUEST['user_id'];
	$suggested_course_name = $_REQUEST['suggested_course_name'];
	$course_faculty_id = $_REQUEST['course_faculty_id'];
	$course_img = $_REQUEST['course_img'];
	$student_message = $_REQUEST['student_message'];
	$admin_respond = $_REQUEST['admin_respond'];
	$auditor_comment = $_REQUEST['auditor_comment'];
	$ispenalty = $_REQUEST['ispenalty'];
	$hr_penalty = $_REQUEST['hr_penalty'];

              $this->model->insertMessage($course_img,$user_id,$suggested_course_name,$course_faculty_id,$student_message);
    }
            public function edit()
    {
        
	$admin_respond = $_REQUEST['admin_respond'];
    $id =$_REQUEST['id'];

              $this->model->editAdminRespond($admin_respond, $id);
    }
            public function editAuditor()
    {
        $auditor_comment = $_REQUEST['auditor_comment'];
        $id =$_REQUEST['id'];

              $this->model->editComment($auditor_comment, $id);
      
    }
    
      public function editHR()
    {
        $hr_penalty = $_REQUEST['hr_penalty'];
        $id =$_REQUEST['id'];
            
              $this->model->editPenalty($hr_penalty, $id);
    }
	
	 public function delete()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteMessage($id); 
    }

  }
?>