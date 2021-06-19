<?php
  require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller
{
    public function insert() 
    {
        
	$user_id = $_REQUEST['user_id'];
	$course_id = $_REQUEST['course_id'];
	$course_pricee = $_REQUEST['course_pricee'];
              $this->model->insertCart($user_id,$course_id,$course_pricee);
    }
    
    public function edit() 
    {
        
	$user_id = $_REQUEST['user_id'];
	$course_id = $_REQUEST['course_id'];
	$course_pricee = $_REQUEST['course_pricee'];
  
              $this->model->editCart($user_id,$course_id,$course_pricee);
    }
	
	 public function delete()
    {
      $id = $_REQUEST['id'];
      $this->model->deleteCart($id); 
    }

  }
?>