<?php 
require_once "../controladores/orden_trabajo.controlador.php";
require_once "../modelos/orden_trabajo.modelo.php";

class AjaxOrdenTrabajo{
	
	//  *********************************
	// 		LISTAR # 1
	// **********************************/
	public function ajaxOrdenTrabajoListar()
	{
		$OrdenTrabajo01 = OrdenTrabajoControlador::ctrlOrdenTrabajoListar();
		echo json_encode($OrdenTrabajo01);
	}

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS # 3
	// **********************************/
	public function ajaxOrdenTrabajoGuardar_GenerarOrden($data)
	{
		$OrdenTrabajo02 = OrdenTrabajoControlador::ctrlOrdenTrabajoGuardar($data);
		echo json_encode($OrdenTrabajo02,JSON_UNESCAPED_UNICODE);
	}	
	    
	// /* *********************************
	// 		ELIMINAR REGISTROS
	// **********************************/
	public function ajaxOrdenTrabajoEliminar($orden_trabajo,$estado)
	{
		$OrdenTrabajo02 = OrdenTrabajoControlador::ctrlOrdenTrabajoEliminar($orden_trabajo,$estado);
		echo json_encode($OrdenTrabajo02,JSON_UNESCAPED_UNICODE);
	}	

	// *********************************
	// 		BUSCAR ORDEN TRABAJO # 5
	// **********************************/
	public function ajaxOrdenTrabajoBuscar($orden_trabajo)
	{
		$OrdenTrabajo03 = OrdenTrabajoControlador::ctrlOrdenTrabajoBuscar($orden_trabajo);
		echo json_encode($OrdenTrabajo03,JSON_UNESCAPED_UNICODE);
	}		

	// *************************************************
	// 		BUSCAR LOTE Visualizacion de Resultados # 6
	// *************************************************/
	public function ajaxOrdenLoteBuscar($lote)
	{
		$OrdenTrabajo03 = OrdenTrabajoControlador::ctrlOrdenLoteBuscar($lote);
		echo json_encode($OrdenTrabajo03,JSON_UNESCAPED_UNICODE);
	}


} // FIN CLASE

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $normativas = new AjaxOrdenTrabajo();
    $normativas-> ajaxOrdenTrabajoListar();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2 || $_POST['accion'] == 3) { // GUARDAR y EDITAR REGISTROS

	
	// exit();
		$data = array(
				"fecha" => $_POST["varFecha"],
				"producto" => $_POST["varProducto"],
				"id_item" => $_POST["varId_item"],
				//"norma" => $_POST["varNorma"],
				// "categoria" => $_POST["varCategoria"],
				// "presentacion" => $_POST["varPresentacion"],
				"normativa" => $_POST["varIdNormativa"],
				"planta" => $_POST["varPlanta"],
				// "ubicacion" => $_POST["varUbicacion"],
				"id_area" => $_POST["varId_Area"],
				"id_linea" => $_POST["varId_Linea"],
				"proveedor" => $_POST["varProveedor"],
				"turno" => $_POST["varTurno"],
				"usuarios" => $_POST["varUsuarios"],
				"muestra" => $_POST["varMuestra"],
				"lote" => $_POST["varLote"],
				"accion" => $_POST["accion"],
				"numero_orden" => $_POST["numero_orden"]
		);	
		$normativas = new AjaxOrdenTrabajo();
		$normativas-> ajaxOrdenTrabajoGuardar_GenerarOrden($data); 
	
}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // CAMBIAR DE ESTADO A INACTIVO
	$normativas = new AjaxOrdenTrabajo();
	$normativas-> ajaxOrdenTrabajoEliminar($_POST['orden_trabajo'],$_POST['estado']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // BUSCAR ORDEN TRABAJO
	$normativas = new AjaxOrdenTrabajo();
	$normativas-> ajaxOrdenTrabajoBuscar($_POST['orden_trabajo']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 6) { // BUSCAR  LOTE
	// print_r($_POST);
	$normativas = new AjaxOrdenTrabajo();
	$normativas-> ajaxOrdenLoteBuscar($_POST['orden_lote']);

}