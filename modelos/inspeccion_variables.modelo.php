<?php 
//if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class InspeccionVariablesModelo{
	
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlListarInspeccionVariables()
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,id_ins_var,fecha, variable, nmuestras, usuario,estado,etapa_proceso
												FROM insp_variables");

		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
		

	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/

	static public function mdlRegistrarInspeccionVariables($data)
	{
		// print_r($data);
		// exit();
		$usuario=$_SESSION['login'][0]->usuario;
		try {
			 $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_variables(fecha,variable,nmuestras, usuario,estado,etapa_proceso)
			 VALUES(:fecha,:variable,:nmuestras, :usuario,:estado,:etapa_proceso)");

	        $stmt->bindParam(":fecha", $data['fecha']); 
	        $stmt->bindParam(":variable", $data['variables']); 
	        $stmt->bindParam(":etapa_proceso", $data['etapa_proceso']); 
	        $stmt->bindParam(":nmuestras", $data['numero_muestras']); 
	        $stmt->bindParam(":usuario", $usuario); 
			$stmt->bindParam(":estado", $data['estado']);
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	
   // ACTUALIZAR REGISTROS
   static public function mdlActuaizarInspeccionVariables($table,$data, $id, $nameId){

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

	static public function mdlEliminarInspeccionVariables($id_ins_var)
	{

        	$sql1 = "DELETE FROM insp_variables WHERE id_ins_var = ? " ;
	        $stmt1 = Conexion::conectar()->prepare($sql1);
	        $stmt1->bindvalue(1, $id_ins_var);
	        $stmt1->execute();

        return 'ok';
	}


}



 