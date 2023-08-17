<?php 

require_once "../controladores/UsuariosControlador.php";
require_once "../modelos/UsuariosModelo.php";

/**
 * 
 */
class UsuariosAjax 
{

	/*======================================
	=            EDITAR CLIENTE            =
	======================================*/	
	public $idUsuario;

	public function editarUsuarioAjax(){
		
		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = UsuariosControlador::VerUsuariosC($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ActivarUsuarioAjax(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = UsuariosModelo::ActualizarUsuarioM($tabla, $item1, $valor1, $item2, $valor2);

	}


}

/*======================================
=            EDITAR CLIENTE            =
======================================*/
if (isset($_POST["idUsuario"])) {
	
	$Usuario = new UsuariosAjax();
	$Usuario -> idUsuario = $_POST["idUsuario"];
	$Usuario -> editarUsuarioAjax();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new UsuariosAjax();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ActivarUsuarioAjax();

}