<?php 
if(isset($_SESSION)){ }else{ session_start(); }
    $fechaActual = date('YmdHis', time()); 
    $perfil = $_SESSION['login'][0]->perfil;
    
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    
     
    .form-control::placeholder{
        color:#bfbcbc;
    }
    input[type="file"] {
      display: none;
    }

    .lblRagde{
        margin-bottom: 0px;
    }

    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      height: 24px;
      padding-top: 3px;
    }

    .fa, .fas {
        font-size: initial;
    }
    
    table.dataTable tbody td {
        padding: 0px 0px!important;
        height: 25px;

    }
</style>

<!-- page content -->
<!-- <div class="right_col" role="main"> -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
                           <h4> Administrar Documentación </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;" hidden> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
                </div>
                <div class="card-body pb-0 pt-1" <?php if ($perfil == 'NORMAL'){?>hidden<?php }; ?>>
                    <form id="frmFormulario" enctype="multipart/form-data">

                        <div class="row">
                            
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptCodigoDocumento"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Código</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptCodigoDocumento"
                                        name="iptCodigoDocumento" placeholder="Código..."  autofocus >
                                </div>
                            </div>

                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptNombreDocumento"><i class="fas fa-signature fs-6"></i>
                                        <span class="small">Nombre Documento</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptNombreDocumento"
                                        name="iptNombreDocumento" placeholder="Nombre..." >
                                </div>
                            </div>

                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptVersion"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Versión</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="iptVersion" name="iptVersion" placeholder="Versión.."  >
                                </div>
                            </div>

                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptArea"><i class="fas fa-building fs-6"></i>
                                        <span class="small">Area</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="iptArea" name="iptArea" >
                                        <option value="0">Seleccione</option>
                                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                        <option value="AMBIENTE">AMBIENTE</option>
                                        <option value="CALIDAD">CALIDAD</option>
                                        <option value="PRODUCCCION">PRODUCCCION</option>
                                        <option value="RRHH">RRHH</option>
                                        <option value="SSO">SSO</option>
                                    </select>                                    

                                </div>
                            </div>

                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="selTipoDocumento"><i class="fas fa-file fs-6"></i>
                                        <span class="small">Tipo Documento</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="selTipoDocumento" name="selTipoDocumento" placeholder="Tipo..."  >
                                </div>
                            </div>

                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="selStatus"><i class="fas fa-list fs-6"></i>
                                        <span class="small">Status</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selStatus" name="selStatus" >
                                        <option value="0">Seleccione</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="selAcceso"><i class="fas fa-layer-group fs-6"></i>
                                        <span class="small">Acceso</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selAcceso" name="selAcceso">
                                        <option value="0">Seleccione</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="NORMAL">NORMAL</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptResponsable"><i class="fas fa-check"></i>
                                        <span class="small">Responsable</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="iptResponsable" name="iptResponsable" placeholder="Responsable" >
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="lblRagde" for="iptObservacion"><i class="fas fa-check"></i>
                                        <span class="small">Observación</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="iptObservacion" name="iptObservacion" placeholder="Observacion" >
                                </div>
                            </div>

                            <div class="col-4 col-lg-2">
                                    <label class="lblRagde" for="file-upload"  ><i class="fas fa-upload fs-6"></i>
                                        <span class="small">Subir</span><span class="text-danger">*</span>
                                    </label>                            
                                <div class="form-group mb-2">
                                        
                                    <label class="custom-file-upload">
                                        <input name="archivo" id="archivo" type="file" accept=".pdf, .pdf" >
                                         Cargar PDF

                                    </label>
                                </div>
                            </div>                          
                            
                                        <!-- <input class="btn btn-warning btn-sm"  type="submit" value="Go" id="btnEnviarExcel">          -->
                        </div> <!-- ROW -->
                    </form>
                </div>  <!-- END div 1º card body -->
            
                
                <div class="card-body pb-0 pt-0">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow " width="100%"> -->
                            <table id="tbl_usuarios"  class="table table-striped " style="width:100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center">au_inc</th>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">file_name</th>
                                        <th class="text-center">Version</th>
                                        <th class="text-center">Area</th> 
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Status</th> 
                                        <th class="text-center">Acceso</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Creacion</th> 
                                        <th class="text-center">Modificación</th>
                                        <th class="text-center">Observación</th>
                                        <th class="text-center">Responsable</th>
                                        <th class="text-center">Acción</th>
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
var filePdf = "";
$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    bloquearInputs();
    

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
                url:"ajax/documentacion.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {'accion' : 1}, // 1 para listar 
                dataType: "json",
            },

            columns: [
                { "data": "au_inc" },
                { "data": "codigo" },
                { "data": "nombre_documento" },
                { "data": "file_name" },
                { "data": "version" },
                { "data": "area" },
                { "data": "tipo_documento" },
                { "data": "status" },
                { "data": "acceso" },
                { "data": "usuario" },
                { "data": "fecha_creacion" },
                { "data": "fecha_modificacion" },
                { "data": "observacion" },
                { "data": "responsable" }
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
                
                {targets:0,visible:false,}, // au_inc
                {targets:3,visible:false,},
                {targets:9,visible:false,},
                {targets:12,visible:false,},
                
               { responsivePriority: 1, targets: 14 },

                {
                    targets:14,
                    orderable:false,
                    render: function(data, type, full, meta){
                        console.log(filePdf);

                        return "<center>"+
                                      "<span class='btnPdf text-warning px-1' style='cursor:pointer;'>"+
                                        "<i class='fas fa-file-pdf-o'></i>"+
                                    "</span>"+
                                    "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>"+
                                        "<i class='fas fa-trash'></i>"+
                                    "</span>"+

                                "</center>"
                    }

                }     


            ],
            pageLength: 10,
            //language: {            },
        });


    $("#btnSave").click(function() {

        const msg = [];
        if ($("#iptCodigoDocumento").val() == ''){msg.push(' Codigo ');}
        if ($("#iptNombreDocumento").val() == ''){msg.push(' Nombre ');}
        if ($("#iptVersion").val() == ''){msg.push(' Version');}
        if ($("#iptArea").val() == ''){msg.push(' Area');}
        if ($("#iptResponsable").val() == ''){msg.push(' Responsable');}
        
        if ($("#selTipoDocumento").val() == 0){msg.push(' Tipo');}
        if ($("#selStatus").val() == 0){msg.push(' Status');}
        if ($("#selAcceso").val() == 0){msg.push(' Acceso');}
        
        if ($("#iptObservacion").val() == ''){msg.push(' Observacion');}
        if ($("#archivo").val() == ''){msg.push(' Archivo PDF');}
              
        if (msg.length != 10 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");
            return;
        }else if(msg.length == 10){
            
            toastr["error"]("No existen datos para guardar", "!Atención!");
            bloquearInputs();
            return;
        }

        var parametros=new FormData(frmFormulario);
        $.ajax({
            type: "POST",
            url: "ajax/documentacion.ajax.php",
            data: parametros,
            contentType: false, //importante enviar este parametro en false
            processData: false, //importante enviar este parametro en false
            dataType: 'json',

            success: function (data) {
                console.log(data);
                if (data == 'existe'){
                    toastr["error"]("Registro Existe", "!Atención!");
                }else if (data == 'error'){
                    toastr["error"]("Error al guardar", "!Atención!");
                }else{
                    toastr["success"]("Registro Satisfactorio", "!Atención!");
                    table.ajax.reload();
                    limpiar();
                    bloquearInputs();

                    $("#btnClose" ).prop( "hidden", true );
                    $("#btnNew" ).prop( "hidden", false );
                    $("#btnSave" ).prop( "hidden", true );                    
                }
            }
        });
    })    

    $('#tbl_usuarios tbody').on('click','.btnPdf', function(){
        var data = table.row($(this).parents('tr')).data();
        var name_pdf = data['file_name'];

        //window.location = "vistas/pdf.php?name_pdf="+name_pdf;        
        window.top.open("documentacion/"+name_pdf, "_blank");
    })
    
    /*==========================
        Eliminar registro File
      ==========================*/
     $('#tbl_usuarios tbody').on('click','.btnEliminar', function(){
        var data = table.row($(this).parents('tr')).data();
        var au_inc = data['au_inc'];
        var file_name = data['file_name'];

        Swal.fire({
            title: "Eliminar Registro",
            icon: 'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d3',
            confirmButtonText:'Si, deseo Eliminarlo!',
            cancelButtonText:'Cancelar',
        }).then((result) =>{
            if (result.isConfirmed){
                $.ajax({
                        async: false,
                        url:"ajax/documentacion.ajax.php",
                        method: "POST",
                        data: {
                            'accion':2,
                            'au_inc': au_inc,
                            'file_name': file_name
                        },
                        dataType: "json",
                        success: function(respuesta){
                            console.log(respuesta);
                            if (respuesta == 'ok'){
                                toastr["success"]("Eliminación Correcta", "!Atención!");
                                table.ajax.reload();
                            }else{
                                toastr["error"]("No se a podido Eliminar", "!Atención!");
                            }
                            accion="";                    
                        }
                    });                
            }
        }) 
     })

     
     $("#btnClose").click(function() {
        bloquearInputs();
        limpiar();
        $("#btnClose" ).prop( "hidden", true );
        $("#btnNew" ).prop( "hidden", false );
        $("#btnSave" ).prop( "hidden", true );
        accion="";
        $("#selPerfil").val(0);

    })     
    $("#btnNew").click(function() {
        accion=2;
        $("#btnClose" ).prop( "hidden", false );
        $("#btnSave" ).prop( "hidden", false );
        $("#btnNew" ).prop( "hidden", true );
        desBloquearInputs();
        limpiar();
        $("#selPerfil").val(0);
    })
     



});

