<?php
// Sesión iniciada
session_start();
// Cargamos los controladores
require_once 'autoload.php';
// Cargamos los parámetros principales
require_once 'config/parameters.php';
// Cargamos la BBDD
require_once 'config/db.php';
// Carga de funciones varias
require_once 'helpers/utils.php';

// Cargamos la estructura de las páginas
require_once 'views/layout/header.php';
require_once 'views/layout/container.php';

function show_error()
{
  $error = new errorController();
  $error->index();
}

if (isset($_GET['controller'])) {
  $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
  $nombre_controlador = app_controller_default;
} else {
  show_error();
  exit();
}

if (class_exists($nombre_controlador)) {
  $controlador = new $nombre_controlador();

  if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
    $action = $_GET['action'];
    $controlador->$action();
  } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $action_default = app_action_default;
    $controlador->$action_default();
  } else {
    show_error();
  }
} else {
  show_error();
}

require_once 'views/layout/footer.php';
