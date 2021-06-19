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
            
              $this->model->editUser($username, $img,$faculty_id, $id);

    }
	
	public function delete()
    {
        $id = $_REQUEST['id'];
		$this->model->deleteUser($id);
	}
}
?>