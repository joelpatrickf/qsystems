<?php 
if(isset($_SESSION)){ }else{ session_start(); }
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
    // print_r($_SESSION['login']);
?>
<style>
    /* table.dataTable.no-footer {border-bottom: 1px solid #ddd;}    */
    
    .paging_full_numbers {width: 100%;}    


    .ui-widget {
        font-size: 0.7em;
    }    
    .p-codigo, .p-tipo_producto {
    	color: white;
    	border-radius: 2px;
    	padding: 0.2em;
    }
    .ui-autocomplete .p-codigo {
        /* float: left; */
        font-size: smaller;
        background: #16a765;
        font-size: 10px!important;
    }
    .ui-autocomplete .p-nombre {
        margin-left: 0.5em;
        background-color: red!important;
    }
    .ui-autocomplete .p-tipo_producto {
        margin-left: 0.5em;
        float: right;
        font-size: smaller;
        background: #428bca;
    }
    .ui-title{
        background-color:#ccc;
        height: 2em;
        font-size: smaller;
        font-weight: bold;
        border-radius: 2px;
        padding-top: 0.4em;
    }
    .ui-title .h-codigo{
        padding-left: 0.7em; 
    }
    .ui-title .h-nombre {
    	margin-left: 1em;
    }
    .ui-title .h-tipo_producto {
    	margin-right: 0.6em;
        float: right;
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
                           <h4> Administrar Planificación </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
                </div>
                <div class="card-body pb-0 pt-1">
                    <div class="row">

                       <!-- Columna AREA -->

                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptArea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Area de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptArea" type="text" style="width:20px;" class="form-control" autocomplete="off" >
                                    </div>                                
                                </div>                                
                            </div>

                       <!-- <div class="col-4 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="selArea"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Area</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selArea" disabled>
                                    <option value="0">Seleccione Area</option>
                                </select>
                            </div>
                        </div>   -->

                       <!-- Columna LINEA -->
                       <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Línea de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptLinea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled >
                                    </div>                                
                                </div>                                
                            </div>                       
                       <!-- <div class="col-4 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="selLinea"><i class="fas fa-user fs-6"></i>
                                    <span class="">Linea</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selLinea" disabled>
                                    <option value="0">Seleccione Linea</option>
                                </select>
                            </div>
                        </div>   -->

                       <!-- Columna PUNTO -->
                        <div class="col-4 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="selPuntoInspeccion"><i class="fas fa-user fs-6"></i>
                                    <span class="">Punto Inspección</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selPuntoInspeccion" disabled>
                                    <option value="0">Seleccione Punto</option>
                                </select>
                            </div>
                        </div>  
                        
                        <!-- Columna FRECUENCIA -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptFrecuencia"><i class="fas fa-id-card fs-6"></i>
                                    <span class="">Frecuencia</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptFrecuencia"
                                    name="iptCargo" required disabled>
                            </div>
                        </div>                                              
                    </div> <!-- ROW -->
                </div>  <!-- END div 1º card body -->
            
                
                <div class="card-body pb-0 pt-0">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">id_Area</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center">id_Linea</th>
                                        <th class="text-center">Linea</th>
                                        <th class="text-center">Punto Inspección</th> 
                                        <th class="text-center">Frecuencia</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Usuario</th>
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

   //******************************
    // AREAS/LINEAS
    //******************************
    id_area = null;
    id_linea = null;

    $.ajax({
        async: false,
        url:"../ajax/zonificacion.ajax.php",
        method: "POST",
        data: {
            'accion':5,
            'filtro': 'area',
            'dato': null
        },
        dataType: "json",
        success: function(respuesta){
             console.log("autocomplete AREA/linea/punto ",respuesta);
            
            var i = 0;
            $("#iptArea").bind( "keydown", function( event ) {
                i = 0;
            }).autocomplete({
                //source: "../../funciones/funciones_ajax.php",
                source: respuesta,
                minLength: 1,
                select: function(event, ui) {
                $("#producto").val(ui.item.value);
                console.log(ui);
                //$("#costo").val(ui.item.costo);
                //$("#producto_id").val(ui.item.producto_id);
                //$("#cantidad").val("");
                //$("#cantidad").focus();
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                var elemento = $("<a></a>");
                $("<span class='p-codigo'></span>").text(item.area).appendTo(elemento);
                $("<span class='p-nombre'></span>").text(item.linea).appendTo(elemento);
                $("<span class='p-tipo_producto'></span>").text(item.linea).appendTo(elemento);
                // (i > 0)? '' : ul.prepend('<li class="ui-title" role="presentation"><span class="h-codigo">Codigo</span><span class="h-nombre">Nombre del producto</span><span class="h-tipo_producto">Categoria</span></li>'); 
                i++;
                return $("<li></li>").append(elemento).appendTo(ul);
            };
        }
    }); 
    


    //********************************************************    
    //-CARGA DE PLANIFICACIONES EXISTENTES
    //********************************************************    

    table = $("#tbl_usuarios").DataTable({
        select: true,
        info: false,
        ordering: false,
        responsive:true,
        // pagingType: 'simple_numbers',
        
        //paging: false,            
        dom: 'Bfrtilp',
        buttons: ['excel', 'print','pdf'],

        ajax:{
            url:"../ajax/planificacion.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 1}, // 1 para listar productos
        },
        columns: [
            {"data":"vacio"},
            {"data":"id_planificacion"},
            {"data":"id_area"},
            {"data":"area"},
            {"data":"id_linea"},
            {"data":"linea"},
            {"data":"punto_inspeccion"},
            {"data":"frecuencia"},
            {"data":"fecha"},
            {"data":"usuario"},
            {"data":"vacio"}
           ],        
        // responsive: { details: {type: 'column'}},
        columnDefs:[

        {"className": "dt-center", "targets": "_all"},
        {targets:0,orderable:false,className:'control'},
            // {targets:0,visible:false},
            {targets:2,visible:false},
            {targets:4,visible:false},
            {targets:8,visible:false},
            {targets:9,visible:false},

            { responsivePriority: 6, targets: 1 },
            { responsivePriority: 5, targets: 2 },
            { responsivePriority: 400, targets: 5 },
            { responsivePriority: 3, targets: 6 },
            { responsivePriority: 200, targets: 7 },
            { responsivePriority: 1, targets: 10 },
            {
                targets:10,
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
        language: 
        {
            url: "json/idioma.json"
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
                url:"../ajax/usuarios.ajax.php",
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
                url:"../ajax/usuarios.ajax.php",
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