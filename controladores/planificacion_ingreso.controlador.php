<?php 
// if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/planificacion.modelo.php";


class PlanificacionIngresoControlador{

	/*===================================================
		Guardar Ingresos de resultados Planificación # 1
	  ===================================================*/
	static public function ctrlPIGuardar($data){
		$res = PlanificacionIngresoModelo::mdlPIGuardar($data);
		return $res;
	}


}
