<?php 
require_once "../controladores/inspeccion.controlador.php";
require_once "../modelos/inspeccion.modelo.php";

class AjaxInspeccion{
    
	public function ajaxInspeccionListar($filtro)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionListar($filtro);
		echo json_encode($respuesta1);
	}

	// // REGISTRAR 
	// public function ajaxRegistrarInspeccion($data)
	// {
	// 	$respuesta2 = InspeccionControlador::ctrlInspeccionRegistrar($data);

	// 	echo json_encode($respuesta2,JSON_UNESCAPED_UNICODE);
	// }	
    
	// // // // ACTUALIAR 
    // public function ajaxModificarInspeccion($data){
    //     $table= "insp_variables";
    //     $id= $data['id_ins_var']; 
    //     $nameId = "id_ins_var";

    //     $respuesta3 = InspeccionControlador::ctrlInspeccionActualizar($table,$data, $id, $nameId);
    //     echo json_encode($respuesta3);
    // }
	
	// // // ELIMINAR
	// public function ajaxEliminarInspeccion($id_ins_var)
	// {
	// 	$respuesta4 = InspeccionControlador::ctrInspeccionEliminar($id_ins_var);

	// 	echo json_encode($respuesta4,JSON_UNESCAPED_UNICODE);
	// }    	
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
	// print_r($_POST);
    $productos = new AjaxInspeccion();
    $productos-> ajaxInspeccionListar($_POST['filtro']);

} 
// else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR NUEVOS REGISTROS
// 	$registrar = new AjaxInspeccion();
//     $data = array(
//             "fecha" => $_POST["fecha"],
//             "variables" => $_POST["variables"],
//             "numero_muestras" => $_POST["numero_muestras"]
//     );
//     $registrar -> ajaxRegistrarInspeccion($data);
// } else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // ACTUALIZAR
//     // print_r($_POST);
// 	$modificar = new AjaxInspeccion();
//     $dataModificar = array(
// 		"fecha" => $_POST["fecha"],
// 		"variable" => $_POST["variables"],
// 		"nmuestras" => $_POST["numero_muestras"],
// 		"id_ins_var" => $_POST["id_ins_var"]
//     );
    
//     $modificar -> ajaxModificarInspeccion($dataModificar);
// } else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ELIMINAR
// 	$usuarios = new AjaxInspeccion();
// 	$usuarios-> ajaxEliminarInspeccion($_POST['id_ins_var']);

// }


