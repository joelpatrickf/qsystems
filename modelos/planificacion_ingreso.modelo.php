<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class PlanificacionIngresoModelo{

	/*===================================================
		Guardar Ingresos de resultados Planificación # 1
	  ===================================================*/

	static public function mdlPIGuardar($data)
	{
		//echo "<pre>";print_r($data);echo "<pre>";

		$id_ingreso_planificacion=null;
		$id_planificacion = $data['id_planificacion'];
		$id_categoria_general = $data['id_categoria_general'];
		$id_normativa = $data['id_normativa'];		
		$limite_min = $data['limite_min'];
		$limite_max = $data['limite_max'];
		$resultados = $data['resultados'];
		$fecha_resultado = $data['fecha_resultados'];
		$observacion = $data['observacion'];
		$validacion = $data['validacion'];
		$estado = null;
		$usuario=$_SESSION['login'][0]->usuario;

        $stmt=null;
		date_default_timezone_set("America/Guayaquil");
		$fechaActual = date('Y-m-d'); 
		$user=$_SESSION['login'][0]->usuario;

        $stmt = Conexion::conectar()->prepare("INSERT resultados_planificacion (id_ingreso_planificacion,id_planificacion,id_categoria_general,id_normativa,limite_min,limite_max,resultados,fecha_resultado,observacion,validacion,estado,usuario)
		 VALUES(:id_ingreso_planificacion,:id_planificacion,:id_categoria_general,:id_normativa,:limite_min,:limite_max,:resultados,:fecha_resultado,:observacion,:validacion,:estado,:usuario)");

        $stmt->bindParam(":id_ingreso_planificacion", $id_ingreso_planificacion); 
        $stmt->bindParam(":id_planificacion", $id_planificacion); 
        $stmt->bindParam(":id_categoria_general", $id_categoria_general); 
        $stmt->bindParam(":id_normativa", $id_normativa); 
        $stmt->bindParam(":limite_min", $limite_min); 
        $stmt->bindParam(":limite_max", $limite_max); 
        $stmt->bindParam(":resultados", $resultados); 
        $stmt->bindParam(":fecha_resultado", $fecha_resultado); 
        $stmt->bindParam(":observacion", $observacion); 
        $stmt->bindParam(":validacion", $validacion); 
        $stmt->bindParam(":estado", $estado); 
        $stmt->bindParam(":usuario", $usuario);


		if($stmt->execute()){
			return "ok";
		}else{
			return Conexion::conectar()->errorInfo();
		}

	}

	
	/* *********************************
			LISTAR LISTAR PLANIFICACION  # 1
	**********************************/	
	// static public function mdlPlanificacionListar()
	// {
	// 	$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,id_planificacion,  p.id_area,a.area,  l.id_linea,l.linea,  punto_inspeccion, cantidad, frecuencia,  p.fecha,  p.usuario 
	// 		FROM planificacion p
	// 		INNER JOIN area a ON p.id_area = a.id_area 
	// 		INNER JOIN linea l ON p.id_area = l.id_linea
	// 	");
	// 	$stmt->execute();
	// 	return $stmt-> fetchAll(PDO::FETCH_CLASS);
	// }

	/* *****************************************
			LISTAR PLANIFICACION 4 Columnas # 11
	********************************************/	
	// static public function mdlPlanificacionListar4Columnas()
	// {
	// 	$sql = 'SELECT id_planificacion, a.area,  l.linea,  punto_inspeccion FROM planificacion p INNER JOIN area a ON p.id_area = a.id_area INNER JOIN linea l ON p.id_area = l.id_linea';
	//     $stmt = Conexion::conectar()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	//     $stmt->execute();



	//     $data = array();
	//     while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	//         $data[] = $row;
	//     }
	//     //echo json_encode($data);
	//     return $data;
	
	// }	



	
   	// /*ACTUALIZAR REGISTROS*/
   	// static public function mdlPlanificacionSaveEdit($table,$data, $id, $nameId){
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

	// }



	// /* ********************************
	// 		ACCION MODAL AREA, GENERAL
	// **********************************/

	// static public function mdlZonificacion_mdlArea($data)
	// {
	// 	// print_r($data['area']);
	// 	// exit();
		
	// 	// Ingreso de area
	// 	if ($data['accion']  == 'mdlArea_new'){
	// 		try {
	// 			$stmt=null;
	// 			date_default_timezone_set("America/Guayaquil");
	// 			$fechaActual = date('Y-m-d H:i:s', time()); 
	// 			$user=$_SESSION['login'][0]->usuario;
	
	// 			$stmt = Conexion::conectar()->prepare("INSERT INTO area(area,fecha,usuario,observacion,estado)
	// 			 VALUES(:area,:fecha,:usuario,:observacion,:estado)");
	
	// 			$stmt->bindParam(":area", $data['area']); 
	// 			$stmt->bindParam(":fecha", $fechaActual); 
	// 			$stmt->bindParam(":usuario", $user); 
	// 			$stmt->bindParam(":observacion", $data['observacion']); 
	// 			$stmt->bindParam(":estado", $data['estado']); 
	// 			$stmt->execute();
	// 			$resultado = 'ok';
	
	// 		} catch (Exception $e) {
	// 			$resultado='Exception Capturada'. $e->getMessage(). "\n";
				 
	// 		}
	// 	}else if ($data['accion']  == 'mdlArea_edit'){

	// 		// $user= $_SESSION['login'][0]->usuario;
	// 		$stmt=null;
	// 		// date_default_timezone_set("America/Guayaquil");
	// 		// $fechaActual = date('Y-m-d H:i:s', time()); 
				
	// 		$stmt2 = Conexion::conectar()->prepare("UPDATE area SET 
	// 			area =:area, 
	// 			observacion =:observacion,
	// 			estado =:estado 
	// 			WHERE id_area = :id_area");

	// 			$stmt2->bindParam(":area", $data['area']);
	// 			$stmt2->bindParam(":observacion", $data['observacion']);
	// 			$stmt2->bindParam(":estado", $data['estado']);
	// 			$stmt2->bindParam(":id_area", $data['id_area']);

	// 			$stmt2->execute();
	// 			$resultado = 'ok';
	// 			$stmt2=null;
	// 	}
	// 	return $resultado;
	// }


	// /* ********************************
	// 		ACCION MODAL LINEA, GENERAL
	// **********************************/

	// static public function mdlZonificacion_mdlLinea($data)
	// {
	// 	// print_r($data);
	// 	// exit();
		
	// 	// Ingreso de area
	// 	if ($data['accion']  == 'mdlLinea_new'){
	// 		try {
	// 			$stmt=null;
	// 			date_default_timezone_set("America/Guayaquil");
	// 			$fechaActual = date('Y-m-d H:i:s', time()); 
	// 			$user=$_SESSION['login'][0]->usuario;
	
	// 			$stmt = Conexion::conectar()->prepare("INSERT INTO linea(linea,fecha,usuario,observacion,estado)
	// 			 VALUES(:linea,:fecha,:usuario,:observacion,:estado)");
	
	// 			$stmt->bindParam(":linea", $data['linea']); 
	// 			$stmt->bindParam(":fecha", $fechaActual); 
	// 			$stmt->bindParam(":usuario", $user); 
	// 			$stmt->bindParam(":observacion", $data['observacion']); 
	// 			$stmt->bindParam(":estado", $data['estado']); 
	// 			$stmt->execute();
	// 			$resultado = 'ok';
	
	// 		} catch (Exception $e) {
	// 			$resultado='Exception Capturada'. $e->getMessage(). "\n";
				 
	// 		}
	// 	}else if ($data['accion']  == 'mdlLinea_edit'){

	// 		$stmt=null;
	// 		$stmt2 = Conexion::conectar()->prepare("UPDATE linea SET 
	// 			linea =:linea, 
	// 			observacion =:observacion,
	// 			estado =:estado 
	// 			WHERE id_linea = :id_linea");

	// 			$stmt2->bindParam(":linea", $data['linea']);
	// 			$stmt2->bindParam(":observacion", $data['observacion']);
	// 			$stmt2->bindParam(":estado", $data['estado']);
	// 			$stmt2->bindParam(":id_linea", $data['id_linea']);

	// 			$stmt2->execute();
	// 			$resultado = 'ok';
	// 			$stmt2=null;
	// 	}
	// 	return $resultado;
	// }	

	// /* *********************************
	//  		 LISTAR AREA/LINEA # 5
	//  ***********************************/
	// static public function mdlZonificacionListarArea_Linea()
	// {
	// 	//$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, id, area_p, linea_p, puntos_insp, fecha, usuario FROM zonificacion");
	// 		$stmt = Conexion::conectar()->prepare("SELECT distinct z.id_area, z.id_linea, a.area, l.linea, a.area as label
	// 												FROM zonificacion z
	// 												INNER JOIN area a ON z.id_area = a.id_area
	// 												INNER JOIN linea l ON z.id_linea = l.id_linea");
	// 	$stmt->execute();
	// 	return $stmt-> fetchAll(PDO::FETCH_CLASS);
	// }

}



 