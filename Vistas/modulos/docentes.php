<section class="content-header">
	
	<h1>Gestor de Docentes</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Gestor de Docentes</li>

    </ol>

</section>

<section class="content">

	<div class="box-header">

		<?php if ($_SESSION['rol'] == 1): ?>

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".mdl-insert-docente">Ingresar Docente</button>

		<?php endif ?>

	</div>
			
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>
			
			<tr>
				
				<th>Nº</th>
				<th>DNI</th>
				<th>Nombres y Apellidos</th>
				<!-- <th>Teléfono</th> -->
				<th>Aula asignada</th>
				<th>Estado</th>
				<th>Acciones</th>

			</tr>

		</thead>

		<tbody>

			<?php 

				$item=null;

				$valor=null;

				$resultado = DocentesControlador::VerDocentesC($item, $valor);

				foreach ($resultado as $key => $value) {

						/**HABILITADO O DESHABILITADO*/
						if($value["estado"] !== "0" && $_SESSION["rol"] === "1"){

							$estado = '<button class="btn btn-success" title="Habilitado"><i class="fa fa-check-circle"></i></button>';

							$boton =  '<button class="btn btn-primary btnEditarDocente" idDocente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDocente" title="Editar"><i class="fa fa-edit"></i></button> 
								<button class="btn btn-success btnVerInfoDocente" idDocenteVer="'.$value["id"].'" data-toggle="modal" data-target=".btn-info-docente" title="Ver Información completa"><i class="fa fa-eye"></i></button>
								<button type="button" class="btn btn-info btnEditarAula" idDocenteAula="'.$value["id"].'" data-toggle="modal" data-target=".btnAulaDocente"><i class="fa fa-share"></i></button>';	

						}else{

							// $estado = '<button class="btn btn-danger" title="Deshabilitado"><i class="fa fa-times-circle"></i></button>';

							$boton =  '<button class="btn btn-primary" disabled><i class="fa fa-edit"></i></button> 
								<button class="btn btn-success btnVerInfoDocente" idDocenteVer="'.$value["id"].'" data-toggle="modal" data-target=".btn-info-docente" title="Ver Información completa"><i class="fa fa-eye"></i></button>
								<button type="button" class="btn btn-info" disabled><i class="fa fa-share"></i></button>';	
						}

						/*AULAS*/
						$item = "id";
						$valor = $value["aula_asignada"];

						$aulas = SeccionesControlador::VerSeccionC($item,$valor);

						if ($value["estado"] == 1 && $value["aula_asignada"] != null) {
							if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
								$aulahabil = '<a href="#" class="verAlumnos" idAula="'.$aulas[0]["id"].'">
												<span class="bg-success">'.$aulas[0]["nombres"].'</span>
											</a>';
							}else{
								$aulahabil = '<span>'.$aulas[0]["nombres"].'</span>';
							}
							// $nombreaula = $aulas[0]["nombres"];
						}else{

							$aulahabil = '<span class="bg-info">No tiene aula asignada</span>';
							// $nombreaula = "No tiene aula";

						}

					echo '<tr>
							<td>'.($key+1).'</td>
							<td>'.$value["dni"].'</td>
							<td>'.$value["nombres"].', '.$value["apellidos"].'</td>
							<td>'.$aulahabil.'</td>
							<td class="text-center">'.$estado.'</td>
							<td>'.$boton.'</td>
						</tr>';

										
				}					

			?>						

		</tbody>

	</table>

</section>

<!--===================================
=            MDL EDIT AULA            =
====================================-->
<div class="modal fade btnAulaDocente" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Cambiar o Asignar Aula</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						<label id="nombreDocenteEdit" class="text-uppercase text-info"></label>
						<div class="form-group">

							<label>Seleccionar Aula:</label>
							<input type="hidden" id="idDocenteEdit" name="idDocenteEdit">
							<select class="form-control" name="aulaDocenteEdit">

								<option id="aulaAntesdocente"></option>

								<?php 

									$item = null;
								
									$valor = null;

									$aulas = SeccionesControlador::VerSeccionC($item, $valor);

									foreach ($aulas as $key => $value) {
										
										echo '<option value="'.$value["id"].'">'.$value["nombres"].'</option>';

									}

								?>

							</select>

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Actualizar Aula</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$editarAulaDocente = new DocentesControlador();
				$editarAulaDocente -> EditarAulaDocenteC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=          MDL ADD DOCENTE           =
