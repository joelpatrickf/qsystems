<?php 
session_start();
if(isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion'] == 1){
    echo '<script> window.location = "http://localhost/RsWeb/"</script>';
    session_unset();
    session_destroy();        
    //echo '<script> window.location = "https://ragdepruebas.farmagreenscc.com/"</script>';
}
$v_id_modulo = isset($_SESSION['usuario']->id_perfil)?$_SESSION['usuario']->id_perfil:"";
//print_r($v_id_modulo);



?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RsWeb</title>

    <!-- ============================================================================================================= -->
    <!-- HORARIOS -->
    <?php 
        
    
    if (isset($v_id_modulo) AND ($v_id_modulo === 1)) {?>
        <!-- <link rel="stylesheet" href="vistas/css/tablaeditable.css"/> 
        <link rel="stylesheet" href="vistas/css/estilotablaExcel.css"/>
        <link rel="stylesheet" href="vistas/css/selectNormal.css"/>   -->



    <?php } ?>
    <!-- ============================================================================================================= -->    


    <link rel="shortcut icon" href="vistas/assets/dist/img/rsPlus.ico" type="image/x-icon">

    <!-- ============================================================================================================= -->
    <!-- REQUIRED CSS -->
    <!-- ============================================================================================================= -->

    <!-- Google Font: Source Sans Pro REACTIVAR -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    

    <!-- ================================================================ -->
    <!-- verifiar sino borrar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Jquery CSS (para el modulo de factracion)--> 
    <link rel="stylesheet" href="vistas/assets/plugins/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->


    <!-- JSTREE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">

    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    
    <!-- PARA QUE SE ILIMINE LA FILA CUANDO SE PASA EL MOUSE  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">

    <!--  Datatables CSS ragde borrrar-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>   -->


    <!-- Estilos personzalidos -->
    <link rel="stylesheet" href="vistas/assets/dist/css/plantilla.css">
    
    


    <!-- ============================================================================================================= -->
    <!-- REQUIRED SCRIPTS -->
    <!-- ============================================================================================================= -->
    
    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="vistas/assets/plugins/chart.js/Chart.min.js"></script>

    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    <script src="vistas/assets/dist/js/canvasjs.min.js"></script>

    <!-- InputMask -->
    <script src="vistas/assets/plugins/moment/moment.min.js"></script>
    <script src="vistas/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- jquery UI -->
    <script src="vistas/assets/plugins/jquery-ui/js/jquery-ui.js"></script>

    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- JSTREE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>


    <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->

    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js" ></script>
    <!-- <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    

    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <!-- =================================================================
     LIRERIAS PARA EXPORTAR Y PARA LOS BOTONES
    ================================================================= - -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.js"></script>

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

    <!-- Columna fija Fixed columns -->
    <!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script> -->

    <!-- Editar -->
    <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <script src="vistas/assets/dist/js/tabledit.min.js"></script>

       
       <!-- Columna Fijaa Column Fixed  JS -->
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js" ></script>
       <!-- Columna Fijaa Column Fixed  CSS -->
    <link href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet"/>

    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>
    <script src="vistas/assets/dist/js/plantilla.js"></script>

    <!-- SUM()  Datatables-->
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

<!-- <script type="text/javascript" src="vistas/js/jquery.tabledit.js"></script> -->
<!-- <script type="text/javascript" src="vistas/js/custom_table_edit.js"></script> -->
</head>

<?php if(isset($_SESSION['usuario'])): ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
             include "modulos/navbar.php";
            include "modulos/aside.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include "vistas/".$_SESSION['usuario']->vista ?>
        </div> <!-- /.content-wrapper -->

        
        
    </div> <!-- ./wrapper -->
    
    <script>
        
        function CargarContenido(pagina_php,contenedor,id_perfil, id_modulo){
            $("." + contenedor).load(pagina_php);
        }
    </script>

</body>
<?php else: ?>
    <body>
       <?php include "vistas/login.php" ?> 
    </body>
<?php endif; ?>

</html>