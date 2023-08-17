<?php

	if($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2 && $_SESSION["rol"] != 3 && $_SESSION["rol"] != 4){

		echo '<script>

			window.location = "inicio";

		</script>';

		return;

	}

	$item = "id";
	$valor = $_GET["idAula"];

	$aula = SeccionesControlador::VerSeccionC($item,$valor);

	/*ALUMNOS */
	$itemalumno = "aula_asignada";
	$valoralumno = $aula[0]["id"];

	$alumnos = AlumnosControlador::VerAlumnosC($itemalumno,$valoralumno);

?>

<section class="content-header">
	
	<h1>Alumnos de <?php echo $aula[0]["nombres"]; ?></h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 
      <!-- <li><a href="docentes"><i class="fas fa-users"></i> Docentes</a></li>  -->
      <li class="active">Alumnos de <?php echo $aula[0]["nombres"]; ?></li>

    </ol>

</section>

<section class="content">
			
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>
			
			<tr>
				
				<th width="20">Nº</th>
				<th width="80">Documento</th>
				<th>Nombres</th>						
				<th>Apellidos</th>						
				<th>Teléfono</th>
				<th>Estado</th>
				<th>Acciones</th>

			</tr>

		</thead>

		<tbody>

			<?php
				foreach ($alumnos as $key => $value) {
					
					/**HABILITADO O DESHABILITADO*/
					if($value["estado"] === "0"){
						$estado = '<button class="btn btn-danger" title="Deshabilitado"><i class="fa fa-times-circle"></i></button>';
					}else if($value["estado"] === "1"){
						$estado = '<button class="btn btn-success" title="Habilitado"><i class="fa fa-check-circle"></i></button>';
					}else if($value["estado"] === "2"){
						$estado = '<button class="btn btn-warning" title="Por confirmar"><i class="fa fa-check-circle"></i></button>';
					}

					/*BOTONES*/
					if ($_SESSION["rol"] == 1) {
						$boton =  '<button class="btn btn-primary btnEditarAlumno" idAlumno="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-edit-alumno" title="Editar"><i class="fa fa-edit"></i></button> 
							<button class="btn btn-success btnVerAlumno" idAlumnoVer="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-info-alumno" title="Ver Información completa"><i class="fa fa-eye"></i></button>';					
					}else{	
						$boton =  '<button class="btn btn-success btnVerAlumno" idAlumnoVer="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-info-alumno" title="Ver Información completa"><i class="fa fa-eye"></i></button>';	
					}

					echo '<tr>
							<td>'.($key+1).'</td>
							<td>'.$value["dni"].'</td>
							<td>'.$value["nombres"].'</td>
							<td>'.$value["apellidos"].'</td>
							<td>'.$value["telefono"].'</td>
							<td class="text-center">'.$estado.'</td>
							<td>'.$boton.'</td>
						</tr>';
				}
						

			?>						

		</tbody>

	</table>

</section>

<!--===================================
=            MDL EDIT USER            =
====================================-->
<div class="modal fade btn-edit-alumno" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="box-body">

						<!-- <div class="row"> -->

							<!-- <div class="col-md-6"> -->

								<div class="form-group">
									<input type="hidden" name="idAlumnoEA" id="idAlumnoEA">
									<label>Documento:</label>

									<input type="number" class="form-control" id="dniEA" name="dniEA" required>				

								</div>

								<div class="form-group">

									<label>Apellidos:</label>

									<input type="text" class="form-control" id="apellidosEA" name="apellidosEA" required>				

								</div>

								<div class="form-group">

									<label>Nombres:</label>

									<input type="text" class="form-control" id="nombresEA" name="nombresEA" required>				

								</div>

								<div class="form-group">

									<label>Dirección:</label>

									<input type="text" class="form-control" id="direccionEA" name="direccionEA" required>				

								</div>								

							<!-- </div> -->

							<!-- <div class="col-md-6"> -->

								<div class="form-group">

									<label>Teléfono:</label>

									<input type="number" class="form-control" id="telefonoEA" name="telefonoEA" required>				

								</div>
								
								<div class="form-group">

									<label>Apoderado:</label>

									<input type="text" class="form-control" id="apoderadoEA" name="apoderadoEA" required>				

								</div>

								<div class="form-group">
              
									<label>Subir imagen:</label><hr>

									<input type="hidden" class="imagenDir" name="imagenAnterior" id="imagenAlumno">
									<input type="file" class="imagenIng" name="imagenAlumno">

									<p class="help-block">Peso máximo de la imagen 2MB</p>

									<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagenAlumno" id="verImagenAlumno" width="200px">

								</div>

							<!-- </div> -->

						<!-- </div> -->

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Actualizar</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crearAlumno = new AlumnosControlador();
				$crearAlumno -> EditarAlumnoC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=           MDL VER USER             =
===================================-->

<div class="modal fade btn-info-alumno" role="dialog">
  
  <div class="modal-dialog">
		
  		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

				<div class="col-md-12">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua-active">
							<h2 class="widget-user-username" id="nombreAlumno"></h2>
							<h4 class="widget-user-desc" id="apellidosAlumno"></h4>
						</div>
						<div class="widget-user-image">
							<img class="img-circle fotoAlumno" id="fotoAlumno" alt="User Avatar">
						</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h4 class="description-header">DOCUMENTO</h4>
									<span class="description-text" id="documentoAlumno"></span>
								</div>
							</div>
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h4 class="description-header">TELEFONO</h4>
									<span class="description-text" id="telefonoAlumno"></span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="description-block">
									<h4 class="description-header">AULA</h4>
									<span class="description-text" id="aulaAlumno"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 border-right">
								<div class="description-block">
									<h4 class="description-header">APODERADO</h4>
									<span class="description-text" id="apoderadoAlumno"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="description-block">
									<h4 class="description-header">FECHA DE REGISTRO</h4>
									<span class="description-text" id="registroAlumno"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h4 class="description-header">DIRECCION</h4>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="description-block">
									<span class="description-text" id="direccionAlumno"></span>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>

	</div>

</div>

<?php 

// $borrarUsuario = new UsuariosControlador();
// $borrarUsuario -> BorrarUsuarioC();

?>