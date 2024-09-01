<?php 
    $fechaActual = date('YmdHis', time()); 
?>
<style>
    table.dataTable.no-footer {border-bottom: 1px solid #ddd;}   
    
    .paging_full_numbers {width: 100%;}    


ul.ui-widget {
  font-size: 13px;
  border: 0;
}

.mcacAnchor ui-menu-item-wrapper{
    background-color: red;
}
li.ui-menu-item:hover {
    background-color: black;
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

/*ul.ui-widget {
    background-color: mediumvioletred;
}*/

ul.ui-widget 
li.ui-menu-item b {
  font-weight: 700;

}
#search {
  height: 25px;
 }

.ui-widget-content .ui-state-focus
{
  background-color: #D6F7FF;
  background-image: none;
  border: 0;
  
}

    
</style>

<!-- page content -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 mb-0" >
                    <div class="row">
                        <div class="col-6">
					       <h4> Ingresos de Resultados </h4>
                        </div>
                        <div class="col-6 text-" >
                            <button type="button" class="btn btn-warning mx-1" id="btnClose" style="float: right;" hidden >Close</button>
                            <button type="button" class="btn btn-success" id="btnSave" style="float: right;"> Save </button>
                            <button type="button" class="btn btn-dark mx-1" id="btnNew" style="float: right;"> New </button>

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
                            </div>
                        </div>


                        <div class="col-12 col-lg-4">
                            <div class="form-group mb-2">
                                <label class="" for="iptLinea"><i class="fas fa-file-signature fs-6"></i>
                                    <span class="small">Línea</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control " id="iptLinea" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-4 col-lg-3 pb-0">
                            <div class="form-group mb-2">
                                <label class="" for="iptPuntoInspeccion"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Punto de Inspección</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="iptPuntoInspeccion" required disabled autocomplete="off">
                                <input type="hidden" id="iptNormativa_hidden" >
                            </div>
                        </div>    
              

                       <div class="col-4 col-lg-3">
                            <div class="form-group mb-2">
                                <label class="" for="selTipo"><i class="fas fa-user fs-6"></i>
                                    <span class="small">Tipo</span><span class="text-danger">*</span>
                                </label>
			                    <select class="form-control " aria-label=".form-select-sm example" id="selTipo" disabled >
			                    </select>
                            </div>
                        </div>

					</div>                        
<div id="div-container" style="margin:10px 10px;padding:8px;width:400px;" class="ui-widget ui-widget-content ui-corner-all">

    <div style="margin:0 0 4px 4px;">Enter Area:</div>

    <input id="search" type="text" style="padding:2px;font-size:.8em;width:300px;" />
    
    <div style="margin:20px 0 0 0;">
      <span id="results" style="color:#68a;"></span>
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
                                        <th class="text-center">Precio</th> <!-- 6 -->
                                        <th class="text-center">Presentacion</th> <!-- 5 -->
                                        <th class="text-center">Normativa</th> <!-- 4 -->
                                        <th class="text-center">Categoria</th> <!-- 4 -->
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
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE


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
                table.append('<div style="clear: both;"></div>');
                ul.append(table);
            }
            $.each(items, function (index, item) {
                self._renderItem(ul, item);
            });
        },
        _renderItem: function (ul, item) {
            var t = '',
                result = '';
            $.each(this.options.columns, function (index, column) {
                var whole_word = item[column.valueField ? column.valueField : index];
                var current_search_string = document.getElementById("search").value;
     
                // Highlight current search term.
                var regex = new RegExp( '(' + current_search_string + ')', 'gi' );
                whole_word = whole_word.replace(regex, "<b>$1</b>" );

                t += '<span style="padding:0 4px;float:left;width:' + column.width + ';">' + whole_word + '</span>';
            });

            result = $('<li></li>')
                .data('ui-autocomplete-item', item)
                .append('<a class="mcacAnchor">' + t + '<div style="clear: both;"></div></a>')
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


// Sets up the multicolumn autocomplete widget.

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
                $("#search").mcautocomplete({
                    showHeader: false,
                    columns: columns,
                        source: respuesta,

                    select: 
                      function (event, ui) {

                       var result_text = (ui.item)? ui.item[0] + ', ' + ui.item[1] + ', ' + ui.item[2] + ', ' + ui.item[3]: '';
                       this.value = (ui.item ? ui.item[0] : '');

                       $('#results').text(ui.item ? 'Selected: ' + ui.item[0] + ', ' + ui.item[1] + ', ' + ui.item[2] + ', ' + ui.item[3] : 'Nothing selected, input was ' + this.value);

                        return false;
                      },

                    minLength: 1

                });                
                               
            }
        }); 




});


</script>