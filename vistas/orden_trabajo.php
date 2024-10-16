<?php 
	//include("includes/header.php"); 
	//include("../middleware/adminMiddleware.php"); 

    date_default_timezone_set("America/Guayaquil");
    $fechaActual = date('YmdHis', time()); 
    $SoloFechaActual = date('Y-m-d');
?>
        
<style>
    th,td {
         text-align:center!important;
    }
    .paging_full_numbers {
         width: 100%;
    }
    div.dt-container .dt-paging .dt-paging-button {
        padding: 0px;
    }
    
/* .ui-menu {
    background-color: black!important;
    color: white!important;
    width: 418px!important;
    top: -660.889px!important; 
    left: 485.921px!important;
} */
    .p-label, .p-id {
    	color: white;
    	border-radius: 2px;
    	padding: 0.2em;
    }
    .ui-autocomplete .p-label {
        float: left;
        font-size: smaller;
        background: #16a765;
    }

    .ui-autocomplete .p-id {
        margin-left: -1em!important;
        float: right;
        font-size: smaller;
        background: #428bca;
    }
    .ui-menu .ui-menu-item {
        padding: 3px 0em 3px .4em!important;
    }
    .ui-widget {
        font-size: 0.9em!important;
    }

    .ui-widget-content {
        /* background: red !important; */
        width: 380px !important;
    }

    .ui-title .h-label{
        padding-left: 0.7em; 
    }
    .ui-title .h-linea {
    	margin-left: -1em !important;
        float: right !important;
    }    
    /* .ui-menu .ui-menu-item-wrapper {
        padding: 0px 0em 0px 0em !important;
    }     */
</style>    




  <link href="https://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
					       <h4> Generación Orden de Trabajo 11</h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>Close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0">
	                <form>

                        <div class="row">
                            <!-- Columna FECHA -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptFecha"><i class="fas fa-calendar fs-6"></i>
                                        <span class="small">Fecha</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="iptFecha" required disabled>
                                </div>
                            </div>

                            <!-- Columna BUUUUUUUSCAR -->
                            <div class="col-12 col-lg-4">
                                <label class="" for="iptProducto"><i class="fa fa-search fs-6"></i>
                                        <span class="small">Buscar</span><span class="text-danger">*</span>
                                </label>                            
                                <input type="text" id="iptProducto" class="form-control" placeholder="Producto a buscar"  disabled>
                                <input type="hidden" id="iptProductoBuscar" disabled>
                                <input type="hidden" id="iptId_item" disabled>
                                <!-- <input type="text" name="country" id="autocomplete"/> -->
                                
                                <!-- SELECT 2 PARA PRODUCTOS -->
                                <!-- <select id='selUser' style='width: 200px;'>
                                    <option value='0'>- Buscar Productos -</option>
                                </select> -->

                    
                            </div>
                            
                            
                            <!-- Columna Norma -->
                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptNorma"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="small">Normativa</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="iptNorma" required   disabled>
                                    <!-- <input type="hidden" class="form-control " id="iptIdNormativa"> -->
                                </div>
                            </div>

                            <!-- Columna Categoria -->
                            <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptCategoria"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="small">Categoria</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control " id="iptCategoria" required  disabled>
                                </div>
                            </div>


                            <!-- Columna Presentación -->
                            <div class="col-12 col-lg-3" hidden>
                                <div class="form-group mb-2">
                                    <label class="" for="iptPresentacion"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="small">Presentación</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptPresentacion" required  disabled>
                                </div>
                            </div>
                        
                        
                            <!-- Columna PLANTA -->
                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selPlanta"><i class="fas fa-building fs-6"></i>
                                        <span class="small">Planta</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selPlanta"  disabled>
                                        <option value="0">Planta</option>
                                            <option value="PILLARO">PILLARO</option>
                                            <option value="RIOBAMBA">RIOBAMBA</option>
                                    </select>
                                </div>
                            </div>
    
                            <!-- Columna AREA -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptArea"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Area</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptArea" required disabled >
                                </div>
                            </div>
                            <!-- Columna LINEA -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLinea"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Linea</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptLinea" required disabled >
                                </div>
                            </div>
                            <!-- <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selUbicacion"><i class="fa fa-location-arrow fs-6"></i>
                                        <span class="small">Ubicacion</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selUbicacion"  disabled>

                                    </select>
                                </div>
                            </div> -->

                            <!-- Columna PROVEEDOR -->
                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selProveedor"><i class="fas fa-user fs-6"></i>
                                        <span class="small">Proveedor</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selProveedor"  disabled>

                                    </select>
                                </div>
                            </div>
                            

                            <!-- Columna TURNO -->
                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selTurno"><i class="fas fa-calendar fs-6"></i>
                                        <span class="small">Turno</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selTurno"  disabled>
                                        <option value="0">Turno</option>
                                            <option value="DIA">DIA</option>
                                            <option value="NOCHE">NOCHE</option>
                                    </select>
                                </div>
                            </div>                        
                            
                            <!-- Columna USUARIOS -->
                            <div class="col-4 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="selUsuarios"><i class="fas fa-user fs-6"></i>
                                        <span class="small">Usuarios</span><span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control " aria-label=".form-select-sm example" id="selUsuarios"  disabled>
                                    </select>
                                </div>
                            </div>                      

                            <!-- Columna MUESTRA -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptMuestra"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Muestra</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptMuestra" required disabled >
                                </div>
                            </div>

                            <!-- Columna LOTE -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptLote"><i class="fas fa-barcode fs-6"></i>
                                        <span class="small">Lote</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptLote" required disabled>
                                </div>
                            </div>                        
                            <!-- Columna ESTADO -->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-2">
                                    <label class="" for="iptEstado"><i class="fas fa-signal fs-6"></i>
                                        <span class="small">Estado</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="iptEstado" required disabled >
                                </div>
                            </div>     

                        </div>                        
	                </form>        
				</div> 
			</div> <!-- END div 1º card body -->
                
                <div class="card-body pb-0 pt-3">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-12">
                            <!-- <table id="tbl_orden_trabajo" class="table table-striped cell-border w-100 shadow  " width="100%"> -->
                            <table id="tbl_orden_trabajo" class="table table-striped cell-border w-100 shadow  " width="100%">
                                
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                    
                                        <th ></th>
                                        <th >Orden</th>
                                        <th >Muestra</th>
                                        <th >Item</th>
                                        <th >Fecha</th>
                                        <th >Producto</th>
                                        <th >Categoria</th>
                                        <th >Norma</th>
                                        <th >Presentacion</th>
                                        <th >Planta</th>
                                        <th >Proveedor</th>
                                        <th >Turno</th>
                                        <th >Usuario</th>
                                        <th >Lote</th>
                                        <th >Area</th>
                                        <th >Id_area</th>
                                        <th >Linea</th>
                                        <th >Id_Linea</th>
                                        <th >Estado</th>
                                        <th >Accion</th>
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 2º card-body      -->

		</div>
	</div>


    <!-- <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" ></script>


