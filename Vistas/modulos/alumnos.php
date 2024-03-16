<?php

	if($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2 && $_SESSION["rol"] != 3 && $_SESSION["rol"] != 4){

		echo '<script>

			window.location = "inicio";

		</script>';

		return;

	}

?>
<section class="content-header">
	
	<h1>Gestor de Alumnos</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Gestor de Alumnos</li>

    </ol>

</section>

<section class="content">

	<div class="box-header">

		<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2): ?>			
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#crearAlumno">Ingresar Alumno</button>
		<?php endif ?>

		<a class="btn btn-success btn-lg" href="Vistas/includes/excelalumnos.php">Descargar Reporte</a>

	</div>
			
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>
			
			<tr>
				
				<th width="20">Nº</th>
				<th width="80">Documento</th>
				<th>Nombres</th>						
				<th>Apellidos</th>
				<th>Teléfono</th>
				<th>Aula asignada</th>
				<th>Estado</th>
				<th>Acciones</th>
				
			</tr>

		</thead>
		<tbody>

			<?php 
      
				$item=null;
				$valor=null;

				$resultadoAl = AlumnosControlador::VerAlumnosC($item, $valor);

			?>

			<?php foreach ($resultadoAl as $key => $value): ?>

				<?php 
					/*AULAS*/
					$itemaula = "id";
					$valoraula = $value["aula_asignada"];
					
					$aulas = SeccionesControlador::VerSeccionC($itemaula,$valoraula);
				?>

				<?php if ($value["estado"] == 1): ?>
					<?php $estado = '<button class="btn btn-success btnStatus" title="Habilitado" idAlumnoSt="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-delete-alumno"><i class="fa fa-check-circle"></i></button>'; ?>
				<?php elseif ($value["estado"] == 2): ?>
					<?php $estado = '<button class="btn btn-warning btnStatus" title="Espera" idAlumnoSt="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-delete-alumno"><i class="fa fa-exclamation-triangle"></i></button>'; ?>
				<?php else: ?>
					<?php $estado = '<button class="btn btn-danger" title="Deshabilitado" disabled><i class="fa fa-times-circle"></i></button>'; ?>
				<?php endif ?>

				<?php if ($_SESSION["rol"] == 1): ?>
					<?php if ($value["estado"] == 1): ?>
							<?php $boton =  '<button class="btn btn-primary btnEditarAlumno" idAlumno="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-edit-alumno" title="Editar"><i class="fa fa-edit"></i></button> 
								<button class="btn btn-success btnVerPerfilAlumno" idAlumnoPefilVer="'.$value["idalumno"].'" title="Ver perfil del alumno"><i class="fa fa-eye"></i></button>
								<button type="button" class="btn btn-info btnEditarAulaAlumno" idAlumnoAula="'.$value["idalumno"].'" data-toggle="modal" data-target=".btnAulaAlumno"><i class="fa fa-share"></i></button>';  ?>
							<?php elseif ($value["estado"] == 2): ?>
							    <?php $boton =  '<button class="btn btn-primary btnEditarAlumno" idAlumno="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-edit-alumno" title="Editar"><i class="fa fa-edit"></i></button> 
								<button class="btn btn-success btnVerPerfilAlumno" idAlumnoPefilVer="'.$value["idalumno"].'" title="Ver perfil del alumno"><i class="fa fa-eye"></i></button>
								<button type="button" class="btn btn-info"  disabled><i class="fa fa-share"></i></button>';  ?>
						<?php else: ?>
							<?php $boton = '<button class="btn btn-primary btnEditarAlumno" idAlumno="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-edit-alumno" title="Editar"><i class="fa fa-edit"></i></button> 
								<button class="btn btn-success" disabled><i class="fa fa-eye"></i></button>
								<button type="button" class="btn btn-info"  disabled><i class="fa fa-share"></i></button>'; ?>
						<?php endif ?>
					<?php ?>
				<?php else: ?>
					<?php $boton =  '<button class="btn btn-success btnVerAlumno" idAlumnoVer="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-info-alumno" title="Ver Información completa"><i class="fa fa-eye"></i></button>'; ?>
				<?php endif ?>


				<tr>
					<td><?php echo ($key+1); ?></td>
					<td><?php echo $value["dni"]; ?></td>
					<td><?php echo $value["nombres"]; ?></td>
					<td><?php echo $value["apellidos"]; ?></td>
					<td><?php echo $value["telefono"]; ?></td>
					<td><?php echo $aulas[0]["nombres"]; ?></td>
					<td class="text-center"><?php echo $estado; ?></td>
					<td><?php echo $boton; ?></td>
				</tr>
				
			<?php endforeach ?>					

		</tbody>
		<!-- <button class="btn btn-success btnVerAlumno" idAlumnoVer="'.$value["idalumno"].'" data-toggle="modal" data-target=".btn-info-alumno" title="Ver Información completa"><i class="fa fa-eye"></i></button> -->
	</table>

