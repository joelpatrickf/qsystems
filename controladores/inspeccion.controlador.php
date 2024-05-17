<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/inspeccion.modelo.php";



class InspeccionControlador{

	/* ***********************************************************
		BUSCAR SI EXISTEN INSPECCIONES ABIERTAS DE DIAS ANTERIORES
		fecha/usuario/ hora_fin=null
	**************************************************************/
	static public function ctrlInspeccionListar($filtro){
		$Categorias = InspeccionModelo::mdlInspeccionListar($filtro);
		return $Categorias;
	}

	/* ***********************************************************
		GUARDAR CREAR INSPECCION		
	**************************************************************/
	static public function ctrlInspeccionCrear(){
		$Categorias = InspeccionModelo::mdlInspeccionCrear();
		return $Categorias;
	}
	
	/* ***********************************************************
		GUARDAR CERRAR INSPECCION # 3
	**************************************************************/
	static public function ctrlInspeccionCerrar($id_insp,$flag_cerrar,$hora_fin,$observacion, $usuario){
		$Categorias = InspeccionModelo::mdlInspeccionCerrar($id_insp,$flag_cerrar,$hora_fin,$observacion, $usuario);
		return $Categorias;
	}
	
	/* ***********************************************************
					GUARDAR PRODUCTOS  #4 
	**************************************************************/
	static public function ctrlInspeccionSaveProductos($data){
		$inspeccion = InspeccionModelo::mdlInspeccionSaveProductos($data);
		return $inspeccion;
	}
	/* ***********************************************************
					GUARDAR PRODUCTOS  # 5 
	**************************************************************/
	static public function ctrlInspeccionListarProductos($id_insp){
		$inspeccion = InspeccionModelo::mdlInspeccionListarProductos($id_insp);
		return $inspeccion;
	}
	
	/* ***********************************************************
					NUMERO DE MUESTRAS  # 6
	**************************************************************/
	static public function ctrlInspeccionNumeroMuestras(){
		$inspeccion = InspeccionModelo::mdlInspeccionNumeroMuestras();
		return $inspeccion;
	}

	/* ***********************************************************
					GUARDAR VARIABLES Y MUESTRAS  # 7
	**************************************************************/
	static public function ctrlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp,$id_item,$id_item_contador,$hora_actual,$id_area_validar,$id_linea_validar,$lote_validar){
		$inspeccion = InspeccionModelo::mdlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp,$id_item,$id_item_contador,$hora_actual,$id_area_validar,$id_linea_validar,$lote_validar);
		return $inspeccion;
	}

	/* ***********************************************************
					BUSCAR VARIABLES Y MUESTRAS  # 8
	**************************************************************/
	static public function ctrlInspeccionBuscarMuestrasVariables($id_ins,$id_item,$id_item_contador){
		$inspeccion = InspeccionModelo::mdlInspeccionBuscarMuestrasVariables($id_ins,$id_item,$id_item_contador);
		return $inspeccion;
	}	

	/* ***********************************************************
					BUSCAR VARIABLES Y MUESTRAS  # 9
	**************************************************************/
	static public function ctrlInspeccionAbierta(){
		$inspeccion = InspeccionModelo::mdlInspeccionAbierta();
		return $inspeccion;
	}

	/* ************************************
		INSPECCIONES REPORTE DE M&V  # 10
	**************************************/	
	static public function ctrlInspeccionReporte1(){
		$inspeccion = InspeccionModelo::mdlInspeccionReporte1();
		return $inspeccion;
	}	

	/* ************************************
		INSPECCIONES REPORTE EXCEL # 11
	**************************************/
	static public function ctrlInspeccionReporteExcel($id_insp,$id_item,$id_area,$id_linea,$usuario){
		$inspeccion = InspeccionModelo::mdlInspeccionReporteExcel($id_insp,$id_item,$id_area,$id_linea,$usuario);
		return $inspeccion;
	}		
	
}
