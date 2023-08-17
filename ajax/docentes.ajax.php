<?php 

require_once "../controladores/DocentesControlador.php";
require_once "../modelos/DocentesModelo.php";

/**
 * 
 */
class DocentesAjax 
{

	/*======================================
	=            EDITAR DOCENTE            =
	======================================*/	
	public $idDocente;

	public function editarDocenteAjax(){
		
		$item = "id";
		$valor = $this->idDocente;

		$respuesta = DocentesControlador::VerDocentesC($item, $valor);

		echo json_encode($respuesta);

	}


}

/*======================================
=             EDITAR DOCENTE           =
======================================*/
if (isset($_POST["idDocente"])) {
	
	$Docente = new DocentesAjax();
	$Docente -> idDocente = $_POST["idDocente"];
	$Docente -> editarDocenteAjax();

}

/*======================================
=               VER DOCENTE            =
======================================*/
if (isset($_POST["idDocenteVer"])) {
	
	$verDocente = new DocentesAjax();
	$verDocente -> idDocente = $_POST["idDocenteVer"];
	$verDocente -> editarDocenteAjax();

}