function desBloquearInputs(){
    $("#iptCodigoDocumento").prop( "disabled", false );
    $("#iptNombreDocumento").prop( "disabled", false );
    $("#iptVersion").prop( "disabled", false );
    $("#iptArea").prop( "disabled", false );
    $("#iptObservacion").prop( "disabled", false );
    $("#selTipoDocumento").prop( "disabled", false );
    $("#selStatus").prop( "disabled", false );
    $("#selAcceso").prop( "disabled", false );
    $("#archivo").prop( "disabled", false );
    $("#iptResponsable").prop( "disabled", false );
    
    $("#iptCodigoDocumento").focus();
}
function bloquearInputs(){
    $("#iptCodigoDocumento").prop( "disabled", true );
    $("#iptNombreDocumento").prop( "disabled", true );
    $("#iptVersion").prop( "disabled", true );
    $("#iptArea").prop( "disabled", true );
    $("#iptObservacion").prop( "disabled", true );
    $("#selTipoDocumento").prop( "disabled", true );
    $("#selStatus").prop( "disabled", true );
    $("#selAcceso").prop( "disabled", true );
    $("#archivo").prop( "disabled", true );
    $("#iptResponsable").prop( "disabled", true );

    $("#iptCodigoDocumento").focus();
}
function limpiar(){

    $("#iptCodigoDocumento").val('');
    $("#iptNombreDocumento").val('');
    $("#iptVersion").val('');
    $("#iptArea").val(0);
    $("#iptObservacion").val('');
    $("#selTipoDocumento").val("");
    $("#selStatus").val(0);
    $("#selAcceso").val(0);
    $("#archivo").val("");
    $("#iptResponsable").val("");

}
</script>