<!-- Contenedor ambas columnas - Inicio-->
<div class="container-fluid mt-5">
  <!-- Fila del contenedor - Inicio-->
  <div class="row">

    <div class="col-sm-3 p-3 mb-2 bg-secondary text-white">
      <aside class="container">
        <?php if (!isset($_SESSION[app_sesion_usuario])) : ?>
          <h4 class="color-primary mt-3">Entrar a la página</h4>
          <form action="<?= app_base_url ?>usuario/login" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required />
              <div id="emailHelp" class="form-text">Nunca compartas tu email con otras personas.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        <?php else :  ?>
          <h4 class="color-primary mt-3"><?= $_SESSION[app_sesion_usuario]->username ?></h4>
        <?php endif; ?>
        <ul class="nav flex-column mt-4">
          <?php if (isset($_SESSION[app_sesion_admin])) : ?>
            <li class="nav-item"><a class="nav-link" href="<?= app_base_url ?>usuario/listar">Gestionar usuarios</a></li>
          <?php endif; ?>
          <?php if (isset($_SESSION[app_sesion_usuario])) : ?>
            <li class="nav-item"><a class="nav-link" href="<?= app_base_url ?>usuario/logout">Cerrar sesión</a></li>
          <?php else :  ?>
            <li class="nav-item"><a class="nav-link" href="<?= app_base_url ?>usuario/registro">Registrese aquí</a></li>
          <?php endif; ?>
        </ul>
      </aside>
    </div>

    <!-- Bloque lateral derecha - Inicio -->
    <div class="col-sm-9 p-3 mt-3 bg-light text-black">
      <div class="container">
        <div class="row">