===================================-->
<div class="modal fade mdl-insert-docente" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="box-body">

						<div class="form-group">

							<label>Documento:</label>

							<input type="number" class="form-control" name="dni" required>				

						</div>

						<div class="form-group">

							<label>Apellidos:</label>

							<input type="text" class="form-control" name="apellidos" required>				

						</div>

						<div class="form-group">

							<label>Nombres:</label>

							<input type="text" class="form-control" name="nombres" required>				

						</div>

						<div class="form-group">

							<label>Dirección:</label>

							<input type="text" class="form-control" name="direccion" required>				

						</div>

						<div class="form-group">

							<label>Teléfono:</label>

							<input type="number" class="form-control" name="telefono" required>				

						</div>
						
						<div class="form-group">

							<label>Correo:</label>

							<input type="email" class="form-control" name="email" required>				

						</div>

						<div class="form-group">
              
							<label>Subir imagen:</label><hr>

							<input type="file" class="imagenIn" name="imagenIn">

							<p class="help-block">Peso máximo de la imagen 2MB</p>

							<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagen" width="200px">

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Insertar</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$ingresarDocente = new DocentesControlador();
				$ingresarDocente -> CrearDocenteC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=       MDL UPDATE DOCENTE           =
===================================-->

<div id="modalEditarDocente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form" enctype="multipart/form-data" autocomplete="off">
				
				<div class="modal-body">
					
				<div class="modal-body">
					
					<div class="box-body">

						<div class="form-group">
							<input type="hidden" id="idDocente" name="idDocente">
							<label>Documento:</label>

							<input type="number" class="form-control" name="dniDocente" id="dniDocente" required readonly>				

						</div>

						<div class="form-group">

							<label>Apellidos:</label>

							<input type="text" class="form-control" name="apellidosDocente" id="apellidosDocente" required>				

						</div>

						<div class="form-group">

							<label>Nombres:</label>

							<input type="text" class="form-control" name="nombresDocente" id="nombresDocente" required>				

						</div>

						<div class="form-group">

							<label>Dirección:</label>

							<input type="text" class="form-control" name="direccionDocente" id="direccionDocente" required>				

						</div>

						<div class="form-group">

							<label>Teléfono:</label>

							<input type="number" class="form-control" name="telefonoDocente" id="telefonoDocente" required>				

						</div>
						
						<div class="form-group">

							<label>Correo:</label>

							<input type="email" class="form-control" name="emailDocente" id="emailDocente" required>				

						</div>

						<div class="form-group">
              
							<label>Subir imagen:</label><hr>

							<input type="hidden" class="imagenIn" name="imagenAnterior" id="imagenDocente">
							<input type="file" class="imagenIn" name="imagenDocente">

							<p class="help-block">Peso máximo de la imagen 2MB</p>

							<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagen" id="verImagen" width="200px">

						</div>

					</div>

				</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Actualizar</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$editarDocente = new DocentesControlador();
				$editarDocente -> EditarDocenteC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=         VER INFO DOCENTE           =
===================================-->

<div class="modal fade btn-info-docente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

				<div class="col-md-12">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua-active">
							<h2 class="widget-user-username" id="nombresDocenteVer"></h2>
							<h4 class="widget-user-desc" id="apellidosDocenteVer"></h4>
						</div>
						<div class="widget-user-image">
							<img class="img-circle" id="fotoDocente" alt="User Avatar">
						</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h4 class="description-header">DOCUMENTO</h4>
									<span class="description-text" id="documentoDocenteVer"></span>
								</div>
							</div>
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h4 class="description-header">TELEFONO</h4>
									<span class="description-text" id="telefonoDocenteVer"></span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="description-block">
									<h4 class="description-header">AULA ASIGNADA</h4>
									<span class="description-text" id="aulaDocenteVer"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 border-right">
								<div class="description-block">
									<h4 class="description-header">CORREO ELECTRONICO</h4>
									<span class="description-text" id="emailDocenteVer"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="description-block">
									<h4 class="description-header">FECHA DE REGISTRO</h4>
									<span class="description-text" id="registroDocenteVer"></span>
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
									<span class="description-text" id="direccionDocenteVer"></span>
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