<?php 

require_once "../controladores/OperacionesControlador.php";
require_once "../modelos/OperacionesModelo.php";


/**
 * 
 */
class OperacionesAjax
{

	/*===============================================
	=            CAPTURAR DATOS DE LOTES            =
	===============================================*/
	public $idComprobante;

	public function MostrarComprobanteAjax(){
		
		$columna = "idpago";
		$valor = $this->idComprobante;

		$respuesta = OperacionesControlador::MostrarPagosC($columna, $valor);

		echo json_encode($respuesta);

	}	

}
/*===============================================
=            CAPTURAR DATOS DE LOTES            =
===============================================*/
if (isset($_POST["idComprobante"])) {
	
	$comprobante = new OperacionesAjax();
	$comprobante -> idComprobante = $_POST["idComprobante"];
	$comprobante -> MostrarComprobanteAjax();

}

