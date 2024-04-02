<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/inspeccion.modelo.php";


class InspeccionControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarInspeccion(){
		$Categorias = InspeccionModelo::mdlListarInspeccion();
		return $Categorias;
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	static public function ctrlRegistrarInspeccion($data){
		$Usuario1 = InspeccionModelo::mdlRegistrarInspeccion($data);
		return $Usuario1;
	}

	/* *********************************
			ACTUALIZAR
	**********************************/
	static public function ctrlActualizarInspeccion($table,$data, $id, $nameId){
		$Usuario1 = InspeccionModelo::mdlActuaizarInspeccion($table,$data, $id, $nameId);
		return $Usuario1;
	}
	
	/* *********************************
			ELIMINA
	**********************************/
	static public function ctrEliminarInspeccion($id_ins_var){
		$Usuario1 = InspeccionModelo::mdlEliminarInspeccion($id_ins_var);
		return $Usuario1;
	}	

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 