<?php 
// if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/zonificacion.modelo.php";


class ZonificacionControlador{

	/* *********************************
			LISTAR SELECT AREA  & LINEA
	**********************************/
	static public function ctrlZonificacionListar($filtro,$dato){
		$res = ZonificacionModelo::mdlZonificacionListar($filtro,$dato);
		return $res;
	}

	/* *********************************
			LISTAR ALL
	**********************************/
	static public function ctrlZonificacionListarAll(){
		$res = ZonificacionModelo::mdlZonificacionListarAll();
		return $res;
	}	

	/* *********************************
			GUARDAR 
	**********************************/
	static public function ctrlZonificacionGuardar($id_area,$id_linea,$puntos){
		$res = ZonificacionModelo::mdlZonificacionGuardar($id_area,$id_linea,$puntos);
		return $res;
	}	
	
	/* *********************************
			EDIRAR  # 4
	**********************************/
	static public function ctrlZonificacionEditar($table,$data, $id, $nameId){
		$res = ZonificacionModelo::mdlZonificacionEditar($table,$data, $id, $nameId);
		return $res;
	}	

	/* *********************************
			ACCION MODAL AREA
	**********************************/
	static public function ctrlZonificacion_mdlArea($data){
		$res = ZonificacionModelo::mdlZonificacion_mdlArea($data);
		return $res;
	}
	
	/* *********************************
			ACCION MODAL AREA
	**********************************/
	static public function ctrlZonificacion_mdlLinea($data){
		$res = ZonificacionModelo::mdlZonificacion_mdlLinea($data);
		return $res;
	}	
	
	
	/* *********************************
	 		 LISTAR AREA/LINEA # 5
	 ***********************************/
	static public function ctrlZonificacionListarArea_Linea(){
		$res = ZonificacionModelo::mdlZonificacionListarArea_Linea();
		return $res;
	}		

}

