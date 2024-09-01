<?php 
// if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/planificacion.modelo.php";


class PlanificacionControlador{

	/* *********************************
			LISTAR LISTAR PLANIFICACION # 1
	**********************************/	
	static public function ctrlPlanificacionListar(){
		$res = PlanifcacionModelo::mdlPlanificacionListar();
		return $res;
	}
	
	/* *****************************************
			LISTAR PLANIFICACION 4 Columnas # 11
	********************************************/	
	static public function ctrlPlanificacionListar4Columnas(){
		$res = PlanifcacionModelo::mdlPlanificacionListar4Columnas();
		return $res;
	}	
	
	/* *********************************
			GUARDAR PLANIFICACION # 2
	**********************************/	
	static public function ctrlPlanificacionSave($data){
		$res = PlanifcacionModelo::mdlPlanificacionSave($data);
		return $res;
	}
	/* *********************************
		GUARDAR EDICION PLANIFICACION # 3
	**********************************/	
	static public function ctrlPlanificacionSaveEdit($table,$data, $id, $nameId){
		$res = PlanifcacionModelo::mdlPlanificacionSaveEdit($table,$data, $id, $nameId);
		return $res;
	}	

}

