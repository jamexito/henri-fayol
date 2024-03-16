<?php 

require_once "../Controladores/OperacionesControlador.php";
require_once "../Modelos/OperacionesModelo.php";

require_once "../Controladores/AlumnosControlador.php";
require_once "../Modelos/AlumnosModelo.php";

require_once "../Controladores/SeccionesControlador.php";
require_once "../Modelos/SeccionesModelo.php";

class TablaPagos
{
	/*===================================================================
	=            MOSTRAR LA TABLA PRODUCTOS DE MODO DINAMICO            =
	===================================================================*/	
	public function mostrarTablaPagos(){

		$item = null;
	    $valor = null;

	    $pagos = OperacionesControlador::MostrarPagosC($item, $valor);		
		// var_dump($pagos);exit();
	    $datosJson = '{

			  "data": [';

			  	for ($i=0; $i < count($pagos); $i++) {	  		

			  		$item2 = "idpago";
			  		$valor2 = $pagos[$i]["idpago"];

			  		$detalle_pago = OperacionesControlador::MostrarDetallePagosC($item2, $valor2);

			  		$fecha_pago = date("d-m-Y", strtotime($detalle_pago["fecha_registro"]))." ".date("H:i",strtotime($detalle_pago["fecha_registro"]));

			  		//"'.$detalle_pago["fecha_registro"].'",

                    $item3 = "idalumno";
                    $valor3 = $pagos[$i]["idalumno"];

                    $alumnos = AlumnosControlador::VerAlumnosC($item3,$valor3);

                    $item4 = "id";
                    $valor4 = $alumnos[0]["aula_asignada"];

                    $aula = SeccionesControlador::VerSeccionC($item4,$valor4);

                    $botones = "";

			  		/*============================================
			  		=            TRAEMOS LAS ACCIONES            =
			  		============================================*/
			  		if (isset($_GET["darkcode"]) && $_GET["darkcode"] === "1"){

                        $botones = "<button class='btn btn-success btnImprimirComprobante' codigoPago='".$pagos[$i]["idpago"]."' idAlumno='".$alumnos[0]['idalumno']."' idUser='".$pagos[$i]['idusuario']."' title='Descargar PDF'><i class='fa fa-file-pdf'></i></button><button class='btn btn-danger anularComprobante' style='margin-left: 5px' idComprobante='".$pagos[$i]["idpago"]."' title='Anular comprobante' data-toggle='modal' data-target='.btn-anular-pago'><i class='fa fa-trash'></i></button>";

			  		}else{

                        $botones = "<button class='btn btn-success btnImprimirComprobante center-block' codigoPago='".$pagos[$i]["idpago"]."' idAlumno='".$alumnos[0]['idalumno']."' idUser='".$pagos[$i]['idusuario']."' title='Descargar PDF'><i class='fa fa-file-pdf'></i></button>";

			  		}
			  		
	  		     $datosJson .= '[
							      "'.($i+1).'",
							      "'.$alumnos[0]["nombres"].' '.$alumnos[0]["apellidos"].'",
							      "'.$detalle_pago["concepto"].'",
							      "'.$aula[0]["nombres"].'",
							      "S/.'.$detalle_pago["total"].'",
							      "'.$fecha_pago.'",
							      "'.$botones.'"
							    ],';

			  	}

			$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

			}';

		echo $datosJson;

	}

}

/*=====================================================
=            ACTIVAR LA TABLA DE PRODUCTOS            =
=====================================================*/
$activarPagos = new TablaPagos();
$activarPagos -> mostrarTablaPagos();
