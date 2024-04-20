<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/inspeccion.modelo.php";


class InspeccionControlador{

	/* ***********************************************************
		BUSCAR SI EXISTEN INSPECCIONES ABIERTAS DE DIAS ANTERIORES
		fecha/usuario/ hora_fin=null
	**************************************************************/
	static public function ctrlInspeccionListar($filtro){
		$Categorias = InspeccionModelo::mdlInspeccionListar($filtro);
		return $Categorias;
	}

	/* ***********************************************************
		GUARDAR CREAR INSPECCION		
	**************************************************************/
	static public function ctrlInspeccionCrear(){
		$Categorias = InspeccionModelo::mdlInspeccionCrear();
		return $Categorias;
	}
	
	/* ***********************************************************
		GUARDAR CERRAR INSPECCION		
	**************************************************************/
	static public function ctrlInspeccionCerrar($id_insp){
		$Categorias = InspeccionModelo::mdlInspeccionCerrar($id_insp);
		return $Categorias;
	}
	
	/* ***********************************************************
					GUARDAR PRODUCTOS  #4 
	**************************************************************/
	static public function ctrlInspeccionSaveProductos($data){
		$inspeccion = InspeccionModelo::mdlInspeccionSaveProductos($data);
		return $inspeccion;
	}
	/* ***********************************************************
					GUARDAR PRODUCTOS  # 5 
	**************************************************************/
	static public function ctrlInspeccionListarProductos($id_insp){
		$inspeccion = InspeccionModelo::mdlInspeccionListarProductos($id_insp);
		return $inspeccion;
	}
	
	/* ***********************************************************
					NUMERO DE MUESTRAS  # 6
	**************************************************************/
	static public function ctrlInspeccionNumeroMuestras(){
		$inspeccion = InspeccionModelo::mdlInspeccionNumeroMuestras();
		return $inspeccion;
	}

	/* ***********************************************************
					GUARDAR VARIABLES Y MUESTRAS  # 7
	**************************************************************/
	static public function ctrlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp){
		$inspeccion = InspeccionModelo::mdlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp);
		return $inspeccion;
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
