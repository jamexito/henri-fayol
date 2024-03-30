<?php

	if($_SESSION["rol"] != 1){

		echo '<script>

			window.location = "inicio";

		</script>';

		return;

	}

?>
<section class="content-header">
		
		<h1>Gestor de Usuarios</h1>

		<ol class="breadcrumb">

	      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

	      <li class="active">Gestor de Usuarios</li>

	    </ol>

</section>

<section class="content">

	<?php if ($_SESSION['rol'] == 1): ?>
		<div class="box-header">

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearUsuario"><i class="fa fa-user-plus"></i> Crear Usuario</button>

		</div>
	<?php endif ?>
		
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>			
			<tr>
				
				<th style="width: 10px;">Nº</th>
				<th style="width: 300px;">Apellidos y Nombres</th>
				<th>DNI</th>
				<!-- <th>Dirección</th> -->
				<th>Teléfono</th>
				<th style="width: 10px;">Foto</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Ultimo Log</th>
				<th>Estado</th>
				<th>Acciones</th>

			</tr>
		</thead>

		<tbody>

		<?php 

			$item=null;
			$valor=null;

			$resultado = UsuariosControlador::VerUsuariosC($item, $valor);

			foreach ($resultado as $key => $value) {

				$columna = "id";
				$valor = $value["rol"];

				$verEstado = RolesControlador::VerRolesC($columna, $valor);	
				
				/*Foto de perfil*/
				if ($value["foto"] == "") {							
					$foto = '<img src="Vistas/img/defecto.png" width="40px" class="img-circle">';
				}else{
					$foto = '<img src="'.$value["foto"].'" width="40px" class="img-circle">';
				}
				
				/*Estado */
				if ($_SESSION["rol"] == 1) {

					$botones = '<button class="btn btn-primary btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i> Editar</button>';
							
					if($value["estado"] != 0){
						$estado = '<button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button>';
					}else{
						$estado = '<button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button>';
					}

				}else{
					$botones = '<button class="btn btn-default"><i class="fa fa-edit"></i> Editar</button>';
				}

				echo '<tr>
				
						<td>'.($key+1).'</td>
						<td>'.$value["apellidos"].' '.$value["nombres"].'</td>
						<td>'.$value["dni"].'</td>
						<td>'.$value["telefono"].'</td>
						<td>'.$foto.'</td>
						<td>'.$value["usuario"].'</td>
						<td>'.$verEstado["nombre"].'</td>			
						<td>'.$value["ultimo_logueo"].'</td>			
						<td>'.$estado.'</td>
						<td>							
							<div class="btn-group">		
								'.$botones.'
							</div>
						</td>							

					</tr>';

									
			}					

		?>							

		</tbody>

	</table>

</section>

<!--==================================
=            MDL ADD USER            =
===================================-->
<div class="modal fade" rol="dialog" id="CrearUsuario">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">

							<label>Apellidos:</label>

							<input type="text" class="form-control input-lg" name="apellidos" required>				

						</div>

						<div class="form-group">

							<label>Nombres:</label>

							<input type="text" class="form-control input-lg" name="nombres" required>				

						</div>

						<div class="form-group">

							<label>DNI:</label>

							<input type="text" class="form-control input-lg" name="dni" required>				

						</div>

						<div class="form-group">

							<label>Dirección:</label>

							<input type="text" class="form-control input-lg" name="direccion" required>				

						</div>

						<div class="form-group">

							<label>Teléfono:</label>

							<input type="text" class="form-control input-lg" name="telefono" required>				

						</div>

						<div class="form-group">

							<label>Rol:</label>

							<select class="form-control input-lg" name="rol">

								<option selected disabled>Seleccionar Rol...</option>
								<option value="2">Administrador</option>
								<option value="3">Supervisor</option>
								<option value="4">Docente</option>

							</select>			

						</div>

						<div class="form-group">

							<label>Usuario:</label>

							<input type="text" class="form-control input-lg" name="usuario" required>				

						</div>

						<div class="form-group">

							<label>Contraseña:</label>

							<input type="password" class="form-control input-lg" name="clave" required>				

						</div>

						<div class="form-group">
              
							<label>Subir imagen:</label>

							<input type="file" class="ImgUser" name="ImgUser">

							<p class="help-block">Peso máximo de la imagen 2MB</p>

							<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagenUser" width="200px">

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Crear</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crearUsuario = new UsuariosControlador();
				$crearUsuario -> CrearUsuarioC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=         MDL UPDATE USER            =
