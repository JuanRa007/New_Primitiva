<?php

class Usuario
{

  private $userid;
  private $usernombre;
  private $password;
  private $userlevel;
  private $email;
  private $timestamp;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  /**
   * Get the value of userid
   */
  public function getUserid()
  {
    return $this->userid;
  }

  /**
   * Set the value of userid
   *
   * @return  self
   */
  public function setUserid($userid)
  {
    $this->userid = $userid;

    return $this;
  }

  /**
   * Get the value of usernombre
   */
  public function getUsernombre()
  {
    return $this->usernombre;
  }

  /**
   * Set the value of usernombre
   *
   * @return  self
   */
  public function setUsernombre($usernombre)
  {
    $this->usernombre = $this->db->real_escape_string($usernombre);

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of userlevel
   */
  public function getUserlevel()
  {
    return $this->userlevel;
  }

  /**
   * Set the value of userlevel
   *
   * @return  self
   */
  public function setUserlevel($userlevel)
  {
    $this->userlevel = $userlevel;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $this->db->real_escape_string($email);

    return $this;
  }

  /**
   * Get the value of timestamp
   */
  public function getTimestamp()
  {
    $this->timestamp = time();
    return $this->timestamp;
  }

  /**
   * Set the value of timestamp
   *
   * @return  self
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;

    return $this;
  }

  // Grabar usuario en la BBDD.
  public function save()
  {
    $sql = "INSERT INTO users VALUES ('{$this->getUsernombre()}', '{$this->getPassword()}', '0', '1', '{$this->getEmail()}', {$this->getTimestamp()})";

    $save = $this->db->query($sql);

    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }
}



/* 
$time = time();
if(strcasecmp($username, ADMIN_NAME) == 0){
   $ulevel = ADMIN_LEVEL;
}else{
   $ulevel = USER_LEVEL;
}
$q = "INSERT INTO ".TBL_USERS." VALUES ('$username', '$password', '0', $ulevel, '$email', $time)";
return mysqli_query($this->connection, $q);
}

/*
function updateUserField($username, $field, $value){
$q = "UPDATE ".TBL_USERS." SET ".$field." = '$value' WHERE username = '$username'";
return mysqli_query($this->connection, $q);
}
 */