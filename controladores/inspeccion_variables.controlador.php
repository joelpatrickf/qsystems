<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/inspeccion_variables.modelo.php";


class InspeccionVariablesControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarInspeccionVariables(){
		$res = InspeccionVariablesModelo::mdlListarInspeccionVariables();
		return $res;
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	static public function ctrlRegistrarInspeccionVariables($data){
		$Usuario1 = InspeccionVariablesModelo::mdlRegistrarInspeccionVariables($data);
		return $Usuario1;
	}

	/* *********************************
			ACTUALIZAR
	**********************************/
	static public function ctrlActualizarInspeccionVariables($table,$data, $id, $nameId){
		$Usuario1 = InspeccionVariablesModelo::mdlActuaizarInspeccionVariables($table,$data, $id, $nameId);
		return $Usuario1;
	}
	
	/* *********************************
			ELIMINA
	**********************************/
	static public function ctrEliminarInspeccionVariables($id_ins_var){
		$Usuario1 = InspeccionVariablesModelo::mdlEliminarInspeccionVariables($id_ins_var);
		return $Usuario1;
	}	

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 