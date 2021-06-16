<?php
  require_once(__ROOT__ . "Model/Model.php");
  require_once(__ROOT__ . "Model/QuestionModel.php");

?>

<?php
class QuestionsModel extends Model 
{
    
    public $questions;
    private $dbh;

  function __construct() 
  {
      $this->fillArray();
  }
    
function fillArray() 
{
    $this->questions = array();
    $this->dbh = $this->connect();
    $result = $this->readQuestions();
    while ($row = $result->fetch_assoc()) 
    {
     array_push($this->questions, new QuestionModel($row["id"],$row["Student_id"],$row["question"],$row["answer"]));
    }
}
  
      function getQusetions() {
    return $this->questions;
  }
    
  function getID() {
    return $this->id;
  }
    
  function readQuestions(){
    $sql = "SELECT * FROM questions";
    
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
    
      function insertQuestion($Student_id,$question,$answer)
  {
        // Attempt insert query execution
        $Student_id = $this->dbh->getConn()->real_escape_string($Student_id);
        $question = $this->dbh->getConn()->real_escape_string($question);
        $sql = "INSERT INTO questions (Student_id, question, answer) VALUES ('$Student_id', '$question', '$answer')";

        if($this->dbh->query($sql) === true){
            echo "Question inserted successfully.";
            header("location:../View/WriteQuestion.php");    
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }

  }
    
      function editAnswer($Student_id,$question,$answer, $id)
  {

    $sql = "UPDATE questions
            SET Student_id = '$Student_id' , question = '$question' , answer = '$answer'
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Answer edited successfully.";
        header("location:../View/RespondQuestions.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
      function deleteQuestion($id)
  {
    
    $sql = "DELETE FROM questions 
            WHERE id=$id";

    if($this->dbh->query($sql) === true){
        echo "Question deleted successfully.";
        header("location:../View/WriteQuestion.php");
        $this->fillArray();
    } else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }
  }
    
    public function SelectAllQuestions()
	{
		$sql="SELECT * FROM questions WHERE Student_id=$idd";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new QuestionModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
}
?>