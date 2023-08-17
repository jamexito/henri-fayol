<?php 

require_once 'conexionDB.php';

class DocentesModelo extends ConexionDB
{

	/*=============================================
	VER Docentes
	=============================================*/
	public static function VerDocentesM($tablaBD,$item, $valor)
	{

		if ($item != null) {
			
			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

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

	/*=============================================
	CREAR Docente
	=============================================*/
	static public function CrearDocenteM($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(dni, apellidos, nombres, direccion, telefono, email, foto) VALUES (:dni, :apellidos, :nombres, :direccion, :telefono, :email, :foto)");

		$pdo->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$pdo->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$pdo->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$pdo->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($pdo->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$pdo->close();
		
		$pdo = null;

	}

	/*=============================================
	EDITAR Docente
	=============================================*/
	static public function EditarDocenteM($tablaBD, $datos){
	
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET dni = :dni, apellidos = :apellidos, nombres = :nombres, direccion = :direccion, telefono = :telefono, email = :email, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$pdo -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;

	}

	static public function EditarAulaDocenteM($tablaBD, $datos)
	{//var_dump($datos);exit();
		
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET aula_asignada = :aula_asignada WHERE id = :id");

		$pdo -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":aula_asignada", $datos["aula_asignada"], PDO::PARAM_INT);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;
	}

}




