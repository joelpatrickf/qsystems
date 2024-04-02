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
			$stmt = Conexion::conectar()->prepare("SELECT distinct area_p FROM zonificacion");
		}else if ($filtro == 'linea'){
			$stmt = Conexion::conectar()->prepare("SELECT distinct linea_p FROM zonificacion WHERE area_p like '%$dato'");
		}

		$stmt->execute();
		return $stmt-> fetchAll();
		
		

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

	// print_r($data);
	// exit();

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

}



 