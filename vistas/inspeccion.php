<?php 
    //include("modulos/header.php");  
    // $fechaActual = date('YmdHis', time()); 
    date_default_timezone_set("America/Guayaquil");
    $fechaActual = date('Y-m-d H:i:s', time());     
    $horaActual = date('H:i:s', time());
    $SolorFechaActual = date('Y-m-d');
?>
<style>
table.dataTable tbody  { white-space:normal; }
    table.dataTable > tbody > tr > td {
        white-space: normal!important;
    }
    
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
    	padding: 0.1em;
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
    /* Cambia color del mouse hover */
    .ui-state-active, 
    .ui.widget-content, 
    .ui-state-active{
        background-color: #fae3cd !important;
        border: none !important;
    }    
    .cabeza{
        position: relative!important; 
        background-color: #17a2b8!important;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        padding: 0rem 0rem;
        position: relative;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;        
        
    }
    .card-title {
        font-size: 1.1rem;
        font-weight: 400;
    } 
    .cardInfo{
        width: 75%;
    }   
    @media only screen and (max-width: 1070px) {
        .cardInfo{
            width: 100%;
        }   
    }    

    /* .card-info:not(.card-outline)>.card-header .btn-tool {
        color: rgb(255 255 255 / 80%);
    } */
     /* @media only screen and (max-width: 1000px) {
        .table-responsive {
            display: table!important;
        }
    } */
</style>

    <!-- page content -->
    <!-- <div class="right_col" role="main"> -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-4">
					       <h4> Inspección de Producto Terminado </h4>
                        </div>
                        <div class="col-4">
                            <h5 id="lblBloqueo" style=" color:red;" hidden>ACCESO BLOQUEADO, Comuniquese con el Administrador</h5>
					       <span id='spn1'> # Inspección: </span><span id="spnInspeccion" class="text-danger"></span>
                           <br>
					       <span id='spn2'> Hora de Inicio: </span><span id="spnHoraInicio" class="text-danger"></span>
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
                                    <input type="date" id="iptFechaInspeccion"   class="form-control" value="<?php echo $SolorFechaActual?>" autocomplete="off" disabled>
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
                                        <span class="">Contenido Nominal</span><span class="text-danger">*</span>
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
                        <table id="tbl_productos"  class="table table-striped cell-border " style="width:100%">

                        <!-- <table id="tbl_productos" class="table cell-border shadow display nowrap" width="100%"> -->
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th>
                                        <th class="text-center">au_inc</th>
                                        <th class="text-center">id_insp</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">id_area </th>
                                        <th class="text-center">Area </th>
                                        <th class="text-center">id_linea </th>
                                        <th class="text-center">Linea </th>
                                        <th class="text-center">Id_Item</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Lote</th>
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Cont</th>
                                        <th class="text-center">Acción</th> 
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <!-- END card-body datatable -->


                <!-- <div class="card-body pb-0 pt-3">
                    <div class="row">
                        
                        <div class="col-3">
                            <form>
                                <div id="campos_dinamicos"></div>
                            </form>
                            
                        </div>
                        <div class="col-9">
                            <form>
                                <div id="campos_variables"></div>
                            </form>
                        </div>

                        
                    </div> 
                </div>  -->

			</div> 
            <!-- END div card body principal -->
                
            <div class="row mt-3" id="div_muestras" >
                <div class="col-lg-12" style="display: grid;place-items: center;">
                    <div class="card card-info cardInfo" >

                        <div class="card-header cabeza" >
                            <!-- <h3 class="card-title" style="float: left!important;color: #fff!important;margin: 10px;">Ingreso de Muestras y Variables</h3> -->
                            <span class="ml-2" style="color:white;font-size: 1.4rem; "> Ingreso de Muestras y Variables - </span>
                            <span  style="color:white;font-size: 1.2rem; " id="spnProducto" ></span>

                            <span class="mr-2" id="spnContadorProducto" style="float: right;color:white;font-size: 1.4rem;"  >fer</span>

                        </div> <!-- ./ end card-header -->

                        
                        <div class="card-body" style="background-color: #E1E0DC !important;">
                            <div class="row">
                                <div class="col-3">
                                    <form>
                                        <div id="campos_dinamicos"></div>
                                    </form>
                                    
                                </div>
                                <div class="col-9">
                                    <form>
                                        <div id="campos_variables"></div>
                                    </form>
                                </div>

                            </div>

                        </div> 
                        <!-- ./ end card-body -->
                        <div class="card-footer py-0">
                            <button type="button" id="btnCerrarMuestra" class="btn btn-primary mt-1" style="float: right;" >Cerrar</button>
                            <button type="button" id="btnGuardarMuestra" class="btn btn-success mt-1" style="float: right;" >Grabar</button>
                        </div>                     
                    </div>
                </div>

		    </div>
	</div>


