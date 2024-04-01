<?php 
require_once "../controladores/inspeccion.controlador.php";
require_once "../modelos/inspeccion.modelo.php";

class AjaxInspeccion{
    
	public function ajaxListarInspeccion()
	{
		$respuesta1 = InspeccionControlador::ctrlListarInspeccion();
		echo json_encode($respuesta1);
	}

	// REGISTRAR 
	public function ajaxRegistrarInspeccion($data)
	{
		$respuesta2 = InspeccionControlador::ctrlRegistrarInspeccion($data);

		echo json_encode($respuesta2,JSON_UNESCAPED_UNICODE);
	}	
    
	// // // ACTUALIAR 
    // public function ajaxModificarInspeccion($dataModificar){
    //     $table= "proveedores";
    //     $id= $dataModificar['id_proveedor']; 
    //     $nameId = "id_proveedor";

    //     $respuesta3 = InspeccionControlador::ctrActualizarInspeccion($table,$dataModificar, $id, $nameId);
    //     echo json_encode($respuesta3);
    // }
	
	// // ELIMINAR
	// public function ajaxEliminarInspeccion($id_proveedor,$estado)
	// {
	// 	$respuesta4 = InspeccionControlador::ctrEliminarInspeccion($id_proveedor,$estado);

	// 	echo json_encode($respuesta4,JSON_UNESCAPED_UNICODE);
	// }    	
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
	// print_r($_POST);
    $productos = new AjaxInspeccion();
    $productos-> ajaxListarInspeccion();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR NUEVOS REGISTROS
	$registrar = new AjaxInspeccion();
    $data = array(
            "fecha" => $_POST["fecha"],
            "variables" => $_POST["variables"],
            "numero_muestras" => $_POST["numero_muestras"]
    );
    $registrar -> ajaxRegistrarInspeccion($data);
} 
// else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // ACTUALIZAR
    
// 	$modificar = new AjaxInspeccion();
//     $dataModificar = array(
// 		"razon_social" => $_POST["razon_social"],
// 		"rucc" => $_POST["rucc"],
// 		"tipo_proveedor" => $_POST["tipo_proveedor"],
// 		"direccion" => $_POST["direccion"],
//         "id_proveedor" => $_POST["id_proveedor"]
//     );
    
//     $modificar -> ajaxModificarProveedores($dataModificar);
// }else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ELIMINAR
// 	$usuarios = new AjaxInspeccion();
// 	$usuarios-> ajaxEliminarProveedores($_POST['id_proveedor'],$_POST['estado']);

// }


