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


	/* =======================================================
        CATEGORIAS solo HIGIENICO-SANITARIO, Planificacion # 2
       ======================================================= */	
	static public function mdlCategoriasPlanificacionFlag1()
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM categorias where flag='1'");
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_ASSOC);
	}

	
}