</section>

<!--===================================
=            MDL EDIT AULA            =
====================================-->
<div class="modal fade btnAulaAlumno" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">Cambiar Aula</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						<label id="nombreAlumnoEdit" class="text-uppercase text-info"></label>
						<div class="form-group">

							<label>Seleccionar Aula:</label>
							<input type="hidden" id="idAlumnoEdit" name="idAlumnoEdit">
							<select class="form-control" name="aulaEdit">

								<option id="aulaAntes"></option>

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

				$eidtarAulaAlumno = new AlumnosControlador();
				$eidtarAulaAlumno -> EditarAulaAlumnoC();

				?>

			</form>

		</div>

	</div>

</div>

<!--===================================
=        MDL EDIT STATUS USER         =
====================================-->
<div class="modal fade btn-delete-alumno" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title text-center"><b>Cambiar estado alumno</b></h4>
			</div>
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						<div class="form-group">

							<input type="hidden" id="idAlumnoStatus" name="idAlumnoStatus">
							<input type="hidden" id="mesesAlumnosE" name="mesesAlumnosE">
							<p class="pregunta text-center"></p>
							<hr>

							<select name="StatusAlumno" id="StatusAlumno" class="form-control">
								<option selected disabled>Selecciona una opción...</option>
								<option value="1">Activado</option>
								<!-- <option value="2">Pendiente</option> -->
								<option value="0">Desactivado</option>
							</select>							
							
						</div>

					</div>

					<div class="modal-footer">
					
						<button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
						<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-check-circle"></i> Aceptar</button>


					</div>

				</div>

				<?php 

				$editarEstado = new AlumnosControlador();
				$editarEstado -> EditarEstadoC();

				?>

			</form>

		</div>

	</div>

</div>

<!--==================================
=            MDL ADD USER            =
===================================-->
<div class="modal fade" rol="dialog" id="crearAlumno">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="box-body">

								<div class="form-group">

									<label>Documento:</label>

									<div class="row">
										
										<div class="col-md-6">
											
											<input type="number" class="form-control" name="dni" id="dniNuevo" required>	

										</div>

									</div>			

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

									<div class="row">
										
										<div class="col-md-6">
											
											<input type="number" class="form-control" name="telefono" required>

										</div>

									</div>			

								</div>
								
								<div class="form-group">

									<label>Apoderado:</label>

									<input type="text" class="form-control" name="apoderado" required>				

								</div>

								<div class="form-group">

									<label>Seleccionar Aula:</label>

									<div class="row">
										
										<div class="col-md-6">
											
											<select class="form-control" name="aula" id="aula">

												<option selected disabled>Seleccionar Aula...</option>

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

								<div class="form-group">

					                <label>Meses:</label>
					                <select class="form-control select2" multiple="multiple" name="meses[]" data-placeholder="Selecciona los meses"
					                        style="width: 100%;">
					                  <option value="enero">Enero</option>
					                  <option value="febrero">Febrero</option>
					                  <option value="marzo">Marzo</option>
					                  <option value="abril">Abril</option>
					                  <option value="mayo">Mayo</option>
					                  <option value="junio">Junio</option>
					                  <option value="julio">Julio</option>
					                  <option value="agosto">Agosto</option>
					                  <option value="setiembre">Setiembre</option>
					                  <option value="octubre">Octubre</option>
					                  <option value="noviembre">Noviembre</option>
					                  <option value="diciembre">Diciembre</option>
					                </select>

					            </div>

								<div class="form-group">

									<div class="row">
										
										<div class="col-md-4 pull-left">
											
											<label>Pensión:</label>

											<input type="number" class="form-control" name="pension" id="pension" required>

										</div>

										<div class="col-md-4 pull-center">
											
											<label>Descuento (%):</label>

											<input type="number" class="form-control" name="descuento" id="descuento">

										</div>

										<div class="col-md-4 pull-right">
											
											<label>Pago final:</label>

											<input type="number" class="form-control" name="pago_final" id="pago_final">

										</div>

									</div>				

								</div>

								<div class="form-group">
              
									<label>Subir imagen:</label>

									<input type="file" class="imagenIng" name="imagenIng">

									<p class="help-block">Peso máximo de la imagen 2MB</p>

									<img src="vistas/img/users/anonymous.png" class="img-thumbnail verImagenAlumno" width="200px">

								</div>

							<!-- </div> -->

						<!-- </div> -->

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary btn-lg">Crear</button>

					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crearAlumno = new AlumnosControlador();
				$crearAlumno -> CrearAlumnoC();

				?>

			</form>

		</div>

	</div>

