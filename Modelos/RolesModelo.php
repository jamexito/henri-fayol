<?php 

require_once 'conexionDB.php';

class RolesModelo extends ConexionDB
{
	static public function VerRolesM($tablaBD, $columna, $valor)
	{

		if ($columna != null) {
			
			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$stmt -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}		

		$stmt -> close();

		$stmt = null;

	}

	

}








?>