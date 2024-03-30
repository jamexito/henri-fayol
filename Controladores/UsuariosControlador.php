<?php 

/**
 * UsuariosControlador
 * VerUsuariosC()
 * CrearUsuarioC()
 */
class UsuariosControlador
{	
	/*========================================
	=            INGRESAR USUARIO            =
	========================================*/	
	public function IngresarControlador()
	{
		if (isset($_POST["usuario-Ing"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave-Ing"])) 
			{

				$encriptar = crypt($_POST["clave-Ing"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tablaDB = "usuarios";

				$item = "usuario";				
				$valor = $_POST["usuario-Ing"];
				// $datosC = array("usuario"=>$_POST["usuario-Ing"],"clave"=>$encriptar);

				$resultado = UsuariosModelo::VerUsuariosM($tablaDB, $item, $valor);

				if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $encriptar &&  $resultado["estado"] == 1) {
					
					$tablauser = "usuarios";

					date_default_timezone_set('America/Lima');
        			$fecha_registro = date("d-m-Y h:i:s");

					$datosuser = array(
									"id"            => $resultado["id"],
									"ultimo_logueo" => $fecha_registro
								);

					$registrarlogueo = UsuariosModelo::ActualizarLogueo($tablauser,$datosuser);

					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["nombres"] = $resultado["nombres"];
					$_SESSION["apellidos"] = $resultado["apellidos"];
					$_SESSION["dni"] = $resultado["dni"];
					$_SESSION["direccion"] = $resultado["direccion"];
					$_SESSION["telefono"] = $resultado["telefono"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];
					$_SESSION["aula"] = $resultado["aula"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["estado"] = $resultado["estado"];

					echo '<script>

					     window.location = "inicio";

					</script>';

				}else{

					echo '<br><div class="alert alert-danger">Error al Ingresar</div>';

				}

			}

		}

	}

	/*====================================
	=            VER USUARIOS            =
	====================================*/	
	static public function VerUsuariosC($item, $valor)
	{
		
		$tablaBD = "usuarios";

		$resultado = UsuariosModelo::VerUsuariosM($tablaBD, $item, $valor);

		return $resultado;

	}

	/*=====================================
	=            CREAR USUARIO            =
	=====================================*/	
	public function CrearUsuarioC()
	{
		
		if(isset($_POST["usuario"]) && $_SESSION["rol"]==1){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"]))
			{
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["ImgUser"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["ImgUser"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/users/".$_POST["dni"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["ImgUser"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/users/".$_POST["dni"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["ImgUser"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["ImgUser"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/users/".$_POST["dni"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["ImgUser"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tablaBD = "usuarios";

				$encriptar = crypt($_POST["clave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				date_default_timezone_set('America/Lima');

        		$fecha_actual = date("d-m-Y h:i:s");

				$datos = array("apellidos" => $_POST["apellidos"],
					           "nombres" => $_POST["nombres"],
					           "dni" => $_POST["dni"],
					           "direccion" => $_POST["direccion"],
					           "telefono" => $_POST["telefono"],
					           "rol" => $_POST["rol"],
					           "usuario" => $_POST["usuario"],
					           "foto" => $ruta,
					           "clave" => $encriptar,
					           "fecha_registro" => $fecha_actual
							);

				$respuesta = UsuariosModelo::CrearUsuarioM($tablaBD, $datos);

				if ($respuesta=="ok") {
					
					echo '<script>

						window.location = "usuarios";

					</script>';

				}else{
					echo "error";
				}

			}

		}

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/
	public function EditarUsuarioC(){

		if(isset($_POST["usuarioE"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombresE"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenAnterior"];

				if(isset($_FILES["ImgUserE"]["tmp_name"]) && !empty($_FILES["ImgUserE"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["ImgUserE"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/users/".$_POST["dniE"];

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

					if($_FILES["ImgUserE"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/users/".$_POST["dniE"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["ImgUserE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["ImgUserE"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/users/".$_POST["dniE"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["ImgUserE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tablaBD = "usuarios";

				if($_POST["claveE"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["claveE"])){

						$encriptar = crypt($_POST["claveE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo '<br><div class="alert alert-danger">¡La contraseña no puede llevar caracteres especiales!</div>';

					}

				}else{

					$encriptar = $_POST["claveActual"];

				}

				$datos = array("apellidos"  => $_POST["apellidosE"],
							   "nombres"    => $_POST["nombresE"],
							   "dni"        => $_POST["dniE"],
							   "direccion"  => $_POST["direccionE"],
							   "telefono"   => $_POST["telefonoE"],
							   "rol"        => $_POST["rolE"],
							   "usuario"    => $_POST["usuarioE"],
							   "foto"       => $ruta,
							   "clave"      => $encriptar
							);

				$respuesta = UsuariosModelo::EditarUsuarioM($tablaBD, $datos);

				if($respuesta == "ok"){

					echo'<script>

						window.location = "usuarios";

					</script>';

				}else{
					echo '0<br><div class="alert alert-danger">¡La contraseña no puede llevar caracteres especiales!</div>';
				}


			}else{

				echo '<br><div class="alert alert-danger">¡La contraseña no puede llevar caracteres especiales!</div>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/
	/*public function BorrarUsuarioC(){

		if(isset($_GET["idUsuario"])){

			$tablaBD ="usuarios";

			$datos = $_GET["idUsuario"];

			echo $datos;

			$respuesta = UsuariosModelo::BorrarUsuarioM($tablaBD, $datos);

			if($respuesta == "ok"){

				echo'<script>

							window.location = "usuarios";

				</script>';

			}

		}

	}*/

}