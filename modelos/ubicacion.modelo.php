<?php 
//if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class UbicacionModelo{
	
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlListarUbicacion()
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM ubicacion");

		$stmt->execute();
		return $stmt-> fetchAll();
		
		

	}



}



 