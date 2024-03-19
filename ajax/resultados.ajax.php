<?php 
require_once "../controladores/resultados.controlador.php";
require_once "../modelos/resultados.modelo.php";

class AjaxResultados{
    
	public function ajaxListarResultados()
	{
		$resultados1 = ResultadosControlador::ctrlListarResultados();
		echo json_encode($resultados1);
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	public function ajaxRegistrarResultados($data)
	{
		$resultados = ResultadosControlador::ctrlRegistrarResultados($data);
		echo json_encode($resultados,JSON_UNESCAPED_UNICODE);
	}	
    
	// // // ACTUALIAR 
    // public function ajaxActualizarResultados($data){
    //     $table= "categorias";
    //     $id= $data['id_categoria']; 
    //     $nameId = "id_categoria";

    //     $respuesta = ResultadosControlador::ctrlActualizarResultados($table,$data, $id, $nameId);
    //     echo json_encode($respuesta);
    // }	
}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    //print_r($_POST);
    $resultados = new AjaxResultados();
    $resultados-> ajaxListarResultados();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //  GUARDAR REGISTROS NUEVOS
    $registrar = new AjaxResultados();

    $data = array(
            "orden_trabajo" => $_POST["orden_trabajo"],
            "id_normativa_analisis" => $_POST["id_normativa_analisis"],
            "resultado" => $_POST["resultado"],
            "fecha_creacion" => $_POST["fecha_creacion"],
            "validacion" => $_POST["validacion"]
    );

	$registrar -> ajaxRegistrarResultados($data);

}
// else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR ->  ACTUALIZAR MODIFICAR, EDITAR
//     //print_r($_POST["id_normativa"]);
//     $modificar = new AjaxCategorias();

//     $data = array(
//             "id_categoria" => $_POST["id_categoria"],
//             "categoria" => $_POST["categoria"],
//             "observacion" => $_POST["observacion"],
//             "id_normativa" => $_POST["id_normativa"]
//     );



// 	$modificar -> ajaxActualizarCategorias($data);

//  }

