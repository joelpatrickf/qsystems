<?php 
require_once "../controladores/normativas.controlador.php";
require_once "../modelos/normativas.modelo.php";

class AjaxNormativas{
    
	public function ajaxListarNormativas()
	{
		$Normativas = NormativasControlador::ctrlListarNormativas();
		echo json_encode($Normativas);
	}

	// /* *********************************
	// 		GUARDAR NUEVOS REGISTROS # 2
	// **********************************/

	public function ajaxRegistrarNormativas($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida,$categoria_general)
	{
		$res = NormativasControlador::ctrlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida,$categoria_general);
		echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}	
    
	// *********************************
	// 		ACTUALIZAR # 3
	// **********************************/
    public function ajaxNormativasActualizar($data){
        $table= "normativas";
        $id= $data['id_normativa']; 
        $nameId = "id_normativa";

        $respuesta = NormativasControlador::ctrlNormativasActualizar($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }

    /* *********************************
       AUTOCOMPLETE NORMATIVA # 4
     ********************************** */ 
    public function ajaxNormativasListarDisctint(){

        $respuesta2 = NormativasControlador::ctrlNormativasListarDisctint();
        echo json_encode($respuesta2);
    }    
    
	// *********************************
	// 		 BUSCAMOS LOS ANALISIS # 5
	// **********************************/ 
    public function ajaxNormativasBuscarAnalisis($orden_trabajo){

        $respuesta3 = NormativasControlador::ctrlNormativasBuscarAnalisis($orden_trabajo);
        echo json_encode($respuesta3);
    }


    /*===========================================
        Buscar Normativas x filtro de Categoria # 6
      ===========================================*/
    public function ajaxNormativasIngresoResultados($id_categoria_general){
        $respuesta4 = NormativasControlador::ctrlNormativasIngresoResultados($id_categoria_general);
        echo json_encode($respuesta4);
    }    


}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $normativas = new AjaxNormativas();
    $normativas-> ajaxListarNormativas();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //  GUARDAR REGISTROS NUEVOS
    //print_r($_POST);
    $Normativasregistrar = new AjaxNormativas();

	$Normativasregistrar -> ajaxRegistrarNormativas(
        $_POST["normativa"],
        $_POST["categoria"],
        $_POST["tipo_analisis"],
        $_POST["analisis"],
        $_POST["limite_minimo"],
        $_POST["limite_maximo"],
        $_POST["unidad_medida"],
        $_POST["categoria_general"]
    );

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR MODIFICACION
	$NormativasActualizar = new AjaxNormativas();	
    $data = array(
            "normativa" => $_POST["normativa"],
            "categoria" => $_POST["categoria"],
            "tipo_analisis" => $_POST["tipo_analisis"],
            "analisis" => $_POST["analisis"],
            "limite_min" => $_POST["limite_minimo"],
            "limite_max" => $_POST["limite_maximo"],
            "id_normativa" => $_POST["id_normativa"],
            "unidad_medida" => $_POST["unidad_medida"],
            "id_categoria_general" => $_POST["categoria_general"]
            
    );

    $NormativasActualizar -> ajaxNormativasActualizar($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // LISTAR DISCTINT NORMATIVA
    $normativas = new AjaxNormativas();
    $normativas-> ajaxNormativasListarDisctint();

}else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // BUSCAR ANALISIS
    $normativas = new AjaxNormativas();
    $normativas-> ajaxNormativasBuscarAnalisis($_POST['orden_trabajo']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 6) { // Normativas pa Planificacion
    $normativas = new AjaxNormativas();
    $normativas-> ajaxNormativasIngresoResultados($_POST['id_categoria_general']);

} 

