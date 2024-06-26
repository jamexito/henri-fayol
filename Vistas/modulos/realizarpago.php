<?php

	if($_SESSION["rol"] != 5){

		echo '<script>

			window.location = "inicio";

		</script>';

		return;

	}

?>
<section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>

</section>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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