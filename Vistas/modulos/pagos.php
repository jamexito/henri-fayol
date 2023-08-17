<section class="content-header">
	
	<h1>Tablas de Pagos</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Tablas de Pagos</li>

    </ol>

</section>

<section class="content">

	<?php 

		if ($_SESSION['rol'] == 1) {
			echo '<div class="box-header">

					<button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-registrar-pago-lg"> Registrar Pago</button>

				</div>';
		}

	?>
			
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

	<input type="hidden" value="<?php echo $_SESSION['rol']; ?>" id="perfilOculto">

</section>

<!--===================================
=           REGISTRAR PAGO            =
====================================-->
<div class="modal fade bs-registrar-pago-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
  	<div class="modal-content">
		<form method="POST" autocomplete="off">
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
									
									if (!$ventas) {
										
										echo '<input type="text" class="form-control" id="pagoN" name="pagoN" value="1001" readonly style="width:200px">';

									}else{

										foreach ($ventas as $key => $valueventa) {

										}

										$codigo = $valueventa["idpago"] + 1;

										echo '<input type="text" class="form-control" id="pagoN" name="pagoN" value="'.$codigo.'" readonly style="width:200px">';

									}

								?>

							</div>

							<div class="form-group">
								<label>Alumno:</label>
								<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="idalumno">
									<option disabled selected>Seleccione una opcion...</option>
									<?php
										$itemalumno = null;
										$valoralumno = null;

										$alumnos = AlumnosControlador::VerAlumnosC($itemalumno, $valoralumno);
										foreach ($alumnos as $key => $value) 
										{
											echo '<option value="'.$value["idalumno"].'" data-subtext="'.$value["dni"].'">'.$value["nombres"].' '.$value["apellidos"].'</option>';
										}
									?>          
								</select>				
							</div>

							<div class="form-group">
								<label>Concepto:</label>
								<textarea class="form-control" rows="3" placeholder="Ingrese un concepto ..." style="height: 92px;" name="concepto"></textarea>
							</div>							
						</div>				
					</div>
					<div class="row">
						<div class="col-md-4 pull-right">
							<div class="form-group">
								<label>Monto:</label>
								S/ <input type="number" class="form-control" name="monto" id="monto">
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