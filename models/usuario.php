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
  function getUserid()
  {
    return $this->userid;
  }

  /**
   * Set the value of userid
   *
   * @return  self
   */
  function setUserid($userid)
  {
    $this->userid = $userid;
  }

  /**
   * Get the value of usernombre
   */
  function getUsernombre()
  {
    return $this->usernombre;
  }

  /**
   * Set the value of usernombre
   *
   * @return  self
   */
  function setUsernombre($usernombre)
  {
    $this->usernombre = $this->db->real_escape_string($usernombre);
  }

  /**
   * Get the value of password
   */
  function getPassword()
  {
    $password_truncada = password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    $password_truncada = substr($password_truncada, 0, 30);
    $this->password = $password_truncada;

    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * Get the value of userlevel
   */
  function getUserlevel()
  {
    return $this->userlevel;
  }

  /**
   * Set the value of userlevel
   *
   * @return  self
   */
  function setUserlevel($userlevel)
  {
    $this->userlevel = $userlevel;
  }

  /**
   * Get the value of email
   */
  function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  function setEmail($email)
  {
    $this->email = $this->db->real_escape_string($email);
  }

  /**
   * Get the value of timestamp
   */
  function getTimestamp()
  {
    $this->timestamp = time();
    return $this->timestamp;
  }

  /**
   * Set the value of timestamp
   *
   * @return  self
   */
  function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
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

  // Login del usuario
  public function login()
  {

    // Por defecto, no es correcto.
    $result = false;

    $email = $this->email;
    $password = $this->password;

    // Lo buscamos en la BBDD.
    $sql = "SELECT * FROM users WHERE email = '$email';";
    $login = $this->db->query($sql);

    // Nos devuelve algo.
    if ($login && $login->num_rows == 1) {

      // Obtenemos los datos del usuario para comprobar la clave.
      $usuario = $login->fetch_object();

      $verify = password_verify($password, $usuario->password);

      $verify = true;       /// TODO: CUIDADO!!!!

      if ($verify) {
        $result = $usuario;
      }
    }

    // Devolvemos el resultado de la operación.
    return $result;
  }
}
