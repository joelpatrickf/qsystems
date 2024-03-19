<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
include('../functions/myfunctions.php');
include('../controladores/constantes.php');

    if (!isset($_SESSION['login'])){
        redirect("../../index.php","Login Continue");
    }
    
    $page= substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);    
?>
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Q Analytics</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <!-- <span>Bienvenido</span> -->
                <h2>ragde Figueroa Pinargote</h2>
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

                    <a onclick="CargarContenido('dashboard.php','right_col')"><i class="fa fa-home"></i>Dashboard</a>
                  </li>                  
                  <li><a><i class="fa fa-handshake"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li>
                        <a id="pageUsuarios" onclick="CargarContenido('usuarios.php','right_col')">Usuarios</a>
                      </li>
                      <li><a onclick="CargarContenido('proveedores.php','right_col')">Proveedores</a></li>
                      
                      <li><a onclick="CargarContenido('normativas.php','right_col')">Normativas</a></li>

                      <li><a onclick="CargarContenido('productos.php','right_col')">Productos</a></li>
                      
                      <!-- <li><a href="productos.php">Productos</a></li> -->

                    </ul>
                  </li>
                  <li>
                    <a onclick="CargarContenido('orden_trabajo.php','right_col')"><i class="fa fa-sticky-note"></i>Orden de Trabajo</a>
                  </li>                  
                  <li>
                    <a onclick="CargarContenido('resultados_ingreso.php','right_col')"><i class="fa fa-pencil-square-o"></i>Ingreso de Resultados</a>
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
              <a data-toggle="tooltip" data-placement="top"  href="../logout.php">
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
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">Fernando Figueroa
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- top navigation arriba a la derecha-->
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    