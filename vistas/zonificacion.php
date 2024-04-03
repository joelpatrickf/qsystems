<?php 
    //include("modulos/header.php");  
    $fechaActual = date('YmdHis', time()); 
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
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
					       <h4> Administrar Zonificación </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0">
	                <form>

                        <!-- Columna CodigoBarra -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptArea"><i class="fas fa-signature fs-6"></i>
                                    <span class="small">Areas de Producción</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptArea" required autofocus disabled>
                            </div>
                        </div>

                        <!-- Columna Producto -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Líneas de Producción</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptLinea" required disabled >
                            </div>
                        </div>

                        <!-- Columna Direccion -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptPuntos"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Puntos de Inspección</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptPuntos" required autofocus disabled>
                            </div>
                        </div>

 

 

                      
					</div>                        
	                  <!-- <button type="button" class="btn btn-primary" id="btnSave">Save</button> -->
	                </form>        

				</div> 

                <div class="card-body pb-0 pt-3">
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_zonificacion" class="table cell-border shadow display nowrap" width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center">Linea</th>
                                        <th class="text-center">Punto Inspección</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Opciones</th> <!-- 12 -->
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
    var selResultadosArea;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var itemsLinea = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var id; 


    //********************************************************    
    //-CARGA DE USUARIOS EXISTENTES
    //********************************************************    

    table = $("#tbl_zonificacion").DataTable({
        select: true,
        info: false,
        ordering: false,
        responsive: true,
    // rowReorder: {
    //     selector: 'td:nth-child(2)'
    // },
        // pagingType: 'simple_numbers',
        
        //paging: false,            
        dom: 'Bfrtilp',
        buttons: ['excel', 'print','pdf'],

        ajax:{
            url:"../ajax/zonificacion.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 3}, // LISTAR ALL
        },
        columns: [
            { "data": "vacio" }, 
            { "data": "id" }, 
            { "data": "area_p" }, 
            { "data": "linea_p" },
            { "data": "puntos_insp" },
            { "data": "fecha" },
            { "data": "usuario" },
            { "data": "vacio" }
           ],        
        columnDefs:[

        {"className": "dt-center", "targets": "_all"},
        {targets:0,orderable:false,className:'control'},
            {targets:0,visible:false},

            { responsivePriority: 1, targets: 7 },
            {
                targets:7,
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
            } ,    
        ],
        pageLength: 10,
        language: 
            {
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

        //********************************************************    
        //-TRAER LISTADO DE AREAS
        //********************************************************    
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
                console.log("autocomplete 1",respuesta);
                for (let i = 0; i < respuesta.length;i++){
                    items.push(respuesta[i]['area_p']);
                }
                $("#iptArea").autocomplete({
                    source: items,
                    select: function(event, ui){
                        const myArray = ui.item.value;
                        $("#iptArea").val(myArray);
                    }
                })
            }
        });

        
    //*************************
    //-TRAER LISTADO DE LINEAS
    //*************************

    $("#iptArea").change(function() {

        selResultadoArea = $("#iptArea").val();
        //alert(selResultadosArea);
        $.ajax({
            async: false,
            url:"../ajax/zonificacion.ajax.php",
            method: "POST",
            data: {
                'accion':1,
                'filtro': 'linea',
                'dato': selResultadoArea
                
            },
            dataType: "json",
            success: function(respuesta){
                console.log("autocomplete 2",respuesta);
                for (let i = 0; i < respuesta.length;i++){
                    itemsLinea.push(respuesta[i]['linea_p']);
                }
                $("#iptLinea").autocomplete({
                    source: itemsLinea,
                    select: function(event, ui){
                        const myArray = ui.item.value;
                        $("#iptLinea").val(myArray);
                    }
                })

            }
        });        
    });
    
    //******************//
    //--BOTON EDITAR -//
    //******************//

    $('#tbl_zonificacion tbody').on('click','.btnEditar', function(){
        accion = 4; //-GUARDAR MODIFICACION

        //---------------------------------------
        var data = table.row($(this).parents('tr')).data();
        //console.log(data);
        // // return;

        $("#iptArea").val(data['area_p']);
        $("#iptLinea").val(data['linea_p']);
        $("#iptPuntos").val(data['puntos_insp']);
        id = data['id'];

        
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();        
        $("#selArea").focus();


     })


    //******************//
    //--BOTON ELIMINAR -//
    //******************//     
    $('#tbl_zonificacion tbody').on('click','.btnEliminar', function(){
        accion = 4;

        var data = table.row($(this).parents('tr')).data();
        id_proveedor = data[1];
        estado = data[8];

        $.ajax({
            async: false,
            url:"../ajax/proveedores.ajax.php",
            method: "POST",
            data: {
                'accion':4,
                'estado':estado,
                'id_proveedor': id_proveedor
            },
            dataType: "json",
            success: function(respuesta){
                //console.log(respuesta);
                if (respuesta == 'ok'){
                    toastr["success"]("Cambio de estado Correcto", "!Atención!");
                    // limpiar();
                    // bloquearInputs();

                    table.ajax.reload();
                }else{
                    toastr["error"]("No se pudo cambiar de estado ", "!Atención!");
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
    })

    $("#btnNew").click(function() {
        accion=2;
        id=null;
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();
        $("#iptCodigoBarra").focus();

    })

    //********************************************************    
    //-GUARDAR 
    //********************************************************    
    $("#btnSave").click(function() {
        
        
        const msg = [];
        var area =  $("#iptArea").val();
        var linea =  $("#iptLinea").val();
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
                    'area': area,
                    'linea': linea,
                    'puntos': puntos,
                    'id': id,
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
                    accion="";

                }
            });
    });

});

function desBloquearInputs(){
    $("#iptArea").prop( "disabled", false );
    $("#iptLinea").prop( "disabled", false );
    $("#iptPuntos").prop( "disabled", false );
    $("#selArea").focus();

}
function bloquearInputs(){
    $("#iptArea").prop( "disabled", true );
    $("#iptLinea").prop( "disabled", true );
    $("#iptPuntos").prop( "disabled", true );
}
function limpiar(){
    $("#iptArea").val("");
    $("#iptLinea").val("");
    $("#iptPuntos").val("");
    
    // $("#selLinea").empty();
    // $("#selLinea").val(0);
    // $("#selLinea").prepend('<option selected="true" value="0">Seleccionar Linea</option>');


}

// function buscarSelect(abuscar)
// {
// 	var select=document.getElementById("selArea");
// 	var buscar= abuscar;
// 	for(var i=1;i<select.length;i++){
// 		if(select.options[i].text==buscar){
// 			select.selectedIndex=i;
// 		}
// 	}
// }

</script>