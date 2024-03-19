<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/productos.modelo.php";
//require_once "constantes.php";


class ProductosControlador{

	/* *********************************
			LISTAR PRODUCTOS
	**********************************/
	static public function ctrlListarProductos(){
		$Productos = ProductosModelo::mdlListarProductos();
		return $Productos;
	}


	/* *********************************
			REGISTRAR 
	**********************************/
	static public function ctrlRegistrarProductos($data){
		$productos = ProductosModelo::mdlRegistrarProductos($data);
		return $productos;
	}

	/* *********************************
			ACTUALIZAAR 
	**********************************/
	static public function ctrActualizarProductos($table,$dataModificar, $id, $nameId){
		$productos = ProductosModelo::mdlActualizarProductos($table,$dataModificar, $id, $nameId);
		return $productos;
	}		

	/* *********************************
			Autocomplete 
	**********************************/
	static public function ctrlAutocomplete(){
		$productos = ProductosModelo::mdlAutocomplete();
		return $productos;
	}	

	/* *********************************
			BUSCAR 
	**********************************/
	static public function ctrBuscarProductos($data){
		$productos = ProductosModelo::mdlBuscarProducto($data);
		return $productos;
	}	

}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 