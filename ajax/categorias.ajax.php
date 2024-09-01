<?php 
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
    
	/* ===========================
            LISTAR CATEGORIAS
       =========================== */
    public function ajaxCategoriasListar()
	{
		$res = CategoriasControlador::ctrlCategoriasListar();
		echo json_encode($res);
	}

	/* =======================================================
        CATEGORIAS solo HIGIENICO-SANITARIO, Planificacion # 2
       ======================================================= */	
    public function ajaxCategoriasPlanificacionFlag1()
	{
		$res = CategoriasControlador::ctrlCategoriasPlanificacionFlag1();
		echo json_encode($res);
	}	

}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $res = new AjaxCategorias();
    $res-> ajaxCategoriasListar();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // solo HIGIENICO-SANITARIO
    $res = new AjaxCategorias();
    $res-> ajaxCategoriasPlanificacionFlag1();

}