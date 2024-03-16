<section class="content-header">
	
	<h1>Inventario</h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li class="active">Inventario</li>

    </ol>

</section>

<section class="content">

	<div class="box-header">

		<?php if ($_SESSION['rol'] == 1): ?>

			<a href="http://localhost/sistema_hf/registro_ingreso">
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-registrar-pago-lg"> Registrar Ingreso</button>
			</a>
			<a href="http://localhost/sistema_hf/registro_salida">
				<button class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-registrar-pago-lg"> Registrar Salida</button>
			</a>

		<?php endif ?>

	</div>
			
	<table class="table table-bordered table-hover table-striped tablas">
		
		<thead>
			
			<tr>
				
				<th style="width: 50px">Nº</th>
				<th style="width: 500px">Nombre del artículo</th>
				<th>Precio</th>						
				<th style="width: 500px">Fecha de registro</th>
				<th>Acciones</th>	

			</tr>

		</thead>

		<tbody>
			
			<tr>
				<td>01</td>
				<td>Buzos de uniforme</td>
				<td>36.00</td>
				<td>12-01-2023</td>
				<td>
					<a href="" class="btn btn-danger">Eliminar</a>
				</td>
			</tr>
				
		</tbody>

	</table>

</section>
