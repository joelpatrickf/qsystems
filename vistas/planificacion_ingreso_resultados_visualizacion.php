<?php 
    $fechaActual = date('YmdHis', time()); 
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    

    /*quitamos el borde al item*/
    .ui-menu-item-wrapper:hover {
      border: 0;
    }

    /* Llenamos de color azul toda la linea */
    li.ui-menu-item:hover {
        background-color: #007bff;
    }

    .colorHead{
        background-color: #358db7!important;
    }

    ul.ui-widget 
    li.ui-menu-item {
      list-style-image: none;
      font-family: "Helvetica Neue",HelveticaNeue,helvetica,arial,sans-serif;
      font-size: 92%;
      font-weight: 300;
      font-style: normal;
      font-size-adjust: none;
      
      margin: 0;
      padding: 1.8px 4.55px;
      
      white-space: nowrap;

      color: darkred!important;
    }
    .ui-widget-content a {
      color: #444444;

    }



    
</style>

<!-- page content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
                           <h4> Reporte de Ingresos de Resultados</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0 pt-1">
                    <div class="row">

                        <div class="col-4 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptArea"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Área</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptArea" autofocus autocomplete="off">
                                <input type="hidden" class="form-control" id="iptIdPlanificacion" >
                            </div>
                        </div>


                        <div class="col-4 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Línea</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptLinea" disabled>
                            </div>
                        </div>

                        <div class="col-4 col-lg-3 pb-0">
                            <div class="form-group mb-2">
                                <label class="" for="iptPuntoInspeccion"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Punto de Inspección</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptPuntoInspeccion" disabled >
                                <input type="hidden" id="iptNormativa_hidden" >
                            </div>
                        </div>    
              

                       <div class="col-4 col-lg-3" hidden>
                            <div class="form-group mb-2">
                                <label class="" for="selTipo"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Categorias</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selCategoriaAnalisis" disabled>
                                </select>
                            </div>
                        </div>

                       <div class="col-4 col-lg-2" >
                            <div class="form-group mb-2">
                                <label class="" for="selTipo"><i class="fas fa-calendar fs-6"></i>
                                    <span class="small">Fecha</span><span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="iptFechaResultados" >
                            </div>
                        </div> 
                       <div class="col-4 col-lg-1" >
                            <div class="form-group mb-3">
                                <label class="" for="selTipo">
                                    <span class="small">Buscar</span><span class="text-danger">*</span>
                                </label>
                                    <button type="button" class="btn btn-block btn-danger mt-3 mx-2" id="btnBuscar" style=";font-size: 12px;height: 25px;width: 30px;padding: 0px!important;margin: 0px!important;">
                                        <i class="fas fa-search fs-6"></i>
                                    </button>
                            </div>
                        </div> 

                    </div>                        
                    <!-- Parte del ingreso de datos OCULTA -->
                    <div class="col-sm-6"></div>

                </div> <!-- END div 1º card body -->


                <!-- 2ª tabla  -->
                <div class="card-body pb-0 pt-1">
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_resultados" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr>
                                        <th class="text-center colorHead">Fecha</th>
                                        <th class="text-center colorHead">Area</th>
                                        <th class="text-center colorHead">Linea</th>
                                        <th class="text-center colorHead">Punto_inspeccion</th>
                                        <th class="text-center colorHead">Categoria</th>
                                        <th class="text-center colorHead">Normativa</th>
                                        <th class="text-center colorHead">Subcategoria</th>
                                        <th class="text-center colorHead">Tipo analisis</th>
                                        <th class="text-center colorHead">Analisis</th>
                                        <th class="text-center colorHead">Resultados</th>
                                        <th class="text-center colorHead">Usuario</th>
                                        <th class="text-center colorHead">Validacio</th>
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div> <!-- END 3º card-body      -->


            </div> <!-- END div card principal -->
                


        </div>
    </div>



