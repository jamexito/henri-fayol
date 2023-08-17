<?php 

class DocentesControlador
{

	/*======================================
	=            VER Docentes            =
	======================================*/	
	static public function VerDocentesC($item, $valor)
	{
		// var_dump($valor);
		$tablaBD = "docentes";
		
		$resultado = DocentesModelo::VerDocentesM($tablaBD, $item, $valor);

		return $resultado;

	}

	/*======================================
	=            CREAR Docente            =
	======================================*/
	public function CrearDocenteC()
	{
		
		if(isset($_POST["dni"]) && $_SESSION["rol"] == 1){

			// if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
			//    preg_match('/^[a-zA-Z0-9]+$/', $_POST["apellidos"]) &&
			//    preg_match('/^[0-9]+$/', $_POST["dni"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["imagenIn"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["imagenIn"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/docentes/".$_POST["dni"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["imagenIn"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/docentes/".$_POST["dni"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagenIn"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["imagenIn"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/docentes/".$_POST["dni"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["imagenIn"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tablaBD = "docentes";

				$datos = array("dni"       => $_POST["dni"],
							   "apellidos" => $_POST["apellidos"],
					           "nombres"   => $_POST["nombres"],
					           "direccion" => $_POST["direccion"],
					           "telefono"  => $_POST["telefono"],
					           "email"     => $_POST["email"],
					           "foto"      => $ruta
							);
							
				$respuesta = DocentesModelo::CrearDocenteM($tablaBD, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

							window.location = "docentes";

						</script>';

				}

			// }

		}

	}

	/*=============================================
	EDITAR Docente
	=============================================*/
	public function EditarDocenteC(){

		if(isset($_POST["idDocente"])){

			// if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombresE"]) &&
			//    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidosE"]) &&
			//    preg_match('/^[0-9]+$/', $_POST["dniE"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenAnterior"];

				if(isset($_FILES["imagenDocente"]["tmp_name"]) && !empty($_FILES["imagenDocente"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["imagenDocente"]["tmp_name"]);

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/docentes/".$_POST["dniDocente"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenAnterior"])){

						unlink($_POST["imagenAnterior"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["imagenDocente"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/docentes/".$_POST["dniDocente"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagenDocente"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["imagenDocente"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/docentes/".$_POST["dniDocente"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["imagenDocente"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tablaBD = "docentes";

				$datos = array("id"         => $_POST["idDocente"],
							   "dni"        => $_POST["dniDocente"],
							   "apellidos"  => $_POST["apellidosDocente"],
							   "nombres"    => $_POST["nombresDocente"],
							   "direccion"  => $_POST["direccionDocente"],
							   "telefono"   => $_POST["telefonoDocente"],
							   "email"      => $_POST["emailDocente"],
							   "foto"       => $ruta
							);

				$respuesta = DocentesModelo::EditarDocenteM($tablaBD, $datos);

				if($respuesta == "ok"){

					echo'<script>

						window.location = "docentes";

					</script>';

				}


			// }

		}

	}

	/*=============================================
	ASIGNAR O HABILITAR AULA
	=============================================*/
	public function EditarAulaDocenteC(){

		if(isset($_POST["idDocenteEdit"])){
				
			$tablaBD = "docentes";

			$datos = array("id"              => $_POST["idDocenteEdit"],
						   "aula_asignada"   => $_POST["aulaDocenteEdit"]
						);

			$respuesta = DocentesModelo::EditarAulaDocenteM($tablaBD, $datos);

			if($respuesta == "ok"){

				echo'<script>

						window.location = "docentes";

					</script>';

			}else{

				echo '<script>

						window.location = "inicio";

					</script>';

			}

		}

	}

}



