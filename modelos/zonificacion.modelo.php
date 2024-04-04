<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class ZonificacionModelo{
	
	/* *********************************
			LISTAR SELECT AREA  & LINEA
	**********************************/
	static public function mdlZonificacionListar($filtro,$dato)
	{
		if ($filtro == 'area'){
			$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, id_area, area, fecha, usuario, observacion,estado, area as label FROM area");
		}else if ($filtro == 'linea'){
			$stmt = Conexion::conectar()->prepare("SELECT  '' as vacio, id_linea, linea,fecha, usuario, observacion,estado, linea as label FROM linea");
		}
		
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
		// echo"<br>";
		// print_r($stmt-> fetchAll());
		// exit();
		

	}

	/* *********************************
			LISTAR ALL
	**********************************/
	static public function mdlZonificacionListarAll()
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, id, area_p, linea_p, puntos_insp, fecha, usuario FROM zonificacion");
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
	}	

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/

	static public function mdlZonificacionGuardar($area,$linea,$puntos)
	{
		// print_r($data);
		// exit();

		try {
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$user=$_SESSION['login'][0]->usuario;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO zonificacion(area_p,linea_p,puntos_insp, fecha, usuario)
			 VALUES(:area_p, :linea_p, :puntos_insp, :fecha, :usuario)");

	        $stmt->bindParam(":area_p", $area); 
	        $stmt->bindParam(":linea_p", $linea); 
	        $stmt->bindParam(":puntos_insp", $puntos); 
	        $stmt->bindParam(":fecha", $fechaActual); 
	        $stmt->bindParam(":usuario", $user); 
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	
   // ACTUALIZAR REGISTROS
   static public function mdlZonificacionEditar($table,$data, $id, $nameId){
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
		// print_r($data['area']);
		// exit();
		
		// Ingreso de area
		if ($data['accion']  == 'mdlLinea_new'){
			try {
				$stmt=null;
				date_default_timezone_set("America/Guayaquil");
				$fechaActual = date('Y-m-d H:i:s', time()); 
				$user=$_SESSION['login'][0]->usuario;
	
				$stmt = Conexion::conectar()->prepare("INSERT INTO area(linea,fecha,usuario,observacion,estado)
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

}



 