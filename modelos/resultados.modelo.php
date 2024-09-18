<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class ResultadosModelo{
	
	/* *********************************
			LISTAS # 1
	**********************************/
	static public function mdlListarResultados()
	{
		$stmt = Conexion::conectar()->prepare("SELECT res.id_resultados, res.orden_trabajo, res.id_normativa_analisis, res.fecha_creacion, res.usuario_creacion,nor.normativa, nor.categoria, nor.tipo_analisis, nor.analisis, res.resultado,res.validacion,res.estado
		FROM resultados res
		INNER JOIN normativas nor ON res.id_normativa_analisis=nor.id_normativa
		");

		$stmt->execute();

		return $stmt-> fetchAll();
	}

	/* *********************************
		GUARDAR NUEVOS REGISTROS # 2
	**********************************/

	static public function mdlRegistrarResultados($data)
	{
		// print_r($data);
		// exit();

		try {
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$usuario=$_SESSION['login'][0]->usuario;
			$ordenTrabajo = $data['orden_trabajo'];
			$idNormativaAnalisis = $data['id_normativa_analisis'];

			$stmt1 = Conexion::conectar()->prepare("SELECT * FROM resultados where orden_trabajo = '$ordenTrabajo' AND id_normativa_analisis = '$idNormativaAnalisis'");
			$stmt1->execute();
			
			
			
			$nreg =$stmt1->rowCount();
			if ($nreg >0 ){
				$resultado = 'existe';
			}else{
				$stmt = Conexion::conectar()->prepare("INSERT INTO resultados(orden_trabajo,id_normativa_analisis,resultado,fecha_creacion,usuario_creacion,validacion,estado,id_item)
				 VALUES(:orden_trabajo,:id_normativa_analisis,:resultado,:fecha_creacion,:usuario_creacion,:validacion,:estado,:id_item)");
	
				$stmt->bindParam(":orden_trabajo", $data['orden_trabajo']); 
				$stmt->bindParam(":id_normativa_analisis", $data['id_normativa_analisis']); 
				$stmt->bindParam(":resultado", $data['resultado']); 
				$stmt->bindParam(":fecha_creacion", $data['fecha_creacion']); 
				$stmt->bindParam(":usuario_creacion", $usuario); 
				$stmt->bindParam(":validacion", $data['validacion']); 
				$stmt->bindParam(":estado", $data['estado']); 
				$stmt->bindParam(":id_item", $data['id_item']); 
				$stmt->execute();
				$resultado = 'ok';

			}
				

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	
   // ACTUALIZAR REGISTROS
//    static public function mdlActuaizarResultados($table,$data, $id, $nameId){

// 		// print_r($data);
// 		// exit();

// 		//$user=$_SESSION['login'][0]->usuario;
				
// 		$set = "";
// 		foreach ($data as $key => $value){
// 			$set .= $key." = :".$key.",";
// 		}

// 		$set = substr($set, 0, -1);

// 		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
		
// 		foreach ($data as $key => $value){
// 			$stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
// 		}
		
// 		$stmt->bindParam(":".$nameId, $id, PDO::PARAM_STR);

// 		if($stmt->execute()){
// 			return "ok";
// 		}else{
// 			return Conexion::conectar()->errorInfo();

// 		}

// 	}		

}



 