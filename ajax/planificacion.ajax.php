<?php 
require_once "../controladores/planificacion.controlador.php";
require_once "../modelos/planificacion.modelo.php";

class AjaxPlanificacion{
    
	/* *********************************
			LISTAR LISTAR PLANIFICACION # 1
	**********************************/	
	public function ajaxPlanificacionListar()
	{
		$respuesta = PlanificacionControlador::ctrlPlanificacionListar();
		echo json_encode($respuesta);
	}

	/* *****************************************
			LISTAR PLANIFICACION 4 Columnas # 11
	********************************************/	
	public function ajaxPlanificacionListar4Columnas()
	{
		$respuesta = PlanificacionControlador::ctrlPlanificacionListar4Columnas();
		echo json_encode($respuesta);
	}	

	/* *********************************
		GUARDAR EDICION PLANIFICACION # 2
	**********************************/	
	public function ajaxPlanificacionSave($data)
	{
		$respuesta = PlanificacionControlador::ctrlPlanificacionSave($data);
		echo json_encode($respuesta);
	}
    public function ajaxPlanificacionSaveEdit($data){
        $table= "planificacion";
        $id= $data['id_planificacion']; 
        $nameId = "id_planificacion";

        $respuesta = PlanificacionControlador::ctrlPlanificacionSaveEdit($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }	
}




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    // print_r($_POST);
	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionListar();

}else if (isset($_POST['accion']) && $_POST['accion'] == 11) { // autocomplete 4 columnas
	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionListar4Columnas();
}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // save

	$data = array(
		"id_area" => $_POST["id_area"],
		"id_linea" => $_POST["id_linea"],
		"punto_inspeccion" => $_POST["punto_inspeccion"],
		"cantidad" => $_POST["cantidad"],
		"frecuencia" => $_POST["frecuencia"],
	);	

	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionSave($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // save
    // echo "<pre>";
	// print_r($_POST);
    // echo "<pre>";

	$data = array(
		"id_area" => $_POST["id_area"],
		"id_linea" => $_POST["id_linea"],
		"punto_inspeccion" => $_POST["punto_inspeccion"],
		"cantidad" => $_POST["cantidad"],
		"frecuencia" => $_POST["frecuencia"],
		"id_planificacion" => $_POST["id_planificacion"],
	);	

	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionSaveEdit($data);

}