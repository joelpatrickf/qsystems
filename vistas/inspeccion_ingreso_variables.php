<?php 
if(isset($_SESSION)){ }else{ session_start(); }
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
    $SoloFechaActual = date('Y-m-d');     
    // print_r($_SESSION['login']);
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    .paging_full_numbers {width: 100%;}    
   
    table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: center;
    }


    .ui-datatable tbody td {
        white-space: normal;
    }    
    colgroup {
        display: none!important;
    }
      
    .card-body {
        padding: 0rem;
    }    

    table.dataTable tbody th, table.dataTable tbody td {
        padding: 8px 10px;
    }    

    div.dt-container .dt-paging .dt-paging-button {
        padding: 0px;
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
                           <h4> Inspección Administrar Ingresos de variables </h4>
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

                        <!-- Columna fecha -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptFecha"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Fecha</span><span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="iptFecha"
                                    placeholder="Ingrese el Usuario"  required disabled value="<?php echo $SoloFechaActual ?>">
                            </div>
                        </div>

                        <!-- Columna Variable a Inspeccionar -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptVariables"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Variable</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptVariables"
                                 placeholder="Ingrese las Variables" required disabled>                               
                            </div>
                        </div>

                        <!-- Columna numero de muestras -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptNumeroMuestras"><i class="fas fa-id-card fs-6"></i>
                                    <span class="small">No. Muestras x Inspección</span><span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control " id="iptNumeroMuestras"
                                 placeholder="Número de muestras x Inspección" required disabled>
                            </div>
                        </div>


                    </div> <!-- ROW -->
                </div>  <!-- END div 1º card body -->
            
                
                <div class="card-body pb-0 pt-0">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow " width="100%"> -->
                            <table id="tbl_usuarios"  class="table table-striped cell-border" style="width:100%">

                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center">11</th> <!-- 1 -->
                                        <th class="text-center">id</th> <!-- 2 -->
                                        <th class="text-center">Fecha</th> <!-- 5 -->
                                        <th class="text-center">Variable</th> <!-- 5 -->
                                        <th class="text-center">Numero</th> <!-- 4 -->
                                        <th class="text-center">Usuario</th> <!-- 6 -->
                                        <!-- <th class="text-center">Opciones</th> -->
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
      


<script type="text/javascript">
var accion = 2;
$(document).ready(function(){
    // Personalizamos el toast mensajes
    // toastr.options.timeOut = 1500; // 1.5s
    // toastr.options.closeButton = true;
    //********************************************************    
    //-CARGA DE USUARIOS EXISTENTES
    //********************************************************    

        table = $("#tbl_usuarios").DataTable({
            select: true,
            info: false,
            ordering: false,
            // responsive:true,
            //paging: false,            

            ajax:{
                url:"../ajax/inspeccion.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {'accion' : 1}, // 1 para listar 
            },
            columns: [
            { "data": "vacio" },
            { "data": "id_ins_var" },
            { "data": "fecha" },
            { "data": "variable" },
            { "data": "nmuestras" },
            { "data": "usuario" },
           ],             
         
            // responsive: {
            //     details: {
            //         type: 'column'
            //     }
            // },

            columnDefs:[
                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},
                // {targets:0,visible:false,},
                // {targets:2,visible:false,},
                
                // { responsivePriority: 1, targets: 9 },
                
                // {
                //     targets:9,
                //     orderable:false,
                //     render: function(data, type, full, meta){
                //         return "<center>"+
                //                       "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+
                //                         "<i class='fas fa-pencil-alt fs-5'></i>"+
                //                     "</span>"+
                //                     "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>"+
                //                         "<i class='fas fa-trash fs-5'></i>"+
                //                     "</span>"+                                    

                //                 "</center>"
                //     }

                // }     


            ],
            pageLength: 10,

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

        if ($("#iptVariables").val() == ''){msg.push(' Variables');}
        if ($("#iptNumeroMuestras").val() == ''){msg.push(' Numero de Muestras a Inspeccionar');}

        //toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");

        if (msg.length != 2 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");
            return;
        }else if(msg.length == 2){
            
            toastr["error"]("No existen datos para guardar", "!Atención!");
            bloquearInputs();
            return;
        }



        $.ajax({
                async: false,
                url:"../ajax/inspeccion.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'fecha': $("#iptFecha").val(),
                    'variables': $("#iptVariables").val(),
                    'numero_muestras': $("#iptNumeroMuestras").val(),
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("ingreso variables  ",respuesta);
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

    $("#iptFecha").prop( "disabled", false );
    $("#iptVariables").prop( "disabled", false );
    $("#iptNumeroMuestras").prop( "disabled", false );
    $("#iptVariables").focus();
}
function bloquearInputs(){
    $("#iptFecha").prop( "disabled", true );
    $("#iptVariables").prop( "disabled", true );
    $("#iptNumeroMuestras").prop( "disabled", true );
    $("#iptVariables").focus();
}
function limpiar(){
    $("#iptVariables").val('');
    $("#iptNumeroMuestras").val("");
}
</script>