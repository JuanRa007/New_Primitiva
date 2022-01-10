<?php

class Database
{

  // Definimos la conexión a la BBDDD
  public static function connect()
  {

    $db = new mysqli('localhost', 'root', '', 'tienda_master');
    if ($db->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
      die();
    }

    /* cambiar el conjunto de caracteres a utf8 */
    if (!mysqli_set_charset($db, "utf8")) {
      printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($db));
      die();
    }

    return $db;
  }
}
