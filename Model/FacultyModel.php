<?php
  require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class FacultyModel extends Model 
{
    public $id;
    public $faculty;
    public $levels;
    
  function __construct($id) 
  {
    if($id!=null)
    {
      $this->readFaculty($id);
      //$this->fillArray();
    }else
    {
      $this->id = $id;
    }
  }
function fillArray() 
{
    $this->levels = array();
    $this->dbh = $this->connect();
    $result = $this->readlevels();
    while ($row = $result->fetch_assoc()) 
    {
     array_push($this->levels, new FacultyModel($row["id"],$row["faculty"]));
    }
}
    function getFaculty() 
  {
    return $this->faculty;
  }

  function setFaculty($faculty) 
  {
    return $this->faculty = $faculty;
  }

  function getID() {
    return $this->id;
  }

  function readFaculty($id)
  {
    $sql = "SELECT * FROM levels where id=".$id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->faculty = $row["faculty"];
    }
    else 
    {
        $this->faculty = "";
    }
    //$this->conn->close();
  }
    
    function readlevels()
  {
    $sql = "SELECT * FROM levels";
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1)
    {
        $row = $dbh->fetchRow();
        $this->id = $row["id"];
        $this->name = $row["faculty"];
    }
    else 
    {
        $this->faculty = "";
    }
    //$this->conn->close();
  }
    
    public function SelectAlllevels()
	{
		$sql="SELECT * FROM levels ";
		$i=0;
		$ObjArray=array();
        $result = $this->dbh->query($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MyObj= new FacultyModel($row["id"]);
			$ObjArray[$i]=$MyObj;
			$i++;
		}
		return $ObjArray;
	}
}
?>