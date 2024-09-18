<?php 
if(isset($_SESSION)){ }else{ session_start(); }
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
    // print_r($_SESSION['login']);
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    
</style>

<!-- page content -->
<!-- <div class="right_col" role="main"> -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
                           <h4> Administrar Usuarios </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
                </div>
                <div class="card-body pb-0 pt-0">
                    <div class="row">

                        <!-- Columna usuario -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptUsuario"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Usuario</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptUsuario"
                                    name="iptUsuario" placeholder="Ingrese el Usuario" required autofocus disabled>
                            </div>
                        </div>

                        <!-- Columna password -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptPassword"><i class="fas fa-users fs-6"></i>
                                    <span class="small">Password</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptPassword"
                                    name="iptPassword" placeholder="Ingrese el Password" required disabled>
                            </div>
                        </div>

                        <!-- Columna Cedula -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptCedula"><i class="fas fa-id-card fs-6"></i>
                                    <span class="small">Cedula</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptCedula"
                                    name="iptCedula" placeholder="Ingrese la Cedula" required disabled>
                            </div>
                        </div>

                        <!-- Columna Nombres -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptNombres"><i class="fas fa-id-card fs-6"></i>
                                    <span class="small">Apellidos y Nombres</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptNombres"
                                    name="iptNombres" placeholder="ingrese los Apellidos y Nombres" required disabled>
                            </div>
                        </div>

                       <!-- Columna Perfil -->
                        <div class="col-4 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="selPerfil"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Perfil</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selPerfil" disabled>
                                    <option value="0">Seleccione Perfil</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Normal</option>
                                </select>
                            </div>
                        </div>  
                        
                        <!-- Columna CARGO -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptCargo"><i class="fas fa-id-card fs-6"></i>
                                    <span class="small">Cargo</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptCargo"
                                    name="iptCargo" placeholder="Ingrese el Cargo del Usuario" required disabled>
                            </div>
                        </div>                                              
                    </div> <!-- ROW -->
                </div>  <!-- END div 1º card body -->
            
                
                <div class="card-body pb-0 pt-0">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow " width="100%"> -->
                            <table id="tbl_usuarios"  class="table table-striped " style="width:100%">

                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">password</th>
                                        <th class="text-center">CDI</th> 
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Perfil</th> 
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Cargo</th>
                                        <th class="text-center">Estado</th> 
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 2º card-body      -->
                
            </div> <!-- END CARD -->
        </div>
    </div>

<!-- </div> -->
<!-- /page content -->
      

<//?php include("modulos/footer.php"); ?>

