<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "constantes/constantes.php";

//$_SESSION['login'] = 'clorsa sda sdas';
    // session_unset();
    // session_destroy();
//print_r(RUTA);

// if (!isset($_SESSION['login'])){
//     header('location:'.'http://localhost/qsystems/');

//     session_unset();
//     session_destroy();
// }
// include('../functions/myfunctions.php');
// include('../controladores/constantes.php');

// if (!isset($_SESSION['login'])){
//   //redirect("../../index.php","Login Continue");
//   echo '<script> window.location = "http://qanalytics.farmagreenscc.com/index.php"</script>';
//   session_unset();
// }
 

    $page= substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);    
?>


<style>
  /* Invisible texto */
  /* figcaption {
    display:none; 
    transition: all .5s;
  } */
  /* Visible texto */
  /* li:hover > figcaption {
    display:block;
    transition: all .5s;
  }   */
</style>

<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            
            
              <a href="index.php" class="site_title"><img src="vistas/images/favicon.ico" width="30" height="30"/> <span>Q Analytics</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="vistas/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <!-- <span>Bienvenido</span> -->
                <!-- <h2>ragde Figueroa Pinargote</h2> -->
                <h2><?php echo ucwords(strtolower($_SESSION['login'][0]->nombres));?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>

                    <a onclick="CargarContenido('vistas/dashboard.php','right_col')"><i class="fa fa-home"></i>Dashboard</a>
                  </li>                  
                  <li><a><i class="fa fa-handshake"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li>
                        <a id="pageUsuarios" onclick="CargarContenido('vistas/usuarios.php','right_col')">Usuarios</a>
                      </li>
                      <li><a onclick="CargarContenido('vistas/proveedores.php','right_col')">Proveedores</a></li>
                      
                      <li><a onclick="CargarContenido('vistas/normativas.php','right_col')">Normativas</a></li>

                      <li><a onclick="CargarContenido('vistas/productos.php','right_col')">Productos</a></li>
                      <li><a onclick="CargarContenido('vistas/zonificacion.php','right_col')">Zonificacion</a></li>

                      
                      <!-- <li><a href="productos.php">Productos</a></li> -->

                    </ul>
                  </li>
                  <li><a><i class="fa fa-codepen"></i>Materiales y Productos<span class="fa fa-chevron-down"></span></a>
                  <!-- <li><a><i class="fa fa-codepen"></i>Analisis de Materiales y         Productos <span class="fa fa-chevron-down"></span></a> -->
                    <ul class="nav child_menu">
                      <li>
                        <a onclick="CargarContenido('vistas/orden_trabajo.php','right_col')">Orden de Trabajo</a>
                      </li>
                      <li>
                        <a onclick="CargarContenido('vistas/resultados_ingreso.php','right_col')"></i>Ingreso de Resultados</a>
                      </li> 
                      <li>
                        <a onclick="CargarContenido('vistas/resultados_visualizacion.php','right_col')"></i>Visualizacion de Resultados</a>
                      </li>                                        
                    </ul>
                  </li>                  
                  <li><a><i class="fa fa-codepen"></i>Inspección PT<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a onclick="CargarContenido('vistas/inspeccion_variables.php','right_col')">Ingreso de variables a inspeccionar</a>
                        <!-- <figcaption>Tu texto</figcaption> -->
                      </li>                  
                      <li>
                        <a onclick="CargarContenido('vistas/inspeccion.php','right_col')"></i>Inspección</a>
                      </li> 
                      <li>
                        <a onclick="CargarContenido('vistas/resultados_visualizacion.php','right_col')"></i>Visualizacion de Resultados</a>
                      </li>
                      
                      <li><a onclick="CargarContenido('vistas/inspeccion_cerrar.php','right_col')">Cerrar Inspeccion</a></li>
                      <li><a onclick="CargarContenido('vistas/inspeccion_reporte.php','right_col')">Reporte Inspeccion</a></li>
                    </ul>
                  </li> 

                  <li class="ragde3">
                    <a><i class="fa fa-codepen"></i>Higienico-Sanitario<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu ragde2">
                      <li>
                        <a onclick="CargarContenido('vistas/planificacion.php','right_col')">Planificación</a>
                      </li>
                      <li>
                        <a class="ragde" onclick="CargarContenido('vistas/planificacion_ingreso_resultados.php','right_col')"></i>Ingreso de Resultados</a>
                      </li> 
                      <li>
                        <a onclick="CargarContenido('vistas/planificacion_ingreso_resultados_visualizacion.php','right_col')"></i>Visualizacion de Resultados</a>
                      </li>
                      <!-- <li><a onclick="CargarContenido('vistas/planificacion_reporte.php','right_col')">Reporte Planificación</a></li> -->
                    </ul>
                  </li> 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons Menu de la barra parte abajo-->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top"  href="logout.php">              
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons Menu de la barra parte abajo-->
          </div>
        </div>

        <!-- top navigation arriba a la derecha-->
        <div class="top_nav">
          <div class="nav_menu">

              <div class="nav toggle">  <!-- hamburguesa -->
                <a id="menu_toggle"><i class="fa fa-bars"></i> </a>
              </div>

       
              <nav class="nav navbar-nav">
                <ul class=" navbar-right"  style="padding: 0px;" >
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="vistas/images/img.jpg" alt=""> <?php echo $_SESSION['login'][0]->usuario;?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                  <button type="button" class="btn btn-light" onclick="CargarContenido('planificacion.php','right_col')">Planificación</button>
                  <!-- <li>
                        <a onclick="CargarContenido('planificacion.php','right_col')">Planificación</a>
                  </li> -->

              </ul>
              
            </nav>
          </div>
        </div>
        <!-- top navigation arriba a la derecha-->
    
    <!-- jQuery -->
    <!-- <script src="vistas/vendors/jquery/dist/jquery.min.js"></script> -->

    