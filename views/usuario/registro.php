<div class="col-12">
  <h1>Registrarse</h1>
</div>

<div class="col-12">

  <?php if (isset($_SESSION[app_sesion_registro]) && $_SESSION[app_sesion_registro] == app_sesion_correcto) : $logueado = true ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Registro <strong>completado</strong> correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php elseif (isset($_SESSION[app_sesion_registro]) && $_SESSION[app_sesion_registro] == app_sesion_incorrecto) : $logueado = false ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Registro <strong>fallido</strong>. Introduzca los datos correctamente.
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php else : $logueado = false; ?>
  <?php endif; ?>
  <?php Utils::deleteSession(app_sesion_registro); ?>

  <?php if (!$logueado) : ?>
    <form action="<?= app_base_url ?>usuario/save" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="username" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" required />
      </div>
      <button type="submit" class="btn btn-primary">Registro</button>
    </form>
  <?php endif; ?>
</div>