<?php
// Usuario
require_once 'models/usuario.php';


class usuarioController
{

  public function index()
  {
    echo "<h1>Controlador Usuarios, Acción index</h1>";
  }


  public function registro()
  {
    require_once 'views/usuario/registro.php';
  }


  public function save()
  {

    // Los datos llegan por POST
    if (isset($_POST)) {

      // Username
      $username = isset($_POST['username']) ? $_POST['username'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      // Comprobamos que nos llegan todos los datos.
      if ($username && $email && $password) {

        // Creamos el objeto usuario.
        $usuario = new Usuario;

        $usuario->setUsernombre($username);
        $usuario->setEmail($email);
        $usuario->setPassword($password);

        // Con los datos, lo grabamos.
        $save = $usuario->save();

        if ($save) {
          // Todo correcto.
          $_SESSION[app_sesion_registro] = app_sesion_correcto;
        } else {
          // Incorrecto.
          $_SESSION[app_sesion_registro] = app_sesion_incorrecto;
        }
      } else {
        // Incorrecto.
        $_SESSION[app_sesion_registro] = app_sesion_incorrecto;
      }
    } else {
      $_SESSION[app_sesion_registro] = app_sesion_incorrecto;
    }
    header("Location:" . app_base_url . "usuario/registro");
  }


  // Login del usuario
  public function login()
  {

    // Los datos llegan por POST
    if (isset($_POST)) {

      $usuario = new Usuario;

      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);

      // Buscamos los datos introducidos.
      $identity = $usuario->login();

      // Comprobamos lo recibido.
      if ($identity && is_object($identity)) {
        $_SESSION[app_sesion_usuario] = $identity;

        // Comprobamos si es un admin
        //if ($identity->rol == app_sesion_admin) {
        if ($identity->userlevel == '9') {
          $_SESSION[app_sesion_admin] = true;
        }
      } else {
        $_SESSION[app_sesion_usuario] = app_sesion_incorrecto;
      }
    }
    header("Location:" . app_base_url);
  }

  // Cierre de sessión del usuario
  public function logout()
  {

    // Comprobamos que tenemos una sesión abierta.
    if (isset($_SESSION[app_sesion_usuario])) {
      unset($_SESSION[app_sesion_usuario]);
    }

    // Si es admin, también se cierra.
    if (isset($_SESSION[app_sesion_admin])) {
      unset($_SESSION[app_sesion_admin]);
    }
    header("Location:" . app_base_url);
  }
}   // Fin Class usuarioController