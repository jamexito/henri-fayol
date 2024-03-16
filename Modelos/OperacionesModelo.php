<?php 

require_once 'conexionDB.php';

/**
 * 
 */
class OperacionesModelo extends ConexionDB
{

	static public function MostrarPagosM($tablaBD, $item, $valor)
	{
		if($item != null){

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND estado = 1");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE estado = 1");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}
		

		$pdo -> close();

		$pdo = null;
	}

	static public function MostrarDetallePagosM($tablaBD, $item, $valor)
	{
		if($item != null){

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}		

		$pdo -> close();

		$pdo = null;
	}

	static public function RealizarPagoM($tablaBD, $datos)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD (idpago, idalumno, idusuario) VALUES (:idpago, :idalumno, :idusuario)");

		$pdo->bindParam(":idpago", $datos["idpago"], PDO::PARAM_INT);
		$pdo->bindParam(":idalumno", $datos["idalumno"], PDO::PARAM_INT);
		$pdo->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_INT);

		if($pdo->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$pdo->close();
		
		$pdo = null;

	}

	static public function RegistrarDetallePagoM($tabladetallepago,$datosdetallepago)
	{
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tabladetallepago (idpago,concepto,total,fecha_registro) VALUES (:idpago,:concepto,:total,:fecha_registro)");

		$pdo->bindParam(":idpago", $datosdetallepago["idpago"], PDO::PARAM_INT);
		$pdo->bindParam(":concepto", $datosdetallepago["concepto"], PDO::PARAM_STR);
		$pdo->bindParam(":total", $datosdetallepago["total"], PDO::PARAM_STR);
		$pdo->bindParam(":fecha_registro", $datosdetallepago["fecha_registro"], PDO::PARAM_STR);

		if($pdo->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$pdo->close();
		
		$pdo = null;
	}

	static public function MostrarPagoM($tablaBD, $columna, $valor)
	{
		if($columna != null){

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}
		

		$pdo -> close();

		$pdo = null;
	}

	static public function EditarEstadoPagoC($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET estado = :estado WHERE idpago = :idpago");

		$pdo -> bindParam(":idpago", $datos["idpago"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;
	}

}