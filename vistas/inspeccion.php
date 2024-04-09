<?php 
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
    $fechaActual = date('Y-m-d H:i:s', time());     
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    

    .btnragde {
        padding: 0px 8px 0px 8px ;
        margin: 0px;
        height:24px;
    }

    .p-label, .p-id {
    	color: white;
    	border-radius: 2px;
    	padding: 0.2em;
    }
    .ui-autocomplete .p-label {
        float: none;
        font-size: smaller;
        background: #16a765;
    }

    .ui-autocomplete .p-id {
        margin-left: -1em;
        float: right;
        font-size: smaller;
        background: #428bca;
    }
    /* @media only screen and (max-width: 800px) {
        .table-responsive {
            display: table!important;
        }
    }     */
</style>

    <!-- page content -->
    <!-- <div class="right_col" role="main"> -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-4">
					       <h4> Administrar Inspección </h4>
                        </div>
                        <div class="col-4">
                            <h5 id="lblBloqueo" style=" color:red;" hidden>ACCESO BLOQUEADO</h5>
					       <span id='spn1'> # Inspección: 060424_123215_casper</span>
                           <br>
					       <span id='spn2'> Hora de Inicio: 12:32:15</span>
                        </div>
                        <div class="col-4 " >
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;" disabled> Crear Inspección </button>
                            <button type="button" class="btn btn-success" id="btnCerrar" style="float: right;" hidden> Cerrar Inspección </button>
                            <!-- <button type="button" class="btn btn-warning " id="btnClose" style="float: right;" hidden>Cerrar</button> -->
                            
                        </div>

                    </div>
				</div>
				<div class="card-body pb-0 pt-3">
                    <div class="row ">
                        <!-- <div class="col-lg-12"> -->

                        
                            <!-- Columna fecha -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-0">
                                    <label class="" for="iptFechaInspeccion"><i class="fas fa-calendar fs-6"></i>
                                        <span class="">Fecha</span><span class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <input type="date" id="iptFechaInspeccion"   class="form-control" autocomplete="off" disabled>
                                </div>
                            </div>                        

                            <!-- Columna Area -->
                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptArea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Area de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptArea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled >
                                    </div>                                
                                </div>                                
                            </div>
                            <!-- Columna linea -->
                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Línea de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptLinea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled >
                                    </div>                                
                                </div>                                
                            </div>
                            <!-- Columna Producto -->
                            <div class="col-12 col-lg-4">
                                <div class="form-group mb-2">
                                    <label class="" for="iptProducto"><i class="fas fa-signature fs-6"></i>
                                        <span class="">Producto</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptProducto" required  autocomplete="off" disabled >
                                </div>
                            </div>

                            <!-- Columna Categoria -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptCategoria"><i class="fas fa-signature fs-6"></i>
                                        <span class="">Categoria</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptCategoria" required  autocomplete="off" disabled >
                                </div>
                            </div>

                            <!-- Columna Cantenido Nominal -->
                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptPresentacion"><i class="fas fa-signature fs-6"></i>
                                        <span class="">Cantenido Nominal</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptPresentacion" required  autocomplete="off" disabled >
                                </div>
                            </div>
                            <!-- Columna Precio -->
                            <div class="col-6 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptPrecio"><i class="fas fa-signature fs-6"></i>
                                        <span class="">Precio</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptPrecio" required  autocomplete="off" disabled >
                                </div>
                            </div>                                                                        
                        
                            <!-- Columna Lote -->
                            <div class="col-6 col-lg-1">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLote">
                                        <span class="">Lote</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptLote" required  autocomplete="off" disabled >
                                </div>
                            </div>
                            <!-- Columna Turno -->
                            <div class="col-6 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selTurno"><i class="fas fa-signature fs-6"></i>
                                        <span class="">Turno</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selTurno"  disabled>
                                        <option value="0">Turno</option>
                                            <option value="DIA">DIA</option>
                                            <option value="NOCHE">NOCHE</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="col-12 col-lg-2 mt-3">
                                <button type="button" id="btnAgregar" class="btn btn-primary " id="btnClose" style="float: right;" disabled>Agregar</button>
                            </div>                  
                        <!-- </div> -->
				    </div>
				</div>


				<!-- </div>  -->

                <div class="card-body pb-0 pt-3">
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_zonificacion" class="table cell-border shadow display nowrap" width="100%">
                        <!-- <table id="tbl_zonificacion" class="table table-striped w-100 shadow cell-border compact stripe table-responsive" width="100%"> -->
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center" hidden>vacio</th>
                                        <th class="text-center">Id</th>
                                        <th class="text-center" hidden>id_area</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center" hidden>id_linea </th>
                                        <th class="text-center">Linea</th>
                                        <th class="text-center">Punto Inspeccion</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Acción</th> 
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- END card-body datatable -->

			</div> <!-- END div card body principal -->
                


		</div>


       

	</div>
