<?php 

class SeccionesControlador
{
	
	static public function VerSeccionC($item, $valor)
	{
		
		$tablaBD = "sectores";

		$respuesta = SeccionesModelo::VerSeccionM($tablaBD, $item, $valor);

		return $respuesta;

	}

}