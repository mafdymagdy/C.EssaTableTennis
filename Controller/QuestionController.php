<?php

  require_once(__ROOT__ . "controller/Controller.php");

class QuestionController extends Controller
{
    public function insert() 
    {
    
	$Student_id = $_REQUEST['student_id'];
	$question = $_REQUEST['question'];
	$answer = $_REQUEST['answer'];

              $this->model->insertQuestion($Student_id,$question,$answer);
        
    }
    
        public function edit()
    {
        $Student_id = $_REQUEST['student_id'];
        $question = $_REQUEST['question'];
        $answer = $_REQUEST['answer'];
        $id =$_REQUEST['id'];
            
              $this->model->editAnswer($Student_id,$question,$answer, $id);   
    }
	
	 public function delete()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteQuestion($id); 
    }
  }
?>