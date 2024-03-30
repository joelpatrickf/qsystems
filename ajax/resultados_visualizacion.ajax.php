<?php 
require_once "../controladores/resultados_visualizacion.controlador.php";
require_once "../modelos/resultados_visualizacion.modelo.php";

class AjaxResultadosVisualizacion{
    
	// public function ajaxResultadosVisualizacionListar()
	// {
	// 	$resultados1 = OrdenTrabajoControlador::ctrlOrdenTrabajoListar();
	// 	echo json_encode($resultados1);
	// }

	// *********************************
	// 		BUSCAR # 2
	// **********************************/
	public function ajaxResultadosVisualizacionBuscar($lote)
	{
		$resultados4 = ResultadosVisualizacionControlador::ctrlResultadosVisualizacionBuscar($lote);
		echo json_encode($resultados4,JSON_UNESCAPED_UNICODE);
	}	

	/* *********************************
			GUARDAR CAMBIOS REGISTROS # 3
	**********************************/

	public function ajaxResultadosVisualizacionGuardarCambios($validacion,$estado,$nuevo_resultado,$observacion,$nResultados)
	{
		$resultados2 = ResultadosVisualizacionControlador::ctrlResultadosVisualizacionGuardarCambios($validacion,$estado,$nuevo_resultado,$observacion,$nResultados);
		echo json_encode($resultados2,JSON_UNESCAPED_UNICODE);
	}	


	

} // FIN CLASE

// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR TODOS
//     $normativas = new AjaxResultadosVisualizacion();
//     $normativas-> ajaxResultadosVisualizacionListar();

// } else 
if (isset($_POST['accion']) && $_POST['accion'] == 2) { // BUSCAR 
	$normativas = new AjaxResultadosVisualizacion();
	$normativas-> ajaxResultadosVisualizacionBuscar($_POST['lote']);

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR CAMBIOS DE RESULTADOS
	// print_r($_POST);
		$normativas2 = new AjaxResultadosVisualizacion();
		$normativas2-> ajaxResultadosVisualizacionGuardarCambios(
			$_POST['validacion'],$_POST['estado'],$_POST['nuevo_resultado'],$_POST['observacion'], $_POST['nResultados']);
	
	}

