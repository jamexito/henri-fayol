<?php 

class OperacionesControlador
{

	static public function MostrarPagosC($item, $valor)
	{
		$tablaBD = "pago";

		$resultado = OperacionesModelo::MostrarPagosM($tablaBD, $item, $valor);

		return $resultado;
	}

	static public function MostrarDetallePagosC($item, $valor)
	{
		$tablaBD = "detalle_pago";

		$resultado = OperacionesModelo::MostrarDetallePagosM($tablaBD, $item, $valor);

		return $resultado;
	}

	public function RealizarPagoC()
	{

		if (isset($_POST["pagoN"]) && isset($_POST["idalumno"]) && isset($_POST["idalumno"])) 
		{
			// var_dump($_POST['mensualidad']);die();
			$item_alumno = "idalumno";
			$valor_alumno = $_POST["idalumno"];

			$alumno_l = AlumnosControlador::MostrarAlumnoC($item_alumno,$valor_alumno);

			$meses_contar = json_decode($alumno_l["meses"],true);
			$meses = json_decode($alumno_l["meses"],true);
			$num = intval($_POST['mensualidad']);

			$descripcion = '';
			
			foreach ($meses_contar as $key => $value) {
				switch ($key) {
					case $num:
						$descripcion = 'Mensualidad '.$meses_contar[$num];
						break;
				}
			}

			$int = $num + 1;
			$lista_nueva = array_splice($meses, $int);
			$estado = 1;

			if (empty($lista_nueva)) {
				$list_mes = null;
				$estado = 0;
			}else {
				$list_mes = json_encode($lista_nueva);				
			}

		    $tabla_alumnos = "alumnos";
		    // $itemalu = "meses";
		    // $valoralu = $list_mes;
		    
		    $datos_alumnos = array(
		    	"idalumno" => $valor_alumno,
		    	"estado"   => $estado,
		    	"meses"    => $list_mes,
		    );

		    // $alumno_actual = AlumnosModelo::ActualizarAlumnoM($tabla_alumnos,$itemalu,$valoralu,$valor_alumno);	
		    $alumno_actual = AlumnosModelo::EditarEstadoM($tabla_alumnos, $datos_alumnos);		
			
		    if ($alumno_actual === "ok") {

		    	$tabladetallepago = "detalle_pago";

				date_default_timezone_set('America/Lima');
	        	$fecha_registro = date("d-m-Y h:i:s");

				$datosdetallepago = array(
									  "idpago"   		=> $_POST["pagoN"],
									  "concepto" 		=> $descripcion,							
									  "total"    		=> $_POST["monto"],			
									  "fecha_registro"  => $fecha_registro				
									);
				$resultado_detalle = OperacionesModelo::RegistrarDetallePagoM($tabladetallepago,$datosdetallepago);						  
				
				if ($resultado_detalle == "ok") 
				{			
					$tablaBD = "pago";

					$datos = array(
								"idpago" => $_POST["pagoN"],
								"idalumno" => $_POST["idalumno"],
								"idusuario" => $_SESSION["id"]
							 );

					$resultado = OperacionesModelo::RealizarPagoM($tablaBD, $datos);

					if ($resultado == "ok") {
						
						echo '<script>

							window.location = "pagos";

						</script>';

					}
					
				}
		    }
					

		}
	}

	public function EditarEstadoPagoC()
	{

		if(isset($_POST["idPagoComp"])){
				
			$tablaBD = "pago";

			$datos = array("idpago" => $_POST["idPagoComp"],
						   "estado" => $_POST["StatusComp"]
						);

			$respuesta = OperacionesModelo::EditarEstadoPagoC($tablaBD, $datos);

			if($respuesta == "ok"){

				echo'<script>

						window.location = "pagos";

					</script>';

			}else{

				echo '<script>

						window.location = "inicio";

					</script>';

			}

		}

	}

}