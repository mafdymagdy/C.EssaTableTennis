<?php
  require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class ContactModel extends Model 
{
    public $id;
    public $user_id;
    public $suggested_course_name;
    public $course_faculty_id;
    public $course_img;
    public $student_message;
    public $admin_respond;
    public $auditor_comment;
    public $ispenalty;
    public $hr_penalty;
    
    function __construct($id) 
  {
    $this->id = $id;
    if($id != null)
    {
      $this->readContact($id);
    }else
    {
      $this->id =$id;  
      $this->user_id = $user_id;
      $this->suggested_course_name = $suggested_course_name;
      $this->course_faculty_id = $course_faculty_id;
      $this->course_img = $course_img;
      $this->student_message = $student_message;
      $this->admin_respond = $admin_respond;
      $this->auditor_comment = $auditor_comment;
      $this->ispenalty = $ispenalty;
      $this->hr_penalty = $hr_penalty;
    }
  }
    
   function getUserId() 
  {
    return $this->user_id;
  }

  function setUserId($user_id) 
  {
    return $this->user_id = $user_id;
  }
    
        function getSuggestedCourseName() 
  {
    return $this->suggested_course_name;
  }

  function setSuggestedCourseName($suggested_course_name) 
  {
    return $this->suggested_course_name = $suggested_course_name;
  }
    
            function getCourseFacultyId() 
  {
    return $this->course_faculty_id;
  }

  function setCourseFacultyId($course_faculty_id) 
  {
    return $this->course_faculty_id = $course_faculty_id;
  }
    
                function getCourseImage() 
  {
    return $this->course_img;
  }

  function setCourseImage($course_img) 
  {
    return $this->course_img = $course_img;
  }
    
                    function getStudentMessage() 
  {
    return $this->student_message;
  }

  function setStudentMessage($student_message) 
  {
    return $this->student_message = $student_message;
  }
    
                    function getAdminRespond() 
  {
    return $this->admin_respond;
  }

  function setAdminRespond($admin_respond) 
  {
    return $this->admin_respond = $admin_respond;
  }
    
                    function getAuditorComment() 
  {
    return $this->auditor_comment;
  }

  function setAuditorComment($auditor_comment) 
  {
    return $this->auditor_comment = $auditor_comment;
  }
    
                        function getIsPenalty() 
  {
    return $this->ispenalty;
  }

  function setIsPenalty($ispenalty) 
  {
    return $this->ispenalty = $ispenalty;
  }
    
                    function getHRPenalty() 
  {
    return $this->hr_penalty;
  }

  function setHRPenalty($hr_penalty) 
  {
    return $this->hr_penalty = $hr_penalty;
  }
    
  function getID() {
    return $this->id;
  }

  function readContact($id)
  {
    $sql = "SELECT * FROM contactus where id=".$id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->id = $row["id"];
        $this->user_id = $row["user_id"];
        $this->suggested_course_name = $row["suggested_course_name"];
        $this->course_faculty_id = $row["course_faculty_id"];
        $this->course_img = $row["course_img"];
        $this->student_message = $row["student_message"];
        $this->admin_respond = $row["admin_respond"];
        $this->auditor_comment = $row["auditor_comment"];
        $this->ispenalty = $row["ispenalty"];
        $this->hr_penalty = $row["hr_penalty"];
    }
    else 
    {
        $this->id = "";
        $this->user_id = "";
        $this->suggested_course_name = "";
        $this->course_faculty_id = "";
        $this->course_img = "";
        $this->student_message = "";
        $this->admin_respond = "";
        $this->auditor_comment = "";
        $this->ispenalty = "";
        $this->hr_penalty = "";
    }
    //$this->conn->close();
  }

}
?>