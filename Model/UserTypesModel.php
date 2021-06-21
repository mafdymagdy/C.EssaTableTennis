<?php
require_once(__ROOT__ . "Model/Model.php");
?>

<?php

class UserTypesModel extends Model
{
  public $id;
  public $type;
  public $types;

  function __construct($id)
  {
    if ($id != null) {
      $this->readUserType($id);
    } else {
      $this->id = $id;
    }
  }

  function fillArray()
  {
    $this->types = array();
    $this->dbh = $this->connect();
    $result = $this->readUserTypes();
    while ($row = $result->fetch_assoc()) {
      array_push($this->types, new UserTypesModel($row["id"], $row["type"]));
    }
  }

  function getType()
  {
    return $this->type;
  }

  function setType($type)
  {
    return $this->type = $type;
  }

  function getID()
  {
    return $this->id;
  }

  function readUserType($id)
  {
    $sql = "SELECT * FROM usertypes where id=" . $id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1) {
      $row = $dbh->fetchRow();
      $this->type = $row["type"];
    } else {
      $this->type = "";
    }
  }

  function readUserTypes()
  {
    $sql = "SELECT * FROM usertypes";
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1) {
      $row = $dbh->fetchRow();
      $this->id = $row["id"];
      $this->type = $row["type"];
    } else {
      $this->type = "";
    }
  }

  public function SelectAllTypes()
  {
    $sql = "SELECT * FROM usertypes ";
    $i = 0;
    $ObjArray = array();
    $result = $this->dbh->query($sql);
    while ($row = mysqli_fetch_array($result)) {
      $MyObj = new UserTypesModel($row["id"]);
      $ObjArray[$i] = $MyObj;
      $i++;
    }
    return $ObjArray;
  }
}
?>