<script type="text/javascript">
var accion = 2;
$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    //********************************************************    
    //-CARGA DE USUARIOS EXISTENTES
    //********************************************************    

        table = $("#tbl_usuarios").DataTable({
            select: true,
            info: false,
            ordering: false,
            
            paging: false,            
            dom: 'Bfrtilp',
            buttons: 
                [
                //'excel', 'print','pdf'
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success',

                        excelStyles: {template: "blue_medium",},

                        filename: function() {
                            return 'Usuarios_'+<?php echo $fechaActual; ?>
                          },
                        title: function() {
                            var searchString = table.search(); 
                            return searchString.length? "Search: " + searchString : "Reporte General de Usuarios "
                          },
                        exportOptions: {
                            columns: [ 1, 3, 4, 5, 6, 7,8],
                            format: {
                                body: function ( data, row, column, node ) {
                                    return column === 1 ?
                                        data.replace( /[$,]/g, '' ) :
                                        data;
                                }
                            }
                        }
                    }, //fin del BUTTON excel

                    { // INICIO DE PDF
                        extend:    'pdfHtml5',
                        text:      '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-warning',
                        customize: function(doc) {
                            //doc.layout = 'lightHorizotalLines;'
                            
                            // doc.defaultStyle.fontSize = 6
                            // doc.content[1].margin = [ 20, 0, 10, 0 ] //left, top, right, bottom

                            
                    doc.pageMargins = [30, 30, 30, 30];
                    doc.defaultStyle.fontSize = 11;
                    doc.styles.tableHeader.fontSize = 12;
                    doc.styles.title.fontSize = 14;                            

                            var rowCount =  doc.content[1].table.body.length;
                            for (i = 0; i < rowCount; i++) {
                               doc.content[1].table.body[i][0].alignment = 'center';
                               doc.content[1].table.body[i][2].alignment = 'center';
                               doc.content[1].table.body[i][3].alignment = 'center';
                               doc.content[1].table.body[i][4].alignment = 'center';
                               doc.content[1].table.body[i][5].alignment = 'center';
                               doc.content[1].table.body[i][6].alignment = 'center';
                            };                    


                        },
                        filename: function() {
                            return 'Usuarios_'+<?php echo $fechaActual; ?>
                          },
                        title: function() {
                            var searchString = table.search();        
                            return searchString.length? "Search: " + searchString : "Reporte General de Usuarios "
                          },
                        exportOptions: {
                            columns: [ 1, 3, 4, 5, 6, 7,8],
                            format: {
                                body: function ( data, row, column, node ) {
                                    return column === 1 ?
                                        data.replace( /[$,]/g, '' ) :
                                        data;
                                }
                            }
                        }
                    },
                    { // IMPRIMIR
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        title: function() {
                            var searchString = table.search();        
                            return searchString.length? "Search: " + searchString : "Reporte General de Usuarios "
                          },                        
                        exportOptions: {
                            columns: [ 1, 3, 4, 5, 6, 7,8],
                            format: {
                                body: function ( data, row, column, node ) {
                                    return column === 1 ?
                                        data.replace( /[$,]/g, '' ) :
                                        data;
                                }
                            }
                        }                        
                    },                    

                ],

            ajax:{
                url:"ajax/usuarios.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {'accion' : 1}, // 1 para listar 
                dataType: "json",
            },

            columns: [
                { "data": "id" },
                { "data": "usuario" },
                { "data": "password1" },
                { "data": "idempleado" },
                { "data": "nombres" },
                { "data": "cargo" },
                { "data": "fecha_creacion" },
                { "data": "perfil" },
                { "data": "estado" }
            ],          
            responsive: {
                details: {
                    type: 'column'
                }
            },
            // rowReorder: {
            //     selector: 'td:nth-child(2)'
            // },
            columnDefs:[
               {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},
                
                // {targets:0,visible:false,},
                {targets:2,visible:false,},
                
                { responsivePriority: 1, targets: 9 },
                
                {
                    targets:9,
                    orderable:false,
                    render: function(data, type, full, meta){
                        return "<center>"+
                                      "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+
                                        "<i class='fas fa-pencil-alt fs-5'></i>"+
                                    "</span>"+
                                    "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>"+
                                        "<i class='fas fa-trash fs-5'></i>"+
                                    "</span>"+                                    

                                "</center>"
                    }

                }     


            ],
            pageLength: 10,
            language: {
                "lengthMenu": "",
                "zeroRecords": "No se encontraron resultados",
                "info": "",
                "infoEmpty": "",
        
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "<",
                    "sLast":">>",
                    "sNext":">",
                    "sPrevious": "<<"
                },
                "sProcessing":"Procesando...",
            },
        });

    //******************//
    //--BOTON EDITAR -//
    //******************//

    $('#tbl_usuarios tbody').on('click','.btnEditar', function(){
        accion = 3; //-GUARDAR MODIFICACION

        var data = table.row($(this).parents('tr')).data();
        $("#iptUsuario").val(data[1]);
        $("#iptPassword").val(data[2]);
        $("#iptCedula").val(data[3]);
        $("#iptNombres").val(data[4]);
        $("#iptCargo").val(data[8]);

        

        if (data[5] == 'ADMIN'){
            $("#selPerfil").val(1) ;
        }else if (data[5] == 'NORMAL'){
            $("#selPerfil").val(2) ;
        }
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();        
        $("#iptUsuario").prop( "disabled", true );
        $("#iptPassword").focus();
     })
    
     $('#tbl_usuarios tbody').on('click','.btnEliminar', function(){
        var data = table.row($(this).parents('tr')).data();
        varUsuarioEliminar = data[1];
        $.ajax({
                async: false,
                url:"ajax/usuarios.ajax.php",
                method: "POST",
                data: {
                    'accion':4,
                    'usuario': varUsuarioEliminar
                },
                dataType: "json",
                success: function(respuesta){
                    console.log(respuesta);
                    if (respuesta == 'ok'){
                        toastr["success"]("Cambio de estado a INACTIVO Correcta", "!Atención!");
                        // limpiar();
                        // bloquearInputs();

                        table.ajax.reload();
                    }else{
                        toastr["error"]("No se pudo cambiar de estado al USUARIO", "!Atención!");
                    }
                    // bloquearInputs();
                    // limpiar();
                    // $("#btnClose" ).prop( "hidden", true );
                    accion="";                    
                }
            });
        
     })

     
     $("#btnClose").click(function() {
        bloquearInputs();
        limpiar();
        $("#btnClose" ).prop( "hidden", true );
        accion="";
        $("#selPerfil").val(0);

    })     
     $("#btnNew").click(function() {
        accion=2;
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();
        limpiar();
        $("#selPerfil").val(0);
    })
     
    //********************************************************    
    //-GUARDAR 
    //********************************************************    
    $("#btnSave").click(function() {

        const msg = [];
        if ($("#iptUsuario").val() == ''){msg.push('Usuario');}
        if ($("#iptPassword").val() == ''){msg.push('Password');}
        if ($("#iptCedula").val() == ''){msg.push('Cedula');}
        if ($("#iptNombres").val() == ''){msg.push('Apellidos y Nombres');}
        if ($("#selPerfil").val() == 0){msg.push('Perfil');}
        if ($("#iptCargo").val() == ''){msg.push('Cargo');}
        //toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");

        if (msg.length != 6 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");
            return;
        }else if(msg.length == 6){
            
            toastr["error"]("No existen datos para guardar", "!Atención!");
            bloquearInputs();
            return;
        }


        
        $.ajax({
                async: false,
                url:"ajax/usuarios.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'usuario': $("#iptUsuario").val(),
                    'clave': $("#iptPassword").val(),
                    'cedula': $("#iptCedula").val(),
                    'nombres': $("#iptNombres").val(),
                    'perfil': $("#selPerfil").val(),
                    'cargo': $("#iptCargo").val()
                },
                dataType: "json",
                success: function(respuesta){
                    console.log(respuesta);
                    if (respuesta == 'ok'){
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        limpiar();
                        bloquearInputs();

                        table.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                    bloquearInputs();
                    limpiar();
                    $("#btnClose" ).prop( "hidden", true );
                    accion="";
                }
            });
    });

});

function desBloquearInputs(){
    $("#iptUsuario").prop( "disabled", false );
    $("#iptPassword").prop( "disabled", false );
    $("#iptCedula").prop( "disabled", false );
    $("#iptNombres").prop( "disabled", false );
    $("#selPerfil").prop( "disabled", false );
    $("#iptCargo").prop( "disabled", false );
    
    $("#iptUsuario").focus();
}
function bloquearInputs(){
    $("#iptUsuario").prop( "disabled", true );
    $("#iptPassword").prop( "disabled", true );
    $("#iptCedula").prop( "disabled", true );
    $("#iptNombres").prop( "disabled", true );
    $("#selPerfil").prop( "disabled", true );
    $("#iptCargo").prop( "disabled", true );
    $("#iptUsuario").focus();
}
function limpiar(){
    $("#iptUsuario").val('');
    $("#iptPassword").val('');
    $("#iptCedula").val('');
    $("#iptNombres").val('');
    $("#iptCargo").val('');
    $("#selPerfil").val(0);
}
</script>