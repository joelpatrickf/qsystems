<?php 
// if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/planificacion.modelo.php";


class PlanificacionControlador{

	/* *********************************
			LISTAR LISTAR PLANIFICACION
	**********************************/	
	static public function ctrlPlanificacionListar(){
		$res = PlanifcacionModelo::mdlPlanificacionListar();
		return $res;
	}
	
	/* *********************************
			LISTAR SELECT AREA  & LINEA
	**********************************/
	static public function ctrlPlanificacionListarAreasLineas(){
		$res = PlanifcacionModelo::mdlPlanificacionListarAreasLineas();
		return $res;
	}

}

