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
					       <h4> Administrar Proveedores </h4>
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

                    <div class="row">
                        <!-- Columna CodigoBarra -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptRazonSocial"><i class="fas fa-signature fs-6"></i>
                                    <span class="small">Razon Social</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptRazonSocial" required autofocus disabled>
                            </div>
                        </div>

                        <!-- Columna Producto -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptRucc"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Ruc</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptRucc" required disabled >
                            </div>
                        </div>

                       <!-- Columna TIPO DE PROVEEDOR -->
                       <div class="col-4 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="selTipoProveedor"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Tipo Proveedor</span><span class="text-danger">*</span>
                                </label>
			                    <select class="form-control " aria-label=".form-select-sm example" id="selTipoProveedor" disabled >
                                    <option value="0">Elija</option>
                                        <option value="Externo">Externo</option>
                                        <option value="Interno">Interno</option>
			                    </select>
                            </div>
                        </div> 


                        <!-- Columna Direccion -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptDireccion"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Direccion</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptDireccion" required autofocus disabled>
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
                        <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th> <!-- 1 -->
                                        <th class="text-center">Id</th> <!-- 1 -->
                                        <th class="text-center">Razon Social</th> <!-- 2 -->
                                        <th class="text-center">Ruc</th> <!-- 5 -->
                                        <th class="text-center">Tipo</th> <!-- 4 -->
                                        <th class="text-center">Direccion</th> <!-- 4 -->
                                        <th class="text-center">Usuario</th> <!-- 6 -->
                                        <th class="text-center">F.Creacion</th> <!-- 6 -->
                                        <th class="text-center">Estado</th> <!-- 6 -->
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
    var id_proveedor = '';

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    //********************************************************    
    //-CARGA DE USUARIOS EXISTENTES
    //********************************************************    

    table = $("#tbl_usuarios").DataTable({
        select: true,
        info: false,
        ordering: false,
        // pagingType: 'simple_numbers',
        
        //paging: false,            
        dom: 'Bfrtilp',
        buttons: ['excel', 'print','pdf'],

        ajax:{
            url:"ajax/proveedores.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 1}, // 1 para listar productos
        },
        columns: [
            { "data": "vacio" }, //Estas son las colunas del json
            { "data": "id_proveedor" }, //Estas son las colunas del json
            { "data": "razon_social" },
            { "data": "rucc" },
            { "data": "tipo_proveedor" },
            { "data": "direccion" },
            { "data": "usuario" },
            { "data": "fecha_creacion" },
            { "data": "estado" }
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
            // {targets:7,visible:false},
            // {targets:8,visible:false},

            { responsivePriority: 1, targets: 9 },
            // { responsivePriority: 2, targets: 2 },
            {
                targets:9,
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

    $('#tbl_usuarios tbody').on('click','.btnEditar', function(){
        accion = 3; //-GUARDAR MODIFICACION

        //---------------------------------------
        var data = table.row($(this).parents('tr')).data();
        // console.log(data);

        // return;
        id_proveedor = data[1];
        $("#iptRazonSocial").val(data[2]);
        $("#iptRucc").val(data[3]);
        $("#iptDireccion").val(data[5]);
        buscarSelect(data[4]);
        
        

        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();        


     })


    //******************//
    //--BOTON ELIMINAR -//
    //******************//     
    $('#tbl_usuarios tbody').on('click','.btnEliminar', function(){
        accion = 4;

        var data = table.row($(this).parents('tr')).data();
        id_proveedor = data[1];
        estado = data[8];

        $.ajax({
            async: false,
            url:"ajax/proveedores.ajax.php",
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


        const msg = [];
        var razon_social =  $("#iptRazonSocial").val();
        var rucc =  $("#iptRucc").val();
        var tipo_proveedor =  $("#selTipoProveedor").val();
        var direccion =  $("#iptDireccion").val();


        if (razon_social.length == 0){msg.push('Razon Social');}
        if (rucc.length == 0){msg.push('Rucc');}
        if (tipo_proveedor.length == 1){msg.push(' Tipo de Proveedor');}
        if (direccion.length == 0){msg.push(' Dirección');}

        if (msg.length != 4 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 4){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }



        $.ajax({
                async: false,
                url:"ajax/proveedores.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'razon_social': razon_social,
                    'rucc': rucc,
                    'tipo_proveedor': tipo_proveedor,
                    'direccion': direccion,
                    'id_proveedor': id_proveedor // para cuando se envie a guardar modificaciones
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
    $("#iptRazonSocial").prop( "disabled", false );
    $("#iptRucc").prop( "disabled", false );
    $("#selTipoProveedor").prop( "disabled", false );
    $("#iptDireccion").prop( "disabled", false );

}
function bloquearInputs(){
    $("#iptRazonSocial").prop( "disabled", true );
    $("#iptRucc").prop( "disabled", true );
    $("#selTipoProveedor").prop( "disabled", true );
    $("#iptDireccion").prop( "disabled", true );
}
function limpiar(){
    $("#iptRazonSocial").val("");
    $("#iptRucc").val("");
    $("#selTipoProveedor").val(0);
    $("#iptDireccion").val("");
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