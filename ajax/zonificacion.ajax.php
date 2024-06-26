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
	public function ajaxZonificacionGuardar($id_area,$id_linea,$puntos)
	{
		$Ubicacion = ZonificacionControlador::ctrlZonificacionGuardar($id_area,$id_linea,$puntos);
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
        $id= $data['id_zonificacion']; 
        $nameId = "id_zonificacion";

        $respuesta = ZonificacionControlador::ctrlZonificacionEditar($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }	

	// /* *********************************
	// 		 ACCION MODAL AREA
	// **********************************/	
	public function AjaxZonificacion_mdlArea($data)
	{
		$res1 = ZonificacionControlador::ctrlZonificacion_mdlArea($data);
		echo json_encode($res1);
	}
	
	// /* *********************************
	// 		 ACCION MODAL LINEA
	// **********************************/	
	public function AjaxZonificacion_mdlLinea($data)
	{
		$res1 = ZonificacionControlador::ctrlZonificacion_mdlLinea($data);
		echo json_encode($res1);
	}	
	
	
	/* *********************************
	 		 LISTAR AREA/LINEA # 5
	 ***********************************/
	public function ajaxZonificacionListarArea_Linea()
	{
		$res1 = ZonificacionControlador::ctrlZonificacionListarArea_Linea();
		echo json_encode($res1);
	}	
	/* ****************************************
	 		 LISTAR AREA PARA PANIFICACION # 6
	 *******************************************/
	public function ajaxZonificacionListarArea()
	{
		$res1 = ZonificacionControlador::ctrlZonificacionListarArea();
		echo json_encode($res1);
	}	
	/* ****************************************
	 		 LISTAR AREA PARA PANIFICACION # 6_1
	 *******************************************/
	public function ajaxZonificacionListarLinea($area)
	{
		$res1 = ZonificacionControlador::ctrlZonificacionListarLinea($area);
		echo json_encode($res1);
	}
	/* *****************************************************
	 		 LISTAR PUNTO INSPECCION PARA PANIFICACION # 6_2
	 ********************************************************/
	public function ajaxZonificacionListarPI($id_linea)
	{
		$res1 = ZonificacionControlador::ctrlZonificacionListarPI($id_linea);
		echo json_encode($res1);
	}				
}




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListar($_POST['filtro'],$_POST['dato']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUADAR nUEVOS REGISTROS ZONIFICACION
	// print_r($_POST);
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionGuardar($_POST['id_area'],$_POST['id_linea'],$_POST['punto']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // LISTAR ALL ZONIFICACION
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarAll();

}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // MODIFICAR
	// print_r($_POST);
    $res = new AjaxZonificacion();
   	$data = array(
            "id_area" => $_POST["id_area"],
            "id_linea" => $_POST["id_linea"],
            "punto_insp" => $_POST["punto"],
            "id_zonificacion" => $_POST["id"]
    );
	$res -> ajaxZonificacionEditar($data);

}else if (isset($_POST['accion']) && ($_POST['accion'] == 'mdlArea_new' || $_POST['accion'] == 'mdlArea_edit')) {  // AREA
	// print_r($_POST);
    $res = new AjaxZonificacion();
   	$data = array(
            "accion" => $_POST["accion"],
            "area" => $_POST["area"],
            "observacion" => $_POST["observacion"],
            "id_area" => $_POST["id"],
            "estado" => $_POST["estado"]
    );
	$res -> AjaxZonificacion_mdlArea($data);

}else if (isset($_POST['accion']) && ($_POST['accion'] == 'mdlLinea_new' || $_POST['accion'] == 'mdlLinea_edit')) {  // LINEA
	// print_r($_POST);
    $res = new AjaxZonificacion();
   	$data = array(
            "accion" => $_POST["accion"],
            "linea" => $_POST["linea"],
            "observacion" => $_POST["observacion"],
            "id_linea" => $_POST["id"],
            "estado" => $_POST["estado"]
    );
	$res -> AjaxZonificacion_mdlLinea($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // LISTAR AREA-LINEA
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarArea_Linea();

}else if (isset($_POST['accion']) && $_POST['accion'] == 6) { // LISTAR SOLO AREA PARA PLANIFICACION
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarArea();

}else if (isset($_POST['accion']) && $_POST['accion'] == 6_1) { // LISTAR SOLO AREA PARA PLANIFICACION
	// print_r($_POST);
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarLinea($_POST['id_area']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 6_2) { // LISTAR SOLO AREA PARA PLANIFICACION
	// print_r($_POST);
    $res = new AjaxZonificacion();
    $res-> ajaxZonificacionListarPI($_POST['id_linea']);

}
