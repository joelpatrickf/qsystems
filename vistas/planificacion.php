<?php 
if(isset($_SESSION)){ }else{ session_start(); }
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
    // print_r($_SESSION['login']);
?>
<style>
    /* table.dataTable.no-footer {border-bottom: 1px solid #ddd;}    */
    
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
                           <h4> Administrar Planificación </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;" hidden> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
                </div>
                <div class="card-body pb-0 pt-1">
                    <div class="row">

                       <!-- Columna AREA -->

                            <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="" for="iptArea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Area de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptArea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled>
                                    </div>                                
                                </div>                                
                            </div>


                       <!-- Columna LINEA -->
                       <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Línea de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptLinea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled>
                                    </div>                                
                                </div>                                
                            </div>                       
                       <!-- Columna PUNTO -->
                       <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptPuntoInspeccion"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="">Punto Inspeccion</span><span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input id="iptPuntoInspeccion" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled>
                                </div>                                
                            </div>                                
                        </div>    
                        
                        <!-- Columna CANTIDAD -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptCantidad"><i class="fas fa-id-card fs-6"></i>
                                    <span class="">Cantidad</span><span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control " id="iptCantidad" name="iptCargo" required disabled>
                            </div>
                        </div>     

                       <!-- Columna FRECUENCIA -->
                       <div class="col-4 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="selFrecuencia"><i class="fas fa-user fs-6"></i>
                                    <span class="">Frecuencia</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selFrecuencia" disabled>
                                    <option value="Diario">Diario</option>
                                    <option value="Semanal ">Semanal </option>
                                    <option value="Quincenal">Quincenal</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Bimestral">Bimestral</option>
                                    <option value="Trimestral">Trimestral</option>
                                    <option value="Quimestral">Quimestral</option>
                                    <option value="Semestral">Semestral</option>
                                    <option value="Anual">Anual</option>
                                </select>
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
                                        <th class="text-center">Cantidad</th> 
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
    // AREAS
    //******************************
    _id_area = null;
    _id_linea = null;
    _punto_inspeccion = null;
    _id_planificacion = null;


    $.ajax({
        async: false,
        url:"../ajax/zonificacion.ajax.php",
        method: "POST",
        data: {
            'accion':6,
        },
        dataType: "json",
        success: function(respuesta){

            $("#iptArea").bind( "keydown", function( event ) {
            }).autocomplete({
                source: respuesta,
                minLength: 1,
                select: function(event, ui) {
                    console.log(ui);
                    _id_area=ui.item.id_area;
                    console.log(_id_area);
                    
                    // buscamos la linea
                    $.ajax({
                    async: false,
                    url:"../ajax/zonificacion.ajax.php",
                    method: "POST",
                    data: {
                        'accion':6_1,
                        'id_area':_id_area
                    },
                    dataType: "json",
                    success: function(respuesta){

                        $("#iptLinea").bind( "keydown", function( event ) {
                        }).autocomplete({
                            source: respuesta,
                            minLength: 1,
                            select: function(event, ui) {
                                console.log(ui);
                                _id_linea=ui.item.id_linea;
                                   
                                
                                // buscamos PUNTO DE Inspeccion
                                    $.ajax({
                                    async: false,
                                    url:"../ajax/zonificacion.ajax.php",
                                    method: "POST",
                                    data: {
                                        'accion':6_2,
                                        'id_linea':_id_linea
                                    },
                                    dataType: "json",
                                    success: function(respuesta){
                                        console.log(respuesta);
                                        $("#iptPuntoInspeccion").bind( "keydown", function( event ) {
                                        }).autocomplete({
                                            source: respuesta,
                                            minLength: 1,
                                            select: function(event, ui) {
                                                console.log(ui);
                                                _punto_inspeccion=ui.item.value;
                                                // alert(id_linea);

                                            }
                                        })

                                    }
                                });                                

                            }
                        })

                    }
                }); 

                }
            })

        }
    }); 
    


    // $("#iptArea").change(function() {
        
    // }); 
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
            {"data":"cantidad"},
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
            // {targets:8,visible:false},
            {targets:9,visible:false},

            { responsivePriority: 6, targets: 1 },
            { responsivePriority: 5, targets: 2 },
            { responsivePriority: 400, targets: 5 },
            { responsivePriority: 3, targets: 6 },
            { responsivePriority: 200, targets: 7 },
            { responsivePriority: 1, targets: 11 },
            {
                targets:11,
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
        desBloquearInputs();
        var data = table.row($(this).parents('tr')).data();
        console.log(data);

        $("#iptArea").val(data['area'])
        $("#iptLinea").val(data['linea'])
        $("#iptPuntoInspeccion").val(data['punto_inspeccion'])
        $("#iptCantidad").val(data['cantidad'])
        $("#selFrecuencia").val(data['frecuencia'])

        _id_area = data['id_area'];
        _id_linea = data['id_linea'];
        _id_planificacion = data['id_planificacion'];
        

        $("#btnClose" ).prop( "hidden", false );
        $("#btnSave" ).prop( "hidden", false );
        $("#btnNew" ).prop( "hidden", true );

     })
    
     $('#tbl_usuarios tbody').on('click','.btnEliminar', function(){
        var data = table.row($(this).parents('tr')).data();
        varUsuarioEliminar = data[1];
        $.ajax({
                async: false,
                url:"../ajax/planificacion.ajax.php",
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

     

     
    //********************************************************    
    //-GUARDAR 
    //********************************************************    
    $("#btnSave").click(function() {
        
        const msg = [];
        if ($("#iptArea").val() == ''){msg.push(' Area');}
        if ($("#iptLinea").val() == ''){msg.push(' Linea');}
        if ($("#iptPuntoInspeccion").val() == ''){msg.push(' Punto de Inspeccion');}
        if ($("#iptCantidad").val() == ''){msg.push(' Cantidad');}
              
        if (msg.length != 4 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");
            return;
        }else if(msg.length == 4){
            
            toastr["error"]("No existen datos para guardar", "!Atención!");
            bloquearInputs();
            return;
        }
        
        $.ajax({
                async: false,
                url:"../ajax/planificacion.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'id_area': _id_area,
                    'id_linea': _id_linea,
                    'punto_inspeccion': $("#iptPuntoInspeccion").val(),
                    'cantidad': $("#iptCantidad").val(),
                    'frecuencia': $("#selFrecuencia").val(),
                    'id_planificacion': _id_planificacion
                    
                },
                dataType: "json",
                success: function(respuesta){
                    console.log(respuesta);
                    if (respuesta == 'ok'){
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        limpiar();
                        bloquearInputs();

                        table.ajax.reload();
                    }else if (respuesta == 'existe'){
                        toastr["error"]("Ingreso Incorrecto, entrada ya existe", "!Atención!");
                        return;
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                        return;
                    }
                    bloquearInputs();
                    limpiar();
                    $("#btnClose" ).prop( "hidden", true );
                    $("#btnSave" ).prop( "hidden", true );
                    $("#btnNew" ).prop( "hidden", false );
                    accion="";
                }
            });
    });
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

}); // FINAL document READY

function desBloquearInputs(){
    $("#iptArea").prop("disabled", false);
    $("#iptLinea").prop("disabled", false);
    $("#iptPuntoInspeccion").prop("disabled", false);
    $("#iptCantidad").prop("disabled", false);
    $("#selFrecuencia").prop("disabled", false);
    $("#iptArea").focus();

    
    $("#iptUsuario").focus();
}
function bloquearInputs(){
    $("#iptArea").prop("disabled", true);
    $("#iptLinea").prop("disabled", true);
    $("#iptPuntoInspeccion").prop("disabled", true);
    $("#iptCantidad").prop("disabled", true);
    $("#selFrecuencia").prop("disabled", true);
}
function limpiar(){
    $("#iptArea").val("");
    $("#iptLinea").val("");
    $("#iptPuntoInspeccion").val("");
    $("#iptCantidad").val("");
}
</script>