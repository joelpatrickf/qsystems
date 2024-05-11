<?php 
    //include("modulos/header.php");  
    date_default_timezone_set("America/Guayaquil");    
    $fechaActual = date('YmdHis', time()); 
    $horaActual = date('H:i:s', time()); 
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
					       <h4>Cerrar Inspecciones Abiertas</h4>
                        </div>
                        <div class="col-6 text-" >
                            <!-- <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button> -->
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <!-- <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button> -->

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0">
	                <form>

                    <div class="row">
                        <!-- Columna CodigoBarra -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptHoraFin"><i class="fas fa-signature fs-6"></i>
                                    <span class="small">Hora Fin</span><span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control" id="iptHoraFin" required disabled  value="00:00:01">
                            </div>
                        </div>

                        <!-- Columna Producto -->
                        <div class="col-12 col-lg-8">
                            <div class="form-group mb-2">
                                <label class="" for="iptObservacion"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Observación</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptObservacion" required disabled placeholder="Motivo por el cual dejo abierta la inspeccion">
                            </div>
                        </div>


 

                      
					</div>                        
	                  <!-- <button type="button" class="btn btn-primary" id="btnSave">Save</button> -->
	                </form>        

				</div> 
			</div> <!-- END div 1º card body -->
                
                <div class="card-body pb-0 pt-3">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_cerrar" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th> <!-- 1 -->
                                        <th class="text-center">Id</th> <!-- 1 -->
                                        <th class="text-center">Fecha</th> <!-- 2 -->
                                        <th class="text-center">Hora Inicio</th> <!-- 5 -->
                                        <th class="text-center">Hora Fin</th> <!-- 4 -->
                                        <th class="text-center">Usuario</th> <!-- 4 -->
                                        <th class="text-center">Observación</th> <!-- 4 -->
                                        <th class="text-center">Opciones</th> <!-- 12 -->
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
<!-- </div> -->
<!-- page content -->

<//?php include("modulos/footer.php"); ?>


<script type="text/javascript">
    var accion = '';
    var id_insp = '';

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    var usuario_inspeccion ='';
    

    //********************************************************    
    //-CARGA DE USUARIOS EXISTENTES
    //********************************************************    

    table = $("#tbl_cerrar").DataTable({
        select: true,
        info: false,
        ordering: false,
        ajax:{
            url:"../ajax/inspeccion.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 9}, // 1 para listar productos
        },
        columns: [
            { "data": "vacio" }, //Estas son las colunas del json
            { "data": "id_insp" }, //Estas son las colunas del json
            { "data": "fecha" },
            { "data": "hora_ini" },
            { "data": "hora_fin" },
            { "data": "usuario" },
            { "data": "observacion" }
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

            {
                targets:7,
                orderable:false,
                render: function(data, type, full, meta){
                    return "<center>"+
                                "<span class='btnEditar text-primary px-1' style='cursor:pointer;'>"+
                                    "<i class='fas fa-pencil-alt fs-5'></i>"+
                                "</span>"+                                    
                            "</center>"
                }
            }     
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

    //******************//
    //--BOTON EDITAR -//
    //******************//

    $('#tbl_cerrar tbody').on('click','.btnEditar', function(){
        accion = 3; 
        //---------------------------------------
        var data = table.row($(this).parents('tr')).data();
        
        //document.getElementById("iptHoraFin").value='00:00:01';
        // console.log(data);
        // return;

        id_insp = data['id_insp'];
        usuario_inspeccion = data['usuario'];
        //$("#iptHoraFin").val(data['hora']);
        desBloquearInputs();


     })


    //******************//
    //--BOTON ELIMINAR -//
    //******************//     
    $('#tbl_cerrar tbody').on('click','.btnEliminar', function(){
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
                console.log(respuesta);
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
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();
        $("#iptCodigoBarra").focus();
    })

    //********************************************************    
    //-GUARDAR 
    //********************************************************    
    $("#btnSave").click(function() {
        var flag_cerrar = 2; // cerrar inspeccion del dia por el ADMINISTRADOR
        if (id_insp == null || id_insp == '' ){
            toastr["error"]("Seleccione una inspección a cerrar", "!Atención!");
            return;
        }
        const msg = [];
        var hora_fin =  document.getElementById("iptHoraFin").value;
        var observacion =  $("#iptObservacion").val();
        if (hora_fin === '00:00:01'){msg.push('Hora Final');}
        if (observacion.length == 0){msg.push('Observación');}
        
        if (msg.length != 2 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 2){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        


        $.ajax({
                async: false,
                url:"../ajax/inspeccion.ajax.php",
                method: "POST",
                data: {
                    'accion':3 ,
                    'id_insp': id_insp,
                    'flag_cerrar':flag_cerrar,
                    'hora_fin':hora_fin,
                    'observacion':observacion,
                    'usuario': usuario_inspeccion
                },
                dataType: "json",
                success: function(respuesta){
                    console.log(respuesta);
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
    $("#iptHoraFin").prop( "disabled", false );
    $("#iptObservacion").prop( "disabled", false );
    
    $("#iptHoraFin").focus();
}
function bloquearInputs(){
    $("#iptHoraFin").prop( "disabled", true );
    $("#iptObservacion").prop( "disabled", true );

}
function limpiar(){
    $("#iptHoraFin").val("");
    $("#iptObservacion").val("");
    //$("#iptHoraFin").val("00:00");
}

function buscarSelect(abuscar)
{
	var select=document.getElementById("selTipoProveedor");
	var buscar= abuscar;
	for(var i=1;i<select.length;i++){
		if(select.options[i].text==buscar){
			select.selectedIndex=i;
		}
	}
}

</script>