<script type="text/javascript">
    var accion = '';
    var Id_Item = '';
    var varNormativas;
    var _max='';
    var _min='';

    var validarMax = '';
    var validarMin = '';

    table2 = $("#tbl_resultados").DataTable({
        select: true,
        info: false,
        ordering: false,
        
        paging: false,            
        dom: 'Bfrtilp',
        buttons: 
            [
             //'print',
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success',

                    excelStyles: {template: "blue_medium",},

                    filename: function() {
                        return 'rpIngresoPlanificacion_'+<?php echo $fechaActual; ?>
                      },
                    title: function() {
                        var searchString = table.search(); 
                        return searchString.length? "Search: " + searchString : "Reporte Ingreso de Planificaciones "
                      },
                    exportOptions: {
                        //columns: [ 1, 3, 4, 5, 6, 7,8],
                        format: {
                            body: function ( data, row, column, node ) {
                                return column === 1 ?data.replace( /[$,]/g, '' ) :data;
                            }
                        }
                    }
                }, //fin del BUTTON excel


           

            ],

        // ajax:{
        //     url:"ajax/planificacion_ingreso.ajax.php",
        //     dataSrc: '',
        //     type:"POST",            
        //     data: {'accion' : 3}, // 1 para listar 
        //     dataType: "json",
        // },
        columns: [
            { "data": "fecha_resultado" },
            { "data": "area" },
            { "data": "linea" },
            { "data": "punto_inspeccion" },
            { "data": "categoria" },
            { "data": "normativa" },
            { "data": "subcategoria" },
            { "data": "tipo_analisis" },
            { "data": "analisis" },
            { "data": "resultados" },
            { "data": "usuario" },
            { "data": "validacion" },
        ],          
        responsive: {
            details: {
                type: 'column'
            }
        },
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        columnDefs:[
           {"className": "dt-center", "targets": "_all"},
            {targets:0,orderable:false,className:'control'},
            { responsivePriority: 1, targets: 11 },
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
                "sFirst": "<",
                "sLast":">>",
                "sNext":">",
                "sPrevious": "<<"
            },
            "sProcessing":"Procesando...",
        },

        rowCallback:function(row,data){
            //console.log("estado",data['validacion']);
            if (data['validacion'] == 'CONFORME'){
                $($(row).find("td")[11]).css("background-color","#09f558");
            }else if (data['validacion'] == 'NO CONFORME'){
                $($(row).find("td")[11]).css("background-color","#f6a074");
            }

        },
    });

    // var f = new Date();
    // var mes1 =  (f.getMonth() +1);
    // var mes='';
    // if (mes1 < 10){mes="0"+mes1;
    // }else{mes=mes1;
    // }
    // var f_actual = f.getFullYear()+ "-" + mes + "-" + f.getDate()  ;
    
    $("#iptFechaResultados").val();

