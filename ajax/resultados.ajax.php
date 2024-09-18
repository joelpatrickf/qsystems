<?php 
require_once "../controladores/resultados.controlador.php";
require_once "../modelos/resultados.modelo.php";

class AjaxResultados{
	/* *********************************
			LISTA # 1
	**********************************/    
	public function ajaxListarResultados()
	{
		$resultados1 = ResultadosControlador::ctrlListarResultados();
		echo json_encode($resultados1);
	}

	/* *********************************
		GUARDAR NUEVOS REGISTROS # 2
	**********************************/
	public function ajaxRegistrarResultados($data)
	{
		$resultados = ResultadosControlador::ctrlRegistrarResultados($data);
		echo json_encode($resultados,JSON_UNESCAPED_UNICODE);
	}	
 
}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $resultados = new AjaxResultados();
    $resultados-> ajaxListarResultados();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //  GUARDAR REGISTROS NUEVOS
   // print_r($_POST);
    

    $data = array(
            "orden_trabajo" => $_POST["orden_trabajo"],
            "id_normativa_analisis" => $_POST["id_normativa_analisis"],
            "resultado" => $_POST["resultado"],
            "fecha_creacion" => $_POST["fecha_creacion"],
            "validacion" => $_POST["validacion"],
            "estado" => $_POST["estado"],
            "id_item" => $_POST["id_item"]
    );
	
	$registrar = new AjaxResultados();
	$registrar -> ajaxRegistrarResultados($data);

}


