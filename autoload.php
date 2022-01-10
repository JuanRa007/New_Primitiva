<?php

function controllers_autoload($classname)
{
  include 'controllers/' . $classname . '.php';
}

// Cargamos los controladores definidos
spl_autoload_register('controllers_autoload');
