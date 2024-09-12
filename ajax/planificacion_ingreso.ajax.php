<?php 
// require_once "../controladores/planificacion_ingresos.controlador.php";
// require_once "../modelos/planificacion_ingresos.modelo.php";

class AjaxPlanificacionIngresos{
    
	/* *********************************
			LISTAR LISTAR PLANIFICACION # 1
	**********************************/	
	public function ajaxPlanificacionListar()
	{
		$respuesta = PlanificacionControlador::ctrlPlanificacionListar();
		echo json_encode($respuesta);
	}
	
} /* End class*/




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // guardar ingreso de resultados
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";

	// $res = new AjaxPlanificacionIngresos();
    // $res-> ajaxPIGuardar();

}