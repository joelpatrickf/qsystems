<?php 
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{
    
	public function ajaxListarProductos()
	{
		$productos = ProductosControlador::ctrlListarProductos();
		echo json_encode($productos);
	}

	// REGISTRAR 
	public function ajaxRegistrarProductos($data)
	{
		$productos1 = ProductosControlador::ctrlRegistrarProductos($data);

		echo json_encode($productos1,JSON_UNESCAPED_UNICODE);
	}	
    
	// // ACTUALIAR 
    public function ajaxModificarProductos($dataModificar){
        $table= "productos";
        $id= $dataModificar['id_item']; 
        $nameId = "id_item";

        $respuesta = ProductosControlador::ctrActualizarProductos($table,$dataModificar, $id, $nameId);
        echo json_encode($respuesta);
    }

	// REGISTRAR 
	public function ajaxAutocomplete()
	{
		$productos2 = ProductosControlador::ctrlAutocomplete();

		echo json_encode($productos2,JSON_UNESCAPED_UNICODE);
	}
    
	// BUSCAR PRODUCTOS 
	public function ajaxBuscarProductos($data)
	{
		$productos3 = ProductosControlador::ctrBuscarProductos($data);

		echo json_encode($productos3,JSON_UNESCAPED_UNICODE);
	}    
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    $productos = new AjaxProductos();
    $productos-> ajaxListarProductos();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR NUEVOS REGISTROS
	$registrar = new AjaxProductos();
    $data = array(
            "codigo_barra1" => $_POST["codigo_barra"],
            "nombre_producto" => $_POST["nombre_producto"],
            "normativa" => $_POST["normativa"],
            "categoria" => $_POST["categoria"],
            "presentacion" => $_POST["presentacion"]
    );
    $registrar -> ajaxRegistrarProductos($data);
} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // ACTUALIZAR 
    
	$modificar = new AjaxProductos();
    $dataModificar = array(
        "codigo_barra1" => $_POST["codigo_barra"],
        "nombre_producto" => $_POST["nombre_producto"],
        "normativa" => $_POST["normativa"],
        "categoria" => $_POST["categoria"],
        "presentacion" => $_POST["presentacion"],
        "id_item" => $_POST["id_item"]
    );
    
    $modificar -> ajaxModificarProductos($dataModificar);

}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // AUTOCOMPLETE 1
    $productos = new AjaxProductos();
    $productos-> ajaxAutocomplete();

}else if ((isset($_POST['accion']) && $_POST['accion'] == 5) ) { // AUTOCOMPLETE 2
        
    $varBuscar= $_POST['data'][0].'-'.$_POST['data'][1];
    $retorno = mb_convert_encoding( htmlspecialchars( $varBuscar, ENT_QUOTES, 'UTF-8' ), 'HTML-ENTITIES', 'UTF-8' );    
  
    $productos = new AjaxProductos();
    $productos-> ajaxBuscarProductos($retorno);

}else if ( isset($_POST['searchTerm'])) { // AUTOCOMPLETE select 2
    print_r($_POST);
        
    $varBuscar= 'vacio-'.$_POST['searchTerm'][1];
    $retorno = mb_convert_encoding( htmlspecialchars( $varBuscar, ENT_QUOTES, 'UTF-8' ), 'HTML-ENTITIES', 'UTF-8' );    
  
    $productos = new AjaxProductos();
    $productos-> ajaxBuscarProductos($retorno);

}


