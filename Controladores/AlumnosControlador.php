<?php 

error_reporting(0);

class AlumnosControlador
{

	/*======================================
	=            VER Alumnos            =
	======================================*/	
	static public function VerAlumnosC($item, $valor)
	{
		
		$tablaBD = "alumnos";

		$resultado = AlumnosModelo::VerAlumnosM($tablaBD, $item, $valor);

		return $resultado;

	}

	/*======================================
	=              VER ALUMNO              =
	======================================*/	
	static public function MostrarAlumnoC($item, $valor)
	{
		
		$tablaBD = "alumnos";

		$resultado = AlumnosModelo::MostrarAlumnoM($tablaBD, $item, $valor);

		return $resultado;

	}

	/*======================================
	=            CREAR Alumno            =
	======================================*/
	public function CrearAlumnoC()
	{				
		if(isset($_POST["dni"]) && $_SESSION["rol"] == 1){

			// $meses = array();
			$meses = '';
			// var_dump($_POST['meses']);die();
			foreach ($_POST['meses'] as $mes) 
			{
				$meses .= $mes.',';				
			}			
			$arr_mes = explode(",", substr($meses, 0, -1));
			// var_dump($arr_mes);die();
			// var_dump(json_encode($arr_mes));die();
			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = "";

			if(isset($_FILES["imagenIng"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["imagenIng"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "Vistas/img/alumnos/".$_POST["dni"];

				mkdir($directorio, 0755);

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["imagenIng"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "Vistas/img/alumnos/".$_POST["dni"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["imagenIng"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["imagenIng"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "Vistas/img/alumnos/".$_POST["dni"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["imagenIng"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			$pension = number_format($_POST["pension"]);

			$descuento = number_format($_POST["descuento"]);

			$pension_final = number_format($_POST["pago_final"]);

			date_default_timezone_set('America/Lima');

    		$fecha_actual = date("d-m-Y h:i:s");

			$tablaBD = "alumnos";

			$datos = array(
						   "dni"       		  => $_POST["dni"],
						   "apellidos" 		  => $_POST["apellidos"],
				           "nombres"   		  => $_POST["nombres"],
				           "direccion" 		  => $_POST["direccion"],
				           "telefono"  		  => $_POST["telefono"],
				           "apoderado" 		  => $_POST["apoderado"],
				           "aula_asignada"    => $_POST["aula"],
				           "meses"            => json_encode($arr_mes),
				           "pension"    	  => $pension,
				           "descuento"    	  => $descuento,
				           "pension_final"    => $pension_final,
				           "fecha_registro"   => $fecha_actual,
				           "usuario_registro" => $_SESSION["usuario"],
				           "foto"             => $ruta
						);

			$respuesta = AlumnosModelo::CrearAlumnoM($tablaBD, $datos);

			if ($respuesta == "ok") {
				
				echo '<script>

						window.location = "alumnos";

					</script>';

			}else{

				echo '<script>

						window.location = "inicio";

					</script>';

			}

		}

	}

	/*=============================================
	EDITAR Alumno
	=============================================*/
	public function EditarAlumnoC(){

		if(isset($_POST["idAlumnoEA"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombresEA"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidosEA"]) /*&&
			   preg_match('/^[0-9]+$/', $_POST["dniEA"])*/){

				// if (!empty($_POST["aulaN"])) {
				// 	$aula = $_POST["aulaN"];
				// }else{
				// 	$aula = $_POST["aulaEA"];
				// }

				if (!empty($_POST["EditMes"])) {
					$arr_mes = explode(",", $_POST['EditMes']);					
				}else{
					$meses = '';
					foreach ($_POST['mesesEdit'] as $mes) 
					{
						$meses .= $mes.',';				
					}			
					$arr_mes = explode(",", substr($meses, 0, -1));

					$tablaEst = "alumnos";
					$datosEst = array(
						"estado" => 1,
						"meses" => json_encode($arr_mes),
						"idalumno" => $_POST["idAlumnoEA"]
					);

					$resultEstado = AlumnosModelo::EditarEstadoM($tablaEst,$datosEst);
				}
				// var_dump($arr_mes);die();
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenAnterior"];

				if(isset($_FILES["imagenAlumno"]["tmp_name"]) && !empty($_FILES["imagenAlumno"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["imagenAlumno"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/alumnos/".$_POST["dniEA"];

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

					if($_FILES["imagenAlumno"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/alumnos/".$_POST["dniEA"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagenAlumno"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["imagenAlumno"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/alumnos/".$_POST["dniEA"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["imagenAlumno"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$pensionEA = number_format($_POST["pensionEA"]);

				$descuentoEA = number_format($_POST["descuentoEA"]);

				$monto_descEA = $descuentoEA / 100;

				$pension_finalEA = number_format($_POST["pension_finalEA"]);

				if (!empty($descuentoEA)) 
				{
					
					$pension_finalEA = $pensionEA - ($pensionEA * $monto_descEA);

				}else{

					$pensionEA = number_format($_POST["pensionEA"]);

					$descuentoEA = number_format(0.00);

					$pension_finalEA = number_format($_POST["pensionEA"]);

				}
				
				$tablaBD = "alumnos";

				$datos = array("idalumno"       => $_POST["idAlumnoEA"],
							   // "dni"        	=> $_POST["dniEA"],
							   "apellidos"  	=> $_POST["apellidosEA"],
							   "nombres"    	=> $_POST["nombresEA"],
							   "direccion"  	=> $_POST["direccionEA"],
							   "telefono"   	=> $_POST["telefonoEA"],
							   "apoderado"  	=> $_POST["apoderadoEA"],
							   "pension"        => $pensionEA,
							   "meses"          => json_encode($arr_mes),
							   "descuento"      => $descuentoEA,
							   "pension_final"  => $pension_finalEA,
							   "foto"           => $ruta
							);

				$respuesta = AlumnosModelo::EditarAlumnoM($tablaBD, $datos);

				if($respuesta == "ok"){

					echo'<script>

							window.location = "alumnos";

						</script>';

				}else{

					echo '<script>

							window.location = "inicio";

						</script>';

				}


			}

		}

	}

	/*=============================================
	EDITAR AULA
	=============================================*/
	public function EditarAulaAlumnoC(){

		if(isset($_POST["idAlumnoEdit"])){

			// if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombresEA"]) &&
			//    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidosEA"]) &&
			//    preg_match('/^[0-9]+$/', $_POST["dniEA"])){
				
				$tablaBD = "alumnos";

				$datos = array("idalumno"       => $_POST["idAlumnoEdit"],
							   "aula_asignada"  => $_POST["aulaEdit"]
							);

				$respuesta = AlumnosModelo::EditarAulaAlumnoM($tablaBD, $datos);

				if($respuesta == "ok"){

					echo'<script>

							window.location = "alumnos";

						</script>';

				}else{

					echo '<script>

							window.location = "inicio";

						</script>';

				}


			// }

		}

	}

	/*=============================================
	CAMBIAR ESTADO DE ALUMNO
	=============================================*/
	public function EditarEstadoC(){

		if(isset($_POST["idAlumnoStatus"])){
				
			$tablaBD = "alumnos";

			if ($_POST["StatusAlumno"] == 0) 
			{
				$datos = array("idalumno" => $_POST["idAlumnoStatus"],
						   "estado"   => $_POST["StatusAlumno"],
						   "meses"  => null
						);
			}else{
				$datos = array("idalumno" => $_POST["idAlumnoStatus"],
						   "estado"   => $_POST["StatusAlumno"],
						   "meses"  => $_POST["mesesAlumnosE"]
						);
			}			

			$respuesta = AlumnosModelo::EditarEstadoM($tablaBD, $datos);

			if($respuesta == "ok"){

				echo'<script>

						window.location = "alumnos";

					</script>';

			}else{

				echo '<script>

						window.location = "inicio";

					</script>';

			}

		}

	}
	
	public function SubirArchivoC()
	{
		if(isset($_POST["dni_alumno"]) && $_SESSION["rol"] == 1){
			// var_dump($_FILES['archivo']['tmp_name']);exit();
			$ruta = "";
			/*=============================================
			VALIDAR ARCHIVO
			=============================================*/
			if(isset($_FILES["archivo"]["tmp_name"])){
				
				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "Vistas/docs/alumnos/".$_POST["dni_alumno"];

				mkdir($directorio, 0755);

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["archivo"]["type"] == "application/pdf"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "Vistas/docs/alumnos/".$_POST["dni_alumno"]."/".$aleatorio.".pdf";

					$origen = $_FILES['archivo']['tmp_name'];

					move_uploaded_file($origen, $ruta);

				}

				if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "Vistas/docs/alumnos/".$_POST["dni_alumno"]."/".$aleatorio.".docx";

					$origen = $_FILES['archivo']['tmp_name'];

					move_uploaded_file($origen, $ruta);

				}

			}

			date_default_timezone_set('America/Lima');

			$fecha_actual = date("d-m-Y h:i:s");

			$tablaBD = "archivos";

			$datos = array("dir_archivo"       => $ruta,
							"descripcion" 	   => $_POST["descripcion_archivo"],
							"user_subir"       => $_SESSION["id"],
							"alumno_doc"   	   => $_POST["dni_alumno"],
							"fecha_subida" 	   => $fecha_actual
						);
						// var_dump($datos);exit();
			$respuesta = AlumnosModelo::SubirArchivoM($tablaBD, $datos);

			if ($respuesta == "ok") {
				
				echo '<script>

						window.location = "alumnos";

					</script>';

			}else{

				echo '<script>

						window.location = "inicio";

					</script>';

			}

		}
	}

	static public function MostrarArchivosC($item,$valor)
	{
		$tabla = "archivos";

		$resultado = AlumnosModelo::MostrarArchivosM($tabla,$item,$valor);

		return $resultado;
	}

}