</div>

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

									<!-- <input type="number" class="form-control" id="dniEA" name="dniEA" required>				 -->
									<div class="row">
										
										<div class="col-md-6">
											
											<input type="number" class="form-control" name="dniEA" id="dniEA" required readonly>	

										</div>

									</div>
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

									<!-- <input type="number" class="form-control" id="telefonoEA" name="telefonoEA" required> -->

									<div class="row">
										
										<div class="col-md-6">
											
											<input type="number" class="form-control" id="telefonoEA" name="telefonoEA" required>

										</div>

									</div>			

								</div>
								
								<div class="form-group">

									<label>Apoderado:</label>

									<input type="text" class="form-control" id="apoderadoEA" name="apoderadoEA" required>
									<input type="hidden" name="EditMes" id="EditMes">			

								</div>

								<div class="form-group MesesE" id="mesesE">

					                <label>Meses:</label>
					                <select class="form-control select2 mounthE" multiple="multiple" name="mesesEdit[]" data-placeholder="Selecciona los meses"
					                        style="width: 100%;">
					                  <option value="enero">Enero</option>
					                  <option value="febrero">Febrero</option>
					                  <option value="marzo">Marzo</option>
					                  <option value="abril">Abril</option>
					                  <option value="mayo">Mayo</option>
					                  <option value="junio">Junio</option>
					                  <option value="julio">Julio</option>
					                  <option value="agosto">Agosto</option>
					                  <option value="setiembre">Setiembre</option>
					                  <option value="octubre">Octubre</option>
					                  <option value="noviembre">Noviembre</option>
					                  <option value="diciembre">Diciembre</option>
					                </select>
					                
					            </div>

								<div class="form-group">

									<div class="row">
										
										<div class="col-md-4 pull-left">
											
											<label>Pensión:</label>

											<input type="number" class="form-control" name="pensionEA" id="pensionEA" required>

										</div>

										<div class="col-md-4 pull-center">
											
											<label>Descuento (%):</label>

											<input type="number" class="form-control" name="descuentoEA" id="descuentoEA">

										</div>

										<div class="col-md-4 pull-right">
											
											<label>Pago final:</label>

											<input type="number" class="form-control" name="pago_finalEA" id="pago_finalEA">

										</div>

									</div>				

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
=          VER INFO ALUMNO           =
===================================-->
<div class="modal fade btn-info-alumno" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
							<h2 class="widget-user-username" id="nombreAlumno"></h2>
							<h4 class="widget-user-desc" id="apellidosAlumno"></h4>
						</div>
						<div class="widget-user-image">
							<img class="img-circle" id="fotoAlumno" src="" alt="User Avatar">
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


