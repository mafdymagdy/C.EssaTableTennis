<?php
  require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class CartDetailsModel extends Model 
{
    private $id;
    private $user_id;
	private $course_id;
	private $course_pricee;
    
      function __construct($id) 
  {
    if($id!=null)
    {
      $this->readCartDetails($id);
      
    }else
    {
      $this->id = $id;
    }
  }
        function getUserId() {
    return $this->user_id;
  }
  function setUserId($user_id) {
    return $this->user_id = $user_id;
  }

    function getCourseId() {
    return $this->course_id;
  }
  function setCourseId($course_id) {
    return $this->course_id = $course_id;
  }
        function getCoursePricee() {
    return $this->course_pricee;
  }
  function setCoursePricee($course_pricee) {
    return $this->course_pricee = $course_pricee;
  }

  function getID() {
    return $this->id;
  }

      function readCartDetails($id)
  {
    $sql = "SELECT * FROM cartdetails where id=".$id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->id = $row["id"];
        $this->user_id = $row["user_id"];
		$this->course_id=$row["course_id"];
		$this->course_pricee=$row["course_pricee"];
    }
    else 
    {
        $this->id = "";
        $this->user_id = "";
        $this->course_id = "";
		$this->course_pricee="";
    }
  } 
}