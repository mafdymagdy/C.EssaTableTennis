<?php
require_once(__ROOT__ . "Model/Model.php");
?>

<?php
class UserModel extends Model
{
  private $id;
  private $username;
  private $password;
  private $created_at;
  private $user_type_id;
  private $faculty_id;
  private $img;

  function __construct($id)
  {
    if ($id != null) {
      $this->readUser($id);
    } else {
      $this->id = $id;
    }
  }

  function getUserName()
  {
    return $this->username;
  }
  function setUserName($username)
  {
    return $this->username = $username;
  }

  function getPassword()
  {
    return $this->password;
  }
  function setPassword($password)
  {
    return $this->password = $password;
  }

  function getCreatedAt()
  {
    return $this->created_at;
  }
  function setCreatedAt($created_at)
  {
    return $this->created_at = $created_at;
  }

  function getUserTypeId()
  {
    return $this->user_type_id;
  }
  function setUserTypeId($user_type_id)
  {
    return $this->user_type_id = $user_type_id;
  }
  function getFacultyId()
  {
    return $this->faculty_id;
  }
  function setFacultyId($faculty_id)
  {
    return $this->faculty_id = $faculty_id;
  }
  function getImage()
  {
    return $this->img;
  }
  function setImage($img)
  {
    return $this->img = $img;
  }

  function getID()
  {
    return $this->id;
  }

  // Read/Insert Trainee
  // 1 is id of Trainee
  function readUser($id)
  {
    $sql = "SELECT * FROM user where id=" . $id;
    $dbh = $this->connect();
    $result = $dbh->query($sql);
    if ($result->num_rows == 1) {
      $row = $dbh->fetchRow();
      $this->id = $row["id"];
      $this->username = $row["username"];
      $this->password = $row["password"];
      $this->created_at = $row["created_at"];
      $this->user_type_id = $row["user_type_id"];
      $this->faculty_id = $row["faculty_id"];
      $this->img = $row["img"];
    } else {
      $this->id = "";
      $this->username = "";
      $this->password = "";
      $this->created_at = "";
      $this->user_type_id = "";
      $this->faculty_id = "";
      $this->img = "";
    }
  }
}