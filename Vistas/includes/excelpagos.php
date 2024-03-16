<?php 

require_once '../../Modelos/conexionDB.php';

require_once "../../Controladores/OperacionesControlador.php";
require_once "../../Modelos/OperacionesModelo.php";

require_once "../../Controladores/AlumnosControlador.php";
require_once "../../Modelos/AlumnosModelo.php";

require_once "../../Controladores/SeccionesControlador.php";
require_once "../../Modelos/SeccionesModelo.php";

// header("Content-type: application/xls; charset=utf-8");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=rpt_Pagos.xls");

header("Pragma: no-cache"); 
header("Expires: 0");

?>

<table>
	
	<thead>
		
		<tr>
			
			<th style="width: 100px">Documento</th>
			<th style="width: 300px">Alumno/a</th>				
			<th style="width: 300px">Descripcion</th>	
			<th style="width: 100px">Aula</th>			
			<th style="width: 100px">Monto</th>
			<th style="width: 150px">F. Registro</th>	

		</tr>

	</thead>
	<tbody>
		<?php 

			$item = null;
			$valor = null;

			$pagos = OperacionesControlador::MostrarPagosC($item, $valor);

		?>
		<?php foreach ($pagos as $key => $value): ?>

			<?php 
				$item2 = "idpago";
		  		$valor2 = $value["idpago"];

		  		$detalle_pago = OperacionesControlador::MostrarDetallePagosC($item2, $valor2);

		  		$item3 = "idalumno";
                $valor3 = $value["idalumno"];

                $alumnos = AlumnosControlador::VerAlumnosC($item3,$valor3);

                $item4 = "id";
                $valor4 = $alumnos[0]["aula_asignada"];

                $aula = SeccionesControlador::VerSeccionC($item4,$valor4);

                $fecha_pago = date("d-m-Y", strtotime($detalle_pago["fecha_registro"]));

			?>

			<tr>
				<td><?php echo $alumnos[0]["dni"]; ?></td>
				<td><?php echo utf8_decode($alumnos[0]["nombres"]); ?> <?php echo utf8_decode($alumnos[0]["apellidos"]); ?></td>
				<td><?php echo $detalle_pago["concepto"]; ?></td>
				<td><?php echo utf8_decode($aula[0]["nombres"]); ?></td>
				<td><?php echo number_format($detalle_pago["total"],2); ?></td>
				<td><?php echo $fecha_pago; ?></td>
			</tr>
		<?php endforeach ?>
		
	</tbody>

</table>