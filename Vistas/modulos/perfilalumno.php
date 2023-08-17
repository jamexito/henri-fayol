<?php
$item = "idalumno";
$valor = $_GET["idAlumnoPefilVer"];

$alumno = AlumnosControlador::VerAlumnosC($item, $valor);

$item2 = "id";
$valor2 = $alumno[0]["aula_asignada"];

$aulaAlumno = SeccionesControlador::VerSeccionC($item2,$valor2);

$item3 = "aula_asignada";
$valor3 = $alumno[0]["aula_asignada"];

$docenteAsig = DocentesControlador::VerDocentesC($item3,$valor3);

$item4 = "idalumno";
$valor4 = $_GET["idAlumnoPefilVer"];

$pagos = OperacionesControlador::MostrarPagosC($item4,$valor4);
// var_dump($pagos);
?>

<section class="content-header">
	
	<h1>Perfil del alumno <b><?php echo $alumno[0]["nombres"] ?></b></h1>

	<ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

      <li><a href="">Alumnos</a></li>
      <li class="active">Perfil del alumno <b><?php echo $alumno[0]["nombres"] ?></b></li>

    </ol>

</section>

<div class="content">
    <!-- <div class="card"> -->
        <div class="row">
        <?php 
        if ($alumno[0]["foto"] == "") {
            $fotoprofile = 'Vistas/img/users/anonymous.png';
        }else{            
            $fotoprofile = $alumno[0]["foto"];
        }
        echo '<div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" width="100px" src="'.$fotoprofile.'" alt="User profile picture">

                    <h3 class="profile-username text-center">'.$alumno[0]["nombres"].'</h3>

                    <p class="text-muted text-center">'.$alumno[0]["apellidos"].'</p>

                    <!-- <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                
                </div>

                <!-- About Me Box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Información sobre el alumno</h3>
                </div>
                
                <div class="box-body">

                    <strong><i class="fa fa-address-card margin-r-5"></i> Documento</strong>

                    <p class="text-muted">'.$alumno[0]["dni"].'</p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>

                    <p class="text-muted">'.$alumno[0]["direccion"].'</p>

                    <hr>

                    <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>

                    <p class="text-muted">'.$alumno[0]["telefono"].'</p>

                    <hr>

                    <strong><i class="fa fa-male margin-r-5"></i> Apoderado</strong>

                    <p class="text-muted">'.$alumno[0]["apoderado"].'</p>

                    <hr>

                    <strong><i class="fa fa-signal margin-r-5"></i> Nivel de estudios</strong>

                    <p class="text-muted">'.$aulaAlumno[0]["nombres"].'</p>

                    <hr>

                    <strong><i class="fa fa-book margin-r-5"></i> Cursos asignados</strong>

                    <p>
                    <span class="label label-danger">Matemàtica</span>
                    <span class="label label-success">Comunicaciòn</span>
                    <span class="label label-info">Ortografìa</span>
                    <span class="label label-warning">Caligrafìa</span>
                    <span class="label label-primary">Minichef</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-graduation-cap margin-r-5"></i> Profesor(a) asignado(a)</strong>

                    <p class="text-muted">'.$docenteAsig["nombres"].' '.$docenteAsig["apellidos"].'</p>
                    
                </div>
                
                </div>
                
            </div>';
        ?>
                        
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#timeline" data-toggle="tab">Historial de pagos</a></li>
                        <li><a href="#activity" data-toggle="tab">Documentos cargados</a></li>
                        <!-- <li><a href="#settings" data-toggle="tab">Opciones</a></li> -->
                    </ul>
                    <div class="tab-content">
                        
                        <div class="active tab-pane" id="timeline">
                            <div class="content">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Formulario de Pago</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="POST" class="form-inline">
                                                <div class="form-group">
                                                <?php
                                                    $itemventa = null;
                                                    $valorventa = null;

                                                    $ventas = OperacionesControlador::MostrarPagosC($itemventa, $valorventa);

                                                    if (!$ventas) {
                                                        echo '<input type="text" class="form-control" name="pagoN" value="1001" readonly style="width:80px">';
                                                    }else{
                                                        foreach ($ventas as $key => $valueventa) {
                                                        }
                                                        $codigo = $valueventa["idpago"] + 1;
                                                        echo '<input type="text" class="form-control" name="pagoN" value="'.$codigo.'" readonly style="width:80px">';
                                                    }

                                                ?>
                                                </div>                                                
                                                <input type="hidden" name="idalumno" value="<?php echo $alumno[0]["idalumno"]; ?>">
                                                <div class="form-group">
                                                  <textarea class="form-control" rows="1" placeholder="Ingrese concepto del pago..." style="width: 600px;" name="concepto" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <input type="number" name="monto" placeholder="S/ 0.00" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Realizar Pago</button>
                                                <?php
                                                    $subirarchivo = new OperacionesControlador();
                                                    $subirarchivo -> RealizarPagoC();
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Archivos Cargados</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="content">
                                                <div class="row">
                                                    <?php
                                                        foreach ($pagos as $key => $value) {
                                                            $itemdetalle = "idpago";
                                                            $valordetalle = $value["idpago"];

                                                            $resultadodetalle = OperacionesControlador::MostrarDetallePagosC($itemdetalle,$valordetalle);
                                                            // var_dump($resultadodetalle);

                                                            echo '<div class="col-md-6">
                                                                    <div class="small-box" style="background: #82C3EC;border: 1px #6B728E solid">
                                                                        <div class="inner">
                                                                            <h3 style="font-size: 20pt;overflow:hidden">'.$resultadodetalle["concepto"].'</h3>
                                                                            <p><b>Correlativo: </b>01 - '.$value["idpago"].'</p>
                                                                            <p><b>Monto pagado: </b>S/ '.$resultadodetalle["total"].'</p>
                                                                        </div>
                                                                        <a href="" class="small-box-footer btnImprimirComprobante" codigoPago="'.$value["idpago"].'" idAlumno="'.$value['idalumno'].'" idUser="'.$_SESSION['id'].'">Descargar Comprobante <i class="fa fa-file-pdf"></i></a>
                                                                    </div>
                                                                </div>';
                                                        }
                                                    ?>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>     
                        </div>
                        
                        <div class="tab-pane" id="activity">
                            <div class="content">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Formulario de Carga</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="POST" class="form-inline" enctype="multipart/form-data">
                                                <input type="hidden" name="dni_alumno" value="<?php echo $alumno[0]["dni"]; ?>">
                                                <div class="form-group">
                                                  <input type="text" name="descripcion_archivo" id="descripcion_archivo" class="form-control" style="width: 600px;" placeholder="Descripcion del archivo" required>
                                                </div>
                                                <div class="form-group">
                                                  <!-- <label for="">Seleccionar el archivo</label> -->
                                                  <input type="file" name="archivo" id="archivo" class="form-control" style="width: 18rem;" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Subir el archivo</button>
                                                <?php
                                                    $subirarchivo = new AlumnosControlador();
                                                    $subirarchivo -> SubirArchivoC();
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Archivos Cargados</h3>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-bordered table-hover table-striped tablas">
            
                                                <thead>                                                
                                                    <tr>                                                    
                                                        <th width="10px">Nº</th>
                                                        <th width="400px">Descripción del documento</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        $item5 = "alumno_doc";
                                                        $valor5 = $alumno[0]["dni"];

                                                        $archivos = AlumnosControlador::MostrarArchivosC($item5,$valor5);

                                                        foreach ($archivos as $key => $value) {
                                                            echo '<tr>
                                                                    <td>'.($key+1).'</td>
                                                                    <td>'.$value["descripcion"].'</td>
                                                                    <td>
                                                                        <button class="btn btn-success">
                                                                            <a href="'.$value["dir_archivo"].'" download="'.$value["dir_archivo"].'" style="color:white"><i class="fa fa-download"></i></a>                                                             
                                                                        </button>
                                                                    </td>
                                                                </tr>';
                                                        }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>  
                            </div>                      
                        </div>

                        <!-- <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                                </div>
                            </form>
                        </div> -->
                        
                    </div>
                
                </div>
                
            </div>
            
        </div>        
</div>