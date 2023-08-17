<?php 

require_once 'conexionDB.php';

class AlumnosModelo extends ConexionDB
{

	/*=============================================
	VER Alumnos
	=============================================*/
	public static function VerAlumnosM($tablaBD,$item, $valor)
	{
        // var_dump($item);exit();
		if ($item != null) {
			
			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND estado <> 0");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tablaBD WHERE estado <> 0");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR Alumno
	=============================================*/
	static public function CrearAlumnoM($tablaBD, $datos)
	{
		
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(dni, apellidos, nombres, direccion, telefono, apoderado, aula_asignada, foto, fecha_registro, usuario_registro) VALUES (:dni, :apellidos, :nombres, :direccion, :telefono, :apoderado, :aula_asignada, :foto, :fecha_registro, :usuario_registro)");

		$pdo->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$pdo->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$pdo->bindParam(":apoderado", $datos["apoderado"], PDO::PARAM_STR);
		$pdo->bindParam(":aula_asignada", $datos["aula_asignada"], PDO::PARAM_INT);
		$pdo->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$pdo->bindParam(":usuario_registro", $datos["usuario_registro"], PDO::PARAM_STR);
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
	EDITAR Alumno
	=============================================*/
	static public function EditarAlumnoM($tablaBD, $datos){
	
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET dni = :dni, apellidos = :apellidos, nombres = :nombres, direccion = :direccion, telefono = :telefono, apoderado = :apoderado, foto = :foto WHERE idalumno = :idalumno");

		$pdo -> bindParam(":idalumno", $datos["idalumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$pdo -> bindParam(":apoderado", $datos["apoderado"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;

	}

	/*=============================================
	EDITAR Aula Alumno
	=============================================*/
	static public function EditarAulaAlumnoM($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET aula_asignada = :aula_asignada WHERE idalumno = :idalumno");

		$pdo -> bindParam(":idalumno", $datos["idalumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":aula_asignada", $datos["aula_asignada"], PDO::PARAM_INT);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;
	}

	/*=============================================
	EDITAR ESTADO DEL ALUMNO
	=============================================*/
	static public function EditarEstadoM($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET estado = :estado WHERE idalumno = :idalumno");

		$pdo -> bindParam(":idalumno", $datos["idalumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;
	}

	static public function SubirArchivoM($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(dir_archivo, descripcion, user_subir, alumno_doc, fecha_subida) VALUES (:dir_archivo, :descripcion, :user_subir, :alumno_doc, :fecha_subida)");

		$pdo->bindParam(":dir_archivo", $datos["dir_archivo"], PDO::PARAM_STR);
		$pdo->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$pdo->bindParam(":user_subir", $datos["user_subir"], PDO::PARAM_INT);
		$pdo->bindParam(":alumno_doc", $datos["alumno_doc"], PDO::PARAM_INT);
		$pdo->bindParam(":fecha_subida", $datos["fecha_subida"], PDO::PARAM_STR);

		if($pdo->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$pdo->close();
		
		$pdo = null;
	}

	static public function MostrarArchivosM($tabla,$item,$valor)
	{
		if ($item != null) {
			
			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = ConexionDB::conectarDB()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;
	}

}




