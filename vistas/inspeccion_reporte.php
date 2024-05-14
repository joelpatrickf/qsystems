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
					       <h4> Reporte Inspección </h4>
                        </div>

                    </div>
				</div>
				<div class="card-body pb-0 pt-3">
                    <div class="row ">
                        

                        
                        <!-- <div class="col-lg-12"> -->

                        
                            <!-- Columna fecha Ini-->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-0">
                                    <label class="" for="iptFechaInspeccion"><i class="fas fa-calendar fs-6"></i>
                                        <span class="">Fecha Inicio</span><span class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <input type="date" id="iptFechaInspeccion"   
                                    class="form-control" value="<?php echo $SolorFechaActual?>" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                            <!-- Columna fecha fin-->
                            <div class="col-12 col-lg-2">
                                <div class="form-group mb-0">
                                    <label class="" for="iptFechaInspeccion"><i class="fas fa-calendar fs-6"></i>
                                        <span class="">Fecha Final</span><span class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <input type="date" id="iptFechaInspeccion"   class="form-control" value="<?php echo $SolorFechaActual?>" autocomplete="off" disabled>
                                </div>
                            </div>                            

                            <!-- Columna Area -->
                            <!-- <div class="col-12 col-lg-3">
                                <div class="form-group mb-2">
                                    <label class="" for="iptArea"><i class="fas fa-file-signature fs-6"></i>
                                        <span class="">Area de Producción</span><span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input id="iptArea" type="text" style="width:20px;" class="form-control" autocomplete="off" disabled >
                                    </div>                                
                                </div>                                
                            </div> -->
                                                       
                            <div class="col-12 col-lg-2 ">
                                <div class="form-group mb-0">
                                    <label class="mb-0" for="iptFechaInspeccion">
                                        <span class=""> Buscar</span>
                                    </label>
                                </div>
                                <div class="input-group">
                                    <button type="button" id="btnBuscar" class="btn btn-primary btn-sm ">   <i class="fa fa-search"></i>  </button>
                                </div>                                
                                
                            </div>
                        <!-- </div> -->

				    </div>
				</div>


				<!-- </div>  -->

                <div class="card-body pb-0 pt-3">
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_reporteInspeccion"  class="table table-striped cell-border " style="width:100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th class="text-center"></th>
                                        <th class="text-center">id_insp</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">IdItem</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">idArea</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center">idLinea</th>
                                        <th class="text-center">Linea</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">nMuestras</th>
                                        <th class="text-center">SumVar</th>
                                        <th class="text-center">Cuenta</th>
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


			</div> 
            <!-- END div card body principal -->
                

	</div>


<!-- </div> -->
<!-- page content -->


<script type="text/javascript">


$(document).ready(function(){
    
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;

    
    /* - TABLA DE PRODUCTOS AGREGADOS-*/
    table_productos = $("#tbl_reporteInspeccion").DataTable({

        bDestroy: true,
        bPaginate: false,
        bAutoWidth: false,
        searching: false,
        select: true,
        info: false,
        ordering: false,
        responsive: true,
    

        ajax:{
            url:"../ajax/inspeccion.ajax.php",
            dataSrc: '',
            type:"POST",
            data: {
                'accion':10

            },
        },

        columns: [
            { "data": "vacio" }, 
            { "data": "id_insp" }, 
            { "data": "fecha" },
            { "data": "id_item" },
            { "data": "nombre_producto" },
            { "data": "categoria" },
            { "data": "id_area" },
            { "data": "area" },
            { "data": "id_linea" },
            { "data": "linea" },
            { "data": "usuario" },
            { "data": "num_muestras" },
            { "data": "sum_variables" },
            { "data": "cuenta" },
            { "data": "vacio" },
        ],
        
        columnDefs:[

            {"className": "dt-center", "targets": "_all"},
            {targets:0,orderable:false,className:'control'},

            {targets:2,visible:false}, //id_item
            {targets:6,visible:false}, //id_area
            {targets:8,visible:false}, //id_linea

            {
                targets:14,
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
            url: "json/idioma.json"
        },  
    });
    




    


});


</script>