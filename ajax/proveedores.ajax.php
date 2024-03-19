<?php 
require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores{
    
	public function ajaxListarProveedores()
	{
		$productos = ProveedoresControlador::ctrlListarProveedores();
        //print_r($productos);
		echo json_encode($productos);
	}

	// REGISTRAR 
	public function ajaxRegistrarProveedores($data)
	{
		$productos1 = ProveedoresControlador::ctrlRegistrarProveedores($data);

		echo json_encode($productos1,JSON_UNESCAPED_UNICODE);
	}	
    
	// // ACTUALIAR 
    public function ajaxModificarProveedores($dataModificar){
        $table= "proveedores";
        $id= $dataModificar['id_proveedor']; 
        $nameId = "id_proveedor";

        $respuesta = ProveedoresControlador::ctrActualizarProveedores($table,$dataModificar, $id, $nameId);
        echo json_encode($respuesta);
    }
	
	// ELIMINAR
	public function ajaxEliminarProveedores($id_proveedor,$estado)
	{
		$Proveedor = ProveedoresControlador::ctrEliminarProveedores($id_proveedor,$estado);

		echo json_encode($Proveedor,JSON_UNESCAPED_UNICODE);
	}    	
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    $productos = new AjaxProveedores();
    $productos-> ajaxListarProveedores();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR NUEVOS REGISTROS
	$registrar = new AjaxProveedores();
    $data = array(
            "razon_social" => $_POST["razon_social"],
            "rucc" => $_POST["rucc"],
            "tipo_proveedor" => $_POST["tipo_proveedor"],
            "direccion" => $_POST["direccion"]
    );
    $registrar -> ajaxRegistrarProveedores($data);
} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // ACTUALIZAR
    
	$modificar = new AjaxProveedores();
    $dataModificar = array(
		"razon_social" => $_POST["razon_social"],
		"rucc" => $_POST["rucc"],
		"tipo_proveedor" => $_POST["tipo_proveedor"],
		"direccion" => $_POST["direccion"],
        "id_proveedor" => $_POST["id_proveedor"]
    );
    
    $modificar -> ajaxModificarProveedores($dataModificar);
}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ELIMINAR
	$usuarios = new AjaxProveedores();
	$usuarios-> ajaxEliminarProveedores($_POST['id_proveedor'],$_POST['estado']);

}


