<section class="content-header">
	
	<h1>Artículos</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Artículos</li>

    </ol>

</section>

<section class="content">

	<?php 

		if ($_SESSION['rol'] == 1) {
			echo '<div class="box-header">

					<button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-registrar-pago-lg"> Registrar </button>

				</div>';
		}

	?>
			
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>
			
			<tr>
				
				<th style="width: 50px">Nº</th>
				<th style="width: 500px">Nombre del artículo</th>
				<th>Precio</th>						
				<th style="width: 500px">Fecha de registro</th>						
				<th>Estado</th>
				<th>Acciones</th>	

			</tr>

		</thead>

		<tbody>
			
			<tr>
				<td>01</td>
				<td>Buzos de uniforme</td>
				<td>36.00</td>
				<td>12-01-2023</td>
				<td class="text-center"><button class="btn btn-success"><i class="fa fa-check-circle"></i></button></td>
				<td>
					<a href="" class="btn btn-danger">Eliminar</a>
				</td>
			</tr>
				
		</tbody>

	</table>

</section>
