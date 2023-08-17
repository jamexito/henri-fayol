
<div class="login-box">

  <div class="login-logo">

    <h1><strong>INICIAR SESION</strong></h1>

  </div>

  <div class="login-box-body">

    <h3 class="text-center text-info">Ingresar sus credenciales</h3><br>

    <form action="" method="post" autocomplete="off">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" name="usuario-Ing" placeholder="Usuario" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" name="clave-Ing" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary">Ingresar</button>

        </div>

      </div>

    <?php 

	    $ingreso = new UsuariosControlador();
	    $ingreso -> IngresarControlador();

	?>

    </form>

  </div>

</div>
