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
	public function ajaxInspeccionCerrar($id_insp)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionCerrar($id_insp);
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
	public function ajaxInspeccionSaveMuestrasVariables	($muestras,$variables,$id_insp)
	{
		$respuesta1 = InspeccionControlador::ctrlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp);
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
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionCerrar($_POST['id_insp']);

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
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionListarProductos($_POST['id_insp']);

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) { // LISTAR NUMERO DE MUESTRAS
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionNumeroMuestras();

} else if (isset($_POST['accion']) && $_POST['accion'] == 7) { // GUARDAR MUESTRAS Y VARIABLES DATOS
	// print_r($_POST);
    $inspeccion = new AjaxInspeccion();
    $inspeccion-> ajaxInspeccionSaveMuestrasVariables($_POST['muestras'],$_POST['variables'],$_POST['id_insp']);

}


