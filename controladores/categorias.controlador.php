<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/categorias.modelo.php";


class CategoriasControlador{

	/* ===========================
            LISTAR CATEGORIAS
       =========================== */

	static public function ctrlCategoriasListar(){
		$res = CategoriasModelo::mdlCategoriasListar();
		return $res;
	}


	/* =======================================================
        CATEGORIAS solo HIGIENICO-SANITARIO, Planificacion # 2
       ======================================================= */		
	static public function ctrlCategoriasPlanificacionFlag1(){
		$res = CategoriasModelo::mdlCategoriasPlanificacionFlag1();
		return $res;
	}

	

}

