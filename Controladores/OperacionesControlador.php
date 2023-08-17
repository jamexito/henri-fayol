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
			$tabladetallepago = "detalle_pago";

			date_default_timezone_set('America/Lima');
        	$fecha_registro = date("d-m-Y h:i:s");

			$datosdetallepago = array("idpago"   		=> $_POST["pagoN"],
									  "concepto" 		=> $_POST["concepto"],							
									  "total"    		=> $_POST["monto"],			
									  "fecha_registro"  => $fecha_registro				
									  );
			$resultado_detalle = OperacionesModelo::RegistrarDetallePagoM($tabladetallepago,$datosdetallepago);						  
			
			if ($resultado_detalle == "ok") 
			{			
				$tablaBD = "pago";

				$datos=array("idpago" => $_POST["pagoN"],
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