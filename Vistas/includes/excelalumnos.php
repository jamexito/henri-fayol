<?php 

require_once "../../Controladores/AlumnosControlador.php";
require_once "../../Modelos/AlumnosModelo.php";

require_once "../../Controladores/SeccionesControlador.php";
require_once "../../Modelos/SeccionesModelo.php";

// header("Content-type: application/xls; charset=utf-8");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=rpt_Alumnos.xls");

header("Pragma: no-cache"); 
header("Expires: 0");

?>

<table>
		
		<thead>
			
			<tr>
				
				<th width="50">N</th>
				<th width="100">Documento</th>						
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>Contacto</th>
				<th>Aula</th>
				<th>Estado</th>
				
			</tr>

		</thead>
		<tbody>

			<?php 
      
				$item=null;
				$valor=null;

				$resultadoAl = AlumnosControlador::VerAlumnosC($item, $valor);

			?>

			<?php foreach ($resultadoAl as $key => $value): ?>
				
				<?php if ($value["estado"] == 1 || $value["estado"] == 2 || $value["estado"] == 0): ?>

					<?php 
						/*AULAS*/
						$itemaula = "id";
						$valoraula = $value["aula_asignada"];
						
						$aulas = SeccionesControlador::VerSeccionC($itemaula,$valoraula);
					?>

					<tr>
						<td><?php echo ($key+1); ?></td>
						<td><?php echo $value["dni"]; ?></td>
						<td><?php echo utf8_decode($value["apellidos"]); ?></td>
						<td><?php echo utf8_decode($value["nombres"]); ?></td>
						<td><?php echo $value["telefono"]; ?></td>
						<td><?php echo utf8_decode($aulas[0]["nombres"]); ?></td>
						<td><?php echo $value["estado"]; ?></td>
					</tr>
					
				<?php endif ?>				
				
			<?php endforeach ?>					

		</tbody>
	</table>