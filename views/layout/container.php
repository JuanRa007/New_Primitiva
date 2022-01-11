<!-- Contenedor ambas columnas - Inicio-->
<div class="container-fluid mt-5">
  <!-- Fila del contenedor - Inicio-->
  <div class="row">

    <div class="col-sm-3 p-3 mb-2 bg-primary text-white">
      <h3 class="color-primary">Entrar a la página</h3>

      <form action="<?= base_url ?>usuario/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" />

        <label for="password">Contraseña</label>
        <input type="password" name="password" />

        <input type="submit" value="Enviar" />
      </form>


    </div>

    <!-- Bloque lateral derecha - Inicio -->
    <div class="col-sm-9 p-3 mb-2 bg-secondary text-white">