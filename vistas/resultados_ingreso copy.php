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
        font-size: x-small;
        color:#2E2C40;
        margin-left: 0px!important;
        margin-right: 0px!important;
        padding-left: 0px!important;
        padding-right: 0px!important;
    }

    .Span1 {
        font-size: x-small;
    }        

    .paging_full_numbers {
         width: 100%;
    }
    div.dt-container .dt-paging .dt-paging-button {
        padding: 0px;
    }
    .card-body {
        padding: 0rem;
    }    
</style>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"> -->

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
					       <h4> Ingreso de resultados </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0">

                    <div class="row">
                        <div class="col-sm-9 " >
                            <div class="row " h>
                                <div class="col-6 col-sm-6 " >
                                    <div class="col-10 mt-1">
                                        <div class="">
                                            <label class="" for="iptOrdenTrabajo"><i class="fas fa-barcode fs-6"></i>
                                                    <span class="small">Orden de Trabajo</span><span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="iptOrdenTrabajo"  placeholder="# Orden"style="max-width:260px;display:inline-block"/>
                                            <button type="submit" id="btnBuscarOrden" class="btn btn-primary px-0 py-0" style="margin-left:-1px; width: 40px; height: 28px;">+</button>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="col-4 col-sm-6 mt-2" id="div_resultados" hidden>
                                    <div class="col-12 mt-1">
                                        <div class="">
                                            <label class="" for="iptResultados"><i class="fas fa-rss fs-6"></i>
                                                    <span class="small">Resultados</span>
                                            </label>
                                            <input type="text" class="form-control" id="iptResultados"  placeholder="Ingrese Resultados de Analisis"style="max-width:280px;display:inline-block"/>
                                        </div>
                                    </div>  
                                    <div class="col-12 mt-1">
                                        <div class="">
                                            <label class="" for="iptFechaResultados"><i class="fa fa-calendar fs-6"></i>
                                                    <span class="small">Fecha         </span>
                                            </label>
                                            <input type="date" class="form-control" id="iptFechaResultados"  value="<?php echo $SoloFechaActual ?>"
                                                placeholder="Ingrese Resultados de Analisis" 
                                                style="max-width:280px;display:inline-block"/>
                                        </div>
                                    </div>                                  
                                                                    
                                </div>
                            </div>
<div class="card-body pb-0 pt-3">
    <!-- row para tabla  -->
    <div class="row">
        <div class="col-lg-12">
                                <table id="tbl_Analisis" class="table table-striped " style="width=100%" hidden>
                                    <thead class="bg-gray">
                                        <tr style="font-size: 15px;">
                                            <th class="text-center" hidden>Orden_tra</th> <!-- 1 -->
                                            <th class="text-center" hidden>id_Normativa</th> <!-- 6 -->
                                            <th class="text-center" hidden>Normativa</th> <!-- 6 -->
                                            <th class="text-center" hidden>Categoria</th> <!-- 6 -->
                                            <th class="text-center">Tipo </th> <!-- 6 -->
                                            <th class="text-center">Analisis </th> <!-- 6 -->
                                            <th class="text-center">Min</th> 
                                            <th class="text-center">Max</th> <!-- 6 -->
                                            <th class="text-center">Opciones</th> <!-- 12 -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-small">
                                    </tbody>
                                </table>

</div>
</div>
</div>
                        </div>
                        <div class="col-sm-3 element rounded border border-3 my-1 px-0">
                            <div class="col-md-12 ">
                                <span class="boldSpan ">Orden:</span><span class="Span1" id="spnOrden"></span>
                            </div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Fecha:</span><span class="Span1" id="spnFecha_Creacion"> </span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Id item:</span><span class="Span1" id="spnId_item"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Producto:</span><span class="Span1" id="spnProducto"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Normativa:</span><span class="Span1" id="spnNormativa"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Categoria:</span><span class="Span1" id="spnCategoria"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Planta:</span><span class="Span1" id="spnPlanta"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Ubicacion:</span><span class="Span1" id="spnUbicacion"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Proveedor:</span><span class="Span1" id="spnRazon_Social"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Turno:</span><span class="Span1" id="spnTurno"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Muestra:</span><span class="Span1" id="spnMuestra"></span></div>
                            <div class="col-md-12 ">
                                <span class="boldSpan">Lote:</span><span class="Span1" id="spnLote"></span></div>
                        </div>
                    </div>
			    </div> <!-- END div 1º card body -->
                    
                <div class="card-body pb-0 pt-3">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_resultados" class="table table-striped cell-border w-100 shadow" width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center">Id Res</th>
                                        <th class="text-center">OT</th>
                                        <th class="text-center">Id Nor</th>
                                        <th class="text-center">Fecha creacion</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Normativa</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Tipo_analisis</th>
                                        <th class="text-center">Analisis</th>
                                        <th class="text-center">Resultado</th>
                                        <th class="text-center">Validacion</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 2º card-body      -->
            </div>  <!-- END card -->
		</div>
	</div>




