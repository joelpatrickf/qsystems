<?php 
require_once "../controladores/planificacion_ingreso.controlador.php";
require_once "../modelos/planificacion_ingreso.modelo.php";

class AjaxPlanificacionIngresos{
    
	/*===================================================
		Guardar Ingresos de resultados Planificación # 1
	  ===================================================*/
	public function ajaxPIGuardar($data)
	{
		$respuesta = PlanificacionIngresoControlador::ctrlPIGuardar($data);
		echo json_encode($respuesta);
	}
	
} /* End class*/




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // guardar ingreso de resultados
    //echo "<pre>";print_r($_POST);echo "<pre>";

    $data = array(
            "id_planificacion" => $_POST["id_planificacion"],
            "id_categoria_general" => $_POST["id_categoria_general"],
            "id_normativa" => $_POST["id_normativa"],
            "limite_min" => $_POST["limite_min"],
            "limite_max" => $_POST["limite_max"],
            "resultados" => $_POST["resultados"],
            "fecha_resultados" => $_POST["fecha_resultados"],
            "observacion" => $_POST["observacion"],
            "validacion" => $_POST["validacion"],
    );    

	$res = new AjaxPlanificacionIngresos();
    $res-> ajaxPIGuardar($data);

}

    