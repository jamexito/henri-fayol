<section class="content-header">

      <h1 class="text-justify"><strong>AULAS</strong></h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li> 

        <li class="active">Aulas</li>

      </ol>

</section>

<section class="content">

  <div class="row">

        <?php 

        $item = "seccion";
        $valor = $_GET["idGrado"];

        $sectores = SeccionesControlador::VerSeccionC($item, $valor);
        
        foreach ($sectores as $key => $value) {

          $item2 = "aula_asignada";
          $valor2 = $value["id"];

          $alumnos = AlumnosControlador::VerAlumnosC($item2, $valor2);

          if (count($alumnos) > 1) 
          {
            $conteo = count($alumnos)." "."Alumnos";
          }else{
            $conteo = count($alumnos)." "."Alumno";
          }
          
          echo '<div class="col-lg-4 col-xs-6">

                <div class="small-box VerLotes" style="background-color: '.$value["bgColor"].'; color: white;">

                  <div class="inner">

                    <h3>'.$value["nombres"].'</h3>

                    <p>'.$conteo.'</p>

                  </div>

                  <div class="icon">

                    '.$value["icon"].'

                  </div>

                  <a href="#" class="small-box-footer verAlumnos" idAula="'.$value["id"].'">
                    Ver Alumnos <i class="fa fa-arrow-circle-right"></i>
                  </a>

                </div>

              </div>';

        }


        ?>

      </div>

</section>