<script type="text/javascript">
    var accion = '';
    var Id_Item = '';
    var varNormativas;

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    //********************************************************    
    //-CARGA DE RESULTADOS EXISTENTES PARA EL USUARIO INGRESADO
    //********************************************************    
     

    table = $("#tbl_resultados").DataTable({
        select: true,
        info: false,
        ordering: false,
        // pagingType: 'simple_numbers',
        
        //paging: false,            
        dom: 'Bfrtilp',
        buttons: ['excel', 'print','pdf'],

        ajax:{
            url:"../ajax/resultados.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 1}, // 1 para listar productos
        },

        columns: [
            { "data": "id_resultados" },
            { "data": "orden_trabajo" },
            { "data": "id_normativa_analisis" },
            { "data": "fecha_creacion" },
            { "data": "usuario_creacion" },
            { "data": "normativa" },
            { "data": "categoria" },
            { "data": "tipo_analisis" },
            { "data": "analisis" },
            { "data": "resultado" },
            { "data": "validacion" }
           ],        
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs:[

            {targets:0,orderable:false,className:'control'},
            {"className": "dt-center", "targets": "_all"},
            {targets: [3,9], className: "text-center",width: "4%"},
            {targets:[0,1,2,5,6],visible:false},

            //{ responsivePriority: 1, targets: 1 },
            {
                targets:11,
                orderable:false,
                render: function(data, type, full, meta){
                    return "<center>"+
                                    "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+
                                    "<i class='fas fa-pencil-alt fs-5'></i>"+
                                "</span>"                                    

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
                                "sFirst": "<<",
                                "sLast":">>",
                                "sNext":">",
                                "sPrevious": "< "
                             },
                             "sProcessing":"Procesando...",
        }, 
    });

    
    //******************//
    //--BUSCAR ORDEN -//
    //******************//
    $("#btnBuscarOrden").click(function() {
        
        
        $.ajax({ //----BUSCAR ORDEN TRABAJO
            url:"../ajax/orden_trabajo.ajax.php",
            type: "POST",
            data: {
                'accion': 5,
                'orden_trabajo': $("#iptOrdenTrabajo").val()
            },
            dataType: 'json',
            success: function(respuesta){
                console.log(respuesta);
                //console.log(respuesta[0]['orden_trabajo']);
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

                    // BUSCAMOS LOS ANALISIS
                    table2 = $("#tbl_Analisis").DataTable({
                        "bDestroy": true,
                        info: false,
                        ordering: false,
                        paging: false,
                        searching: false,
                        ajax:{
                            url:"../ajax/normativas.ajax.php",
                            dataSrc: '',
                            type:"POST",            
                            data: {
                                'accion':5,
                                'orden_trabajo': $("#iptOrdenTrabajo").val(),
                            }, // 1 para listar productos
                        },
                        responsive: {
                            details: {
                                type: 'column'
                            }
                        },
                        columnDefs:[

                        {"className": "dt-center", "targets": "_all"},
                        {targets:0,orderable:false,className:'control'},
                            {targets:0,visible:false},
                            {targets:1,visible:false},
                            {targets:2,visible:false},
                            {targets:3,visible:false},

                            { responsivePriority: 1, targets: 7 },
                            {
                                targets:8,
                                orderable:false,
                                render: function(data, type, full, meta){
                                    return "<center>"+
                                                    "<span class='btnNewAnalisis text-primary px-1' style='cursor:pointer;'>"+
                                                    "<i class='fas fa-pencil-alt fs-5'></i>"+
                                                "</span>"                                    

                                            "</center>"
                                }
                            }     
                        ],
                        pageLength: 10,
                            
                    });                       
                    
                    
                }else{
                    alert("no existe orden de trabajo");
                }
                
                
            }
        });        

    });

    //********************************************************    
    //-GUARDAR 
    //********************************************************    
    $("#btnSave").click(function() {
        if (typeof varAnalisis == "undefined" || varAnalisis == null){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        if ($("#iptResultados").val().length == 0){
            toastr["error"]("Faltan datos para guardar", "!Atención!");
            return;
        }
        
        varResultados = $("#iptResultados").val();
        
        var validacion ='';
        
        //sentence.includes(word) ? 'is' : 'is not'
        if (varLimiteMax.includes('<')) {
            valorMax = varLimiteMax.replace("<", "");
            resCondicionMax = varResultados < valorMax ? true:false;

        } else if (varLimiteMax.includes('<=')) {
            valorMax = varLimiteMax.replace("<=", "");
            resCondicionMax = varResultados <= valorMax ? true:false;
        }else{
            valorMax = varLimiteMax;
            resCondicionMax = varResultados <= valorMax ? true:false;
        }

        if (varLimiteMin.includes('>')) {
            valorMin = varLimiteMin.replace(">", "");
            resCondicionMin = varResultados > valorMin ? true:false;
        } else if (varLimiteMin.includes('>=')) {
            valorMin = varLimiteMin.replace(">=", "");
            resCondicionMin = varResultados >= valorMin ? true:false;
        }else{
            valorMin = varLimiteMin;
            resCondicionMin = varResultados >= valorMin ? true:false;
        }       
        if ((resCondicionMin == true) && (resCondicionMax == true) ){
            console.log("Cumple");
            validacion = 'CUMPLE';
            
        }else{
            console.log("NOOOO Cumple");
            validacion = 'NO CUMPLE';
        }

        $.ajax({
                async: false,
                url:"../ajax/resultados.ajax.php",
                method: "POST",
                data: {
                    'accion':2, // GUARDAR
                    'orden_trabajo': varOrdenTrabajo,
                    'id_normativa_analisis': varIdNormativa,
                    'resultado': $("#iptResultados").val(),
                    'fecha_creacion': $("#iptFechaResultados").val(),
                    'validacion': validacion
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("guardar ",respuesta);
                    if (respuesta == 'existe'){
                        toastr["error"]("Registro ya existe", "!Atención!");
                    }else if (respuesta == 'ok'){
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        table.ajax.reload();
                        limpiar();
                        return false;
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                        return false;
                    }
                    // bloquearInputs();
                    // limpiar();
                    $("#div_resultados" ).prop( "hidden", true );
                    accion="";
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 2000);

                }
            });
    });
    
    
    //******************//
    //--BOTON NUEVO ANALISIS -//
    //******************//

    $('#tbl_Analisis tbody').on('click','.btnNewAnalisis', function(){
        accion = 3; //-GUARDAR MODIFICACION
        $('#div_resultados').removeAttr('hidden');        
        //---------------------------------------
        var data = table2.row($(this).parents('tr')).data();
        
        // colorea la linea seleccionada
        var idx = table2.row($(this).parents('tr')).index();
        var x = document.getElementById("tbl_Analisis").getElementsByTagName("tr");
        x[idx+1].style.backgroundColor = "#E1B3A2";         
        

        varAnalisis = data['analisis'];
        varCategoria = data['categoria'];
        varIdNormativa = data['id_normativa'];
        varLimiteMax = data['limite_max'];
        varLimiteMin = data['limite_min'];
        varNormativa = data['normativa'];
        varOrdenTrabajo = data['orden_trabajo'];
        varTipoAnalisis = data['tipo_analisis'];
        

        $("#iptResultados").focus();

     })

});


function limpiar(){
    $("#iptResultados").val("");
    $("#iptOrdenTrabajo").val("");
}

</script>