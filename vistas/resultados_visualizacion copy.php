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

    .boldSpan {
        font-weight:bold;
        /* font-size: x-small; */
        color:#2E2C40;
    }

    .Span1 {
        font-size: x-small;
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
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>

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
                                                    <span class="">Lote</span><span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="iptLote" value="302" placeholder="# Orden"style="max-width:120px;display:inline-block"/>
                                            <button type="submit" id="btnBuscar" class="btn btn-secondary px-0 py-0" style="margin-left:-1px; width: 40px; height: 23px; margin: 0px 0px 0px 0px;">+</button>
                                        </div>
                                    
                                </div>

                            </div>

                            <div class="col-lg-12" id="div_tbl_resultados" hidden >
                                <table id="tbl_resultados"  class="table table-striped table-responsive-xl" style="width:100%">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th ></th>
                                            <th class="text-center">Analisis</th>
                                            <th class="text-center">categoria</th>
                                            <th class="text-center">estado</th>
                                            <th class="text-center">fecha_creacion</th>
                                            <th class="text-center">id_normativa_analisis</th>
                                            <th class="text-center">id_resultados</th>
                                            <th class="text-center">lote</th>
                                            <th class="text-center">normativa</th>
                                            <th class="text-center">orden_trabajo</th>
                                            <th class="text-center">resultado</th>
                                            <th class="text-center">tipo_analisis</th>
                                            <th class="text-center">usuario_creacion</th>
                                            <th class="text-center">validacion</th>
                                            <!-- <th class="text-center">Action</th> -->
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




<script type="text/javascript">
     var accion = '';
     var lote = '';


$(document).ready(function(){
//     // Personalizamos el toast mensajes
//     toastr.options.timeOut = 1500; // 1.5s
//     toastr.options.closeButton = true;
//     var resSelResultado = '';

//     $("#iptResultados" ).prop( "hidden", true );
//     $("#selResultados" ).prop( "hidden", true );
//     //********************************************************    
//     //-CARGA DE RESULTADOS EXISTENTES PARA EL USUARIO INGRESADO
//     //********************************************************    
     

//     table = $("#tbl_resultados").DataTable({
//                         "bDestroy": true,
//                          info: false,
//                          ordering: false,
//                         // paging: false,
//                         searching: false,
                        
//         // pagingType: 'simple_numbers',
        
//         //paging: false,            
//         dom: 'Bfrtilp',
//         buttons: ['excel', 'print','pdf'],

//         ajax:{
//             url:"../ajax/resultados.ajax.php",
//             dataSrc: '',
//             type:"POST",            
//             data: {'accion' : 1}, // 1 para listar productos
//         },

//         columns: [
//             { "data": "id_resultados" },
//             { "data": "orden_trabajo" },
//             { "data": "id_normativa_analisis" },
//             { "data": "fecha_creacion" },
//             { "data": "usuario_creacion" },
//             { "data": "normativa" },
//             { "data": "categoria" },
//             { "data": "tipo_analisis" },
//             { "data": "analisis" },
//             { "data": "resultado" },
//             { "data": "validacion" },
//             { "data": "estado" }
//            ],        
//         responsive: {
//             details: {
//                 type: 'column'
//             }
//         },
//         columnDefs:[

//             {targets:0,orderable:false,className:'control'},
//             {"className": "dt-center", "targets": "_all"},
//             {targets:0,visible:false},
//             {targets:1,visible:false},
//             {targets:2,visible:false},
//             {targets:4,visible:false}, //usario
//             // {targets: [3,9], className: "text-center",width: "4%"},
//             // {targets:[0,1,2,5,6],visible:false},

//             { responsivePriority: 1, targets: 12 },
//             {
//                 targets:12,
//                 orderable:false,
//                 render: function(data, type, full, meta){
//                     return "<center>"+
//                                     "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+
//                                     "<i class='fas fa-pencil-alt fs-5'></i>"+
//                                 "</span>"                                    

//                             "</center>"
//                 }
//             }     
//         ],
//         pageLength: 10,
//         language: {
//             "lengthMenu": "",
//             "zeroRecords": "No se encontraron resultados",
//             "info": "",
//             "infoEmpty": "",
//             "infoFiltered": "",
//             "sSearch": "Buscar:",
//             "oPaginate": {
//                 "sFirst": "<<",
//                 "sLast":">>",
//                 "sNext":">",
//                 "sPrevious": "< "
//                 },
//                 "sProcessing":"Procesando...",
//         }, 
//         rowCallback:function(row,data){
//                 if(data[11] != "RETENIDO"){
//                     $($(row).find("td")[7]).css("background-color","#FAF421");
//                 }else if(data[11] != "LIBERADO"){
//                     $($(row).find("td")[7]).css("background-color","#5FFA21");
//                 }else if(data[11] != "CUARENTENA"){
//                     $($(row).find("td")[7]).css("background-color","#FF5733");
//                 }

//         },
//     });

 
    
    //******************//
    //--BUSCAR LOTE -//
    //******************//
    $("#btnBuscar").click(function() {
        
        
        $.ajax({ //----BUSCAR 
            url:"../ajax/resultados_visualizacion.ajax.php",
            type: "POST",
            data: {
                'accion': 2,
                'lote': $("#iptLote").val()
            },
            dataType: 'json',
            success: function(respuesta){
                console.log("lote",respuesta);
                if (respuesta.length == 1){
                    
                    $("#div_tbl_resultados" ).prop( "hidden", false );


                    // BUSCAMOS 
                    table = $("#tbl_resultados").DataTable({
                        "bDestroy": true,
                        info: false,
                        ordering: false,
                        paging: false,
                        searching: false,
                        // responsive:true,
                        ajax:{
                            url:"../ajax/normativas.ajax.php",
                            dataSrc: '',
                            type:"POST",            
                            data: {
                                'accion':2,
                                'lote': $("#iptOrdenTrabajo").val(),
                            }, // 1 para listar productos
                        },
                        columns: [
                            { "data": "analisis" },
                            { "data": "categoria" },
                            { "data": "estado" },
                            { "data": "fecha_creacion" },
                            { "data": "id_normativa_analisis" },
                            { "data": "id_resultados" },
                            { "data": "lote" },
                            { "data": "normativa" },
                            { "data": "orden_trabajo" },
                            { "data": "resultado" },
                            { "data": "tipo_analisis" },
                            { "data": "usuario_creacion" },
                            { "data": "validacion" }
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
                            // {targets:1,visible:false},
                            // {targets:2,visible:false},
                            // {targets:3,visible:false},

                            // { responsivePriority: 1, targets: 0 },

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
                            // {
                            //     targets:14,
                            //     orderable:false,
                            //     render: function(data, type, full, meta){
                            //         return "<center>"+
                            //                         "<span class='btnNewAnalisis text-primary px-1' style='cursor:pointer;'>"+
                            //                         "<i class='fas fa-pencil-alt fs-5'></i>"+
                            //                     "</span>"                                    

                            //                 "</center>"
                            //     }
                            // }     
                        ],
                        pageLength: 10,
                            
                    });                       
                    
                    
                }else{
                    toastr["error"]("No existe Orden de Trabajo", "!Atención!");
                }
                
                
            }
        });        

    });
   

//     //********************************************************    
//     //-GUARDAR 
//     //********************************************************    
//     $("#btnSave").click(function() {

//         var estado = '';
//         var validacion ='';
//         var validarResultadoLetras = '';
//         var varResultados='';
//         var varLimiteMaxSinEspacios='';
//         var varResultadosSinEspacios='';
        
//         // Si es texto contenido del select si es numero contenido del input
//         if ((validarMin == 'NUMERO') && (validarMax == 'NUMERO')) {
//             varResultados = $("#iptResultados").val();
//             varResultados = varResultados.replace(/,/g, '.');

//         }else if ((validarMin == 'TEXTO') && (validarMax == 'TEXTO')){
//             var selResultado = document.getElementById("selResultados");
//             var selResultados = selResultado.options[selResultado.selectedIndex].text;
//             varResultados = selResultados;
//         }

//         if (typeof varAnalisis == "undefined" || varAnalisis == null){toastr["error"]("No existen datos para guardar", "!Atención!");return;}
//         if (varResultados.length == 0){toastr["error"]("Faltan datos para guardar", "!Atención!");return;}

//         validarResultadoLetras = validarTexto(varResultados);
        
//         varLimiteMaxSinEspacios = varLimiteMax.replace(/ /g, "");
//         varResultadosSinEspacios = varResultados.replace(/ /g, "");
        
//         if (validarMin == 'TEXTO') {
//             if (varLimiteMaxSinEspacios == varResultadosSinEspacios ) {
//                 resCondicionMin = true;
//                 resCondicionMax = true;
//             }else if (varLimiteMaxSinEspacios != varResultadosSinEspacios ) {
//                 resCondicionMin = true;
//                 resCondicionMax = false;
//             }

//         } else{ // CASO CONTRARIO ES NUMERO
//             if (validarResultadoLetras != 'NUMERO') {
//                 toastr["error"]("El resultado no coinside con el tipo de Ingreso de Datos", "!Atención!");
//                 return false;
//             }

//             //Validamos el limite Maximo
//             if (varLimiteMax.includes('<')) {
//                 valorMax = varLimiteMax.replace("<", "");
//                 valorMax = parseFloat(valorMax);
//                 resCondicionMax = varResultados < valorMax ? true:false;

//             } else if (varLimiteMax.includes('<=')) {
//                 valorMax = varLimiteMax.replace("<=", "");
//                 valorMax = parseFloat(valorMax);
//                 resCondicionMax = varResultados <= valorMax ? true:false;
//             }else{
//                 valorMax = varLimiteMax;
//                 valorMax = parseFloat(valorMax);
//                 resCondicionMax = varResultados <= valorMax ? true:false;
//             }

//             //Validamos el limite Minimo
//             if (varLimiteMin.includes('>')) {
//                 valorMin = varLimiteMin.replace(">", "");
//                 valorMin = parseFloat(valorMin);
//                 resCondicionMin = varResultados > valorMin ? true:false;
//             } else if (varLimiteMin.includes('>=')) {
//                 valorMin = varLimiteMin.replace(">=", "");
//                 resCondicionMin = varResultados >= valorMin ? true:false;
//                 valorMin = parseFloat(valorMin);
//             }else{
//                 valorMin = varLimiteMin;
//                 valorMin = parseFloat(valorMin);
//                 resCondicionMin = varResultados >= valorMin ? true:false;
//             }
//         }
        
//         if ((resCondicionMin == true) && (resCondicionMax == true) ){
//             validacion = 'CUMPLE';
//             estado = 'LIBERADO';
            
//         }else{
//             validacion = 'NO CUMPLE';
//             estado = 'RETENIDO';
//         }

//         console.log("resCondicionMin-> "+resCondicionMin+"    resCondicionMax->"+resCondicionMax);

//         $.ajax({
//                 async: false,
//                 url:"../ajax/resultados.ajax.php",
//                 method: "POST",
//                 data: {
//                     'accion':2, // GUARDAR
//                     'orden_trabajo': varOrdenTrabajo,
//                     'id_normativa_analisis': varIdNormativa,
//                     'resultado': varResultados,
//                     'fecha_creacion': $("#iptFechaResultados").val(),
//                     'validacion': validacion,
//                     'estado': estado
//                 },
//                 dataType: "json",
//                 success: function(respuesta){
//                     console.log("guardar ",respuesta);
//                     if (respuesta == 'existe'){
//                         toastr["error"]("Registro ya existe", "!Atención!");
//                         return false;
//                     }else if (respuesta == 'ok'){
//                         toastr["success"]("Ingreso de Información Correcta", "!Atención!");
//                         table.ajax.reload();
//                         limpiar();
//                         return false;
//                     }else{
//                         toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
//                         return false;
//                     }
//                     // bloquearInputs();
//                     // limpiar();
//                     $("#div_resultados" ).prop( "hidden", true );
//                     accion="";
//                     setTimeout(() => {
//                         window.location.href = window.location.href;
//                     }, 2000);

//                 }
//             });
//     });
    
    
//     //******************//
//     //--BOTON NUEVO ANALISIS -//
//     //******************//

//     $('#tbl_Analisis tbody').on('click','.btnNewAnalisis', function(){
//         accion = 3; //-GUARDAR MODIFICACION

//         $('#div_resultados').removeAttr('hidden');                
//         //---------------------------------------

//         var data = table2.row($(this).parents('tr')).data();
        
//         // colorea la linea seleccionada
//         var idx = table2.row($(this).parents('tr')).index();
//         var x = document.getElementById("tbl_Analisis").getElementsByTagName("tr");
//         x[idx+1].style.backgroundColor = "#E1B3A2";         
        

//         varAnalisis = data['analisis'];
//         varCategoria = data['categoria'];
//         varIdNormativa = data['id_normativa'];
        
//         varLimiteMax = data['limite_max'];
//         varLimiteMin = data['limite_min'];
        
//         varNormativa = data['normativa'];
//         varOrdenTrabajo = data['orden_trabajo'];
//         varTipoAnalisis = data['tipo_analisis'];
//         varUnidadMedida = data['unidad_medida'];
        

//         validarMin = validarTexto(varLimiteMin);
//         validarMax = validarTexto(varLimiteMax);
        
//         if ((validarMin == "TEXTO") && validarMax == "TEXTO"){
            
//             $("#selResultados" ).prop( "hidden", false );
//             $("#iptResultados" ).prop( "hidden", true );

//             const arrUM = varUnidadMedida.split("/");
//             //var options = '<option selected value="0">Seleccione</option>';
//             var options = '';
//             for (let index = 0; index < arrUM.length;index++){
//                 options = options + '<option value='+arrUM[index]+'>'+arrUM[index]+'</option>';
//             }
//             $("#selResultados").html(options);
//         }else{
            
//             $("#selResultados" ).prop( "hidden", true );
//             $("#iptResultados" ).prop( "hidden", false );
//             $("#iptResultados").focus();
//         }
//         $("#iptResultados").val("");



//      })

});


//     function limpiar(){
//         $("#iptResultados").val("");
//         $("#iptOrdenTrabajo").val("");
//         $("#iptObservacion").val("");
//     }

   

//     function validarTexto(valor) {
//         contar_numeros = valor.replace(/[^0-9]/g,"").length;
//         if ( contar_numeros == 0){
//             resultado = 'TEXTO';
//         }else{
//             resultado ='NUMERO';
//         }
//         //console.log("# "+contar_numeros+"  resultado->"+resultado);
//         return resultado;
//     }

</script>