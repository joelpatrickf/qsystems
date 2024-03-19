<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/categorias.modelo.php";
//require_once "constantes.php";


class CategoriasControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarCategorias(){
		$Categorias = CategoriasModelo::mdlListarCategorias();
		return $Categorias;
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	static public function ctrlRegistrarCategorias($data){
		$Usuario1 = CategoriasModelo::mdlRegistrarCategorias($data);
		return $Usuario1;
	}

	/* *********************************
			ACTUALIZAR
	**********************************/
	static public function ctrlActualizarCategorias($table,$data, $id, $nameId){
		$Usuario1 = CategoriasModelo::mdlActuaizarCategorias($table,$data, $id, $nameId);
		return $Usuario1;
	}		

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 