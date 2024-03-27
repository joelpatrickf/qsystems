<?php 
require_once "../controladores/resultados_visualizacion.controlador.php";
require_once "../modelos/resultados_visualizacion.modelo.php";

class AjaxResultadosVisualizacion{
    
	public function ajaxResultadosVisualizacionListar()
	{
		$resultados1 = OrdenTrabajoControlador::ctrlOrdenTrabajoListar();
		echo json_encode($resultados1);
	}

	// *********************************
	// 		BUSCAR 
	// **********************************/
	public function ajaxResultadosVisualizacionBuscar($lote)
	{
		$resultados4 = OrdenResultadosVisualizacion::ctrlResultadosVisualizacionBuscar($lote);
		echo json_encode($resultados4,JSON_UNESCAPED_UNICODE);
	}	

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS
	// **********************************/
	// public function ajaxResultadosVisualizacionGuardar($data)
	// {
	// 	$resultados2 = OrdenTrabajoControlador::ctrlOrdenTrabajoGuardar($data);
	// 	echo json_encode($resultados2,JSON_UNESCAPED_UNICODE);
	// }	
	    
	// /* *********************************
	// 		ELIMINAR REGISTROS
	// **********************************/
	public function ajaxResultadosVisualizacionEliminar($orden_trabajo,$estado)
	{
		$resultados3 = OrdenTrabajoControlador::ctrlOrdenTrabajoEliminar($orden_trabajo,$estado);
		echo json_encode($resultados3,JSON_UNESCAPED_UNICODE);
	}	

	

} // FIN CLASE

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR TODOS
    $normativas = new AjaxResultadosVisualizacion();
    $normativas-> ajaxResultadosVisualizacionListar();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // BUSCAR 
print_r($_POST);
	// $normativas = new AjaxResultadosVisualizacion();
	// $normativas-> ajaxResultadosVisualizacionBuscar($_POST['orden_trabajo']);

}

// else if (isset($_POST['accion']) && $_POST['accion'] == 2 || $_POST['accion'] == 3) { // GUARDAR y EDITAR REGISTROS

	
// 	// exit();
// 		$data = array(
// 				"fecha" => $_POST["varFecha"],
// 				"producto" => $_POST["varProducto"],
// 				"id_item" => $_POST["varId_item"],
// 				//"norma" => $_POST["varNorma"],
// 				// "categoria" => $_POST["varCategoria"],
// 				// "presentacion" => $_POST["varPresentacion"],
// 				"normativa" => $_POST["varIdNormativa"],
// 				"planta" => $_POST["varPlanta"],
// 				"ubicacion" => $_POST["varUbicacion"],
// 				"proveedor" => $_POST["varProveedor"],
// 				"turno" => $_POST["varTurno"],
// 				"usuarios" => $_POST["varUsuarios"],
// 				"muestra" => $_POST["varMuestra"],
// 				"lote" => $_POST["varLote"],
// 				"accion" => $_POST["accion"],
// 				"numero_orden" => $_POST["numero_orden"]
// 		);	
// 		$normativas = new AjaxOrdenTrabajo();
// 		$normativas-> ajaxOrdenTrabajoGuardar_GenerarOrden($data); 
	
// }else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // CAMBIAR DE ESTADO A INACTIVO
// 	$normativas = new AjaxOrdenTrabajo();
// 	$normativas-> ajaxOrdenTrabajoEliminar($_POST['orden_trabajo'],$_POST['estado']);

// }else 

