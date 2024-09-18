<?php 
if(isset($_SESSION)){ }else{ session_start(); }
	//include("includes/header.php"); 
	//include("../middleware/adminMiddleware.php");
    //require_once "../modelos/normativas.ajax.php"; 
    date_default_timezone_set("America/Guayaquil");
    $fechaActual = date('Y-m-d H:i:s', time()); 
    $SoloFechaActual = date('Y-m-d'); 
    $usuario=$_SESSION['login'][0]->usuario;    
?>
<style>
    /* Hace multilineas */
    table.dataTable > tbody > tr > td {
        white-space: normal!important;
    }
    colgroup {
        display: none!important;
    }    
    .table-responsive {
        display: inline-table!important;
    }

    .boldSpan {
        font-weight:bold;
        color:#2E2C40;
    }

    .Span1 {
        font-size: small;
        padding-right: 20px;
    }        
    
    table.dataTable tbody th, table.dataTable tbody td {
        padding: 8px 10px;
    }    
    

div.dt-container .dt-paging .dt-paging-button {
    padding: 0px;
}    


/*     
.card-body {
    padding: 0rem;
}    

.modalCajas {
        height: calc(1.5em + .75rem + 2px) !important;
    }     */
</style>
 

<!-- <link rel="stylesheet" href="css/tablaNormal.css"/> -->


	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
					       <h4> Visualizacion de Resultados </h4>
                        </div>
                        <div class="col-6 text-" >
                            <!-- <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button> -->

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0" style="height: 500px ">

                    <div class="row">
                        <div class="col-sm-12 " >
                            <div class="row ">
                                <div class="col-12 mt-1"  >
                                    
                                        <div class="col-12" >
                                            <label class="" for="iptLote"><i class="fas fa-barcode fs-6"></i>
                                                    <span class="">Muestra</span><span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="iptLote" value="N/A" placeholder="# Orden"style="max-width:120px;display:inline-block"/>
                                            <button type="submit" id="btnBuscar" class="btn btn-secondary px-0 py-0" style="margin-left:-1px; width: 40px; height: 23px; margin: 0px 0px 0px 0px;">+</button>
                                        </div>
                                    
                                </div>

                            </div>
                            <div class="row " id="div_datosOrden" hidden>
                                <div class="col-12 mt-1"  >
                                    
                                        <div class="col-12" >
                                            <div class="form-group">
                                                <span class="boldSpan">Orden:</span><span class="Span1" id="spnOrden"></span>
                                                <span class="boldSpan">Fecha:</span><span class="Span1" id="spnFecha_Creacion"></span>
                                                <span class="boldSpan">Id item:</span><span class="Span1" id="spnId_item"></span>
                                                <span class="boldSpan">Producto:</span><span class="Span1" id="spnProducto"></span>
                                                <span class="boldSpan">Normativa:</span><span class="Span1" id="spnNormativa"></span>
                                                <span class="boldSpan">Categoria:</span><span class="Span1" id="spnCategoria"></span>
                                                <span class="boldSpan">Planta:</span><span class="Span1" id="spnPlanta"></span>
                                                <span class="boldSpan">Ubicacion:</span><span class="Span1" id="spnUbicacion"></span>
                                                <span class="boldSpan">Proveedor:</span><span class="Span1" id="spnRazon_Social"></span>
                                                <span class="boldSpan">Turno:</span><span class="Span1" id="spnTurno"></span>
                                                <span class="boldSpan">Muestra:</span><span class="Span1" id="spnMuestra"></span>
                                                <span class="boldSpan">Lote:</span><span class="Span1" id="spnLote"></span>
                                            </div>
                                        </div>
                                    
                                </div>

                            </div>                            

                            <div class="col-lg-12" id="div_tbl_resultados" hidden >
                                <table id="tbl_resultados"  class="table table-striped table-responsive cell-border"  width="100%">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Id_nor</th>
                                            <th class="text-center">Id_res</th>
                                            <th class="text-center">OT</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Analisis</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Normativa</th>
                                            <th class="text-center">Lote</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Usuario</th>
                                            <th class="text-center">Resultado</th>
                                            <th class="text-center">Validacion</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Observacion</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-small">
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
			    </div> <!-- END div 1º card body -->
                    

            </div>  <!-- END card -->
		</div>
	</div>

    <!-- INI Modal cambio de estado-->
    <div class="modal fade bd-example-modal-sm" id="ModalEstado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cambio de Estado / Revision</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="iptNuevoResultado" class="col-form-label">Resultado:</label>
                        <input type="text" class="form-control modalCajas" id="iptNuevoResultado" autocomplete="off">
                    </div>
                    
                    <select class="form-control form-select mb-3 modalCajas" aria-label=".form-select example" id="selCambioValidacion" >
                        <option value="0" >Seleccionar Validacion</option>
                        <option value="Pendiente">CUMPLE</option>
                        <option value="Registrado">NO CUMPLE</option>
                    </select>
                    <select class="form-control form-select modalCajas" aria-label=".form-select example" id="selCambioEstado" >
                        <option value="0" >Seleccionar Estado</option>
                    </select>
                    <div class="form-group">
                        <label for="iptEstadoObservacion" class="col-form-label">Observacion:</label>
                        <input type="text" class="form-control modalCajas" id="iptEstadoObservacion" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrarModalCambioEstado" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnGuardarCambioEstado"class="btn btn-primary">Save changes</button>
                </div>
        </div>
      </div>
    </div>
    <!-- FIN Modal cambio de estado-->
    
    <!-- CARGAMOS VARIABLES JS -->
