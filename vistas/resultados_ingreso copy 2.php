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

    table.dataTable {
        margin: 0px;
    }    

    tr { 
        height: 10px!important; 
        font-size: 11px !important;
        vertical-align: middle;
    }
    .table td, .table th {
        vertical-align: middle;
        margin: 0px;
    }

    table.dataTable tbody th, table.dataTable tbody td {
    padding: 0px 3px !important;
    font-size: 12px !important;
    height: 10px;
}
</style>
 

<!-- <link rel="stylesheet" href="css/tablaNormal.css"/> -->
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
                            <div class="row ">
                                <div class="col-6 col-sm-6 " >


                                    <!-- <div class="col-12 mt-1"> -->
                                        <div class="col-12">
                                            <label class="" for="iptOrdenTrabajo"><i class="fas fa-barcode fs-6"></i>
                                                    <span class="small">Orden de Trabajo</span><span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="iptOrdenTrabajo" value="19" placeholder="# Orden"style="max-width:120px;display:inline-block"/>
                                            <button type="submit" id="btnBuscarOrden" class="btn btn-primary px-0 py-0" style="margin-left:-1px; width: 40px; height: 28px;">+</button>
                                        </div>
                                    <!-- </div>                                 -->
                                </div>
                                <div class="col-4 col-sm-6 mt-2" id="div_resultados" hidden>
                                    <form>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-6"">
                                                <label for="inputEmail4" class="mb-0">Resultado</label>
                                                <input type="text" class="form-control" id="iptResultados" placeholder="Resultados" pattern="^[A-Za-z]+$" >

                                                <select class="form-control " aria-label=".form-select-sm example" id="selResultados"  >
                                                </select>           
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label  class="mb-0" for="iptFechaResultados">Fecha</label>
                                                <input type="date" class="form-control" id="iptFechaResultados" value="<?php echo $SoloFechaActual ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="mb-0" for="iptObservacion">Observacion</label>
                                            <input type="text" class="form-control" id="iptObservacion" >
                                        </div>
                                    </form>                                    
                               
                                                                    
                                </div>
                            </div>
                            <div class="card-body pb-0 pt-3">
                                <!-- row para tabla  -->
                                <div class="row">
                                    <div class="col-lg-12">
                                    
                                        <table id="tbl_Analisis" class="table table-striped cell-border display nowrap" style="width:100%" hidden>
                                            <thead class="bg-gray">
                                                <tr style="font-size: 15px;">
                                                    <th class="text-center">Orden_tra</th> <!-- 1 -->
                                                    <th class="text-center">id_Nor</th> <!-- 6 -->
                                                    <th class="text-center">Normativa</th> <!-- 6 -->
                                                    <th class="text-center">Categoria</th> <!-- 6 -->
                                                    <th class="text-center">Tipo </th> <!-- 6 -->
                                                    <th class="text-center">Analisis </th> <!-- 6 -->
                                                    <th class="text-center">Min</th> 
                                                    <th class="text-center">Max</th> <!-- 6 -->
                                                    <th class="text-center">U.M.</th> <!-- 6 -->
                                                    <th class="text-center">Acc</th> <!-- 12 -->
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
                        <table id="tbl_resultados"  class="table table-striped " style="width:100%">
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
            </div>  <!-- END card -->
		</div>
	</div>




