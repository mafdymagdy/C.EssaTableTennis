<?php
  require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class QuestionModel extends Model 
{
    public $id;
    public $Student_id;
    public $question;
    public $answer;
    
    function __construct($id) 
  {
    $this->id = $id;
    if($id != null)
    {
      $this->readQuestion($id);
    }else
    {
      $this->id =$id;  
      $this->Student_id = $Student_id;
      $this->question = $question;
      $this->answer = $answer;
    }
  }
    
    function getStudentId() 
  {
    return $this->Student_id;
  }

  function setStudentId($Student_id) 
  {
    return $this->Student_id = $Student_id;
  }
    
        function getQuestion() 
  {
    return $this->question;
  }

  function setQuestion($question) 
  {
    return $this->question = $question;
  }
            function getAnswer() 
  {
    return $this->answer;
  }

  function setAnswer($answer) 
  {
    return $this->answer = $answer;
  }
  
    
  function getID() {
    return $this->id;
  }

  function readQuestion($id)
  {
    $sql = "SELECT * FROM questions where id=".$id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->id = $row["id"];
        $this->Student_id = $row["Student_id"];
        $this->question = $row["question"];
        $this->answer = $row["answer"];
    }
    else 
    {
        $this->id = "";
        $this->Student_id = "";
        $this->question = "";
        $this->answer = "";
    }
    //$this->conn->close();
  }

}
?>