<!-- <script src="js/variables.js"></script> -->

<script type="text/javascript">
     var accion = '';
     var lote = '';
     


$(document).ready(function(){
    var nResultados = '';
    var valResultadoAnterior = '';
    var table;
 
    
    //******************//
    //--BUSCAR LOTE -//
    //******************//
    $("#btnBuscar").click(function(e) {
        e.preventDefault();
        
                    
        $("#div_tbl_resultados" ).prop( "hidden", false );
        $("#div_datosOrden" ).prop( "hidden", false );
                    

        $.ajax({ //----BUSCAR ORDEN TRABAJO
            url:"ajax/orden_trabajo.ajax.php",
            type: "POST",
            data: {
                'accion': 6,
                'orden_lote': $("#iptLote").val()
            },
            dataType: 'json',
            success: function(respuesta){
                console.log("busqueda de orden ",respuesta);

                if (respuesta.length == 1){
                    
                    $("#tbl_Analisis" ).prop( "hidden", false );

                    $("#spnOrden").html(respuesta[0]['orden_trabajo']);
                    $("#spnFecha_Creacion").html(respuesta[0]['fecha_muestreo']);
                    $("#spnId_item").html(respuesta[0]['id_item']);
                    $("#spnProducto").html(respuesta[0]['nombre_producto']);
                    $("#spnNormativa").html(respuesta[0]['normativa']);
                    $("#spnCategoria").html(respuesta[0]['categoria']);
                    $("#spnPlanta").html(respuesta[0]['planta']);
                    $("#spnUbicacion").html(respuesta[0]['ubicacion']);
                    $("#spnRazon_Social").html(respuesta[0]['razon_social']);
                    $("#spnTurno").html(respuesta[0]['turno']);
                    $("#spnMuestra").html(respuesta[0]['numero_muestra']);
                    $("#spnLote").html(respuesta[0]['lote']);


                    // BUSCAMOS PARA LA TABLA
                    table = $("#tbl_resultados").DataTable({
                        // bDestroy: true,
                        destroy: true,
                        bAutoWidth: true,

                        info: false,
                        ordering: false,
                        paging: false,
                        searching: false,
                        // responsive:true,                        
                        ajax:{
                            url:"ajax/resultados_visualizacion.ajax.php",
                            dataSrc: '',
                            type:"POST",            
                            data: {
                                'accion': 2,
                                'lote': $("#iptLote").val()
                            },
                        },
                        columns: [
                            { "data": "vacio" }, // campo oculto para el resposive
                            { "data": "id_normativa_analisis" },
                            { "data": "id_resultados" },
                            { "data": "orden_trabajo" },
                            { "data": "tipo_analisis" },
                            { "data": "analisis" },
                            { "data": "categoria" },
                            { "data": "normativa" },
                            { "data": "lote" },
                            { "data": "fecha_creacion" },
                            { "data": "usuario_creacion" },
                            { "data": "resultado" },
                            { "data": "validacion" },
                            { "data": "estado" },
                            { "data": "observacion" },
                            { "data": "vacio" }, // campo para el action
                        ],              

                        responsive: {
                            details: {
                                type: 'column'
                            }
                        },
                        columnDefs:[

                            {"className": "dt-center", "targets": "_all"},
                            {targets:0,orderable:false,className:'control'},

                            // {targets:0,visible:false},
                            {targets:1,visible:false},
                            {targets:2,visible:false},
                            {targets:3,visible:false},
                            {targets:4,visible:false},

                            { responsivePriority: 1, targets: 13 },
                            { responsivePriority: 1, targets: 15 },

                            // {
                            //     targets: 1,
                            //     render: function (data, type, row) {
                            //         if (type === 'display') {
                            //         return data.replace(/,/g, '<br>');
                            //         }
                            //         if (type === 'export') {
                            //         return data;
                            //         }
                            //         return data;
                            //     }
                            //},                            
                            {
                                targets:15,
                                orderable:false,
                                render: function(data, type, full, meta){
                                    return "<center>"+
                                                    "<span class='btnNewAnalisis text-primary px-1' style='cursor:pointer;'>"+
                                                    "<i class='fas fa-pencil-alt fs-5'></i>"+
                                                "</span>"                                    

                                            "</center>"
                                }
                            },
                        ],
                        pageLength: 10,
                       rowCallback:function(row,data){
                           //console.log(data['estado']);
                               if ((data['estado'] == "Rechazado") || (data['estado'] == "Cuarentena") || (data['estado'] == "Recall") || (data['estado'] == "Producto Retirado")) {
                                   $($(row).find("td")[9]).css("background-color","#ECBFB6 ");
                               } else if ((data['estado'] == "Liberado") || (data['estado'] == "Liberado reproceso") || (data['estado'] == "Liberado reacondicionado") ) {
                                   $($(row).find("td")[9]).css("background-color","#DAF7A6");
                                   } else if ((data['estado'] == "Retenido") || (data['estado'] == "En espera de análisis") || (data['estado'] == "En proceso de retiro") || (data['estado'] == "En Espera de Revisión de Calidad") ) {
                                   $($(row).find("td")[9]).css("background-color","#FFEA8E");
                               }

                       },
                            
                    });  
                }else{
                    toastr["error"]("No existe Orden de Trabajo", "!Atención!");
                }
            } // end success
        });  // ajax principal

                           
                    
                    
                   

    }); // boton buscar
   

    //****************************
    //-GUARDAR NUEVOS RESULTADoS 
    //****************************
    $("#btnGuardarCambioEstado").click(function() {

        var selCambioValidacion = document.getElementById("selCambioValidacion");
        var selCambioValidacion = selCambioValidacion.options[selCambioValidacion.selectedIndex].text;

        var selCambioEstado = document.getElementById("selCambioEstado");
        var selCambioEstado = selCambioEstado.options[selCambioEstado.selectedIndex].text;        

        var observacion = "Resulado Anterior: "+valResultadoAnterior+"    Observacion:  " +$("#iptEstadoObservacion").val();


        $.ajax({
                async: false,
                url:"ajax/resultados_visualizacion.ajax.php",
                method: "POST",
                data: {
                    'accion':3, // GUARDAR
                    'validacion': selCambioValidacion,
                    'estado': selCambioEstado,
                    'nuevo_resultado': $("#iptNuevoResultado").val(),
                    'observacion': observacion,
                    'nResultados' : nResultados,
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("guardar Cambios resultados ",respuesta);
                    if (respuesta == 'ok'){
                        $("#ModalEstado").modal("hide");
                        
                        //Reiniciamos
                        $("#iptEstadoObservacion").val("");
                        $("#iptNuevoResultado").val("");
                        $("#selCambioValidacion").val(0);
                        $("#selCambioEstado").val(0);                                                
                        toastr["success"]("Registro Guardado", "!Atención!");
                        table.ajax.reload();
                        return false;
                    }else{
                        toastr["error"]("Error al guradar", "!Atención!");

                        return false;
                    }

                }
            });
    });

    // Enfocar 1 input de modal    
    $('#ModalEstado').on('shown.bs.modal', function() {
        $('#iptNuevoResultado').focus();
    })
   $("#btnCerrarModalCambioEstado").click(function() {

        //Reiniciamos
        $("#iptEstadoObservacion").val("");
        $("#iptNuevoResultado").val("");
        $("#selCambioValidacion").val(0);
        $("#selCambioEstado").val(0);
    });


    //******************//
    //--BOTON NUEVO ANALISIS -//
    //******************//

    $('#tbl_resultados tbody').on('click','.btnNewAnalisis', function(){
        $('#ModalEstado').modal({backdrop: 'static', keyboard: false}) // no deja cerrar el modal
        $("#ModalEstado").modal("show");
        

		$.getJSON('vistas/json/estados.json', function(data) {
			$.each(data, function(key, value) {
				$("#selCambioEstado").append('<option name="' + key + '">' + value + '</option>');
			}); // close each()
		}); // close getJSON()


        var data = table.row($(this).parents('tr')).data();
        nResultados = data['id_resultados'];
        valResultadoAnterior = data['resultado'];

        
        // var table1 = $('#tbl_resultados').DataTable();
        // var data = table1.row($(this).parents('tr')).data();

        // $('#div_resultados').removeAttr('hidden');
        //---------------------------------------
        // var data = table2.row($(this).parents('tr')).data();
        
        // // colorea la linea seleccionada
        // var idx = table2.row($(this).parents('tr')).index();
        // var x = document.getElementById("tbl_Analisis").getElementsByTagName("tr");
        // x[idx+1].style.backgroundColor = "#E1B3A2";         
        

        // varAnalisis = data['analisis'];
        // varCategoria = data['categoria'];
        // varIdNormativa = data['id_normativa'];
        
        // varLimiteMax = data['limite_max'];
        // varLimiteMin = data['limite_min'];
        
        // varNormativa = data['normativa'];
        // varOrdenTrabajo = data['orden_trabajo'];
        // varTipoAnalisis = data['tipo_analisis'];
        // varUnidadMedida = data['unidad_medida'];
        

        // validarMin = validarTexto(varLimiteMin);
        // validarMax = validarTexto(varLimiteMax);
        
        // if ((validarMin == "TEXTO") && validarMax == "TEXTO"){
            
        //     $("#selResultados" ).prop( "hidden", false );
        //     $("#iptResultados" ).prop( "hidden", true );

        //     const arrUM = varUnidadMedida.split("/");
        //     //var options = '<option selected value="0">Seleccione</option>';
        //     var options = '';
        //     for (let index = 0; index < arrUM.length;index++){
        //         options = options + '<option value='+arrUM[index]+'>'+arrUM[index]+'</option>';
        //     }
        //     $("#selResultados").html(options);
        // }else{
            
        //     $("#selResultados" ).prop( "hidden", true );
        //     $("#iptResultados" ).prop( "hidden", false );
        //     $("#iptResultados").focus();
        // }
        // $("#iptResultados").val("");



     })

});



</script>