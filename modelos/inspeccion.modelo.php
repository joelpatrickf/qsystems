<?php 
//if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class InspeccionModelo{
	
	/* ***********************************************************
		BUSCAR SI EXISTEN INSPECCIONES ABIERTAS DE DIAS ANTERIORES
		fecha/usuario/ hora_fin=null
	**************************************************************/
	static public function mdlInspeccionListar($filtro)
	{
		$retorno=[];
		date_default_timezone_set("America/Guayaquil");
		$fechaActual = date('Y-m-d');
		$user=$_SESSION['login'][0]->usuario;


		if ($filtro == 'abierta'){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM insp_cab where fecha != '$fechaActual' AND usuario='$user' and hora_fin IS NULL");
		}

		$stmt->execute();
		$res = $stmt-> fetchAll(PDO::FETCH_CLASS);
		$filas=$stmt->rowcount();
		// print_r($filas);
		// exit();

		if ($filas == 0){
			// NO existe una inspeccion abierta dias anteriores
			// Tonces consultamos si existe una del dia actual
			$stmt2 = Conexion::conectar()->prepare("SELECT * FROM insp_cab where fecha = '$fechaActual' AND usuario='$user' and hora_fin IS NULL");
			$stmt2->execute();
			$filas2=$stmt2->rowcount();
			if ($filas2 >0){
				$retorno = $stmt2->fetchAll(PDO::FETCH_CLASS);
			}
			
		}else{
			// existe una inspeccion abierta
			$retorno = $res;
		}
		return $retorno;
		// print_r($res);
		// if ($filas > 0){
		// 	return $res;
		// }

		
		
		

	}

	/* ***********************************************************
		GUARDAR CREAR INSPECCION		
	**************************************************************/

	static public function mdlInspeccionCrear()
	{
		date_default_timezone_set("America/Guayaquil");
		$fechaActual = date('Y-m-d');
		$horaActual = date('H:i:s', time()); 
		$user=$_SESSION['login'][0]->usuario;
		
		// print_r($fechaActual);
		// exit();
		try {
	        $stmt=null;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_cab(fecha,hora_ini, usuario)
			 VALUES(:fecha, :hora_ini, :usuario)");

	        $stmt->bindParam(":fecha", $fechaActual); 
	        $stmt->bindParam(":hora_ini", $horaActual); 
	        $stmt->bindParam(":usuario", $user); 
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	/* ******************************
		GUARDAR CERRAR INSPECCION		
	********************************/
	static public function mdlInspeccionCerrar($id_insp)
	{
		date_default_timezone_set("America/Guayaquil");
		$horaActual = date('H:i:s', time()); 
		$user=$_SESSION['login'][0]->usuario;

		$stmt33 = Conexion::conectar()->prepare("UPDATE insp_cab 
				SET hora_fin =:hora_fin 
				WHERE usuario = :usuario AND id_insp = :id_insp");

		$stmt33->bindParam(":usuario", $user);
		$stmt33->bindParam(":hora_fin", $horaActual);
		$stmt33->bindParam(":id_insp", $id_insp);
		$stmt33->execute(); 
		$stmt33=null;$sql3=null;

        return 'ok';
	}

	/* ***********************************************************
				GUARDAR PRODUCTOS  # 4 
	**************************************************************/

	static public function mdlInspeccionSaveProductos($data)
	{
		try {
	        $stmt=null;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_productos(id_insp,  fecha,  id_area,  id_linea,  id_item,  lote, turno)
			 VALUES(:id_insp,  :fecha,  :id_area,  :id_linea,  :id_item,  :lote, :turno)");

	        $stmt->bindParam(":id_insp", $data['id_insp']); 
	        $stmt->bindParam(":fecha", $data['fecha']); 
	        $stmt->bindParam(":id_area", $data['id_area']); 
	        $stmt->bindParam(":id_linea", $data['id_linea']); 
	        $stmt->bindParam(":id_item", $data['id_item']); 
	        $stmt->bindParam(":lote", $data['lote']); 
	        $stmt->bindParam(":turno", $data['turno']); 
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}	

	/* *********************************
	 	LISTAR PRODUCTOS  # 5
	**********************************/
	static public function mdlInspeccionListarProductos($id_insp)
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' AS vacio, ip.au_inc, id_insp,  fecha,  v.id_area,v.area,  v.id_linea, v.linea,  prod.id_item, prod.nombre_producto,prod.categoria, prod.precio,lote, turno 
								FROM insp_productos as ip
								INNER JOIN v_areas_lineas v ON ip.id_area = v.id_area AND ip.id_linea = v.id_linea 
								INNER JOIN productos prod ON ip.id_item =  prod.id_item 
								WHERE id_insp = :id_insp
		
		");
		$stmt->bindParam(":id_insp",$id_insp);
		// $stmt->bindParam(":password",$password);
		$stmt->execute();
		return $stmt ->fetchAll(PDO::FETCH_CLASS);
	}	
	
   // ACTUALIZAR REGISTROS
//    static public function mdlInspeccionActuaizar($table,$data, $id, $nameId){

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

	// static public function mdlInspeccionEliminar($id_ins_var)
	// {

    //     	$sql1 = "DELETE FROM insp_variables WHERE id_ins_var = ? " ;
	//         $stmt1 = Conexion::conectar()->prepare($sql1);
	//         $stmt1->bindvalue(1, $id_ins_var);
	//         $stmt1->execute();

    //     return 'ok';
	// }


}



 