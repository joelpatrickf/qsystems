<?php 
//if(isset($_SESSION)){ }else{ session_start(); }
//require_once "../modelos/categorias.modelo.php";
//require_once "constantes.php";


class ResultadosControlador{

	/* *********************************
			LISTAS # 1
	**********************************/ 
	static public function ctrlListarResultados(){
		$resultados1 = ResultadosModelo::mdlListarResultados();
		return $resultados1;
	}

	/* *********************************
		GUARDAR NUEVOS REGISTROS # 2
	**********************************/
	static public function ctrlRegistrarResultados($data){
		$resultados2 = ResultadosModelo::mdlRegistrarResultados($data);
		return $resultados2;
	}

}
