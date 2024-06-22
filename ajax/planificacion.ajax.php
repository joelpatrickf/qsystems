<?php 
require_once "../controladores/planificacion.controlador.php";
require_once "../modelos/planificacion.modelo.php";

class AjaxPlanificacion{
    
	/* *********************************
			LISTAR LISTAR PLANIFICACION
	**********************************/	
	public function ajaxPlanificacionListar()
	{
		$Ubicacion = PlanificacionControlador::ctrlPlanificacionListar();
		echo json_encode($Ubicacion);
	}

	/* *********************************
			LISTAR LISTAR AREA  & LINEA
	**********************************/	
	public function ajaxPlanificacionListarAreasLineas()
	{
		$Ubicacion = PlanificacionControlador::ctrlPlanificacionListarAreasLineas();
		echo json_encode($Ubicacion);
	}
}




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    // print_r($_POST);
	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionListar();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // area/linea/punto 
    // print_r($_POST);
	$res = new AjaxPlanificacion();
    $res-> ajaxPlanificacionListarAreasLineas();

}