===================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

	    <div class="modal-content">
			
			<form method="POST" role="form" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">

							<label>Apellidos:</label>

							<input type="hidden" id="idE">

							<input type="text" class="form-control input-lg" id="apellidosE" name="apellidosE" required>				

						</div>

						<div class="form-group">

							<label>Nombres:</label>

							<input type="text" class="form-control input-lg" id="nombresE" name="nombresE" required>				

						</div>

						<div class="form-group">

							<label>DNI:</label>

							<input type="text" class="form-control input-lg" id="dniE" name="dniE" required>				

						</div>

						<div class="form-group">

							<label>Dirección:</label>

							<input type="text" class="form-control input-lg" id="direccionE" name="direccionE" required>				

						</div>

						<div class="form-group">

							<label>Teléfono:</label>

							<input type="text" class="form-control input-lg" id="telefonoE" name="telefonoE" required>				

						</div>

						<div class="form-group">

							<label>Rol:</label>

							<select class="form-control input-lg" id="rolE" name="rolE">

								<option selected disabled>Seleccionar Rol...</option>
								<option value="1">Super Administrador</option>
								<option value="2">Administrador</option>
								<option value="3">Supervisor</option>
								<option value="4">Docente</option>
								
							</select>			

						</div>					

						<div class="form-group">

							<label>Usuario:</label>

							<input type="text" class="form-control input-lg" id="usuarioE" name="usuarioE" required readonly>				

						</div>

						<div class="form-group">

							<label>Contraseña:</label>

							<input type="hidden" name="claveActual" id="claveActual">

							<input type="password" class="form-control input-lg" id="claveE" name="claveE">				

						</div>

						<div class="form-group">
              
							<label>Subir imagen:</label>

							<input type="hidden" name="imagenAnterior" id="imagenUser">
							<input type="file" class="ImgUser" name="ImgUserE">

							<p class="help-block">Peso máximo de la imagen 2MB</p>

							<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagenUser" width="200px">

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Editar</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crearUsuario = new UsuariosControlador();
				$crearUsuario -> EditarUsuarioC();

				?>

			</form>

		</div>

  </div>

</div>

<!--==================================
=          VER INFO ALUMNO           =
===================================-->

<!-- <div class="modal fade btn-info-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">				
				<span aria-hidden="true">×</span></button>
			</div>			
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
					<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
					<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
				</ul>
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<div class="row">
							<div class="col-md-12">
							<div class="box box-primary">
								<div class="box-body box-profile">
								<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

								<h3 class="profile-username text-center">Nina Mcintire</h3>

								<p class="text-muted text-center">Software Engineer</p>

								<ul class="list-group list-group-unbordered">
									<li class="list-group-item">
									<b>Followers</b> <a class="pull-right">1,322</a>
									</li>
									<li class="list-group-item">
									<b>Following</b> <a class="pull-right">543</a>
									</li>
									<li class="list-group-item">
									<b>Friends</b> <a class="pull-right">13,287</a>
									</li>
								</ul>

								<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div id="menu1" class="tab-pane fade">
						<h3>Menu 1</h3>
						<p>Some content in menu 1.</p>
					</div>
					<div id="menu2" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content in menu 2.</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
  	</div>
</div> -->

<?php 

// $borrarUsuario = new UsuariosControlador();
// $borrarUsuario -> BorrarUsuarioC();

?>