<?php

  require_once(__ROOT__ . "controller/Controller.php");

class QuestionController extends Controller
{
    public function insert() 
    {
    
	$Student_id = $_REQUEST['student_id'];
	$question = $_REQUEST['question'];
	$answer = $_REQUEST['answer'];

      
//        if(!preg_match(!empty($question)))
//         {
              $this->model->insertQuestion($Student_id,$question,$answer);
//        }
//        else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }
        
    }
    
        public function edit()
    {
        $Student_id = $_REQUEST['student_id'];
        $question = $_REQUEST['question'];
        $answer = $_REQUEST['answer'];
        $id =$_REQUEST['id'];
            
//         if(!preg_match( '/^[0-9]+$/', $course_name) && is_numeric($course_price) && !empty($name) && !empty($price) && !empty($img))
//         {
              $this->model->editAnswer($Student_id,$question,$answer, $id);
//        }else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }

      
    }
	
	 public function delete()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteQuestion($id); 
    }

  }
?>