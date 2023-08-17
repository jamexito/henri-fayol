<?php 

require_once "Controladores/plantillaControlador.php";

require_once "Controladores/UsuariosControlador.php";
require_once "Controladores/RolesControlador.php";
require_once "Controladores/DocentesControlador.php";
require_once "Controladores/AlumnosControlador.php";
require_once "Controladores/SeccionesControlador.php";
require_once "Controladores/OperacionesControlador.php";

require_once "Modelos/UsuariosModelo.php";
require_once "Modelos/RolesModelo.php";
require_once "Modelos/DocentesModelo.php";
require_once "Modelos/AlumnosModelo.php";
require_once "Modelos/SeccionesModelo.php";
require_once "Modelos/OperacionesModelo.php";



$plantilla = new PlantillaControlador();
$plantilla -> LlamarPlantilla();

