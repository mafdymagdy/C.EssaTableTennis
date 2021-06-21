<?php
require_once(__ROOT__ . "Model/Model.php");
require_once(__ROOT__ . "Model/CartDetailsModel.php");

class CartsDetailsModel extends Model 
{
	public $cartsdetails;
    private $dbh;
    
	function __construct() 
    {
		$this->fillArray();
	}

	function fillArray() {
		$this->cartsdetails = array();
		$this->dbh = $this->connect();
		$result = $this->readCartsDetails();
		while ($row = $result->fetch_assoc()) 
        {
			array_push($this->cartsdetails, new CartDetailsModel($row["id"],$row["user_id"],$row["course_id"],$row["course_pricee"]));
		}
	}

	function getCartDetails() {
		return $this->cartsdetails;
	}

	function readCartsDetails(){
		$sql = "SELECT * FROM cartdetails";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else 
        {
			return false;
		}
	}
    
    	function insertCart($user_id, $course_id,$course_pricee)
    {
        $sql = "INSERT INTO cartdetails (user_id, course_id,course_pricee) VALUES ('$user_id','$course_id','$course_pricee')";
		if($this->dbh->query($sql) === true)
        {
			//echo "Records inserted successfully.";
            header("location:../View/Student.php");
			$this->fillArray();
		} 
		else
        {
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
    
    function deleteCart($id)
  {
    
    $sql = "DELETE FROM cartdetails 
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        //echo "user deleted successfully.";
        header("location:../View/.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
}
?>
