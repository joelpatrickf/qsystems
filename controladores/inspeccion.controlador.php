<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/inspeccion.modelo.php";


class InspeccionControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlInspeccionListar($filtro){
		$Categorias = InspeccionModelo::mdlInspeccionListar($filtro);
		return $Categorias;
	}

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS
	// **********************************/
	// static public function ctrlInspeccionRegistrar($data){
	// 	$Usuario1 = InspeccionModelo::mdlInspeccionRegistrar($data);
	// 	return $Usuario1;
	// }

	// /* *********************************
	// 		ACTUALIZAR
	// **********************************/
	// static public function ctrlInspeccionActualizar($table,$data, $id, $nameId){
	// 	$Usuario1 = InspeccionModelo::mdlInspeccionActuaizar($table,$data, $id, $nameId);
	// 	return $Usuario1;
	// }
	
	// /* *********************************
	// 		ELIMINA
	// **********************************/
	// static public function ctrInspeccionEliminar($id_ins_var){
	// 	$Usuario1 = InspeccionModelo::mdlInspeccionEliminar($id_ins_var);
	// 	return $Usuario1;
	// }	

}
