<?php 
require_once "../controladores/zonificacion.controlador.php";
require_once "../modelos/zonificacion.modelo.php";

class AjaxZonificacion{
    
	/* *********************************
			LISTAR SELECT AREA  & LINEA
	**********************************/	
	public function ajaxZonificacionListar($filtro,$dato)
	{
		$Ubicacion = ZonificacionControlador::ctrlZonificacionListar($filtro,$dato);
		echo json_encode($Ubicacion);
	}

	// /* *********************************
	// 		 GUARDAR # 2
	// **********************************/
	public function ajaxZonificacionGuardar($area,$linea,$puntos)
	{
		$Ubicacion = ZonificacionControlador::ctrlZonificacionGuardar($area,$linea,$puntos);
		echo json_encode($Ubicacion);
	}	
	
	// /* *********************************
	// 		 LISTAR ALL # 3
	// **********************************/	
	public function ajaxZonificacionListarAll()
	{
		$res1 = ZonificacionControlador::ctrlZonificacionListarAll();
		echo json_encode($res1);
	}

	// /* *********************************
	// 		 EDITAR # 4
	// **********************************/	
	public function ajaxZonificacionEditar($data){
        $table= "zonificacion";
        $id= $data['id']; 
        $nameId = "id";

        $respuesta = ZonificacionControlador::ctrlZonificacionEditar($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }	
		
}




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListar($_POST['filtro'],$_POST['dato']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARAR
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionGuardar($_POST['area'],$_POST['linea'],$_POST['puntos']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // LISTAR ALL
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarAll();

}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // MODIFICAR
	//print_r($_POST);
    $res = new AjaxZonificacion();
   $data = array(
            "area_p" => $_POST["area"],
            "linea_p" => $_POST["linea"],
            "puntos_insp" => $_POST["puntos"],
            "id" => $_POST["id"]
    );

	$res -> ajaxZonificacionEditar($data);

}