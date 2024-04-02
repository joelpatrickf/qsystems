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
	static public function ctrlZonificacionGuardar($area,$linea,$puntos){
		$res = ZonificacionModelo::mdlZonificacionGuardar($area,$linea,$puntos);
		return $res;
	}	
	
	/* *********************************
			EDIRAR  # 4
	**********************************/
	static public function ctrlZonificacionEditar($table,$data, $id, $nameId){
		$res = ZonificacionModelo::mdlZonificacionEditar($table,$data, $id, $nameId);
		return $res;
	}	
}

