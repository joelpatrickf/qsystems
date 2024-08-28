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

}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $res = new AjaxCategorias();
    $res-> ajaxCategoriasListar();

}