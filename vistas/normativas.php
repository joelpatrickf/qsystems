<?php 
    //include("modulos/header.php");  
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
					       <h4> Administrar Normativas</h4>
                        </div>
                        <div class="col-6 text-" >
                        <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden>close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;" > Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

                        </div>                    
                    </div>
				</div>
				<div class="card-body pb-0 pt-0 mb-2">

                    <div class="row">
                       <!-- Columna NORMATIVA -->
                       <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptNormativa"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Normativa</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptNormativa" placeholder="Ingrese la Normativa" required autofocus disabled>
                            </div>
                        </div>                       
                       <!-- Columna CATEGORIA -->
                       <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptCategoria"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Categoria</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptCategoria" placeholder="Ingrese la Categoria" required autofocus disabled>
                            </div>
                        </div> 
                        <!-- Columna tipo analisis -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptTipoAnalisis"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Tipo Analisis</span><span class="text-danger">*</span>
                                </label>
                                <!-- <input type="text" class="form-control" id="iptTipoAnalisis" placeholder="Ingrese Tipo Analisis" required  disabled> -->
			                    <select class="form-control " aria-label=".form-select-sm example" id="iptTipoAnalisis" disabled >
                                    <option value="0">Tipo de Analisis</option>
                                        <option value="FISICO">FISICO</option>
                                        <option value="QUIMICO">QUIMICO</option>
                                        <option value="FISICOQUIMICOS">FISICOQUIMICOS</option>
                                        <option value="MICROBIOLOGICOS">MICROBIOLOGICOS</option>
                                        <option value="METALES PESADOS">METALES PESADOS</option>
                                        <option value="CONTAMINANTES">CONTAMINANTES</option>
                                        <option value="PESTICIDAS">PESTICIDAS</option>
                                        <option value="PLAGUICIDAS">PLAGUICIDAS</option>
                                        <option value="ADULTERANTES">ADULTERANTES</option>
                                        <option value="MEDICAMENTOS VETERINARIOS">MEDICAMENTOS VETERINARIOS</option>
                                        <option value="SUSTANCIAS ORGANICAS">SUSTANCIAS ORGANICAS</option>
    			                    </select>                                
                            </div>
                        </div>

                        <!-- Columna ANALISIS -->
                        <div class="col-12 col-lg-5">
                            <div class="form-group mb-2">
                                <label class="" for="iptAnalisis"><i class="fas fa-users fs-6"></i>
                                    <span class="small">Analisis</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptAnalisis" placeholder="Ingrese el Analisis" required disabled autocomplete="off" >
                            </div>
                        </div>

                        <!-- Columna LIMITE MINIMO -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptLimiteMinimo"><i class="fas fa-users fs-6"></i>
                                    <span class="small">Limte Min.</span>
                                    <span class="text-danger"><abbr title="En caso de mayor que, colocar el carácter, mayor o igual que sin caracter" class="acronimo" >?</abbr></span>
                                </label>
                                <input type="text" class="form-control " id="iptLimiteMinimo" placeholder="Ingrese Limite Minimo" required disabled autocomplete="off" >
                            </div>
                        </div>                        
                        <!-- Columna LIMITE MAXIMO -->
                        <div class="col-12 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptLimiteMaximo"><i class="fas fa-users fs-6"></i>
                                    <span class="small">Limite Max.</span><span class="text-danger"><abbr title="En caso de menor que, colocar el carácter, menor o igual que sin caracter" class="acronimo" >?</abbr></span>  
                                </label>
                                <input type="text" class="form-control " id="iptLimiteMaximo" placeholder="Ingrese Limite Maximo" required disabled autocomplete="off" >
                            </div>
                        </div>                    
					</div>                        

				</div>  <!-- END div 1º card body -->
            
                    
                <div class="card-body pb-0 pt-3">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tbl_normativas" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center">hd</th> <!-- 1 -->
                                        <th class="text-center">Id</th> <!-- 1 -->
                                        <th class="text-center">Normativa</th> <!-- 2 -->
                                        <th class="text-center">Categoria</th> <!-- 2 -->
                                        <th class="text-center">Tipo Analisis</th> <!-- 2 -->
                                        <th class="text-center">Analisis</th> <!-- 5 -->
                                        <th class="text-center">Lim-Min</th> <!-- 5 -->
                                        <th class="text-center">Lim-Max</th> <!-- 5 -->
                                        <th class="text-center">Fecha</th> <!-- 5 -->
                                        <th class="text-center">Usuario</th> <!-- 5 -->
                                        <th class="text-center">Opciones</th> <!-- 12 -->
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 2º card-body      -->
            </div> <!-- END CARD      -->
        </div>
    </div>




<//?php include("modulos/footer.php"); ?>

