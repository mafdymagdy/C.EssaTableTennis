<?php
  require_once(__ROOT__ . "Model/Model.php");
  require_once(__ROOT__ . "Model/ContactModel.php");

?>

<?php
class ContactsModel extends Model 
{
    
    public $contacts;
    private $dbh;

  function __construct() 
  {
      $this->fillArray();
  }
    
function fillArray() 
{
    $this->contacts = array();
    $this->dbh = $this->connect();
    $result = $this->readContacts();
    while ($row = $result->fetch_assoc()) 
    {
     array_push($this->contacts, new ContactModel($row["id"],$row["user_id"],$row["suggested_course_name"],$row["course_faculty_id"],$row["course_img"],$row["student_message"],$row["admin_respond"],$row["auditor_comment"],$row["ispenalty"],$row["hr_penalty"]));
    }
}
  
      function getContacts() {
    return $this->contacts;
  }
    
  function getID() {
    return $this->id;
  }
    
  function readContacts(){
    $sql = "SELECT * FROM contactus";
    
    $result = $this->dbh->query($sql);
    if ($result->num_rows > 0)
    {
        return $result;
    }
    else 
    {
        return false;
    }
  }
    
         function insertMessage($course_img,$user_id,$suggested_course_name,$course_faculty_id,$student_message)
  {
        // Attempt insert query execution
        $user_id = $this->dbh->getConn()->real_escape_string($user_id);
        $suggested_course_name = $this->dbh->getConn()->real_escape_string($suggested_course_name);
        $course_faculty_id = $this->dbh->getConn()->real_escape_string($course_faculty_id);
        //$course_img = $this->dbh->getConn()->real_escape_string($course_img);
        $student_message = $this->dbh->getConn()->real_escape_string($student_message);
        $sql = "INSERT INTO contactus (course_img, user_id, suggested_course_name, course_faculty_id,student_message) VALUES ('$course_img','$user_id', '$suggested_course_name','$course_faculty_id','$student_message')";

        if($this->dbh->query($sql) === true){
            echo "Message inserted successfully.";
            header("location:../View/suggest.php");    
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
    
          function editAdminRespond($admin_respond, $id)
  {

    $sql = "UPDATE contactus SET admin_respond = '$admin_respond' WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Message edited successfully.";
        header("location:../View/RespondMessage.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
          function editComment($auditor_comment, $id)
  {

    $sql = "UPDATE contactus SET auditor_comment = '$auditor_comment' WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Comment edited successfully.";
        header("location:../View/AuditorComment.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
             function editPenalty($hr_penalty, $id)
  {

    $sql = "UPDATE contactus SET hr_penalty = '$hr_penalty' WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Penalty edited successfully.";
        header("location:../View/HRPenalty.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
      function deleteMessage($id)
  {
    
    $sql = "DELETE FROM contactus 
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Message deleted successfully.";
        header("location:../View/suggest.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
    public function SelectAllMessages()
	{
		$sql="SELECT * FROM contactus ";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new MessageModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
}
?>