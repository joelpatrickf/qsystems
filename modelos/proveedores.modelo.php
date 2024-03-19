<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class ProveedoresModelo{
	
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlListarProveedores()
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, id_proveedor, razon_social, rucc, tipo_proveedor, direccion, usuario, fecha_creacion, estado from proveedores");
		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		return $stmt-> fetchAll();

	}

	/* *********************************
			REGISTRAR
	**********************************/

	static public function mdlRegistrarProveedores($data)
	{

		// print_r($data);
		// exit();
		
		try {
			$stmt=null;
			date_default_timezone_set("America/Guayaquil");

			$usuario=$_SESSION['login'][0]->usuario;
			$fechaActual = date('Y-m-d');
			$estado = 'ACTIVO';

	        $stmt = Conexion::conectar()->prepare("INSERT INTO proveedores(razon_social, rucc, tipo_proveedor, direccion, usuario, fecha_creacion, estado) 
			VALUES(:razon_social, :rucc, :tipo_proveedor, :direccion, :usuario, :fecha_creacion, :estado)");

	        $stmt->bindParam(":razon_social", $data['razon_social'], PDO::PARAM_STR); 
	        $stmt->bindParam(":rucc", $data['rucc'], PDO::PARAM_STR); 
	        $stmt->bindParam(":tipo_proveedor", $data['tipo_proveedor'], PDO::PARAM_STR); 
	        $stmt->bindParam(":direccion", $data['direccion'], PDO::PARAM_STR);
	        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR); 
	        $stmt->bindParam(":fecha_creacion", $fechaActual);
	        $stmt->bindParam(":estado", $estado);
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}
	
    // ACTUALIZAR
    static public function mdlActualizarProveedores($table,$dataModificar, $id, $nameId){

    	$user=$_SESSION['login'][0]->usuario;
				
        $set = "";
        foreach ($dataModificar as $key => $value){
            $set .= $key." = :".$key.",";
        }

        $set = substr($set, 0, -1);

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
        
        foreach ($dataModificar as $key => $value){
            $stmt->bindParam(":".$key, $dataModificar[$key], PDO::PARAM_STR);
        }
        
        $stmt->bindParam(":".$nameId, $id, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return Conexion::conectar()->errorInfo();

        }

    }	

	/* *********************************
	ELIMINAR 
	**********************************/
	static public function mdlEliminarProveedores($id_proveedor,$estado)
	{
		$varEstado = "";
		if ($estado == 'INACTIVO'){
			$varEstado = 'ACTIVO';
		}else{
			$varEstado = 'INACTIVO';
		}

		$stmt33 = Conexion::conectar()->prepare("UPDATE proveedores SET estado =:estado WHERE id_proveedor = :id_proveedor ");
		$stmt33->bindParam(":id_proveedor", $id_proveedor);
		$stmt33->bindParam(":estado", $varEstado); 
		$stmt33->execute(); 
		$stmt33=null;$sql3=null;	

		return 'ok';
	}	
}



 