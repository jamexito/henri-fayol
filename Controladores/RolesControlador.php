<?php 

class RolesControlador
{
	static public function VerRolesC($columna, $valor)
	{
		
		$tablaBD = "rol";

		$resultado = RolesModelo::VerRolesM($tablaBD, $columna, $valor);

		return $resultado;

	}

}




?>