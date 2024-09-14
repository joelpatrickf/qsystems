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
                           <h4> Ingresos de Resultados 2</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0 pt-1">
                    <div class="row">

                        <div class="col-12 col-lg-2">
                            <div class="form-group mb-2">
                                <label class="" for="iptArea"><i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Área</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptArea" autofocus autocomplete="off">
                                <input type="hidden" class="form-control" id="iptIdPlanificacion" >
                            </div>
                        </div>


                        <div class="col-12 col-lg-4">
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
              

                       <div class="col-4 col-lg-3" >
                            <div class="form-group mb-2">
                                <label class="" for="selTipo"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Categoria de Análisis</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-control " aria-label=".form-select-sm example" id="selCategoriaAnalisis" disabled>
                                </select>
                            </div>
                        </div>

                    </div>                        
                    <!-- Parte del ingreso de datos OCULTA -->
                    <div class="col-sm-6"></div>
                    
                    <div class="col-4 col-sm-6 mt-2 " id="div_resultados" style="background-color:#d1d1d1;" hidden>
                                
                        <div class="form-group col-md-3">
                            <label for="inputEmail4" class="mb-0">Resultado</label>
                            <input type="text" class="form-control" id="iptResultados" placeholder="Resultados" pattern="^[A-Za-z]+$" autocomplete="off" >
                            <select class="form-control " aria-label=".form-select-sm example" id="selResultados"  >
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label  class="mb-0" for="iptFechaResultados">Fecha</label>
                            <input type="date" class="form-control" id="iptFechaResultados" >
                        </div>
                        <div class="form-group  col-md-6">
                            <label  class="mb-0" for="iptObservacion">Observacion</label>
                            <input type="text" class="form-control" id="iptObservacion" >
                        </div>
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" >Close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                    </div>


                </div> <!-- END div 1º card body -->
                <div class="card-body pb-0 pt-1">
                    <!-- row para tabla  -->
                    <div class="row">
                        <div class="col-lg-12" id="div_table" hidden>

                            <table id="tbl_normativas" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr style="font-size: 15px;">
                                        <th></th>
                                        <th>Id_Norma</th>
                                        <th>id_categoria_general</th>
                                        <th>Categoria</th>
                                        <th>Sub categoria</th>
                                        <th>Tipo Analisis</th>
                                        <th>Analisis</th>
                                        <th>Lim_Min</th>
                                        <th>Lim_Max</th>
                                        <th>Unidad de Medida</th>
                                        <th>Acción</th>

                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- END 2º card-body      -->

                <!-- 2ª tabla  -->
                <div class="card-body pb-0 pt-1">
                    <div class="row">
                        <div class="col-lg-12">
                        <table id="tbl_resultados" class="table table-striped cell-border w-100 shadow  " width="100%">
                                <thead class="bg-gray">
                                    <tr>
                                        <th class="text-center colorHead" >Id Res</th>
                                        <th class="text-center colorHead">OT</th>
                                        <th class="text-center colorHead">Id Nor</th>
                                        <th class="text-center colorHead">Fecha creacion</th>
                                        <th class="text-center colorHead">Usuario</th>
                                        <th class="text-center colorHead">Normativa</th>
                                        <th class="text-center colorHead">Categoria</th>
                                        <th class="text-center colorHead">Tipo_analisis</th>
                                        <th class="text-center colorHead">Analisis</th>
                                        <th class="text-center colorHead">Resultado</th>
                                        <th class="text-center colorHead">Validacion</th>
                                        <th class="text-center colorHead">Estado</th>
                                        <!-- <th class="text-center">Opciones</th> -->
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


