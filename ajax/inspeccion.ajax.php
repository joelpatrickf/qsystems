<?php 
require_once "../controladores/inspeccion.controlador.php";
require_once "../modelos/inspeccion.modelo.php";

class AjaxInspeccion{
    
	/* ***********************************************************
		BUSCAR SI EXISTEN INSPECCIONES ABIERTAS DE DIAS ANTERIORES
		fecha/usuario/ hora_fin=null
	**************************************************************/
	public function ajaxInspeccionListar($filtro)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionListar($filtro);
		echo json_encode($respuesta1);
	}

	/* ***********************************************************
		GUARDAR CREAR INSPECCION		
	**************************************************************/
	public function ajaxInspeccionCrear()
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionCrear();
		echo json_encode($respuesta1);
	}

	/* ***********************************************************
		GUARDAR CERRAR INSPECCION #3
	**************************************************************/

	public function ajaxInspeccionCerrar($id_insp,$flag_cerrar,$hora_fin,$observacion, $usuario)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionCerrar($id_insp,$flag_cerrar,$hora_fin,$observacion, $usuario);
		echo json_encode($respuesta1);
	}	

	
	/* *************************
		GUARDAR PRODUCTOS  #4 
	***************************/
	public function ajaxInspeccionSaveProductos($data)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionSaveProductos($data);
		echo json_encode($respuesta1);
	}

	/* *************************
		LISTAR PRODUCTOS  #5 
	***************************/
	public function ajaxInspeccionListarProductos($id_insp)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionListarProductos($id_insp);
		echo json_encode($respuesta1);
	}	

	/* *************************
		NUMERO DE MUESTRAS  # 6
	***************************/
	public function ajaxInspeccionNumeroMuestras()
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionNumeroMuestras();
		echo json_encode($respuesta1);
	}		
	
	
	/* ***********************************
		GUARDAR VARIABLES Y MUESTRAS  # 7
	*************************************/
	
	public function ajaxInspeccionSaveMuestrasVariables	($muestras,$variables,$id_insp,$id_item,$id_item_contador,$hora_actual,$id_area_validar,$id_linea_validar,$lote_validar)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp,$id_item,$id_item_contador,$hora_actual,$id_area_validar,$id_linea_validar,$lote_validar);
		echo json_encode($respuesta1);
	}

	

	/* ***********************************
		BUSCAR VARIABLES Y MUESTRAS  # 8
	*************************************/
	public function ajaxInspeccionBuscarMuestrasVariables ($id_ins,$id_item,$id_item_contador)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionBuscarMuestrasVariables($id_ins,$id_item,$id_item_contador);
		echo json_encode($respuesta1);
	}	


	
	/* ***********************************
		BUSCAR VARIABLES Y MUESTRAS  # 9
	*************************************/
	public function ajaxInspeccionAbierta()
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionAbierta();
		echo json_encode($respuesta1);
	}

	
	/* ************************************
		INSPECCIONES REPORTE DE M&V  # 10
	**************************************/
	public function ajaxInspeccionReporte1()
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionReporte1();
		echo json_encode($respuesta1);
	}
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionListar($_POST['filtro']);

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // GUARDAR CREAR INSPECCION
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionCrear();

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR CERRAR INSPECCION
	// echo "<pre>";
	// print_r($_POST);
	// echo "<pre>";

    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionCerrar(
		$_POST['id_insp'],
		$_POST['flag_cerrar'],
		$_POST['hora_fin'],
		$_POST['observacion'],
		$_POST['usuario']
	);

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // GUARDAR AGREGAR PRODUCTOS
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $data = array(
            "id_insp" => $_POST["id_insp"],
            "fecha" => $_POST["fecha"],
            "id_area" => $_POST["id_area"],
            "id_linea" => $_POST["id_linea"],
            "id_item" => $_POST["id_item"],
            "lote" => $_POST["lote"],
            "turno" => $_POST["turno"]
    );	
    $inspeccion-> ajaxInspeccionSaveProductos($data);

} else if (isset($_POST['accion']) && $_POST['accion'] == 5) { // LISTAR PRODUCTOS
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionListarProductos($_POST['id_insp']);

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) { // LISTAR NUMERO DE MUESTRAS
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionNumeroMuestras();

} else if (isset($_POST['accion']) && $_POST['accion'] == 7) { // GUARDAR MUESTRAS Y VARIABLES DATOS
	// echo "<pre>";
	// print_r($_POST);
	// echo "<pre>";
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionSaveMuestrasVariables($_POST['muestras'],$_POST['variables'],$_POST['id_insp'],$_POST['id_item'],$_POST['id_item_contador'],$_POST['hora_actual'], $_POST['id_area_validar'],$_POST['id_linea_validar'],$_POST['lote_validar']
);

} else if (isset($_POST['accion']) && $_POST['accion'] == 8) { // BUSQUEDA MUESTRAS Y VARIABLES DE PRODUCTOS
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionBuscarMuestrasVariables($_POST['id_insp'],$_POST['id_item'],$_POST['id_item_contador']);

} else if (isset($_POST['accion']) && $_POST['accion'] == 9) { //  INSPECCIONES ABIERTAS
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionAbierta();

} else if (isset($_POST['accion']) && $_POST['accion'] == 10) { //  INSPECCIONES REPORTE DE INGRESO DE M&V
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionReporte1();

}