<script type="text/javascript">
var accion = "";
id_normativa = '';

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    //********************************************************    
    //-CARGA DE CATEGORIAS EXISTENTES
    //********************************************************    

        table = $("#tbl_normativas").DataTable({
            select: true,
            ordering: false,
            pagingType: 'simple_numbers',
            // info: false,
            // paging: false, 
           
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf','print'
            ],

            ajax:{
                url:"../ajax/normativas.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {'accion' : 1}, // 1 para listar productos
            },

            responsive: {
                details: {
                    type: 'column'
                }
            },
            
            columnDefs:[

                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},
                { width: '20%', targets: 5},

                {targets:0,visible:false,},
                {targets:9,visible:false,},
                { responsivePriority: 1, targets: 10 },
                {
                    targets:10,
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
    //--BOTON EDITAR -//
    //******************//

    $('#tbl_normativas tbody').on('click','.btnEditar', function(){
        accion = 3; //-GUARDAR MODIFICACION
        var data = table.row($(this).parents('tr')).data();
console.log(data);
        id_normativa = data[1];

        //alert(data[4]);
        $("#iptNormativa").val(data[2]);
        $("#iptCategoria").val(data[3]);
        $("#iptAnalisis").val(data[5]);
        $("#iptLimiteMinimo").val(data[6]);
        $("#iptLimiteMaximo").val(data[7]);

        //$("#iptTipoAnalisis").val(data[4]);
        buscarEnSelect(data[4],'iptTipoAnalisis')

        $("#btnClose" ).prop( "hidden", false );
        desBloquearInputs();        
        
     })

    $('#tbl_normativas tbody').on('click','.btnEliminar', function(){
        toastr["error"]("LAS CATEGORIAS NO SE PUEDE ELIMINAR NI DESACTIVAR", "!Atención!");
     })

    //********************************************************    
    //-GUARDAR NORMATIVA
    //********************************************************    
    $("#btnSave").click(function() {

        const msg = [];
        if ($("#iptNormativa").val() == ''){msg.push('Normativa');}
        if ($("#iptCategoria").val() == ''){msg.push('Categoria');}
        if ($("#iptTipoAnalisis").val() == 0){msg.push(' Tipo de Analisis');}
        if ($("#iptAnalisis").val() == ''){msg.push(' Analisis');}
        if ($("#iptLimiteMinimo").val() == ''){msg.push(' Limite Minimo');}
        if ($("#iptLimiteMaximo").val() == ''){msg.push(' Limite Maximo');}
        
        if (msg.length != 6 && msg.length != 0){
            toastr["error"]("Ingrese los siguientes datos  :"+msg, "!Atención!");
            return;
        }else if(msg.length == 6){
            
            toastr["error"]("No existen datos para guardar", "!Atención!");
            bloquearInputs();
            $("#btnClose" ).prop( "hidden", true );
            return;
        }
        


        $.ajax({
                async: false,
                url:"../ajax/normativas.ajax.php",
                method: "POST",
                data: {
                    'accion': accion,
                    'normativa': $("#iptNormativa").val(),
                    'categoria': $("#iptCategoria").val(),
                    'tipo_analisis': $("#iptTipoAnalisis").val(),
                    'analisis': $("#iptAnalisis").val(),
                    'limite_minimo': $("#iptLimiteMinimo").val(),
                    'limite_maximo': $("#iptLimiteMaximo").val(),
                    'id_normativa': id_normativa,
                },
                dataType: "json",
                success: function(respuesta){
                    console.log(respuesta);
                    if (respuesta == 'ok'){
                        toastr["success"]("Accion Correcta", "!Atención!");
                        limpiar();
                        bloquearInputs();
                        $("#btnClose" ).prop( "hidden", true );
                        table.ajax.reload();
                    }else{
                        toastr["error"]("Ingreso Incorrecto, entrada duplicada", "!Atención!");
                    }
                }
            });
    });

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
    })    

});

function desBloquearInputs(){
    $("#iptNormativa").prop( "disabled", false );
    $("#iptTipoAnalisis").prop( "disabled", false );
    $("#iptAnalisis").prop( "disabled", false );
    $("#iptLimiteMinimo").prop( "disabled", false );
    $("#iptLimiteMaximo").prop( "disabled", false );
    $("#iptCategoria").prop( "disabled", false );
    
    $("#iptNormativa").focus();
}
function bloquearInputs(){
    $("#iptNormativa").prop( "disabled", true );
    $("#iptTipoAnalisis").prop( "disabled", true );
    $("#iptAnalisis").prop( "disabled", true );
    $("#iptLimiteMinimo").prop( "disabled", true );
    $("#iptLimiteMaximo").prop( "disabled", true );
    $("#iptCategoria").prop( "disabled", true );
}
function limpiar(){
    $("#iptNormativa").val('');
    $("#iptTipoAnalisis").val(0);
    $("#iptAnalisis").val('');
    $("#iptLimiteMinimo").val('');
    $("#iptLimiteMaximo").val('');
    $("#iptCategoria").val('');
    
}


function buscarSelect(abuscar)
{
	var select=document.getElementById("iptNormativa");
 
	// obtenemos el valor a buscar
	//var buscar=document.getElementById("buscar").value;
	var buscar= abuscar;
 
	// recorremos todos los valores del select
	for(var i=1;i<select.length;i++)
	{
		if(select.options[i].text==buscar)
		{
			select.selectedIndex=i;
		}
	}
}

function buscarEnSelect(abuscar,select1)
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