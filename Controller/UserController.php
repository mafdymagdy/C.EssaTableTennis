<?php

require_once(__ROOT__ . "Controller/Controller.php");
class UserController extends Controller
{
	public function insert() 
    {
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$this->model->insertUser($username,$password);
        header("location: login.php");
	}

    public function edit()
    {
        $username = $_REQUEST['username'];
        $faculty_id = $_REQUEST['faculty_id'];
        $img = $_REQUEST['img'];
        $id =$_REQUEST['id'];
            
//         if(!preg_match( '/^[0-9]+$/', $course_name) && is_numeric($course_price) && !empty($name) && !empty($price) && !empty($img))
//         {
              $this->model->editUser($username, $img,$faculty_id, $id);
//        }else
//         {
//           // Problem: please check your inputs
//             echo 'Problem: please check your inputs';
//        }

      
    }
	
	public function delete()
    {
        $id = $_REQUEST['id'];
		$this->model->deleteUser($id);
	}
    
}
?>