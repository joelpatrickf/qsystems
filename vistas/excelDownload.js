$('#tbl_reporteInspeccion tbody').on('click','.btn_Excel', function(){

    window.open('../ajax/Downloader.php?accion=11&id_insp=1&id_item=2&id_area=3&id_linea=4&usuario=casper&sendStock=25&')
    
});