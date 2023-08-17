<?php 

require_once "../controladores/AlumnosControlador.php";
require_once "../modelos/AlumnosModelo.php";

require_once "../controladores/SeccionesControlador.php";
require_once "../modelos/SeccionesModelo.php";

/**
 * 
 */
class AlumnosAjax 
{

	/*======================================
	=             EDITAR ALUMNO            =
	======================================*/	
	public $idAlumno;

	public function editarAlumnoAjax(){
		
		$item = "idalumno";
		$valor = $this->idAlumno;

		$respuesta = AlumnosControlador::VerAlumnosC($item, $valor);

		echo json_encode($respuesta);

	}

	/*==================================
	=             VER AULAS            =
	==================================*/	
	public $idAula;

	public function verAulaAjax(){
		
		$item = "id";
		$valor = $this->idAula;

		$respuesta = SeccionesControlador::VerSeccionC($item, $valor);

		echo json_encode($respuesta);

	}
	/*=============================================
	VALIDAR NO REPETIR ALUMNO
	=============================================*/	

	public $validarAlumno;

	public function ajaxValidarAlumno(){

		$item = "dni";
		$valor = $this->validarAlumno;

		$respuesta = AlumnosControlador::VerAlumnosC($item, $valor);

		echo json_encode($respuesta);

	}

}

/*======================================
=             EDITAR ALUMNOS           =
======================================*/
if (isset($_POST["idAlumno"])) {
	$Alumno = new AlumnosAjax();
	$Alumno -> idAlumno = $_POST["idAlumno"];
	$Alumno -> editarAlumnoAjax();
}

/*======================================
=             VER ALUMNO               =
======================================*/
if (isset($_POST["idAlumnoVer"])) {
	$verAlumno = new AlumnosAjax();
	$verAlumno -> idAlumno = $_POST["idAlumnoVer"];
	$verAlumno -> editarAlumnoAjax();
}

/*======================================
=             VER ALUMNO               =
======================================*/
if (isset($_POST["idAlumnoAula"])) {
	$verAlumnoAula = new AlumnosAjax();
	$verAlumnoAula -> idAlumno = $_POST["idAlumnoAula"];
	$verAlumnoAula -> editarAlumnoAjax();
}

/*======================================
=              VER AULA                =
======================================*/
if (isset($_POST["idAula"])) {
	$verAula = new AlumnosAjax();
	$verAula -> idAula = $_POST["idAula"];
	$verAula -> verAulaAjax();
}
/*=============================================
VALIDAR NO REPETIR ALUMNO
=============================================*/

if(isset( $_POST["validarAlumno"])){

	$valAlumno = new AlumnosAjax();
	$valAlumno -> validarAlumno = $_POST["validarAlumno"];
	$valAlumno -> ajaxValidarAlumno();

}