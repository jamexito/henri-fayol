<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="vistas/img/portadas/icono_henri.jpg">

	<?php include "includes/scripts.php"; ?>

	<title>I.E Henry Fayol</title>

</head>
<body class="hold-transition login-page">	
	<?php

	if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"]==true) {

		include "modulos/header.php";

		echo '<section id="container">';	

				$url=array();

			    if (isset($_GET["url"])) {
			       
			       $url = explode("/", $_GET["url"]);

			        if( $url[0] == "inicio" || 
						$url[0] == "salir" || 
						$url[0] == "usuarios" || 
						$url[0] == "docentes" ||
						$url[0] == "seccion" || 
						$url[0] == "pagos" ||
						$url[0] == "realizarpago" ||
						$url[0] == "operacion" || 
						$url[0] == "comprobante" || 
						$url[0] == "perfil" ||
						$url[0] == "perfilalumno" ||
						$url[0] == "alumnos" ||
						$url[0] == "inventario" ||
						$url[0] == "articulo" ||
						$url[0] == "alumnosaula") 
					{
			         
			         include "modulos/".$url[0].".php";

			        }

			    }else{
			       
			      include "modulos/inicio.php";

			    }

		echo '</section>';


		include "modulos/footer.php";

	} else {

	    include "modulos/login.php";

	}

	?>

<!-- jQuery 3 -->
<script src="Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Vistas/dist/js/demo.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<!--Plugging para personalizar el datatable Datatables -->
<!-- <script src="Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script> -->
<script src="Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!-- <script type="text/javascript" src="Vistas/js/jquery.js"></script> -->
<!-- <script type="text/javascript" src="Vistas/js/functions.js"></script> -->
<script type="text/javascript" src="Vistas/js/icons.js"></script>
<script type="text/javascript" src="Vistas/js/alumnos.js"></script>
<script type="text/javascript" src="Vistas/js/usuario.js"></script>
<script type="text/javascript" src="Vistas/js/docentes.js"></script>
<script type="text/javascript" src="Vistas/js/sectores.js"></script>
<script type="text/javascript" src="Vistas/js/grados.js"></script>
<script type="text/javascript" src="Vistas/js/tablas.js"></script>
<script type="text/javascript" src="Vistas/js/operacion.js"></script>

</body>

</html>