<?php 

require_once 'conexionDB.php';

class SeccionesModelo extends ConexionDB
{
	
	static public function VerSeccionM($tablaBD, $item, $valor)
	{
		
		if ($item != null) {
			
			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}
		

		$pdo -> close();

		$pdo = null;

	}

}