<script type="text/javascript">
    var accion = '';
    var Id_Item = '';
    var varNormativas;
    var varResultadoValidacionTexto ='';
    var validarMax = '';
    var validarMin = '';

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    var resSelResultado = '';

    $("#iptResultados" ).prop( "hidden", true );
    $("#selResultados" ).prop( "hidden", true );
    //********************************************************    
    //-CARGA DE RESULTADOS EXISTENTES PARA EL USUARIO INGRESADO
    //********************************************************    
     

    table = $("#tbl_resultados").DataTable({
                        "bDestroy": true,
                         info: false,
                         ordering: false,
                        // paging: false,
                        searching: false,
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
            { "data": "validacion" },
            { "data": "estado" }
           ],        
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs:[

            {targets:0,orderable:false,className:'control'},
            {"className": "dt-center", "targets": "_all"},
            {targets:0,visible:false},
            {targets:1,visible:false},
            {targets:2,visible:false},
            {targets:4,visible:false}, //usario
            // {targets: [3,9], className: "text-center",width: "4%"},
            // {targets:[0,1,2,5,6],visible:false},

            { responsivePriority: 1, targets: 12 },
            {
                targets:12,
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
        rowCallback:function(row,data){
                if(data[11] != "RETENIDO"){
                    $($(row).find("td")[7]).css("background-color","#FAF421");
                }else if(data[11] != "LIBERADO"){
                    $($(row).find("td")[7]).css("background-color","#5FFA21");
                }else if(data[11] != "CUARENTENA"){
                    $($(row).find("td")[7]).css("background-color","#FF5733");
                }

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
                        // responsive:true,
                        ajax:{
                            url:"../ajax/normativas.ajax.php",
                            dataSrc: '',
                            type:"POST",            
                            data: {
                                'accion':5,
                                'orden_trabajo': $("#iptOrdenTrabajo").val(),
                            }, // 1 para listar productos
                        },
                        columns: [
                            { "data": "orden_trabajo" },
                            { "data": "id_normativa" },
                            { "data": "normativa" },
                            { "data": "categoria" },
                            { "data": "tipo_analisis" },
                            { "data": "analisis" },
                            { "data": "limite_min" },
                            { "data": "limite_max" },
                            { "data": "unidad_medida" }
                        ],                         
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

                            // { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 1, targets: 5 },
                            { responsivePriority: 1, targets: 6 },
                            { responsivePriority: 1, targets: 7 },
                            { responsivePriority: 1, targets: 8 },
                            { responsivePriority: 1, targets: 9 },

                            {
                                targets: 5,
                                render: function (data, type, row) {
                                    if (type === 'display') {
                                    return data.replace(/,/g, '<br>');
                                    }
                                    if (type === 'export') {
                                    return data;
                                    }
                                    return data;
                                }
                            },                            
                            {
                                targets:9,
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

        var selResultado = document.getElementById("selResultados");
        var selResultados = selResultado.options[selResultado.selectedIndex].text;
        var estado = '';
        var validacion ='';
        var validarResultadoLetras = '';
        var varResultados='';
        
        // Si es texto contenido del select si es numero contenido del input
        if ((validarMin == 'NUMERO') && (validarMax == 'NUMERO')) {
            varResultados = $("#iptResultados").val();
        }else if ((validarMin == 'TEXTO') && (validarMax == 'TEXTO')){
            varResultados = selResultados;
        }
        //alert(" Min->"+validarMin+" Max->"+validarMin+"  res"+varResultados);

        if (typeof varAnalisis == "undefined" || varAnalisis == null){toastr["error"]("No existen datos para guardar", "!Atención!");return;}
        if (varResultados.length == 0){toastr["error"]("Faltan datos para guardar", "!Atención!");return;}

        validarResultadoLetras = validarTexto(varResultados);

        if (validarMin == 'TEXTO') {
           
            //console.log("es texto entro");
            //if ((varResultados === varLimiteMin) || (varResultados === varLimiteMax)){
                    //console.log("validando   min->"+varLimiteMin+"   max->"+varLimiteMax);
                    // Validacion cualitativa POSITIVO/NEGA0TIVO
                    if ((varResultados.includes('NEGATIVO')) && (varResultados.includes('NEGATIVO')) ) {
                        resCondicionMin = true;
                        resCondicionMax = true;
                    }else if ((varResultados.includes('POSITIVO')) && (varResultados.includes('POSITIVO')) ) {
                        resCondicionMin = false;
                        resCondicionMax = false;
                    }else{
                        console.log("datos ingresados no coinsiden con la normatva seleccionada");      
                        return false;
                    }
                    //return;

            //}else{
            //    alert("datos ingresados no coinsiden con la normatva seleccionada");
            //    return false;
            //}
        } else{ // CASO CONTRARIO ES NUMERO
            if (validarResultadoLetras != 'NUMERO') {
                alert("EL RESULTADO NO COINSIDE CON EL TIPO DE INGRESO DE DATOS");
                return false;
            }
            console.log("ES NUMERO");
            
            //Validamos el limite Maximo
            if (varLimiteMax.includes('<')) {
                valorMax = varLimiteMax.replace("<", "");
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados < valorMax ? true:false;

            } else if (varLimiteMax.includes('<=')) {
                valorMax = varLimiteMax.replace("<=", "");
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados <= valorMax ? true:false;
            }else{
                valorMax = varLimiteMax;
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados <= valorMax ? true:false;
            }

            //Validamos el limite Minimo
            if (varLimiteMin.includes('>')) {
                valorMin = varLimiteMin.replace(">", "");
                valorMin = parseFloat(valorMin);
                resCondicionMin = varResultados > valorMin ? true:false;
            } else if (varLimiteMin.includes('>=')) {
                valorMin = varLimiteMin.replace(">=", "");
                resCondicionMin = varResultados >= valorMin ? true:false;
                valorMin = parseFloat(valorMin);
            }else{
                valorMin = varLimiteMin;
                valorMin = parseFloat(valorMin);
                resCondicionMin = varResultados >= valorMin ? true:false;
            }
        }
        
        if ((resCondicionMin == true) && (resCondicionMax == true) ){
            validacion = 'CUMPLE';
            estado = 'LIBERADO';
            
        }else{
            validacion = 'NO CUMPLE';
            estado = 'RETENIDO';
        }
        console.log("VALIDACION-> "+validacion+"    ESTADO->"+estado);

return;
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
                    'validacion': validacion,
                    'estado': estado
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
        varUnidadMedida = data['unidad_medida'];
        

        validarMin = validarTexto(varLimiteMin);
        validarMax = validarTexto(varLimiteMax);
        
        if ((validarMin == "TEXTO") && validarMax == "TEXTO"){
            
            $("#selResultados" ).prop( "hidden", false );
            $("#iptResultados" ).prop( "hidden", true );

            const arrUM = varUnidadMedida.split("/");
            //var options = '<option selected value="0">Seleccione</option>';
            var options = '';
            for (let index = 0; index < arrUM.length;index++){
                options = options + '<option value='+arrUM[index]+'>'+arrUM[index]+'</option>';
            }
            $("#selResultados").html(options);
        }else{
            
            $("#selResultados" ).prop( "hidden", true );
            $("#iptResultados" ).prop( "hidden", false );
            $("#iptResultados").focus();
        }
        $("#iptResultados").val("");



     })

});


function limpiar(){
    $("#iptResultados").val("");
    $("#iptOrdenTrabajo").val("");
    $("#iptObservacion").val("");
}

    function ValidateMoney(_id)
    {
		//     var amount = document.getElementById(_id).value;
		//     console.log(amount);
        //            //d+ permite caracteres enteros
        //            //si hay un caracter que no es dígito entonces evalua lo que está en paréntesis (?) significa opcional
		//     var patron = /^(\d+(.{1}\d{2})?)$/;     		    
        //             if (!patron.test(amount))
		//     {
		//         window.alert('cantidad ingresada incorrectamente');
		//         document.getElementById('amount').focus();
		//         return false;
        // }
		//     else
		//         return true;
	}

    function validarTexto(valor) {
        contar_numeros = valor.replace(/[^0-9]/g,"").length;
        if ( contar_numeros == 0){
            resultado = 'TEXTO';
        }else{
            resultado ='NUMERO';
        }
        //console.log("# "+contar_numeros+"  resultado->"+resultado);
        return resultado;
    }

</script>