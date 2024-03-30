<section class="content-header">
	
	<h1>Tablas de Pagos</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Tablas de Pagos</li>

    </ol>

</section>

<section class="content">

	<div class="box-header">

		<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3): ?>

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-registrar-pago-lg"> Registrar Pago</button>

			<a class="btn btn-success btn-lg" href="Vistas/includes/excelpagos.php">Descargar Reporte</a>
			
		<?php endif ?>	

	</div>
			
	<table class="table table-bordered table-hover table-striped tablasPagos">
		
		<thead>
			
			<tr>
				
				<th style="width: 10px">Nº</th>
				<th style="width: 300px">Alumno</th>				
				<th style="width: 300px">Descripción</th>	
				<th style="width: 100px">Aula</th>			
				<th style="width: 100px">Monto</th>
				<th style="width: 150px">Fecha</th>	
				<th style="width: 100px">Acciones</th>	

			</tr>

		</thead>

	</table>

	<input type="hidden" value="<?php echo $_SESSION['rol']; ?>" id="darkcode">

</section>

<!--===================================
=           REGISTRAR PAGO            =
====================================-->
<div class="modal fade bs-registrar-pago-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
  	<div class="modal-content">
		<form method="POST" autocomplete="off" id="formRegister">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center">REGISTRAR PAGO</h3>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<!--=====================================
							=            INTRO COD VENTA            =
							======================================-->
							<div class="form-group">
								<label>Código:</label>								
								<?php 

									$itemventa = null;
									$valorventa = null;

									$ventas = OperacionesControlador::MostrarPagosC($itemventa, $valorventa);
									
									// if (!$ventas) {										
									// 	echo '<input type="text" class="form-control" id="pagoN" name="pagoN" value="1001" readonly style="width:200px">';
									// }else{
									// 	foreach ($ventas as $key => $valueventa) {
									// 	}
									// 	$codigo = $valueventa["idpago"] + 1;
									// 	echo '<input type="text" class="form-control" id="pagoN" name="pagoN" value="'.$codigo.'" readonly style="width:200px">';
									// }

								?>

								<?php if (!$ventas): ?>

									<input type="text" class="form-control" id="pagoN" name="pagoN" value="1001" readonly style="width:200px">

								<?php else: ?>
									<?php foreach ($ventas as $key => $valueventa): ?>
										
									<?php endforeach ?>
									<?php $codigo = $valueventa["idpago"] + 1; ?>
									<input type="text" class="form-control" id="pagoN" name="pagoN" value="<?php echo $codigo; ?>" readonly style="width:200px">
								<?php endif ?>

							</div>

							<div class="form-group">
								<label>Alumno:</label>
								<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="idalumno" id="idalumno">
									<option disabled selected>Seleccione una opcion...</option>
									<?php
									
										$itemalumno = null;
										$valoralumno = null;

										$alumnos = AlumnosControlador::VerAlumnosC($itemalumno, $valoralumno);
						
									?> 

									<?php foreach ($alumnos as $key => $value): ?>
										<?php if ($value["estado"] != 0): ?>
											<option value="<?php echo $value["idalumno"]; ?>" data-subtext="<?php echo $value["dni"]; ?>"><?php echo $value["nombres"]; ?> <?php echo $value["apellidos"]; ?></option>	
										<?php endif ?>										
									<?php endforeach ?>         
								</select>				
							</div>

							<div class="form-group">
								<label>Mensualidad :</label>
								<select class="form-control" name="mensualidad" id="mensualidad">
									<option selected disabled>Selecciona un a opción...</option>
								</select>	
							</div>							
						</div>				
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">	
							</div>
							<?php if ($_SESSION["rol"] !== "1"): ?>
								<div class="col-md-4 pull-center">
									<label>Descuento %:</label>
									<input type="number" class="form-control" name="descuento" id="descuento" readonly>			
								</div>	
							<?php else: ?>
								<div class="col-md-4 pull-center">
									<label>Descuento %:</label>
									<input type="number" class="form-control" name="descuento" id="descuento">			
								</div>
							<?php endif ?>
							
							<div class="col-md-4 pull-right">
								<label>Monto S/:</label>
								<input type="number" class="form-control" name="monto" id="monto">		
							</div>				
						</div>
				  </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left btn-lg" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary btn-lg">Guardar Cambios</button>
			</div>
			<?php
				$generarpago = new OperacionesControlador();
				$generarpago -> RealizarPagoC();
			?>
		</form>
	</div>
  </div>
</div>
<!--===================================
=        MDL EDIT STATUS USER         =
====================================-->
<div class="modal fade btn-anular-pago" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title text-center"><b>Anular Comprobante</b></h4>
			</div>
			
			<form method="POST" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						<div class="form-group">

							<input type="hidden" id="idPagoComp" name="idPagoComp">
							<input type="hidden" id="StatusComp" name="StatusComp">
							<p class="text-center" id="anularComprobanteText"></p>
							
						</div>

					</div>

					<div class="modal-footer">
					
						<button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
						<button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-check-circle"></i> Aceptar</button>


					</div>

				</div>

				<?php 

				$editarEstado = new OperacionesControlador();
				$editarEstado -> EditarEstadoPagoC();

				?>

			</form>

		</div>

	</div>

</div>