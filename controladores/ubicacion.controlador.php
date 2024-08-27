<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/ubicacion.modelo.php";
//require_once "constantes.php";


class UbicacionControlador{

	/* *********************************
			LISTAR 
	**********************************/
	static public function ctrlListarUbicacion(){
		$res = UbicacionModelo::mdlListarUbicacion();
		return $res;
	}

	
}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 