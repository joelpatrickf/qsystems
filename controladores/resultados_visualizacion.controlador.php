<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/resultados_visualizacion.modelo.php";


class ResultadosVisualizacionControlador{

	/* ********************************************
	 		BUSCAR Visualizacion de Resultados # 2
	   ********************************************/
	static public function ctrlResultadosVisualizacionBuscar($lote){
		$respuesta1 = ResultadosVisualizacionModelo::mdlResultadosVisualizacionBuscar($lote);
		return $respuesta1;
	}	

	// /* *********************************
	// 		LISTAR PRODUCTOS
	// **********************************/
	// static public function ctrlResultadosVisualizacionListar(){
	// 	$respuesta01 = ResultadosVisualizacionModelo::mdlOrdenTrabajoListar();
	// 	return $respuesta01;
	// }

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS #3
	// **********************************/
	static public function ctrlResultadosVisualizacionGuardarCambios($validacion,$estado,$nuevo_resultado,$observacion,$nResultados){
		$respuesta02 = ResultadosVisualizacionModelo::mdlResultadosVisualizacionGuardarCambios($validacion,$estado,$nuevo_resultado,$observacion,$nResultados);
		return $respuesta02;
	}



		

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 