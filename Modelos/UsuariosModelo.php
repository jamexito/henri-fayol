<?php 

require_once "conexionDB.php";

/**
 * UsuariosModelo::VerUsuariosM($tablaBD)
 */
class UsuariosModelo extends ConexionDB
{

	/*=============================================
	VER USUARIOS
	=============================================*/
	public static function VerUsuariosM($tablaBD, $item, $valor)
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
	CREAR USUARIO
	=============================================*/
	static public function CrearUsuarioM($tablaBD, $datos)
	{

		$pdo = ConexionDB::conectarDB()->prepare("INSERT INTO $tablaBD(apellidos, nombres, dni, direccion, telefono, rol, foto, usuario, clave, fecha_registro) VALUES (:apellidos, :nombres, :dni, :direccion, :telefono, :rol, :foto, :usuario, :clave, :fecha_registro)");

		$pdo->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$pdo->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$pdo->bindParam(":rol", $datos["rol"], PDO::PARAM_INT);
		$pdo->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$pdo->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$pdo->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
		$pdo->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

		if($pdo->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$pdo->close();
		
		$pdo = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/
	static public function EditarUsuarioM($tablaBD, $datos)
	{
		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablaBD SET apellidos = :apellidos, nombres = :nombres, dni = :dni, direccion = :direccion, telefono = :telefono, rol = :rol, foto = :foto, clave = :clave WHERE usuario = :usuario");

		$pdo -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$pdo -> bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datos["rol"], PDO::PARAM_INT);
		$pdo -> bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($pdo -> execute())
		{
			return "ok";
		}else{
			return "error";	
		}

		$pdo -> close();

		$pdo = null;
	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function ActualizarUsuarioM($tabla, $item1, $valor1, $item2, $valor2){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$pdo -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$pdo -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;

	}

	/*=============================================
	ACTUALIZAR LOGUEO
	=============================================*/

	static public function ActualizarLogueo($tablauser,$datosuser){

		$pdo = ConexionDB::conectarDB()->prepare("UPDATE $tablauser SET ultimo_logueo = :ultimo_logueo WHERE id = :id");

		$pdo->bindParam(":ultimo_logueo", $datosuser["ultimo_logueo"], PDO::PARAM_STR);
		$pdo->bindParam(":id", $datosuser["id"], PDO::PARAM_INT);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/
	/*static public function BorrarUsuarioM($tablaBD, $datos){

		$pdo = ConexionDB::conectarDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($pdo -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$pdo -> close();

		$pdo = null;

	}*/

}