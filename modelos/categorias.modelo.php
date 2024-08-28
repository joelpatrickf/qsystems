<?php 
//if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class CategoriasModelo{
	
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlCategoriasListar()
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM categorias");

		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_ASSOC);

		
		

	}

	
}



 