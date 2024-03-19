<?php 
//if(isset($_SESSION)){ }else{ session_start(); }
//require_once "../modelos/categorias.modelo.php";
//require_once "constantes.php";


class ResultadosControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarResultados(){
		$resultados1 = ResultadosModelo::mdlListarResultados();
		return $resultados1;
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	static public function ctrlRegistrarResultados($data){
		$resultados2 = ResultadosModelo::mdlRegistrarResultados($data);
		return $resultados2;
	}

	/* *********************************
			ACTUALIZAR
	**********************************/
	// static public function ctrlActualizarResultados($table,$data, $id, $nameId){
	// 	$resultados3 = ResultadosModelo::mdlActuaizarResultados($table,$data, $id, $nameId);
	// 	return $resultados3;
	// }		

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 