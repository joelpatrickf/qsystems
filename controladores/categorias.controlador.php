<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/categorias.modelo.php";


class CategoriasControlador{

	/* ===========================
            LISTAR CATEGORIAS
       =========================== */

	static public function ctrlCategoriasListar(){
		$RES = CategoriasModelo::mdlCategoriasListar();
		return $RES;
	}
	

}