$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var _id_normativa='';
    var validarExiste=0;


    $("#iptResultados" ).prop( "hidden", true );
    $("#selResultados" ).prop( "hidden", true );


    /*===========================================
        Carga Categorias de Planificacion flag 1
      ===========================================*/
    $.ajax({
        url:"ajax/categorias.ajax.php",
        type: "POST",
        data: {'accion': 2}, // solo HIGIENICO-SANITARIO
        dataType: 'json',
        success: function(respuesta){
            //console.log("CATEGORIAS ",respuesta);
            var options = '<option selected value="0">Categorias</option>';
            for (let index = 0; index < respuesta.length;index++){
                options = options + '<option value='+respuesta[index]['id_categoria']+'>'+respuesta[index]['categoria']+'</option>';

            }
            $("#selCategoriaAnalisis").html(options);


        }
    });

    /*====================================
        Autocomplete Planificación
      ====================================*/    
    $.widget('custom.mcautocomplete', $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> :not(.ui-widget-header)");
        },
        _renderMenu: function (ul, items) {
            var self = this,
                thead;
            if (this.options.showHeader) {
                table = $('<div class="ui-widget-header" style="width:100%"></div>');
                $.each(this.options.columns, function (index, item) {
                    table.append('<span style="padding:0 4px;float:left;width:' + item.width + ';">' + item.name + '</span>');
                });
                // table.append('<div style="clear: both;"></div>');
                ul.append(table);
            }
            $.each(items, function (index, item) {
                self._renderItem(ul, item);
            });
        },
        _renderItem: function (ul, item) {
            var result = $('<li></li>').data('ui-autocomplete-item', item);
            var t = '';

        $.each(this.options.columns, function (index, column) { 
            var whole_word = item[column.valueField ? column.valueField : index];
            var current_search_string = document.getElementById("iptArea").value.trim();

            // Escapar caracteres especiales en la cadena de búsqueda
            var escaped_search_string = current_search_string.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');

            // Resaltar la cadena de búsqueda actual
            var regex = new RegExp('(' + escaped_search_string + ')', 'gi');
            whole_word = whole_word.replace(regex, "<b>$1</b>");

            // Crear el contenido HTML con Flexbox para evitar la separación de palabras
            t += '<span style="display:flex; align-items:center; padding:0 4px; width:' + column.width + ';">' + whole_word + '</span>';
        });

        // Agregar el resultado al contenedor UL
        result.append('<a class="mcacAnchor" style="display: flex; align-items: center;">' + t + '<div style="clear: both;"></div></a>')
              .appendTo(ul);

        return result;
    }
    });

    var columns = [
      {name: 'id_are', width: '2.5em'},
      {name: 'area', width: '20em'},
      {name: 'linea', width: '20em'},
      {name: 'punto_insp', minWidth: '20px'}
    ];

    /*===============================================
        LISTADO PLANIFICACIONES AUTOCOMPLETADO
      ===============================================*/
    $.ajax({
        async: false,
        url:"ajax/planificacion.ajax.php",
        type: "POST",
        data: {'accion': 11}, //   lista 
        dataType: 'json',
        success: function(respuesta){
            //console.log("autocomplete 1",respuesta);
            $("#iptArea").mcautocomplete({
                showHeader: false,
                columns: columns,
                source: respuesta,

                select: 
                  function (event, ui) {
                    //console.log("id_planificacion :",ui.item[0]);

                    var result_text = (ui.item) ? ui.item[0] + ', ' + ui.item[1] + ', ' + ui.item[2] + ', ' + ui.item[3] : '';
                    
                    // Asignar el valor al input actual
                    this.value = (ui.item ? ui.item[1] : '');
                    $("#iptLinea").val(ui.item[2]);
                    $("#iptPuntoInspeccion").val(ui.item[3]);
                    $("#iptIdPlanificacion").val(ui.item[0]);
                    
                    $("#selCategoriaAnalisis" ).prop( "disabled", false );
        

                    // Reemplazar el HTML sin procesar en el texto de resultados
                    $('#results').html(ui.item ? 'Selected: ' + 
                        $('<div/>').text(ui.item[0]).html() + ', ' + 
                        $('<div/>').text(ui.item[1]).html() + ', ' + 
                        $('<div/>').text(ui.item[2]).html() + ', ' + 
                        $('<div/>').text(ui.item[3]).html() 
                        : 'No hay nada seleccionado ' + this.value
                    );

                    return false;
                }

            });                
                           
        }
    }); 



    /************************************    
        AREA BORRAR
    ************************************/
    $("#iptArea").keydown(function(e){
        if((e.which == 8) || (e.which == 46)){
            $("#iptArea").val("");
            $("#iptLinea").val("");
            $("#iptPuntoInspeccion").val("");
            $("#iptIdPlanificacion").val("");
            $("#selCategoriaAnalisis" ).prop( "disabled", true );
        }
    }); 

    /************************************    
        Buscar
    ************************************/
    $("#btnBuscar").click(function(e){
        var id_planificacion = $("#iptIdPlanificacion").val();
        if (id_planificacion.length ==0){
            toastr["error"]("Seleccione Area", "!Atención!");
            return;
        }

        $.ajax({ // verificamos si existe la entrada en la base de datos
            url:"ajax/planificacion_ingreso.ajax.php",
            type: "POST",
            data: {
                'accion': 4, // buscamos si existe
                'id_planificacion':$("#iptIdPlanificacion").val(),
                'id_categoria_general':$("#selCategoriaAnalisis").val(),
                'fecha':$("#iptFechaResultados").val(),
            }, 
            dataType: 'json',
            success: function(respuesta){
                //console.log("EXISTE ",respuesta);
                //table2.rows().remove().draw();
                $('#tbl_resultados').DataTable().clear().draw();
                $('#tbl_resultados').DataTable().rows.add(respuesta).draw();                        
           

            }
        }); //FIN AJAX

    });

}); // fin document ready


</script>