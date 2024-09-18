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

	/*===================================================
		Listar Ingresos de resultados Planificación # 2
	  ===================================================*/
	static public function ctrPIListar(){
		$res = PlanificacionIngresoModelo::mdlPIListar();
		return $res;
	}

	/*===================================================
		Buscar Ingresos de resultados Planificación # 3
	  ===================================================*/
	static public function ctrPIBuscar($id_planificacion,$id_categoria_general,$id_normativa){
		$res = PlanificacionIngresoModelo::mdlPIBuscar($id_planificacion,$id_categoria_general,$id_normativa);
		return $res;
	}

	/*===================================================
		Buscar Ingresos de resultados Fecha y Area  # 4
	  ===================================================*/
	static public function ctrPIBuscarFechaArea($id_planificacion,$id_categoria_general,$fecha){
		$res = PlanificacionIngresoModelo::mdlPIBuscarFechaArea($id_planificacion,$id_categoria_general,$fecha);
		return $res;
	}	
}