<!-- </div> -->
<!-- page content -->


<script type="text/javascript">
    var accion = '';
    var id_proveedor = '';
    var verInspecAbierta=0;
    var varIdInspeccion=null;
    var fechaActual= '<?php echo $SolorFechaActual?>';
    var estatus;

    var id_area=null; // para llamar los selects
    var id_linea=null; // para llamar los selects

    var id_area_validar=null; // para validar al momento de incrementar cantidad de veces
    var id_linea_validar=null; // para validar al momento de incrementar cantidad de veces
    var lote_validar=null; // para validar al momento de incrementar cantidad de veces


    var flagValidarArea =null;
    var flagValidarProducto =null;
    var id_item =null;
    var id_item_muestra =null;

    let arrayMuestras = [];
    let arrayVariables = [];

    var varNombreProducto;
    var id_item_contador;

    var arrMuestras = [];
    var arrVariables = [];
    var hora_actual = '<?php echo $horaActual; ?>'    


$(document).ready(function(){
    $("#div_muestras" ).prop( "hidden", true );
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    /* -REVISAR SI EXISTE INSPECCION ABIERTA-*/
    InciarInspeccion();
    
    
    if (verInspecAbierta == 1){
        return;
        verInspecAbierta=0;
    }


    var varidInsp=$("#spnInspeccion" ).html();
    if(varidInsp.length > 0){
        cargarTabla();
    }
  


    

    //****************************
    //----CARGA AREA
    //****************************
    id_area = null;
    id_linea = null;

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
            // console.log("autocomplete AREA 1",respuesta);
            
                $("#iptArea").bind( "keydown", function( event ) {
                i = 0;
                }).autocomplete({
                    source: respuesta,
                    minLength: 1,
                    select: function(event, ui) {
                        // console.log("id_area null",id_area)
                        // console.log("id_linea null",id_linea)

                        flagValidarArea="";
                        flagValidarArea = ui.item.id_area;
                        // console.log(ui.item.linea);
                        // console.log("value  ",ui.item.value)
                        $("#iptLinea").val(ui.item.linea);
                        
                        // console.log("ui  ",ui.item.value)

                        id_area = ui.item.id_area;
                        id_linea = ui.item.id_linea;
                        $("#iptProducto").focus();
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

    /*- AL PRESIONAL DEL O BACKSPACE INPUT AREA -*/
    $("#iptArea").keydown(function(e){
        if((e.which == 8) || (e.which == 46)){
            $("#iptArea").val("");
            $("#iptLinea").val("");
        }
    });    

    /*- AL PERDER EL FOCO DEL INPUT AREA -*/
    $( "#iptArea" ).on( "blur", function() {
        //console.log("ID AREA ",flagValidarArea);
        if ((flagValidarArea == undefined) || (flagValidarArea == "") || (flagValidarArea == null)){
            toastr["error"]("Seleccione Correctamente Area de Producción", "!Atención!");
            $( "#iptArea" ).val("");
            $( "#iptArea" ).focus();
        }
        flagValidarArea =null;
    });

 
    //****************************
    //----CARGA PRODUCTOS
    //****************************

    $.ajax({
        async: false,
        url:"ajax/productos.ajax.php",
        method: "POST",
        data: {
            'accion':6
        },
        dataType: "json",
        success: function(respuesta){
            // console.log("autocomplete PRODUCTOS",respuesta);
            
                $("#iptProducto").bind( "keydown", function( event ) {
                i = 0;
                }).autocomplete({
                    source: respuesta,
                    minLength: 1,
                    select: function(event, ui) {
                        // console.log("id_area null",id_area)
                        // console.log("id_linea null",id_linea)

                        flagValidarProducto="";
                        flagValidarProducto = ui.item.label;
                        // console.log(ui.item.linea);
                        // console.log("value  ",ui.item.value)
                        $("#iptProducto").val(ui.item.label);
                        
                        $("#iptCategoria").val(ui.item.categoria);
                        $("#iptPresentacion").val(ui.item.presentacion);
                        $("#iptPrecio").val(ui.item.precio);
                        id_item = ui.item.id_item

                        $("#iptLote").focus();
                    }
                })

        }
    });     

    /*- AL PRESIONAL DEL O BACKSPACE INPUT PRODUCTO -*/
    $("#iptProducto").keydown(function(e){
        if((e.which == 8) || (e.which == 46)){
            $("#iptProducto").val("");
            $("#iptCategoria").val("");
            $("#iptPresentacion").val("");
            $("#iptPrecio").val("");
        }
    });    

    /*- AL PERDER EL FOCO DEL INPUT PRODUCTO -*/
    $( "#iptProducto" ).on( "blur", function() {
        console.log("ID PRODUCTO ",flagValidarProducto);
        if ((flagValidarProducto == undefined) || (flagValidarProducto == "") || (flagValidarProducto == null)){
            toastr["error"]("Seleccione Correctamente Producto", "!Atención!");
            $("#iptProducto" ).val("");
            $("#iptCategoria").val("");
            $("#iptPresentacion").val("");
            $("#iptPrecio").val("");

            $("#iptProducto" ).focus();
        }
        flagValidarProducto =null;
    });
    //*******************************
    //- CERRAR INSPECCION
    //*******************************    

    $("#btnCerrar").focus(function(){
        var flag_cerrar = 1; // cerrar inspeccion del dia por el usuario
        var hora_fin = null;
        var observacion = null;
        var vusuario=null;
        $.ajax({
            async: false,
            url:"ajax/inspeccion.ajax.php",
            method: "POST",
            data: {
                'accion':3 ,
                'id_insp':$("#spnInspeccion" ).html(),
                'flag_cerrar':flag_cerrar,
                'hora_fin':hora_fin,
                'observacion':observacion,
                'usuario':vusuario

            },
            dataType: "json",
            success: function(respuesta){
                console.log("CERRAR  inspeccion",respuesta);
                if (respuesta == 'ok' ){
                    toastr["success"]("Inspeccion Cerrada", "!Atención!");
                    limpiar ();
                    bloquearInputs ();
                    
                    $("#btnNew").prop( "hidden", false );
                    $("#btnNew").prop( "disabled", false );
                    $("#btnCerrar").prop( "hidden", true );                    
                    $("#spnInspeccion" ).html("");
                    $("#spnHoraInicio" ).html("");
                    
                    table_productos.rows().remove().draw();
                    return false;
                }

            }
        });
    }); 

    /*******************************
          AGREGAR PRODUCTOS
    *******************************/
    $("#btnAgregar").click(function() {
        // alert(varIdInspeccion);
        // return;


        const msg = [];
        
        var area = $("#iptArea").val();
        var producto = $("#iptProducto").val();
        var lote = $("#iptLote").val();
        var turno = $("#selTurno").val();
        

        if (area.length == 0){msg.push(' Area');}
        if (producto.length == 0){msg.push('Producto');}
        if (lote.length == 0){msg.push(' Lote');}
        if (turno.length == 1){msg.push(' Turno');}
        
        if (msg.length != 3 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 3){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        
        /* INI Validamos que el turno sea 1 solo*/        
        var oTable = $('#tbl_productos').DataTable();
        var info = oTable.page.info();
        var count = info.recordsTotal;

        if (count >0){
            var data = oTable.row(0).data();
            vTurno = data['turno']; 
            if ($("#selTurno").val() != vTurno){
                //toastr["error"]("Seleccion de Turno fuera de horario", "!Atención!");
                // alert("turno incosistente");
                // return;
                Swal.fire({
                    icon: "error",
                    title: "El turno seleccionado no es consistente con el turno actual",
                    
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    denyButtonText: `Cancelar`
                    }).then((result) => {
                    
                    if (result.isConfirmed) {
                        //Swal.fire("Saved!", "", "success");
                        guardarProductos();
                        table_productos.ajax.reload();
                        limpiar();

                    //save here                           
                    }
                });                
                
            }else{
                guardarProductos();
                table_productos.ajax.reload();
                limpiar();
            }
        }else{
        guardarProductos();
        cargarTabla();
        limpiar();            
        // table_productos.ajax.reload();


        }
        // return;
        // cargarTabla();
        /* FIN Validamos que el turno sea 1 solo*/        
             

    });

    
    //*******************************
    //-GUARDAR Zonificacion completa
    //*******************************
    $("#btnCerrarMuestra").click(function(e) {
        e.preventDefault();
        $("#btnCerrar").prop( "disabled", false ); // desactivamos el boton mientras se ingresan las M1/VARIABLES
        removerMuestras();


    });



    //*******************************
    //-GUARDAR MUESTRAS Y VARIABLES
    //*******************************
    $("#btnGuardarMuestra").click(function() {
        
        
        const myProducto = varNombreProducto.split("|");
        let ContenidoNeto = myProducto[1];
        
        // alert(ContenidoNeto);
        // return;

        var flagVacios = 0; 
        var flagMenorCero = 0; 
        arrMuestras = [];  // enceramos los array
        arrVariables = []; // enceramos los array

        
        var vVariables = document.getElementsByClassName("variables");

        
        // array MUESTRAS ----------------------------------------------------------------//
        //verificamos is existen campos vacios

        var vMuestras = document.getElementsByClassName("muestras");

        var arrPesoNeto = [];
        var arrPesoNetoFlag = 0;
        
        
        for(i=0;i<vMuestras.length;i++){
            var iptName = vMuestras[i].name;
            var iptValue = vMuestras[i].value;
            arrMuestras.push(iptName+" | "+iptValue);
            if (iptValue == "" ){
                flagVacios ++;
            }
            if (iptValue <= 0 ){
                flagMenorCero ++;
            }  
            var maxContenidoNeto = (ContenidoNeto*1)+(ContenidoNeto*0.15);
            var minContenidoNeto = (ContenidoNeto*1)-(ContenidoNeto*0.15)
            
            //console.log(ContenidoNeto+"  "+maxContenidoNeto+"  "+minContenidoNeto);
            
            if (iptValue > maxContenidoNeto || iptValue < minContenidoNeto ){
                arrPesoNeto.push(iptName);
                arrPesoNetoFlag++;
            }              
            
        }
        if (flagMenorCero>0){
            toastr["error"]("Existen valores de MUESTRAS menores a 0", "!Atención!");
            return;
        }        



        //console.log("array Muestras ",arrMuestras);        
        //console.log("array Variables flag ",flagVacios);

        //----------------------------------------------------------------//
        // ARRAY VARIABLES 
        //----------------------------------------------------------------//
        // array VARIABLES (verificamos is existen campos vacios)
        const msgVariable = [];
        //flagMenorCero=0:
        
        for(i=0;i<vVariables.length;i++){
            var iptName = vVariables[i].name;
            var iptValue = vVariables[i].value;
            arrVariables.push(iptName+" | "+iptValue);
            if (iptValue == "" ){
                flagVacios ++;
            }
            if (iptValue > vMuestras.length){
                msgVariable.push(iptValue);
            }
            if (iptValue <= 0 ){
                flagMenorCero ++;
            }            
        }
        // alert(flagMenorCero);

        if (flagMenorCero>0){
            toastr["error"]("Existen conteos de inspección menores a 0", "!Atención!");
            return;
        }

        if (msgVariable.length>0){
            toastr["error"]("Ha ingresado valores superiores a la cantidad de muestra determinada  "+msgVariable, "!Atención!");
            flagVacios=1;
            return;
        }
        console.log("array Variables ",arrVariables);
        
        
        // si existe algun campo vacio abortamos y enviamos mensaje
        if (flagVacios >0){
            toastr["error"]("EXISTEN CAMPOS VACIOS, CANTIDAD "+flagVacios, "!Atención!");
            return;
        }
        var vSalir=0;
        if (arrPesoNetoFlag>0){
            Swal.fire({
                    icon: "error",
                    title: "Existen inconsistrencias con el peso neto, desea continuar <br>",
                    text: arrPesoNeto,
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    denyButtonText: `Cancelar`
                    }).then((result) => {
                    
                        if (result.isConfirmed) {
                            guardarMuestras();
                            $("#btnCerrar").prop( "disabled", false ); // desactivamos el boton mientras se ingresan las M1/VARIABLES

                            return
                        }

                    });  
            
                //toastr["error"]("Existen inconsistrencias con el peso neto <br>"+arrPesoNeto, "!Atención!");
            //return;
        }else{
            guardarMuestras();
            $("#btnCerrar").prop( "disabled", false ); // desactivamos el boton mientras se ingresan las M1/VARIABLES
            
        }

        
        
        return;
//aqui

        // $.ajax({
        //         async: false,
        //         url:"ajax/inspeccion.ajax.php",
        //         method: "POST",
        //         data: {
        //             'accion':7,
        //             'muestras': arrMuestras,
        //             'variables': arrVariables,
        //             'id_insp': $("#spnInspeccion" ).html(),
        //             'id_item': id_item_muestra,
        //             'id_item_contador':id_item_contador,
        //             'hora_actual':hora_actual,
        //             'id_area_validar': id_area_validar,
        //             'id_linea_validar': id_linea_validar,
        //             'lote_validar':lote_validar 
        //         },
        //         dataType: "json",
        //         success: function(respuesta){
        //             console.log("guardar ",respuesta);
        //             if (respuesta == 'ok'){
        //                 removerMuestras();
        //                 toastr["success"]("Ingreso de Información Correcta", "!Atención!");
        //                 table_productos.ajax.reload();
        //             }else{
        //                 toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
        //             }
        //             id_item_muestra = null;
        //         }
        //     });
    });

    /*-- BOTON NUEVO ---*/
    $("#btnNew").click(function() {
        accion=2;        
        desBloquearInputs();
        $("#btnNew" ).prop( "hidden", true );
        $("#btnCerrar").prop( "hidden", false );
        CrearInspeccion(); // Guardamos la creacion de la inspeccion
        InciarInspeccion(); // revisamos la creacion de la inspeccion
        cargarTabla();
        // table_productos = $("#tbl_productos").DataTable();


    })
    
   
    
    

    $("#btnClose").click(function() {
        bloquearInputs();
        limpiar();
        $("#btnClose" ).prop( "hidden", true );
        $("#btnSave" ).prop( "hidden", true );
        accion="";
    })





    //*******************************
    //- LINEA EDITAR
    //*******************************
    $('#tbl_productos tbody').on('click','.btn_IngresarMuestras', function(){
        
        $("#btnCerrar").prop( "disabled", true ); // desactivamos el boton mientras se ingresan las M1/VARIABLES

        var data = table_productos.row($(this).parents('tr')).data();
        varNombreProducto = data['nombre_producto'];
        id_item_muestra = data['id_item'];
        id_item_contador = data['id_item_contador'];
        
        id_area_validar = data['id_area'];
        id_linea_validar = data['id_linea'];
        lote_validar = data['lote'];
//aqui
        //console.log(data);

        $("#spnProducto" ).html(varNombreProducto);
        
        $("#div_muestras" ).prop( "hidden", false );
        $("#spnContadorProducto" ).html("Numero Muestreo: "+id_item_contador);
        crearCampos();        

        
    })


    


});

function desBloquearInputs(){
    $("#iptFechaInspeccion").prop( "disabled", false );
    $("#iptArea").prop( "disabled", false );
    // $("#iptLinea").prop( "disabled", false );
    $("#iptProducto").prop( "disabled", false );
    // $("#iptCategoria").prop( "disabled", false );
    // $("#iptPresentacion").prop( "disabled", false );
    // $("#iptPrecio").prop( "disabled", false );
    $("#iptLote").prop( "disabled", false );
    $("#selTurno").prop( "disabled", false );

    $("#iptFechaInspeccion").focus();
}
function bloquearInputs(){
    $("#iptFechaInspeccion").prop( "disabled", true );
    $("#iptArea").prop( "disabled", true );
    // $("#iptLinea").prop( "disabled", true );
    $("#iptProducto").prop( "disabled", true );
    // $("#iptCategoria").prop( "disabled", true );
    // $("#iptPresentacion").prop( "disabled", true );
    // $("#iptPrecio").prop( "disabled", true );
    $("#iptLote").prop( "disabled", true );
    $("#selTurno").prop( "disabled", true );
}
function limpiar(){
    $("#iptFechaInspeccion").val(fechaActual);
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

/* -REVISAR SI EXISTE INSPECCION ABIERTA-*/
function InciarInspeccion()
{
    var fechaHoy = '<?php echo $fechaActual?>';
    // alert(fechaHoy);
    $.ajax({
        async: false,
        url:"ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':1,
            'filtro': 'abierta' 
        },
        dataType: "json",
        success: function(respuesta){
            if (respuesta.length==0){
                console.log("retorno 0 No existen inspecciones abiertas en ningun caso");
                $("#btnNew").prop( "disabled", false );
                $("#btnAgregar").prop( "disabled", false );
                bloquearInputs()
                return;
            }
            if (respuesta[0]['fecha'] == fechaActual){
                console.log("Inspeccion abierta fecha de hoy dia");
                $("#spnInspeccion" ).html(respuesta[0]['id_insp']);
                $("#spnHoraInicio" ).html(respuesta[0]['hora_ini']);
                
                $("#btnNew").prop( "hidden", true );
                $("#btnCerrar").prop( "hidden", false );
                $("#btnAgregar").prop( "disabled", false );

                desBloquearInputs();
                varIdInspeccion = respuesta[0]['id_insp'];
                
                return;
            }else if (respuesta[0]['fecha'] != fechaActual){
                console.log("Inspeccion abierta fecha dias anterires");
                toastr["error"]("TIENE INSPECCIONES ABIERTAS, NO PUEDE SEGUIR, PONGASE EN CONTACTO CON EL ADMINISTRADOR <br> Fecha: "+respuesta[0].fecha+"<br> Hora Inicio: "+respuesta[0].hora_ini+"<br> Usuario: "+respuesta[0].usuario , "!Atención!");
                
                $("#lblBloqueo" ).prop( "hidden", false );
                
                $("#spn1" ).prop( "hidden", true );
                $("#spn2" ).prop( "hidden", true );
                $("#spnInspeccion" ).prop( "hidden", true );
                $("#spnHoraInicio" ).prop( "hidden", true );
                verInspecAbierta=1;
                return;
            }
        }
    });
}

/* - grabar crear inspeccion-*/
function CrearInspeccion(){
    $.ajax({
        async: false,
        url:"ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':2
        },
        dataType: "json",
        success: function(respuesta){
            console.log("guardar crear inspeccion",respuesta);
            

        }
    });
}

function crearCampos(){
var numero_muestras;
var varVariables;
    //****************************
    //----CARGA PRODUCTOS
    //****************************

    $.ajax({
        async: false,
        url:"ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':6
        },
        dataType: "json",
        success: function(respuesta){
            // console.log("NUMERO MUESTRAS",respuesta);
             numero_muestras = respuesta['nmuestras'][0]['nmuestras'];
             varVariables = respuesta['variables'];

        }
    });     
    //console.log(varVariables);

    // carga los inputs de numero de muestras registrados en MUESTRAS
    cantidad = numero_muestras;
    var div = document.getElementById("campos_dinamicos");
    while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;
        for(var i = 1, cantidad = Number(cantidad); i <= cantidad; i++){
            var salto = document.createElement("P");
            var input = document.createElement("input");
            var text = document.createTextNode("Muestra " + i + ": ");
            input.setAttribute("name", "M" + i);
            input.setAttribute("id", "M" + i);
            input.setAttribute("size", "12");
            input.setAttribute("min", "1");
            input.setAttribute("type", "number");
            input.setAttribute("style","max-width:120px");
            input.setAttribute("style","display:inline-block;text-align:center");
            

            input.className = "input form-control w-50 muestras";
            
            salto.className = "mb-1";
            salto.appendChild(text);
            salto.appendChild(input);
            div.appendChild(salto);
        }
    
    
    
        // carga las variables
    numero_variables = varVariables.length;
    var div = document.getElementById("campos_variables");
    var contador = 0;
    while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;

        for(var i = 1, numero_variables = Number(numero_variables); i <= numero_variables; i++){
            var salto = document.createElement("P");
            var input = document.createElement("input");
            var text = document.createTextNode(varVariables[contador]['variable'] +":  ");
            input.setAttribute("name", "itpVariable_" + varVariables[contador]['id_ins_var']);
            input.setAttribute("id", "itpVariable_" + varVariables[contador]['id_ins_var']);
            input.setAttribute("size", "12" );
            input.setAttribute("min", "1" );
            input.setAttribute("type", "number" );
            input.setAttribute("style","max-width:120px");
            input.setAttribute("style","display:inline-block;text-align:center");
            input.setAttribute("required", "" );
            input.setAttribute("autocomplete", "off" );
            
            salto.setAttribute("style","text-align:right");
            
            
            

            input.className = "input form-control w-25 variables";
            salto.className = "mb-1";
            salto.appendChild(text);
            salto.appendChild(input);
            div.appendChild(salto);
            
            contador = contador + 1;
        }    
        
}

function removerMuestras(){
    
    var element = document.getElementById("campos_variables"); 
    element.textContent = "";        

    
    var element1 = document.getElementById("campos_dinamicos"); 
    element1.textContent = "";                
    $("#spnProducto" ).html("");

    $("#div_muestras" ).prop( "hidden", true );    
}


function cargarTabla(){
    // alert( $("#spnInspeccion" ).html());
        /* - TABLA DE PRODUCTOS AGREGADOS-*/
        table_productos = $("#tbl_productos").DataTable({

            "bDestroy": true,
            "bPaginate": false,
            "bAutoWidth": false,
            searching: false,
            select: true,
            info: false,
            ordering: false,
            responsive: true,

            //varIdInspeccion
            ajax:{
                url:"ajax/inspeccion.ajax.php",
                dataSrc: '',
                type:"POST",
                data: {
                    'accion':5,
                    'id_insp': $("#spnInspeccion" ).html()
                },
            },

            columns: [
                { "data": "vacio" }, 
                { "data": "au_inc" }, 
                { "data": "id_insp" }, 
                { "data": "fecha" },
                { "data": "id_area" },
                { "data": "area" },
                { "data": "id_linea" },
                { "data": "linea" },
                { "data": "id_item" },
                { "data": "nombre_producto" },
                { "data": "categoria" },
                { "data": "precio" },
                { "data": "lote" },
                { "data": "turno" },
                { "data": "id_item_contador" },
                { "data": "vacio" },
            ],

            columnDefs:[

                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},

                {targets:1,visible:false}, //au_inc
                {targets:2,visible:false}, //id_insp
                {targets:4,visible:false}, //id_area
                {targets:6,visible:false}, //id_linea
                {targets:8,visible:false},

                { responsivePriority: 1, targets: 9 },
                { responsivePriority: 1, targets: 15 },
                {
                    targets:15,
                    orderable:false,
                    render: function(data, type, full, meta){
                        return "<center>"+
                                        "<span class='btn_IngresarMuestras text-primary px-1' style='cursor:pointer;'>"+"<i class='fas fa-circle-plus fs-5'></i>"+"</span>"+
                                "</center>"
                    }
                } ,    
            ],
            pageLength: 10,
            language: 
            {
                url: "vistas/json/idioma.json"
            },  
        });      
}



function guardarProductos(){
    $.ajax({
        async: false,
        url:"ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':44,
            'id_insp' : $("#spnInspeccion" ).html(),
            'fecha' : $("#iptFechaInspeccion").val(),
            'id_area': id_area,
            'id_linea': id_linea,
            'id_item': id_item,
            'lote': $("#iptLote").val(),
            'turno': $("#selTurno").val()
        },
        dataType: "json",
        success: function(respuesta){
            console.log("retorno existe", respuesta)
            if (respuesta == null){
                $.ajax({
                    async: false,
                    url:"ajax/inspeccion.ajax.php",
                    method: "POST",
                    data: {
                        'accion':4,
                        'id_insp' : $("#spnInspeccion" ).html(),
                        'fecha' : $("#iptFechaInspeccion").val(),
                        'id_area': id_area,
                        'id_linea': id_linea,
                        'id_item': id_item,
                        'lote': $("#iptLote").val(),
                        'turno': $("#selTurno").val()
                    },
                    dataType: "json",
                    success: function(respuesta){
                        console.log("retorno existe", respuesta)
                        if (respuesta == null){

                        }

                    }
                });

            }else{
                toastr["error"]("Producto ya esta creado", "!Atención!");
                return;
            }

        }
    });   
}


function guardarMuestras(){
    $.ajax({
        async: false,
        url:"ajax/inspeccion.ajax.php",
        method: "POST",
        data: {
            'accion':7,
            'muestras': arrMuestras,
            'variables': arrVariables,
            'id_insp': $("#spnInspeccion" ).html(),
            'id_item': id_item_muestra,
            'id_item_contador':id_item_contador,
            'hora_actual':hora_actual,
            'id_area_validar': id_area_validar,
            'id_linea_validar': id_linea_validar,
            'lote_validar':lote_validar 
        },
        dataType: "json",
        success: function(respuesta){
            console.log("guardar ",respuesta);
            if (respuesta == 'ok'){
                removerMuestras();
                toastr["success"]("Ingreso de Información Correcta", "!Atención!");
                table_productos.ajax.reload();
            }else{
                toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
            }
            id_item_muestra = null;
        }
    });    
}
</script>