<?php
require_once(__ROOT__ . "Model/Model.php");
require_once(__ROOT__ . "Model/UserModel.php");

class UsersModel extends Model 
{
	public $users;
	public $users2;
    private $dbh;
    
	function __construct() 
    {
		$this->fillArray();
		$this->fillArray2();
	}

	// Array for admins
	function fillArray() 
    {
		$this->users = array();
		$this->dbh = $this->connect();
		$result = $this->readAdmins();
		while ($row = $result->fetch_assoc()) 
        {
			array_push($this->users, new UserModel($row["id"],$row["username"],$row["password"],$row["created_at"],$row["user_type_id"],$row["faculty_id"],$row["img"]));
		}
	}
    
	// Array for Trainees
    function fillArray2() {
		$this->users2 = array();
		$this->dbh = $this->connect();
		$result = $this->readtrainees();
		while ($row = $result->fetch_assoc()) 
        {
			array_push($this->users2, new UserModel($row["id"],$row["username"],$row["password"],$row["created_at"],$row["user_type_id"],$row["faculty_id"],$row["img"]));
		}
	}
    
	function getAdmins() {
		return $this->users;
	}

    function getTrainees() {
        return $this->users2;
	}

	// Admin id is 2
	function readAdmins()
    {
		$sql = "SELECT * FROM user WHERE user_type_id=2";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else 
        {
			return false;
		}
	}

	// trainee id is 1
	function readtrainees()
	{
		$sql = "SELECT * FROM user WHERE user_type_id=1";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else 
        {
			return false;
		}
	}

	// Insert Admin
	function insertUser($username, $password,$user_type_id,$faculty_id,$img)
    {
        $sql = "INSERT INTO user (username, password,user_type_id,faculty_id,img) VALUES ('$username','$password','$user_type_id','$faculty_id','$img')";
		if($this->dbh->query($sql) === true)
        {
            header("location:../View/AllAdmins.php");
			$this->fillArray();
		} 
		else
        {
			echo "ERROR: Could not able to execute $sql. ";
		}
	}

	// Update User
    function editUser($username, $img,$faculty_id, $id)
  	{
    $sql = "UPDATE user
            SET username = '$username' , img = '$img' , faculty_id = '$faculty_id' WHERE id=$id";

    if($this->dbh->query($sql) === true)
	{
        echo "Profile edited successfully.";
        header("location:../View/Student.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. ";
    }
  }
    
  // Delete Admin
    function deleteUser($id)
  {
    $sql = "DELETE FROM user 
            WHERE id=$id";

    if($this->dbh->query($sql) === true)
	{
        header("location:../View/AllAdmins.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. ";
    }
  }
 
    // Edit Password
    function reset_password($id,$password)
    {
        $sql="UPDATE `user` SET `password`='$password' WHERE id=$id";
        $dbh = new Dbh();
       $dbh->query($sql);
        
    }
    
	// User SignIn
    function login($username, $password){
	$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        echo $sql;
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
        return $row;
		} 
    }
}