<script type="text/javascript">
    var accion = '';
    var id_proveedor = '';
    let varProducto = '';
    var contNorma = 0;
    var numero_orden = null;
    var i = 0; // para el autocomplete

    var id_area=null;
    var id_linea=null;

    
$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE

        //****************************
        //----CARGA UBICACION
        //****************************

        $.ajax({
            async: false,
            url:"ajax/zonificacion.ajax.php",
            method: "POST",
            data: {
                'accion':5,
                'filtro': 'area',
                'dato': null
            },
            dataType: "json",
            success: function(respuesta){
                console.log("autocomplete AREA",respuesta);
                
                    $("#iptArea").bind( "keydown", function( event ) {
                    i = 0;
                    }).autocomplete({
                        source: respuesta,
                        minLength: 1,
                        select: function(event, ui) {
                            // flagValidarArea="";
                            // flagValidarArea = ui.item.id_area;
                            // console.log(ui.item.linea);
                            console.log("value  ",ui.item.value)
                            $("#iptLinea").val(ui.item.linea);
                            id_area = ui.item.id_area;
                            id_linea = ui.item.id_linea;
                            // console.log("id_area ",id_area)
                            // console.log("id_linea ",id_linea)
                        }
                    }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    var elemento = $("<a></a>");
                    $("<span class='p-label'></span>").text(item.label).appendTo(elemento);
                    $("<span class='p-id'></span>").text(item.linea).appendTo(elemento);

                    // (i > 0)? '' : ul.prepend('<li class="ui-title"><span class="h-label">AREA</span><span class="h-linea">LINEA</span></li>'); 
                    i++;
                    return $("<li></li>").append(elemento).appendTo(ul);
                  };
            }
        });        
  
        //****************************
        //----CARGA PROVEEDORES
        //****************************
        $.ajax({
            url:"ajax/proveedores.ajax.php",
            type: "POST",
            data: {'accion': 1}, // 1  listar
            dataType: 'json',
            success: function(respuesta){
                //console.log(respuesta);
                var options = '<option selected value="0">Proveedores</option>';
                for (let index = 0; index < respuesta.length;index++){
                    options = options + '<option value='+respuesta[index]['id_proveedor']+'>'+respuesta[index]['razon_social']+'</option>';

                }
                $("#selProveedor").html(options);


            }
        }); 

        //****************************
        //----CARGA USUARIOS
        //****************************
        $.ajax({
            url:"ajax/usuarios.ajax.php",
            type: "POST",
            data: {'accion': 1}, // 1  listar
            dataType: 'json',
            success: function(respuesta){
                //console.log(respuesta);
                var options = '<option selected value="0">Usuarios</option>';
                for (let index = 0; index < respuesta.length;index++){
                    options = options + '<option value='+respuesta[index]['usuario']+'>'+respuesta[index]['nombres']+'</option>';

                }
                $("#selUsuarios").html(options);


            }
        });          
    
    //********************************************************    
    //-CARGA ORDENES DE TRABAJO EXISTENTES
    //********************************************************    

    table = $("#tbl_orden_trabajo").DataTable({
        select: true,
        info: false,
        ordering: false,
        autoWidth: true,
        bDestroy: true,
        // responsive: true,        
        // pagingType: 'simple_numbers',
        
        //paging: false,            
        dom: 'Bfrtilp',
        buttons: ['excel', 'print','pdf'],

        ajax:{
            url:"ajax/orden_trabajo.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 1}, // 1 LISTAR ORDEN DE TRABAJO EXISTENTES
        },

        columns: [
            { "data": "vacio"}, 
            { "data": "orden_trabajo"}, 
            { "data": "numero_muestra" }, 
            { "data": "id_item" },
            { "data": "fecha_muestreo" },
            { "data": "nombre_producto" },
            { "data": "categoria" },
            { "data": "normativa" },
            { "data": "presentacion" },
            { "data": "planta" },
            { "data": "razon_social"},
            { "data": "turno" },
            { "data": "usuario" },
            { "data": "lote" },
            { "data": "area" },
            { "data": "id_area" },
            { "data": "linea" },
            { "data": "id_linea" },
            { "data": "estado" },
            { "data": "vacio"}, 
           ],                
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs:[
            {className: 'dt-center', targets: '_all' },
            {targets:0,orderable:false,className:'control'},
            
            // {targets: 4, className: "text-center",width: "40%"},

            {targets:2,visible:false}, //id_muesstra
            {targets:15,visible:false}, // id_area
            {targets:17,visible:false}, // id_linea

            // { responsivePriority: 1, targets: 4 },
            { responsivePriority: 2, targets: 19 },
            {
                targets:19,
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
            url: "vistas/json/idioma.json"
        }, 
    });

        //********************************************************    
        //-TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETADO
        //********************************************************    
        //console.log("🚀 ~ file: ventas.php ~ line 313 ~ $ ~ ui.item.value", ui.item.value);
        $.ajax({
            async: false,
            url:"ajax/productos.ajax.php",
            method: "POST",
            data: {'accion':4},
            dataType: "json",
            success: function(respuesta){
                console.log("autocomplete 1",respuesta);
                for (let i = 0; i < respuesta.length;i++){
                    items.push(respuesta[i]['codigo_barra1']+"   "+respuesta[i]['nombre_producto']);
                }
                $("#iptProducto").autocomplete({
                    source: items,
                    select: function(event, ui){
                        //CargarProductos(ui.item.value);
                        
                        const myArray = ui.item.value.split("   ");
                        varProducto = myArray[1];
                        $("#iptProductoBuscar").val(varProducto);
                        
                        // ****************************
                        // ----BUSQUEDA DE PRODUCTO
                        // ****************************
                        //alert(myArray);
                        $.ajax({
                            url:"ajax/productos.ajax.php",
                            type: "POST",
                            data: {'accion': 5, 'data':myArray}, // 1  buscar 
                            dataType: 'json',
                            success: function(respuesta){
                                console.log("producto-normativa",respuesta)
                                $("#iptNorma").val(respuesta[0]['normativa']);
                                $("#iptCategoria").val(respuesta[0]['categoria']);
                                //$("#iptIdNormativa").val(respuesta[0]['id_normativa']);
                                
                                $("#iptPresentacion").val(respuesta[0]['presentacion']);
                                $("#iptId_item").val(respuesta[0]['id_item']);
                                $("#selPlanta").focus();
                            }
                        });                            
                    }
                })
            }
        });

    $("#iptArea").keydown(function(e){
        if((e.which == 8) || (e.which == 46)){
            $("#iptArea").val("");
            $("#iptLinea").val("");
        }
    });
    //******************//
    //--BOTON ELIMINAR -//
    //******************//

    $('#tbl_orden_trabajo tbody').on('click','.btnEliminar', function(){
        var data = table.row($(this).parents('tr')).data();
        var varOrdenTrabajo = data['orden_trabajo'];
        var varEstado = data['estado'];

        $.ajax({
                async: false,
                url:"ajax/muestras.ajax.php",
                method: "POST",
                data: {
                    'accion':4, //- CAMBIAR DE ESTADO A INACTIVO
                    'orden_trabajo':varOrdenTrabajo,
                    'estado':varEstado
                },
                dataType: "json",
                success: function(respuesta){
                    //console.log(respuesta);
                    if (respuesta == 'ok'){
                        toastr["success"]("Proceso de Información Correcta", "!Atención!");
                        table.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                    accion="";

                }
            });        
    });                
    //******************//
    //--BOTON EDITAR -//
    //******************//

    $('#tbl_orden_trabajo tbody').on('click','.btnEditar', function(){
        accion = 3; //-GUARDAR MODIFICACION

        id_area = null;
        id_linea =null;
        desBloquearInputs();

        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();
        $("#iptFecha").focus();

        // //---------------------------------------
        var data = table.row($(this).parents('tr')).data();
        numero_orden = data['orden_trabajo'];
        //console.log(data['estado']);
        
        $("#iptFecha").val(data['fecha_muestreo']);
        $("#iptProducto").val(data['nombre_producto']);
        $("#iptNorma").val(data['normativa']) ;
        $("#iptCategoria").val(data['categoria']) ;
        $("#iptPresentacion").val(data['presentacion']) ;
        $("#selPlanta").val(data['planta']) ;
        
        $("#iptArea").val(data['area']) ;
        $("#iptLinea").val(data['linea']) ;
        id_area = data['id_area'];
        id_linea = data['id_linea'];

        buscarSelect(data['razon_social'],'selProveedor');
        buscarSelect(data['turno'],'selTurno');
        

        $("#selUsuarios").val(data['usuario']) ;
        $("#iptMuestra").val(data['numero_muestra']) ;
        $("#iptLote").val(data['lote']) ;

        $("#iptId_item").val(data['id_item']);
        $("#iptEstado").val(data['estado']);
        // $("#iptIdNormativa").val(data['id_normativa']);
     })


    //********************************************************    
    //-AUTOCOMPLETE BUSCAR PRODUCTOS 
    //********************************************************  
    $( "#iptProducto" ).on( "blur", function() {

        setTimeout(() => {
            $("#iptProducto").val($("#iptProductoBuscar").val());
        }, 1);        

    } );

    //********************************************************    
    //- NORMATIVA
    //********************************************************      
    $("#iptNorma").focus(function() {
        $("#iptProducto").val($("#iptProductoBuscar").val());
    });
           

    //********************************************************    
    //- CERRAR
    //********************************************************          
    $("#btnClose").click(function() {
        bloquearInputs();
        limpiar();
        $("#btnClose" ).prop( "hidden", true );
        accion="";
    })     

    //********************************************************    
    //-NUEVO
    //********************************************************      
     $("#btnNew").click(function() {
        accion=2;

        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();

        $("#iptFecha").val('<?php echo $SoloFechaActual ?>')
        $("#iptFecha").focus();



        //$("#iptCodigoBarra").focus();
    })

    //********************************************************    
    //-GUARDAR 
    //********************************************************
    $("#btnSave").click(function() {
        const msg = [];
        var varFecha = $("#iptFecha").val();
        var varProducto = $("#iptProducto").val();
        var varId_item = $("#iptId_item").val();
        
        var varNorma = $("#iptNorma").val();
        var varCategoria = $("#iptCategoria").val();
        
        var varPresentacion = $("#iptPresentacion").val();
        var varPlanta = $("#selPlanta").val();
        
        var varUbicacion = $("#iptArea").val();
        // var id_area
        // var id_linea

        var varProveedor = $("#selProveedor").val();
        var varTurno = $("#selTurno").val();
        var varUsuarios = $("#selUsuarios").val();
        var varMuestra = $("#iptMuestra").val();
        var varLote = $("#iptLote").val();
        var varIdNormativa = $("#iptNorma").val();

        //if (varId_item.length == 0){msg.push(' Id_item');}
        // alert(varIdNormativa);
        // return;
        
        if (varProducto.length == 0){msg.push(' Producto');}
        if (varNorma.length == 0){msg.push(' Norma');}
        if (varCategoria.length == 0){msg.push('Categoria');}
        if (varPresentacion.length == 0){msg.push('Presentacion');}
        if (varPlanta.length == 1){msg.push(' Planta');}    
        if (varUbicacion == 0){msg.push(' Ubicacion/Area/Linea');}
        if (varProveedor == 0){msg.push(' Proveedor');}
        if (varTurno == 0){msg.push(' Turno');}
        if (varUsuarios.length == 1){msg.push(' Usuarios');}
        if (varMuestra.length == 0){msg.push(' Muestra');}
        if (varLote.length == 0){msg.push(' Lote');}
        
        
        if (msg.length != 11 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 11){
            toastr["error"]("No existen datos para guardar", "!Atención!");
                return;
        };
            $.ajax({
                    async: false,
                    url:"ajax/orden_trabajo.ajax.php",
                    method: "POST",
                    data: {
                        'accion':accion,
                        'varFecha':varFecha,
                        'varProducto':varProducto,
                        'varId_item':varId_item,
                        // 'varNorma':varNorma,
                        // 'varCategoria':varCategoria,
                        'varIdNormativa':varIdNormativa,
                        //'varPresentacion':varPresentacion,
                        'varPlanta':varPlanta,
                        // 'varUbicacion':varUbicacion,
                        'varId_Area':id_area,
                        'varId_Linea':id_linea,
                        'varProveedor':varProveedor,
                        'varTurno':varTurno,
                        'varUsuarios':varUsuarios,
                        'varMuestra':varMuestra,
                        'varLote':varLote,
                        'numero_orden':numero_orden
                    },
                    dataType: "json",
                    success: function(respuesta){
                        //console.log(respuesta);
                        if (respuesta == 'ok-ING' || respuesta == 'ok-EDIT'){
                            limpiar();
                            toastr["success"]("Proceso de Información Correcta", "!Atención!");
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


    
}); // fin documet ready

function desBloquearInputs(){
    $("#iptFecha").prop("disabled",false);
    $("#iptProducto").prop("disabled",false);

    $("#selPlanta").prop("disabled",false);
    $("#iptArea").prop("disabled",false);
    // $("#iptLinea").prop("disabled",false);
    $("#selProveedor").prop("disabled",false);
    $("#selTurno").prop("disabled",false);
    $("#selUsuarios").prop("disabled",false);
    $("#iptMuestra").prop("disabled",false);
    $("#iptLote").prop("disabled",false);
    
}
function bloquearInputs(){
    $("#iptFecha").prop("disabled",true);
    $("#iptProducto").prop("disabled",true);
    // $("#iptNorma").prop("disabled",true);
    // $("#iptCategoria").prop("disabled",true);
    // $("#iptPresentacion").prop("disabled",true);
    $("#selPlanta").prop("disabled",true);
    $("#iptArea").prop("disabled",true);
    // $("#iptLinea").prop("disabled",true);
    $("#selProveedor").prop("disabled",true);
    $("#selTurno").prop("disabled",true);
    $("#selUsuarios").prop("disabled",true);
    $("#iptMuestra").prop("disabled",true);
    $("#iptLote").prop("disabled",true);

}
function limpiar(){
    $("#iptFecha").val("");
    $("#iptProducto").val("");
    $("#iptNorma").val("");
    $("#iptCategoria").val("");
    $("#iptPresentacion").val("");
    $("#selPlanta").val(0);
    $("#iptArea").val("");
    $("#iptLinea").val("");
    $("#selProveedor").val(0);
    $("#selTurno").val(0);
    $("#selUsuarios").val(0);
    $("#iptMuestra").val("");
    $("#iptLote").val("");
    $("#iptId_item").val("");
    // $("#iptIdNormativa").val("");
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