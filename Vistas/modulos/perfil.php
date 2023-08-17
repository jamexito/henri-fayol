<section class="content-header">
		
		<h1>Perfiles</h1>

		<ol class="breadcrumb">

	      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

	      <li class="active">Perfiles</li>

	    </ol>

</section>

<section class="content">
			
	<table class="table table-bordered table-hover table-striped">
		
		<thead>
			
			<tr>
				
				<th>Nº</th>
				<th>Nombre del perfil</th>

			</tr>

		</thead>

		<tbody>

			<?php 
			$item = null;
			$valor = null;

			$resultado = RolesControlador::VerRolesC($item,$valor);

			foreach ($resultado as $key => $value) {

				echo '<tr>
				
						<td>'.($key+1).'</td>
						<td>'.$value["nombre"].'</td>						

					</tr>';

									
			}					

			?>						

		</tbody>

	</table>

</section>
