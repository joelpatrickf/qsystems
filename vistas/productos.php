<?php 
    $fechaActual = date('YmdHis', time()); 
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    
</style>

<!-- page content -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
					       <h4> Administrar Productos </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden >Close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0">
                    <div class="row">
                        <!-- Columna CodigoBarra -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptCodigoBarra"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Codigo de Barra</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptCodigoBarra" required autofocus disabled>
                            </div>
                        </div>

                        <!-- Columna Producto -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptProducto"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Nombre del Producto</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptProducto" required disabled >
                            </div>
                        </div>
                        <!-- Columna NORMATIVA -->
                        <div class="col-4 col-lg-3 pb-0">
                            <div class="form-group mb-2">
                                <label class="" for="selNormativa"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Normativa</span><span class="text-danger">*</span>
                                </label>
			                    <select class="form-control " aria-label=".form-select-sm example" id="selNormativa" disabled >
			                    </select>
                            </div>
                        </div>    
                        <!-- Columna Categoria -->
                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptCategoria"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Categoria</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptCategoria" required disabled>
                            </div>

                        </div>

                       <!-- Columna Presentacion -->
                       <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptPresentacion"><i class="fas fa-plus-circle fs-6"></i>
                                    <span class="small">Presentación</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptPresentacion" required  disabled>
                            </div>
                        </div>
                                                
                       <!-- Columna UNIDAD DE MEDIDA -->
                       <div class="col-4 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="selUnidadMedida"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Unidad de Medida</span><span class="text-danger">*</span>
                                </label>
			                    <select class="form-control " aria-label=".form-select-sm example" id="selUnidadMedida" disabled >
                                    <option value="0">Unidad de Medida</option>
                                        <option value="mg">mg</option>
                                        <option value="g">g</option>
                                        <option value="onz">onz</option>
                                        <option value="lb">lb</option>
                                        <option value="Kg">Kg</option>
                                        <option value="ml">ml</option>
                                        <option value="L">L</option>
                                        <option value="N/A">N/A</option>
			                    </select>
                            </div>
                        </div>                         
					</div>                        
				</div> <!-- END div 1º card body -->
                <div class="card-body pb-0 pt-3">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_usuarios" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center">Item</th> <!-- 1 -->
                                        <th class="text-center">Cod-Barra</th> <!-- 2 -->
                                        <th class="text-center">Producto</th> <!-- 5 -->
                                        <th class="text-center">Normativa</th> <!-- 4 -->
                                        <th class="text-center">Categoria</th> <!-- 4 -->
                                        <th class="text-center">Presentacion</th> <!-- 5 -->
                                        <th class="text-center">Fecha_Creacion</th> <!-- 6 -->
                                        <th class="text-center">Estado</th> <!-- 6 -->
                                        <th class="text-center">Usuario</th> <!-- 6 -->
                                        <th class="text-center">Opciones</th> <!-- 12 -->
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 2º card-body      -->

			</div> <!-- END div card principal -->
                


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

         //****************************
        //----CARGA NORMATIVA
        //****************************
        $.ajax({
            url:"../ajax/normativas.ajax.php",
            type: "POST",
            data: {'accion': 4}, // 1  lista 
            dataType: 'json',
            success: function(respuesta){
                console.log(respuesta);
                var options = '<option selected value="0">Normativa</option>';
                for (let index = 0; index < respuesta.length;index++){
                    options = options + '<option value='+respuesta[index]['normativa']+'>'+respuesta[index]['normativa']+'</option>';


                }
                $("#selNormativa").html(options);
                varNormativas = respuesta;
                


            }
        });
 
 
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
            url:"../ajax/productos.ajax.php",
            dataSrc: '',
            type:"POST",            
            data: {'accion' : 1}, // 1 para listar productos
        },
        columns: [
            { "data": "id_item" }, //Estas son las colunas del json
            { "data": "codigo_barra1" },
            { "data": "nombre_producto" },
            { "data": "normativa" },
            { "data": "categoria" },
            { "data": "presentacion" },
            { "data": "fecha_creacion" },
            { "data": "estado" },
            { "data": "usuario" }
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
            // {targets:7,visible:false},
            // {targets:8,visible:false},

            { responsivePriority: 1, targets: 9 },
            { responsivePriority: 2, targets: 2 },
            {targets:8,visible:false,},
            {
                targets:9,
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
    //--BOTON SELECT NORMATIVA -//
    //******************//
    $("#selNormativa").change(function() {
        //---selNormativa
        var varNormativaSel1 = document.getElementById("selNormativa");
        var varNormativaSel = varNormativaSel1.options[varNormativaSel1.selectedIndex].text;

        for (let i = 0; i < varNormativas.length; i++) {
            if (varNormativas[i]["normativa"] == varNormativaSel)  {
                //console.log(varNormativas[i]["normativa"]);
                $("#iptCategoria").val(varNormativas[i]["categoria"]);
            }
        }
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
        Id_Item = data[0];
        $("#iptCodigoBarra").val(data[1]);
        $("#iptCategoria").val(data[4]);
        
        var var_productoAll = data[2].split(' | ');
        var var_producto =var_productoAll[0];
        $("#iptProducto").val(var_producto);
        
        $("#iptPresentacion").val(var_productoAll[1]);
        var_UnidadMedida = var_productoAll[2];
        buscarSelect_um(var_UnidadMedida);
        
        
        buscarSelect(var_UnidadMedida,'selUnidadMedida')
        buscarSelect(data[3],'selNormativa')
        
        // alert(data[3]);
        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();        


     })


    //******************//
    //--BOTON ELIMINAR -//
    //******************//     
    // $('#tbl_usuarios tbody').on('click','.btnEliminar', function(){
    //     //accion = 4;
    //     alert("Se pondra en estado INACTIVO al usuario");

    //  })

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
        //---selNormativa
        var varNormativaSel1 = document.getElementById("selNormativa");
        
        const msg = [];
        var codigoBarra =  $("#iptCodigoBarra").val();
        var producto =  $("#iptProducto").val();
        var categoria =  $("#iptCategoria").val();
        var normativa = varNormativaSel1.options[varNormativaSel1.selectedIndex].text;
        var presentacion =  $("#iptPresentacion").val();

        var um1 = document.getElementById("selUnidadMedida");
        var um = um1.options[um1.selectedIndex].text;        
        
        if (codigoBarra.length == 0){msg.push('Codigo de Barra');}
        if (producto.length == 0){msg.push('Producto');}
        if (normativa == 0){msg.push(' Normativa');}
        if (categoria.length == 0){msg.push(' Categoria');}
        if (presentacion.length == 0){msg.push(' Presentación');}
        if ($("#selUnidadMedida").val() == 0){msg.push(' Unidad de Medida U.M.');}

        if (msg.length != 6 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos :"+msg, "!Atención!");
            return;
        }else if(msg.length == 6){
            toastr["error"]("No existen datos para guardar", "!Atención!");
            return;
        }
        presentacion = presentacion.toUpperCase() +" | "+um;
        producto = producto.toUpperCase() +" | "+presentacion;
        // alert(producto);
        // return;
        //producto =  producto + " | "+presentacion;

        $.ajax({
                async: false,
                url:"../ajax/productos.ajax.php",
                method: "POST",
                data: {
                    'accion':accion,
                    'codigo_barra': codigoBarra,
                    'nombre_producto': producto,
                    'normativa': normativa,
                    'categoria': categoria,
                    'presentacion': presentacion,
                    'id_item': Id_Item // para cuando se envie a guardar modificaciones
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
    $("#iptCodigoBarra").prop( "disabled", false );
    $("#iptProducto").prop( "disabled", false );
    $("#selNormativa").prop( "disabled", false );
    //$("#iptCategoria").prop( "disabled", false );
    $("#iptPresentacion").prop( "disabled", false );
    $("#selUnidadMedida").prop( "disabled", false );

}
function bloquearInputs(){
    $("#iptCodigoBarra").prop( "disabled", true );
    $("#iptProducto").prop( "disabled", true );
    $("#selNormativa").prop( "disabled", true );    
    //$("#iptCategoria").prop( "disabled", true );
    $("#iptPresentacion").prop( "disabled", true );
    $("#selUnidadMedida").prop( "disabled", true );
}
function limpiar(){
    $("#iptCodigoBarra").val("");
    $("#iptProducto").val("");
    $("#selNormativa").val(0);
    $("#iptCategoria").val("");
    $("#iptPresentacion").val("");
    $("#selUnidadMedida").val(0);
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

function buscarSelect_um(bbuscar)
{
	var select=document.getElementById("selUnidadMedida");
	var buscar= bbuscar;
	for(var i=1;i<select.length;i++){
		if(select.options[i].text==buscar){
			select.selectedIndex=i;
		}
	}
}
</script>