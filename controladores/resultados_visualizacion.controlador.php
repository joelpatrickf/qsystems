<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/resultados_visualizacion.modelo.php";


class ResultadosVisualizacionControlador{

	// *********************************
	// 		BUSCAR ORDEN TRABAJO
	// **********************************/
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
	// 		GUARDAR NUEVOS REGISTROS
	// **********************************/
	// static public function ctrlResultadosVisualizacionGuardar($data){
	// 	$respuesta02 = ResultadosVisualizacionModelo::mdlOrdenTrabajoGuardar($data);
	// 	return $respuesta02;
	// }


	// /* *********************************
	// 		ELIMINAR
	// **********************************/
	// static public function ctrlResultadosVisualizacionEliminar($orden_trabajo,$estado){
	// 	$respuesta3 = ResultadosVisualizacionModelo::mdlOrdenTrabajoEliminar($orden_trabajo,$estado);
	// 	return $respuesta3;
	// }	
	
		

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 