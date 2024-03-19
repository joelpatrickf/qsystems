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
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		return $stmt-> fetchAll();
		
		

	}

// 	/* *********************************
// 			GUARDAR NUEVOS REGISTROS
// 	**********************************/

// 	static public function mdlRegistrarCategorias($data)
// 	{
// 		// print_r($data);
// 		// exit();

// 		try {
// 	        $stmt=null;
// 			date_default_timezone_set("America/Guayaquil");
// 			$fechaActual = date('Y-m-d H:i:s', time()); 

// 	        $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(categoria,observacion,fecha_creacion, id_normativa)
// 			 VALUES(:categoria,:observacion,:fecha_creacion,:id_normativa)");

// 	        $stmt->bindParam(":categoria", $data['categoria']); 
// 	        $stmt->bindParam(":observacion", $data['observacion']); 
// 	        $stmt->bindParam(":fecha_creacion", $fechaActual); 
// 	        $stmt->bindParam(":id_normativa", $data['id_normativa']); 
// 			$stmt->execute();
// 			$resultado = 'ok';

// 		} catch (Exception $e) {
//             $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
//         }
// 		return $resultado;
// 	}

	
//    // ACTUALIZAR REGISTROS
//    static public function mdlActuaizarCategorias($table,$data, $id, $nameId){

// 	// print_r($data);
// 	// exit();

// 	//$user=$_SESSION['login'][0]->usuario;
			
// 	$set = "";
// 	foreach ($data as $key => $value){
// 		$set .= $key." = :".$key.",";
// 	}

// 	$set = substr($set, 0, -1);

// 	$stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
	
// 	foreach ($data as $key => $value){
// 		$stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
// 	}
	
// 	$stmt->bindParam(":".$nameId, $id, PDO::PARAM_STR);

// 	if($stmt->execute()){
// 		return "ok";
// 	}else{
// 		return Conexion::conectar()->errorInfo();

// 	}

//}		

}



 