<!DOCTYPE html>
<html lang="es">

<head>
  <title><?= $app_name ?></title>
  <!-- Descripción de la página -->
  <meta name="description" content="Bienvenidos a Nuestras Apuestas: web dedicada al control del grupo de apostantes." />
  <!-- Valores META para los ficheros PHP -->
  <meta charset="UTF-8" />
  <link rel="icon" href="./favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fuente Google -->
  <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet" />
  <!-- Fuente FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  <!-- LightBox -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
  <!-- Mi Estilos -->
  <link rel="stylesheet" href="./assets/css/iconos.css" />
  <link rel="stylesheet" href="./assets/css/estilos.css" />
</head>

<body>
  <!-- Menu Principal -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.php" class="navbar-brand p-0">
        <img class="col-logo" src="./img/nuestrasapuestas-logo.svg" alt="Nuestras Apuestas" />
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?= ($app_pagina == "index.php") ? "active" : "" ?>">
            <a href="index.php" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item <?= ($app_pagina == "saldos.php") ? "active" : "" ?>">
            <a href="saldos.php" class="nav-link">Saldos</a>
          </li>
          <li class="nav-item <?= ($app_pagina == "anteriores.php") ? "active" : "" ?>">
            <a href="anteriores.php" class="nav-link">Historial</a>
          </li>
          <?php
          if (!app_prod) {
          ?>
            <li class="nav-item <?= ($app_pagina == "mensajes.php") ? "active" : "" ?>">
              <a href="mensajes.php" class="nav-link">Blog</a>
            </li>
            <li class="nav-item <?= ($app_pagina == "acercade.php") ? "active" : "" ?>">
              <a href="acercade.php" class="nav-link">Acerca de</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>