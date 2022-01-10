<?php

// Base del proyecto
define("base_url", "http://localhost/New_Primitiva/");

// Presentación por defecto.
define("controller_default", "apuestaController");
define("action_default", "inicio");


/* TEST O PRODUCTIVO */
define("app_prod", "false");

/* APP NOMBRE */
define("app_name", "Nuestras Apuestas BETA MVC");

/* DATABASE CONFIGURATION */
define("app_host", "localhost");
define("app_user", "primitiva");
define("app_pass", "primitiva");
define("app_dbname", "primitiva");

/* MENU CONFIGURATION */
define("app_pagina", basename($_SERVER['PHP_SELF']));
define("app_direct", pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME));

/* SALDO MÍNIMO */
define("app_saldominimo", 2.5);

/* RANGO DE AÑOS */
define("app_rangoanoini", 2003);
define("app_rangoanofin", date("Y", time()) + 1);