<!-- </div> -->
<!-- page content -->


<script type="text/javascript">
    var accion = '';
    var id_proveedor = '';

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    /* -REVISAR SI EXISTE INSPECCION ABIERTA-*/
    $.ajax({
        async: false,
        url:"../ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':1,
            'filtro': 'abierta' 
        },
        dataType: "json",
        success: function(respuesta){
            console.log("si hay inspecciones abiertas",respuesta);
            if( respuesta != null){
                toastr["error"]("TIENE INSPECCIONES ABIERTAS, NO PUEDE SEGUIR, PONGASE EN CONTACTO CON EL ADMINISTRADOR <br> Fecha: "+respuesta[0].fecha+"<br> Hora Inicio: "+respuesta[0].hora_ini+"<br> Usuario: "+respuesta[0].usuario , "!Atención!");
                
                $("#lblBloqueo" ).prop( "hidden", false );
                $("#spn1" ).prop( "hidden", true );
                $("#spn2" ).prop( "hidden", true );

                return false;
            }else{
                $("#btnNew").prop( "disabled", false );

                $("#btnAgregar").prop( "disabled", false );

                bloquearInputs()

            }
            //10:10:10
        }
    });


    //********************************************* INI PANTALLA PRINCIPAL ZONIFICACION **************************** */    
    /* -CARGA DE ZONIFICACIONES EXISTENTES- */
    

    table = $("#tbl_zonificacion").DataTable({
        select: true,
        info: false,
        ordering: false,
        responsive: true,        
        autoWidth: true,
        bDestroy: true,
        searching: false,
        paging: false,


        ajax:{
            url:"../ajax/zonificacion.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 3}, // LISTAR ALL
        },
        columns: [
            { "data": "vacio" }, 
            { "data": "id_zonificacion" }, 
            { "data": "id_area" }, 
            { "data": "area" }, 
            { "data": "id_linea" },
            { "data": "linea" },
            { "data": "punto_insp" },
            { "data": "fecha" },
            { "data": "usuario" },
            { "data": "vacio" }
           ],        
        columnDefs:[

        {"className": "dt-center", "targets": "_all"},
        {targets:0,orderable:false,className:'control'},
            {targets:0,visible:false},
            {targets:2,visible:false},
            {targets:4,visible:false},
            {targets:7,visible:false},

            { responsivePriority: 1, targets: 9 },
            {
                targets:9,
                orderable:false,
                render: function(data, type, full, meta){
                    return "<center>"+
                            "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+"<i class='fas fa-pencil-alt fs-5'></i>"+"</span>"+
                            // "<span class='btnEliminar text-danger px-1' style='cursor:pointer;'>"+"<i class='fas fa-trash fs-5'></i>"+"</span>"+
                            "</center>"
                }
            } ,    
        ],
        pageLength: 10,
        language: 
        {
            url: "json/idioma.json"
        }, 
    });


    /* -TRAER LISTADO DE AREAS-*/
    $.ajax({
        async: false,
        url:"../ajax/zonificacion.ajax.php",
        method: "POST",
        data: {
            'accion':1,
            'filtro': 'area',
            'dato': null
        },
        dataType: "json",
        success: function(respuesta){
            console.log("autocomplete AREA",respuesta);
            var i = 0;
                $("#iptArea").bind( "keydown", function( event ) {
                i = 0;
                }).autocomplete({
                source: respuesta,
                minLength: 1,
                select: function(event, ui) {
                    flagValidarArea="";
                    flagValidarArea = ui.item.id_area;
                }
                })
        }
    });

    
    /*- AL PERDER EL FOCO DEL INPUT AREA -*/
    
    $( "#iptArea" ).on( "blur", function() {
        console.log("ID AREA ",flagValidarArea);
            var var1 = $( "#iptArea" ).val();
            if ((flagValidarArea == undefined) || (flagValidarArea == "")){
                toastr["error"]("Seleccione Correctamente", "!Atención!");
                $( "#iptArea" ).val("");
                $( "#iptArea" ).focus();
            }
    });
    $("#iptArea").focus(function(){
        flagValidarArea= "";
        //$(this).css("background-color", "#FFFFCC");
    });
 

    
    /*-TRAER LISTADO DE LINEAS-*/
    
    $.ajax({
        async: false,
        url:"../ajax/zonificacion.ajax.php",
        method: "POST",
        data: {
            'accion':1,
            'filtro': 'linea',
            'dato': null
        },
        dataType: "json",
        success: function(respuesta){
            console.log("autocomplete LINEA",respuesta);
            var i = 0;
                $("#iptLinea").bind( "keydown", function( event ) {
                i = 0;
                }).autocomplete({
                source: respuesta,
                minLength: 1,
                select: function(event, ui) {
                    flagValidarLinea = ui.item.id_linea;
                }
                })
        }
    });
    
    /*- AL PERDER EL FOCO DEL INPUT LINEA -*/
    
    $( "#iptLinea" ).on( "blur", function() {
        console.log("ID LINEA",flagValidarLinea);
            var var1 = $( "#iptLinea" ).val();
            if ((flagValidarLinea == undefined) || (flagValidarLinea == "")){
                toastr["error"]("Seleccione Correctamente", "!Atención!");
                $( "#iptLinea" ).val("");
                $( "#iptLinea" ).focus();
            }
            
    });
    $("#iptLinea").focus(function(){
        flagValidarLinea= "";
        //$(this).css("background-color", "#FFFFCC");
    });

    //*******************************
    //-GUARDAR Zonificacion completa
    //*******************************
    $("#btnSave").click(function() {

        if (( $("#iptArea").val().length == 0) || ($("#iptLinea").val().length == 0) || ($("#iptPuntos").val().length == 0)){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }

        const msg = [];
        var area =  flagValidarArea;
        var linea =  flagValidarLinea;
        var puntos =  $("#iptPuntos").val();
        
        if (area.length == 0){msg.push(' Area');}
        if (linea.length == 0){msg.push('Linea');}
        if (puntos.length == 0){msg.push(' Puntos');}
        if (msg.length != 3 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 3){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        
        $.ajax({
                async: false,
                url:"../ajax/zonificacion.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'id_area': area,
                    'id_linea': linea,
                    'punto': puntos.toUpperCase(),
                    'id': id_zonificacion,
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("guardar ",respuesta);
                    if (respuesta == 'ok'){
                        limpiar();
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        table.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                    bloquearInputs();
                    limpiar();
                    $("#btnClose" ).prop( "hidden", true );
                    $("#btnSave" ).prop( "hidden", true );
                    accion="";

                    id_mdlArea = null;
                }
            });
    });

    /*-- BOTON NUEVO ---*/
    $("#btnNew").click(function() {
        accion=2;        
        desBloquearInputs();
        $("#btnNew" ).prop( "hidden", true );
        $("#btnCerrar").prop( "hidden", false );




        // $("#btnClose" ).prop( "hidden", false );
        
        // $("#btnSave" ).prop( "hidden", false );
        // $("#iptCodigoBarra").focus();

    })
    
    /*-- BOTON EDITAR ---*/
    $('#tbl_zonificacion tbody').on('click','.btnEditar', function(){
        accion = 4; //-GUARDAR MODIFICACION

        var data = table.row($(this).parents('tr')).data();
        console.log("editar ",data);

        $("#iptArea").val(data['area']);
        $("#iptLinea").val(data['linea']);
        $("#iptPuntos").val(data['punto_insp']);

        flagValidarArea = data['id_area'];
        flagValidarLinea = data['id_linea'];
        id_zonificacion = data['id_zonificacion'];
        
        $("#btnClose" ).prop( "hidden", false );
        $("#btnSave" ).prop( "hidden", false );
        desBloquearInputs();        
        $("#selArea").focus();
     })    
    
    
    /*--BOTON ELIMINAR -*/
    
    // $('#tbl_zonificacion tbody').on('click','.btnEliminar', function(){
    //     accion = 4;

    //     var data = table.row($(this).parents('tr')).data();
    //     id_proveedor = data[1];
    //     estado = data[8];

    //     $.ajax({
    //         async: false,
    //         url:"../ajax/proveedores.ajax.php",
    //         method: "POST",
    //         data: {
    //             'accion':4,
    //             'estado':estado,
    //             'id_proveedor': id_proveedor
    //         },
    //         dataType: "json",
    //         success: function(respuesta){
    //             //console.log(respuesta);
    //             if (respuesta == 'ok'){
    //                 toastr["success"]("Cambio de estado Correcto", "!Atención!");
    //                 // limpiar();
    //                 // bloquearInputs();

    //                 table.ajax.reload();
    //             }else{
    //                 toastr["error"]("No se pudo cambiar de estado ", "!Atención!");
    //             }
    //             // bloquearInputs();
    //             // limpiar();
    //             // $("#btnClose" ).prop( "hidden", true );
    //             accion="";                    
    //         }
    //     });        

    // })

    /*============================
        activar el modal de area
    ============================*/

    $("#btnArea").click(function() {
        $("#mdlArea").modal('show');
            
        table_Area = $("#tbl_mdlArea").DataTable({
            "bDestroy": true,
            select: true,
            info: false,
            ordering: false,
            responsive: true,
            dom: 'Bfrtilp',
            buttons: ['excel', 'pdf'],

            ajax:{
                url:"../ajax/zonificacion.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {
                    'accion':1,
                    'filtro': 'area',
                    'dato': null
                },
            },
            columns: [
                { "data": "id_area" }, 
                { "data": "area" }, 
                { "data": "fecha" },
                { "data": "usuario" },
                { "data": "observacion" },
                { "data": "estado" },
                { "data": "vacio" }
            ],        
            columnDefs:[

                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},

                {targets:2,visible:false},
                {targets:3,visible:false},

                { responsivePriority: 1, targets: 6 },
                {
                    targets:6,
                    orderable:false,
                    render: function(data, type, full, meta){
                        return "<center>"+
                                        "<span class='btn_mdlEditarArea text-primary px-1' style='cursor:pointer;'>"+"<i class='fas fa-pencil-alt fs-5'></i>"+"</span>"+                                    
                                "</center>"
                    }
                } ,    
            ],
            pageLength: 10,
            language: 
            {
                url: "json/idioma.json"
            }, 
        });        
    })

    $("#btnClose").click(function() {
        bloquearInputs();
        limpiar();
        $("#btnClose" ).prop( "hidden", true );
        $("#btnSave" ).prop( "hidden", true );
        accion="";
    })


    //********************************************* INICIO LINEA ACTIVITIES******************************************** */


    $("#btnLinea").click(function() {
        $("#mdlLinea").modal('show');    

        table_Linea = $("#tbl_mdlLinea").DataTable({
            "bDestroy": true,
            select: true,
            info: false,
            ordering: false,
            responsive: true,
           
            //paging: false,            
            dom: 'Bfrtilp',
            buttons: ['excel', 'pdf'],

            ajax:{
                url:"../ajax/zonificacion.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {
                    'accion':1,
                    'filtro': 'linea',
                    'dato': null
                },
            },
            columns: [
                { "data": "id_linea" }, 
                { "data": "linea" }, 
                { "data": "fecha" },
                { "data": "usuario" },
                { "data": "observacion" },
                { "data": "estado" },
                { "data": "vacio" }
            ],        
            columnDefs:[

                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},

                {targets:2,visible:false},
                {targets:3,visible:false},

                { responsivePriority: 1, targets: 6 },
                {
                    targets:6,
                    orderable:false,
                    render: function(data, type, full, meta){
                        return "<center>"+
                                        "<span class='btn_mdlEditarLinea text-primary px-1' style='cursor:pointer;'>"+"<i class='fas fa-pencil-alt fs-5'></i>"+"</span>"+
                                "</center>"
                    }
                } ,    
            ],
            pageLength: 10,
            language: 
            {
                url: "json/idioma.json"
            },  
        }); 
    })

    //*******************************
    //- LINEA EDITAR
    //*******************************
    $('#tbl_mdlLinea tbody').on('click','.btn_mdlEditarLinea', function(){
        var data = table_Linea.row($(this).parents('tr')).data();
        //console.log(data);

        
        
        $("#ipt_mdlLinea").val(data['linea']);
        $("#ipt_mdlObservacion").val(data['observacion']);
        buscarSelect(data['estado'],'sel_mdlEstado');

        id_mdlLinea = data['id_linea']
        accion_mdlLinea = "mdlLinea_edit";
        
    })

    //*******************************
    //-GUARDAR LINEA 
    //*******************************
    $("#btnMdlLineaSave").click(function() {
        //var accion_mdlArea = "mdlArea_new";
        var sel_mdlEstado = document.getElementById("sel_mdlEstado");
        var mdlLineaEstado = sel_mdlEstado.options[sel_mdlEstado.selectedIndex].text;
        
        const msg = [];
        var mdlLinea =  $("#ipt_mdlLinea").val();
        var mdlLineaObservacion =  $("#ipt_mdlObservacion").val();
        
        if (mdlLinea.length == 0){msg.push(' Linea');}
        if (mdlLineaObservacion.length == 0){msg.push(' Observacion');}
        if ($("#sel_mdlEstado").val() == 0){msg.push(' Estado');}

        if (msg.length != 3 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 3){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        
        $.ajax({
                async: false,
                url:"../ajax/zonificacion.ajax.php",
                method: "POST",
                data: {
                    'accion':accion_mdlLinea,
                    'linea': mdlLinea,
                    'observacion': mdlLineaObservacion,
                    'id': id_mdlLinea,
                    'estado': mdlLineaEstado,
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("guardar modal area ",respuesta);
                    if (respuesta == 'ok'){
                        $("#ipt_mdlLinea").val("")
                        $("#ipt_mdlObservacion").val("")
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        table_Linea.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                    accion_mdlArea = "mdlArea_new";
                }
        });
    });    
//********************************************* FIN AREA LINEA ******************************************** */


//********************************************* INICIO AREA ZONIFICACION ******************************************** */

//********************************************* FIN AREA ZONIFICACION ******************************************** */    

    //*******************************
    //-GUARDAR Area 
    //*******************************
    $("#btnMdlAreaSave").click(function() {
        //var accion_mdlLinea = "mdlArea_new";
        var selEstado = document.getElementById("selModalEstado");
        var mdlAreaEstado = selEstado.options[selEstado.selectedIndex].text;
        
        const msg = [];
        var mdlArea =  $("#iptModalArea").val();
        var mdlAreaObservacion =  $("#iptModalObservacion").val();
        
        if (mdlArea.length == 0){msg.push(' Area');}
        if (mdlAreaObservacion.length == 0){msg.push(' Observacion');}
        if ($("#selModalEstado").val() == 0){msg.push(' Estado');}

        if (msg.length != 3 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 3){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        
        $.ajax({
                async: false,
                url:"../ajax/zonificacion.ajax.php",
                method: "POST",
                data: {
                    'accion':accion_mdlArea,
                    'area': mdlArea,
                    'observacion': mdlAreaObservacion,
                    'id': id_mdlArea,
                    'estado': mdlAreaEstado,
                },
                dataType: "json",
                success: function(respuesta){
                    console.log("guardar modal area ",respuesta);
                    if (respuesta == 'ok'){
                        $("#iptModalArea").val("")
                        $("#iptModalObservacion").val("")
                        toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                        table_Area.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                    accion_mdlArea = "mdlArea_new";
                }
        });
    });

    //*******************************
    //- AREA EDITAR
    //*******************************
    $('#tbl_mdlArea tbody').on('click','.btn_mdlEditarArea', function(){
        var data = table_Area.row($(this).parents('tr')).data();
        //console.log(data);
        $("#iptModalArea").val(data['area']);
        $("#iptModalObservacion").val(data['observacion']);
        buscarSelect(data['estado'],'selModalEstado');

        id_mdlArea = data['id_area']
        accion_mdlArea = "mdlArea_edit";
        
    })

    


});

function desBloquearInputs(){
    $("#iptFechaInspeccion").prop( "disabled", false );
    $("#iptArea").prop( "disabled", false );
    $("#iptLinea").prop( "disabled", false );
    $("#iptProducto").prop( "disabled", false );
    $("#iptCategoria").prop( "disabled", false );
    $("#iptPresentacion").prop( "disabled", false );
    $("#iptPrecio").prop( "disabled", false );
    $("#iptLote").prop( "disabled", false );
    $("#selTurno").prop( "disabled", false );

    $("#iptFechaInspeccion").focus();
}
function bloquearInputs(){
    $("#iptFechaInspeccion").prop( "disabled", true );
    $("#iptArea").prop( "disabled", true );
    $("#iptLinea").prop( "disabled", true );
    $("#iptProducto").prop( "disabled", true );
    $("#iptCategoria").prop( "disabled", true );
    $("#iptPresentacion").prop( "disabled", true );
    $("#iptPrecio").prop( "disabled", true );
    $("#iptLote").prop( "disabled", true );
    $("#selTurno").prop( "disabled", true );
}
function limpiar(){
    $("#iptFechaInspeccion").val("");
    $("#iptArea").val("");
    $("#iptLinea").val("");
    $("#iptProducto").val("");
    $("#iptCategoria").val("");
    $("#iptPresentacion").val("");
    $("#iptPrecio").val("");
    $("#iptLote").val("");
    $("#selTurno").val(0);
    
}

function buscarSelect(abuscar,select1)
{
	var select=document.getElementById(select1);
	var buscar= abuscar;
	for(var i=1;i<select.length;i++){
		if(select.options[i].text==buscar){
			select.selectedIndex=i;
		}
	}
}
</script>