$(document).ready(function(){
    // Personalizamos el toast mensajes
    toastr.options.timeOut = 1500; // 1.5s
    toastr.options.closeButton = true;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var _id_normativa='';


    $("#iptResultados" ).prop( "hidden", true );
    $("#selResultados" ).prop( "hidden", true );



        /************************************    
            CARGA PLANIFICACIONES
        ************************************/

    $.ajax({
        url:"../ajax/planificacion_ingreso.ajax.php",
        type: "POST",
        data: {'accion': 2}, // 
        dataType: 'json',
        success: function(respuesta){
            //console.log("CATEGORIAS ",respuesta);


        }
    });










    /*===========================================
        Carga Categorias de Planificacion flag 1
      ===========================================*/
    $.ajax({
        url:"../ajax/categorias.ajax.php",
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
        url:"../ajax/planificacion.ajax.php",
        type: "POST",
        data: {'accion': 11}, //   lista 
        dataType: 'json',
        success: function(respuesta){
            console.log("autocomplete 1",respuesta);
            $("#iptArea").mcautocomplete({
                showHeader: false,
                columns: columns,
                source: respuesta,

                select: 
                  function (event, ui) {
                    console.log("id_planificacion :",ui.item[0]);

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
            btnSabe BOTON GUARDAR
    ************************************/

    $("#btnSave").click(function() {
        
        var estado = '';
        var validacion ='';
        var validarResultadoLetras = '';
        var varResultados='';
        var varLimiteMaxSinEspacios='';
        var varResultadosSinEspacios='';
        
        // Si es texto contenido del select si es numero contenido del input
        if ((validarMin == 'NUMERO') && (validarMax == 'NUMERO')) {
            varResultados = $("#iptResultados").val();
            varResultados = varResultados.replace(/,/g, '.');

        }else if ((validarMin == 'TEXTO') && (validarMax == 'TEXTO')){
            var selResultado = document.getElementById("selResultados");
            var selResultados = selResultado.options[selResultado.selectedIndex].text;
            varResultados = selResultados;
        }

        if (typeof varAnalisis == "undefined" || varAnalisis == null){toastr["error"]("No existen datos para guardar", "!Atención!");return;}
        if (varResultados.length == 0){toastr["error"]("Faltan datos para guardar", "!Atención!");return;}

        validarResultadoLetras = validarTexto(varResultados);
        
        varLimiteMaxSinEspacios = varLimiteMax.replace(/ /g, "");
        varResultadosSinEspacios = varResultados.replace(/ /g, "");
        
        if (validarMin == 'TEXTO') {
            if (varLimiteMaxSinEspacios == varResultadosSinEspacios ) {
                resCondicionMin = true;
                resCondicionMax = true;
            }else if (varLimiteMaxSinEspacios != varResultadosSinEspacios ) {
                resCondicionMin = true;
                resCondicionMax = false;
            }

        } else{ // CASO CONTRARIO ES NUMERO
            if (validarResultadoLetras != 'NUMERO') {
                toastr["error"]("El resultado no coinside con el tipo de Ingreso de Datos", "!Atención!");
                return false;
            }

            //Validamos el limite Maximo
            if (varLimiteMax.includes('<')) {
                valorMax = varLimiteMax.replace("<", "");
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados < valorMax ? true:false;

            } else if (varLimiteMax.includes('<=')) {
                valorMax = varLimiteMax.replace("<=", "");
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados <= valorMax ? true:false;
            }else{
                valorMax = varLimiteMax;
                valorMax = parseFloat(valorMax);
                resCondicionMax = varResultados <= valorMax ? true:false;
            }

            //Validamos el limite Minimo
            if (varLimiteMin.includes('>')) {
                valorMin = varLimiteMin.replace(">", "");
                valorMin = parseFloat(valorMin);
                resCondicionMin = varResultados > valorMin ? true:false;
            } else if (varLimiteMin.includes('>=')) {
                valorMin = varLimiteMin.replace(">=", "");
                resCondicionMin = varResultados >= valorMin ? true:false;
                valorMin = parseFloat(valorMin);
            }else{
                valorMin = varLimiteMin;
                valorMin = parseFloat(valorMin);
                resCondicionMin = varResultados >= valorMin ? true:false;
            }
        }
        
        if ((resCondicionMin == true) && (resCondicionMax == true) ){
            validacion = 'CONFORME';
            //estado = 'Liberado';
            
        }else{
            validacion = 'NO CONFORME';
            //estado = 'Retenido';
        }

        console.log("resCondicionMin-> "+resCondicionMin+"    resCondicionMax-> "+resCondicionMax);

        $.ajax({
            url:"../ajax/planificacion_ingreso.ajax.php",
            type: "POST",
            data: {
                'accion': 1,
                'id_planificacion':$("#iptIdPlanificacion").val(),
                'id_categoria_general':$("#selCategoriaAnalisis").val(),
                'id_normativa':_id_normativa,
                'limite_min':_min,
                'limite_max':_max,
                'resultados':$("#iptResultados").val(),
                'fecha_resultados':$("#iptFechaResultados").val(),
                'observacion':$("#iptObservacion").val(),
                'validacion':validacion,
            }, 
            dataType: 'json',
            success: function(respuesta){
                //console.log("CATEGORIAS ",respuesta);
            }
        }); 
    });

    /************************************    
        CANCELAR
    ************************************/
    $("#btnClose").click(function(e){
        _id_normativa='';
        $("#iptResultados").val("");
        $("#iptFechaResultados").val("");
        $("#iptObservacion").val("");
        $("#div_resultados" ).prop( "hidden", true );

    }); 


    /************************************    
        NUEVO ANALISIS
    ************************************/

    $('#tbl_normativas tbody').on('click','.btnNewAnalisis', function(){
        _id_normativa='';
        
        $("#div_resultados" ).prop( "hidden", false );
        //$('#div_resultados').removeAttr('hidden');        
        $("#iptResultados").focus();

        //accion = 3; //-GUARDAR MODIFICACION
        var data = table.row($(this).parents('tr')).data();
        _id_normativa = data['id_normativa'];
        
        _max=data['limite_max'];
        _min=data['limite_min'];
        varUnidadMedida = data['unidad_medida'];

        varAnalisis = data['analisis'];

        validarMax = validarTexto(_max);
        validarMin = validarTexto(_min);
        varLimiteMax = data['limite_max'];
        varLimiteMin = data['limite_min'];        

        if ((validarMin == "TEXTO") && validarMax == "TEXTO"){
            
            $("#selResultados" ).prop( "hidden", false );
            $("#iptResultados" ).prop( "hidden", true );

            const arrUM = varUnidadMedida.split("/");
            //var options = '<option selected value="0">Seleccione</option>';
            var options = '';
            for (let index = 0; index < arrUM.length;index++){
                options = options + '<option value='+arrUM[index]+'>'+arrUM[index]+'</option>';
            }
            $("#selResultados").html(options);
        }else{
            
            $("#selResultados" ).prop( "hidden", true );
            $("#iptResultados" ).prop( "hidden", false );
            $("#iptResultados").focus();
        }
        $("#iptResultados").val("");







        var f = new Date();
        var mes1 =  (f.getMonth() +1);
        var mes='';
        if (mes1 < 10){mes="0"+mes1;
        }else{mes=mes1;
        }
        var f_actual = f.getFullYear()+ "-" + mes + "-" + f.getDate()  ;
        
        $("#iptFechaResultados").val(f_actual);
        
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

    

    $("#selCategoriaAnalisis").change(function(e){
        var categoriaAnalisis = $("#selCategoriaAnalisis").val();
        $("#div_table" ).prop( "hidden", false );

        /************************************    
            CARGA DE CATEGORIAS EXISTENTES
        ************************************/
        table = $("#tbl_normativas").DataTable({
            bDestroy: true,
            bPaginate: false,
            bAutoWidth: false,
            searching: false,
            select: true,
            info: false,
            ordering: false,
            responsive: true,
           
            ajax:{
                url:"../ajax/normativas.ajax.php",
                dataSrc: '',
                type:"POST",            
                data: {
                    'accion' : 6,
                    'id_categoria_general' : categoriaAnalisis
                },
            },
            columns: [
                { "data": "vacio" }, 
                { "data": "id_normativa" }, 
                { "data": "id_categoria_general" },
                { "data": "categoria_general" },
                { "data": "categoria" },
                { "data": "tipo_analisis" },
                { "data": "analisis" },
                { "data": "limite_min" },
                { "data": "limite_max" },
                { "data": "unidad_medida" },
                { "data": "vacio" },                 
            ],
            responsive: {
                details: {
                    type: 'column'
                }
            },
            
            columnDefs:[

                {"className": "dt-center", "targets": "_all"},
                {targets:0,orderable:false,className:'control'},
                // // { width: '20%', targets: 5},

                 {targets:2,visible:false,},
                { responsivePriority: 1, targets: 10 },

                {
                    targets:10,
                    orderable:false,
                    render: function(data, type, full, meta){
                        return "<center>"+
                                      "<span class='btnNewAnalisis text-primary px-1' style='cursor:pointer;'>"+
                                        "<i class='fas fa-pencil-alt fs-5'></i>"+
                                    "</span>"+
                                "</center>"
                    }

                }     


            ],
            pageLength: 10,
            // language: { }, 
        });        

    });     

}); // fin document ready

function validarTexto(valor) {
    contar_numeros = valor.replace(/[^0-9]/g,"").length;
    if ( contar_numeros == 0){
        resultado = 'TEXTO';
    }else{
        resultado ='NUMERO';
    }
    //console.log("# "+contar_numeros+"  resultado->"+resultado);
    return resultado;
}
</script>