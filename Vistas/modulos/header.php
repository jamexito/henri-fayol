<header>

	<div class="header">

		<a href="#" class="btnMenn"><i class="fas fa-bars"></i></a>

		<h1>Institución Educativa Privada Henri Fayol</h1>

		<div class="optionsBar">

			<p class="fecha">Perú, <?php echo fechaC(); ?></p>
			<span class="fecha">|</span>
			<span class="user"><?php echo $_SESSION["nombres"]; ?></span>
			<?php 

				if ($_SESSION["foto"] == "") {
					
					echo '<img src="Vistas/img/user.png" class="photouser" alt="User Image">';

				}else{

					echo '<img src="'.$_SESSION["foto"].'" class="user-image photouser" alt="User Image">';

				}

			?>

			<a href="salir"><img class="close" src="Vistas/img/salir.png" alt="Salir del sistema" title="Salir"></a>

		</div>

	</div>	

	<nav id="menu">
		<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4): ?>
			<ul class="options">

				<li><a href="inicio"> <i class="fas fa-home"></i> Inicio</a></li>

				<?php if ($_SESSION['rol'] == 1): ?>
					<li class="principal">

						<a href="#"><i class="fas fa-address-book"></i> Usuarios </a>

						<ul>

							<li><a href="usuarios"><i class="fas fa-address-book"></i> Lista de Usuarios</a></li>
							<li><a href="perfil"><i class="fa fa-signal"></i> Perfiles</a></li>

						</ul>

					</li>
				<?php endif ?>

				<li class="principal">

					<a href="#"><i class="fa fa-cubes"></i> Plantel </a>

					<ul>

						<li><a href="docentes"><i class="fas fa-users"></i> Lista de Docentes</a></li>
						<li><a href="alumnos"><i class="fa fa-graduation-cap"></i> Lista de Alumnos</a></li>

					</ul>

				</li>

				<li class="principal">

					<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2): ?>
						<a href="#"><i class="fas fa-building"></i> Grados </a>

						<ul>

							<li><a href="#" class="verSeccion" idGrado="1"><i class="fa fa-child"></i> Inicial</a></li>
							<li><a href="#" class="verSeccion" idGrado="2"><i class="fa fa-server"></i> Primaria</a></li>

						</ul>
					<?php elseif ($_SESSION['rol'] == 4): ?>
						<a href="#"><i class="fas fa-building"></i> Aula </a>

						<ul>

							<li><a href="#" class="small-box-footer verAlumnos" idAula="<?php echo $_SESSION['aula'] ?>"></i> Alumnos</a></li>

						</ul>
					<?php endif ?>

				</li>

				<li class="principal">

					<a href="#"><i class="glyphicon glyphicon-th"></i> Operaciones </a>

					<ul>

						<li><a href="pagos"><i class="glyphicon glyphicon-th-list"></i> Lista Pagos</a></li>

					</ul>

				</li>
				<?php if ($_SESSION['rol'] == 1): ?>
				
					<li class="principal">

						<a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Inventario </a>

						<ul>

							<li><a href="articulo"><i class="fa fa-tasks" aria-hidden="true"></i> Articulos </a></li>
							<li><a href="ing_articulos"><i class="fa fa-tasks" aria-hidden="true"></i> R. Ingresos </a></li>
							<li><a href="sal_articulos"><i class="fa fa-tasks" aria-hidden="true"></i> R. Salidas </a></li>
							<li><a href="inventario"><i class="fa fa-tasks" aria-hidden="true"></i> Inventario </a></li>

						</ul>

					</li>
					
				<?php endif ?>

			</ul>
		<?php else: ?>
			<ul class="options">

				<li class="principal">

					<a href="#"><i class="glyphicon glyphicon-th"></i> Pagos </a>

					<ul>

						<li><a href="pagos"><i class="glyphicon glyphicon-th-list"></i> Realizar Pago</a></li>

					</ul>

				</li>

			</ul>
		<?php endif ?>


	</nav>

</header>