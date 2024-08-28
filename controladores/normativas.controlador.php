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
	// 		GUARDAR NUEVOS REGISTROS
	// **********************************/
	static public function ctrlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida){
		$Usuario1 = NormativasModelo::mdlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida);
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


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 