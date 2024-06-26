<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class PlanifcacionModelo{
	
	/* *********************************
			LISTAR LISTAR PLANIFICACION  # 1
	**********************************/	
	static public function mdlPlanificacionListar()
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,id_planificacion,  p.id_area,a.area,  l.id_linea,l.linea,  punto_inspeccion, cantidad, frecuencia,  p.fecha,  p.usuario 
			FROM planificacion p
			INNER JOIN area a ON p.id_area = a.id_area 
			INNER JOIN linea l ON p.id_area = l.id_linea
		");
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
	}

	/* *********************************
			GUARDAR PLANIFICACION # 2
	**********************************/	

	static public function mdlPlanificacionSave($data)
	{
		$id_area =$data['id_area'];
		$id_linea =$data['id_linea'];
		$id_PI =$data['punto_inspeccion'];


		$stmt1 = Conexion::conectar()->prepare("SELECT * FROM planificacion WHERE id_area = '$id_area'  AND id_linea = $id_linea AND punto_inspeccion='$id_PI' ");
		$stmt1->execute();
		$res = $stmt1-> fetchAll(PDO::FETCH_CLASS);
		$nReg = count($res);

		if ($nReg == 0){
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d'); 
			$user=$_SESSION['login'][0]->usuario;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO planificacion(id_area,id_linea,punto_inspeccion, fecha, usuario,frecuencia, cantidad)
			 VALUES(:id_area, :id_linea, :punto_inspeccion, :fecha, :usuario,:frecuencia, :cantidad)");

	        $stmt->bindParam(":id_area", $data['id_area']); 
	        $stmt->bindParam(":id_linea", $data['id_linea']); 
	        $stmt->bindParam(":cantidad", $data['cantidad']); 
	        $stmt->bindParam(":punto_inspeccion", $data['punto_inspeccion']); 
	        $stmt->bindParam(":frecuencia", $data['frecuencia']); 
	        $stmt->bindParam(":fecha", $fechaActual); 
	        $stmt->bindParam(":usuario", $user); 
			if($stmt->execute()){
				return "ok";
			}else{
				return Conexion::conectar()->errorInfo();
			}
		}else{
			return 'existe';
		}


		


	}

	
   // ACTUALIZAR REGISTROS
   static public function mdlPlanificacionSaveEdit($table,$data, $id, $nameId){
		//$user=$_SESSION['login'][0]->usuario;
				
		$set = "";
		foreach ($data as $key => $value){
			$set .= $key." = :".$key.",";
		}

		$set = substr($set, 0, -1);
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
		
		foreach ($data as $key => $value){
			$stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
		}
		
		$stmt->bindParam(":".$nameId, $id, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return Conexion::conectar()->errorInfo();
		}

	}



	/* ********************************
			ACCION MODAL AREA, GENERAL
	**********************************/

	static public function mdlZonificacion_mdlArea($data)
	{
		// print_r($data['area']);
		// exit();
		
		// Ingreso de area
		if ($data['accion']  == 'mdlArea_new'){
			try {
				$stmt=null;
				date_default_timezone_set("America/Guayaquil");
				$fechaActual = date('Y-m-d H:i:s', time()); 
				$user=$_SESSION['login'][0]->usuario;
	
				$stmt = Conexion::conectar()->prepare("INSERT INTO area(area,fecha,usuario,observacion,estado)
				 VALUES(:area,:fecha,:usuario,:observacion,:estado)");
	
				$stmt->bindParam(":area", $data['area']); 
				$stmt->bindParam(":fecha", $fechaActual); 
				$stmt->bindParam(":usuario", $user); 
				$stmt->bindParam(":observacion", $data['observacion']); 
				$stmt->bindParam(":estado", $data['estado']); 
				$stmt->execute();
				$resultado = 'ok';
	
			} catch (Exception $e) {
				$resultado='Exception Capturada'. $e->getMessage(). "\n";
				 
			}
		}else if ($data['accion']  == 'mdlArea_edit'){

			// $user= $_SESSION['login'][0]->usuario;
			$stmt=null;
			// date_default_timezone_set("America/Guayaquil");
			// $fechaActual = date('Y-m-d H:i:s', time()); 
				
			$stmt2 = Conexion::conectar()->prepare("UPDATE area SET 
				area =:area, 
				observacion =:observacion,
				estado =:estado 
				WHERE id_area = :id_area");

				$stmt2->bindParam(":area", $data['area']);
				$stmt2->bindParam(":observacion", $data['observacion']);
				$stmt2->bindParam(":estado", $data['estado']);
				$stmt2->bindParam(":id_area", $data['id_area']);

				$stmt2->execute();
				$resultado = 'ok';
				$stmt2=null;
		}
		return $resultado;
	}


	/* ********************************
			ACCION MODAL LINEA, GENERAL
	**********************************/

	static public function mdlZonificacion_mdlLinea($data)
	{
		// print_r($data);
		// exit();
		
		// Ingreso de area
		if ($data['accion']  == 'mdlLinea_new'){
			try {
				$stmt=null;
				date_default_timezone_set("America/Guayaquil");
				$fechaActual = date('Y-m-d H:i:s', time()); 
				$user=$_SESSION['login'][0]->usuario;
	
				$stmt = Conexion::conectar()->prepare("INSERT INTO linea(linea,fecha,usuario,observacion,estado)
				 VALUES(:linea,:fecha,:usuario,:observacion,:estado)");
	
				$stmt->bindParam(":linea", $data['linea']); 
				$stmt->bindParam(":fecha", $fechaActual); 
				$stmt->bindParam(":usuario", $user); 
				$stmt->bindParam(":observacion", $data['observacion']); 
				$stmt->bindParam(":estado", $data['estado']); 
				$stmt->execute();
				$resultado = 'ok';
	
			} catch (Exception $e) {
				$resultado='Exception Capturada'. $e->getMessage(). "\n";
				 
			}
		}else if ($data['accion']  == 'mdlLinea_edit'){

			$stmt=null;
			$stmt2 = Conexion::conectar()->prepare("UPDATE linea SET 
				linea =:linea, 
				observacion =:observacion,
				estado =:estado 
				WHERE id_linea = :id_linea");

				$stmt2->bindParam(":linea", $data['linea']);
				$stmt2->bindParam(":observacion", $data['observacion']);
				$stmt2->bindParam(":estado", $data['estado']);
				$stmt2->bindParam(":id_linea", $data['id_linea']);

				$stmt2->execute();
				$resultado = 'ok';
				$stmt2=null;
		}
		return $resultado;
	}	

	/* *********************************
	 		 LISTAR AREA/LINEA # 5
	 ***********************************/
	static public function mdlZonificacionListarArea_Linea()
	{
		//$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, id, area_p, linea_p, puntos_insp, fecha, usuario FROM zonificacion");
			$stmt = Conexion::conectar()->prepare("SELECT distinct z.id_area, z.id_linea, a.area, l.linea, a.area as label
													FROM zonificacion z
													INNER JOIN area a ON z.id_area = a.id_area
													INNER JOIN linea l ON z.id_linea = l.id_linea");
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
	}

}



 