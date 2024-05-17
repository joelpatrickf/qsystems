<?php 
require_once "../controladores/inspeccion_variables.controlador.php";
require_once "../modelos/inspeccion_variables.modelo.php";

class AjaxInspeccionVariables{
    
	public function ajaxListarInspeccionVariables()
	{
		$respuesta1 = InspeccionVariablesControlador::ctrlListarInspeccionVariables();
		echo json_encode($respuesta1);
	}

	// REGISTRAR 
	public function ajaxRegistrarInspeccionVariables($data)
	{
		$respuesta2 = InspeccionVariablesControlador::ctrlRegistrarInspeccionVariables($data);

		echo json_encode($respuesta2,JSON_UNESCAPED_UNICODE);
	}	
    
	// // // ACTUALIAR 
    public function ajaxModificarInspeccionVariables($data){
        $table= "insp_variables";
        $id= $data['id_ins_var']; 
        $nameId = "id_ins_var";

        $respuesta3 = InspeccionVariablesControlador::ctrlActualizarInspeccionVariables($table,$data, $id, $nameId);
        echo json_encode($respuesta3);
    }
	
	// // ELIMINAR
	public function ajaxEliminarInspeccionVariables($id_ins_var)
	{
		$respuesta4 = InspeccionVariablesControlador::ctrEliminarInspeccionVariables($id_ins_var);

		echo json_encode($respuesta4,JSON_UNESCAPED_UNICODE);
	}    	
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
	// print_r($_POST);
    $productos = new AjaxInspeccionVariables();
    $productos-> ajaxListarInspeccionVariables();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR NUEVOS REGISTROS
	$registrar = new AjaxInspeccionVariables();
    $data = array(
            "fecha" => $_POST["fecha"],
            "variables" => $_POST["variables"],
            "etapa_proceso" => $_POST["etapa_proceso"],
            "numero_muestras" => $_POST["numero_muestras"],
            "estado" => $_POST["estado"]
    );
    $registrar -> ajaxRegistrarInspeccionVariables($data);
} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // ACTUALIZAR
    // print_r($_POST);
	$modificar = new AjaxInspeccionVariables();
    $dataModificar = array(
		"fecha" => $_POST["fecha"],
		"variable" => $_POST["variables"],
		"etapa_proceso" => $_POST["etapa_proceso"],
		"nmuestras" => $_POST["numero_muestras"],
		"estado" => $_POST["estado"],
		"id_ins_var" => $_POST["id_ins_var"]
    );
    
    $modificar -> ajaxModificarInspeccionVariables($dataModificar);
} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ELIMINAR
	$usuarios = new AjaxInspeccionVariables();
	$usuarios-> ajaxEliminarInspeccionVariables($_POST['id_ins_var']);

}


