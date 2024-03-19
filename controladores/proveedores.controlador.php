<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/proveedores.modelo.php";
//require_once "constantes.php";


class ProveedoresControlador{

	/* *********************************
			LISTAR 
	**********************************/
	static public function ctrlListarProveedores(){
		$Productos = ProveedoresModelo::mdlListarProveedores();
		return $Productos;
	}


	/* *********************************
			REGISTRAR 
	**********************************/
	static public function ctrlRegistrarProveedores($data){
		$productos = ProveedoresModelo::mdlRegistrarProveedores($data);
		return $productos;
	}

	// /* *********************************
	// 		ACTUALIZAAR 
	// **********************************/
	static public function ctrActualizarProveedores($table,$dataModificar, $id, $nameId){
		$productos = ProveedoresModelo::mdlActualizarProveedores($table,$dataModificar, $id, $nameId);
		return $productos;
	}		

	// ELIMINAR
	static public function ctrEliminarProveedores($id_proveedor,$estado){
		$respuesta = ProveedoresModelo::mdlEliminarProveedores($id_proveedor,$estado);
		return $respuesta;
	}	
}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 