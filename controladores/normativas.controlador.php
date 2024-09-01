<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/normativas.modelo.php";
//require_once "constantes.php";


class NormativasControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarNormativas(){
		$Normativas = NormativasModelo::mdlListarNormativas();
		return $Normativas;
	}

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS # 2
	// **********************************/
	static public function ctrlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida,$categoria_general){
		$Usuario1 = NormativasModelo::mdlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida,$categoria_general);
		return $Usuario1;
	}

	// /* *********************************
	// 		ACTUALIZAR
	// **********************************/
	static public function ctrlNormativasActualizar($table,$data, $id, $nameId){
		$Usuario1 = NormativasModelo::mdlNormativasActualizar($table,$data, $id, $nameId);
		return $Usuario1;
	}		


    /* *********************************
       AUTOCOMPLETE NORMATIVA # 4
     ********************************** */ 
	static public function ctrlNormativasListarDisctint(){
		$normativa4 = NormativasModelo::mdlNormativasListarDisctint();
		return $normativa4;
	}


	// *********************************
	// 		 BUSCAMOS LOS ANALISIS # 5
	// **********************************/
	static public function ctrlNormativasBuscarAnalisis($orden_trabajo){
		$normativa5 = NormativasModelo::mdlNormativasBuscarAnalisis($orden_trabajo);
		return $normativa5;
	}	
}

