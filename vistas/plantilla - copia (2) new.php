<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "constantes/constantes.php";


  if (isset($_SESSION['login'])){

  }else{
      include "vistas/login.php";
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Q Analytics</title>
    
    <!-- Bootstrap -->
    <link href="vistas/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <!-- ESTA CAMBIA EL ESTILO DE LAS DATATABLEE -->
    <link href="vistas/build/css/custom.min.css" rel="stylesheet">
    
    
    <!-- Font Awesome -->
    <link href="vistas/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <!-- NProgress -->
    <!-- <link href="vendors/nprogress/nprogress.css" rel="stylesheet"> -->
    
    <!-- iCheck -->
    <link href="vistas/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <!-- <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"> -->
    
    <!-- JQVMap vector mapamundi-->
    <!-- <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/> -->
    
    <!-- bootstrap-daterangepicker RANGE DATE-->
    <!-- <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->



    



    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->

  <!-- datatable styles CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
  <!-- ----- para exportar------- -->
  <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet" >
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
  
  


  <!-- ============================================================
    ESTILOS PARA USO DE DATATABLES JS (para que funcioes responsive) -->
  
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css">

  <!-- =============================================================== -->

  <!-- Toast CSS  (siempre debajo de los stilos de datatables) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
  
  
  <!-- Estilos personzalidos datatables buttons-->
  <link rel="stylesheet" href="vistas/css/plantilla.css">  
  
  <!-- PROPBAR SINO FUNCIONA BORRAR -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/css/autoComplete.min.css"> -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
  <!-- select2 css -->
  <link href='vistas/vendors/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>  
  
  <!-- Datatable personalizado linea pequeñas -->
  <link href="vistas/css/ragde.css" rel="stylesheet" >
  <!-- <link href="css/tablaNormal.css" rel="stylesheet" > -->

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("modulos/sidebar.php");?>
        <div class="right_col" role="main">

        </div>
      </div>
    </div>

        <!-- jQuery -->
        <script src="vistas/vendors/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="vistas/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- FastClick -->
        <script src="vistas/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="vistas/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="vistas/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="vistas/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="vistas/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="vistas/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="vistas/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="vistas/vendors/Flot/jquery.flot.js"></script>
        <script src="vistas/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="vistas/vendors/Flot/jquery.flot.time.js"></script>
        <script src="vistas/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="vistas/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="vistas/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="vistas/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="vistas/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="vistas/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="vistas/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="vistas/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="vistas/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="vistas/vendors/moment/min/moment.min.js"></script>
        <script src="vistas/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


        <!-- Toast JS -->
        <!-- Toas para mensajes personalizados -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 

        <!-- Custom Theme Scripts -->
        <script src="vistas/build/js/custom.min.js"></script>



        <!-- ============================================================
        =LIBRERIAS PARA USO DE DATATABLES JS
        ===============================================================-->

        <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>     -->

        <!-- Swwwt Alert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Toast JS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

        <!-- DataTable -->
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script> -->





        <!--   Core JS Files   -->
        <!-- <script src="assets/js/core/popper.min.js" ></script>
        <script src="assets/js/core/bootstrap.min.js" ></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js" ></script>
        <script src="assets/js/smooth-scrollbar.min.js" ></script>

        <script src="assets/js/material-dashboard.min.js"></script> -->
        
        
        
        <!-- ============================================================
        =LIBRERIAS PARA USO DE DATATABLES JS (para que funcioes responsive)
        ===============================================================-->
        
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
        
        <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
        
        
        <!-- BOTONES DE EXPORTAR DATATABLES  -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/vfs_fonts.js"></script>
        
        <!-- viejos -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
        
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

        <!-- =================================================================
         LIRERIAS PARA EXPORTAR Y PARA LOS BOTONES
        ================================================================= - -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script> -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->

        <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.js"></script> -->
        
        <!-- REVIAR ESTE POR QUE YA EXISTE ARRIAB NO SE VA A DESCARGAR- -->
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.js"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

        <script src="vistas/js/buttons.print.js"></script>

        <!-- input autocomplete -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  

        <!-- select2 script -->
        <!-- <script src='vendors/select2/dist/js/select2.min.js'></script> -->


      </body>
    </html>




<script>
    function CargarContenido(pagina_php){
        $("." + 'right_col').load(pagina_php);
    }
</script> 