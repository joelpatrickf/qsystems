<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/orden_trabajo.modelo.php";
//require_once "constantes.php";


class OrdenTrabajoControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlOrdenTrabajoListar(){
		$muestras01 = OrdenTrabajoModelo::mdlOrdenTrabajoListar();
		return $muestras01;
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	static public function ctrlOrdenTrabajoGuardar($data){
		$muestras02 = OrdenTrabajoModelo::mdlOrdenTrabajoGuardar($data);
		return $muestras02;
	}


	/* *********************************
			ELIMINAR
	**********************************/
	static public function ctrlOrdenTrabajoEliminar($orden_trabajo,$estado){
		$Usuario1 = OrdenTrabajoModelo::mdlOrdenTrabajoEliminar($orden_trabajo,$estado);
		return $Usuario1;
	}	
	
	// *********************************
	// 		BUSCAR ORDEN TRABAJO # 5
	// **********************************/
	static public function ctrlOrdenTrabajoBuscar($orden_trabajo){
		$Usuario1 = OrdenTrabajoModelo::mdlOrdenTrabajoBuscar($orden_trabajo);
		return $Usuario1;
	}			

	// *********************************
	// 		BUSCAR ORDEN X LOTE # 6
	// **********************************/
	static public function ctrlOrdenLoteBuscar($lote){
		$Usuario1 = OrdenTrabajoModelo::mdlOrdenLoteBuscar($lote);
		return $Usuario1;
	}

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 