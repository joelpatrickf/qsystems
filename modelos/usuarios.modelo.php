<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class UsuarioModelo{
	
	/* *********************************
	validacion de usuarios
	**********************************/
	static public function mdlIniciarSesion($usuario,$password)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * from usuarios WHERE usuario=:usuario and password1=:password");
		$stmt->bindParam(":usuario",$usuario);
		$stmt->bindParam(":password",$password);
		$stmt->execute();
		return $stmt ->fetchAll(PDO::FETCH_CLASS);
	}

	/* *********************************
			REGISTRO DE USUARIOS
	**********************************/

	static public function mdlRegistrarUsuarios($data)
	{
		// print_r($data);
		// exit();

		try {
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$estado = 'ACTIVO';
			$varNombres = ucwords($data['nombres']);
			$varUsuario =strtolower($data['usuario']);

	        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(usuario,password1,idempleado,nombres,perfil,fecha_creacion,estado,cargo) VALUES(:usuario,:password1,:idempleado,:nombres,:perfil,:fecha_creacion,:estado,:cargo)");

	        $stmt->bindParam(":usuario", $varUsuario); 
	        $stmt->bindParam(":password1", $data['clave']); 
	        $stmt->bindParam(":idempleado", $data['cedula']); 
	        $stmt->bindParam(":nombres", $varNombres);
	        $stmt->bindParam(":perfil", $data['perfil']); 
	        $stmt->bindParam(":fecha_creacion", $fechaActual);
	        $stmt->bindParam(":estado", $estado); 
	        $stmt->bindParam(":cargo", $data['cargo']); 
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlObtenerUsuarios()
	{
		$stmt = Conexion::conectar()->prepare("SELECT '' AS id,  usuario, password1, idempleado, nombres, perfil, fecha_creacion, estado, cargo from usuarios");
		
		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		return $stmt-> fetchAll();

	}	


	
    // ACTUALIZAR
    static public function mdlActualizarUsuarios($table, $data, $id, $nameId){
    	// print_r($data);
    	// die();
    	$user=$_SESSION['login'][0]->usuario;
				
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

	/* *********************************
	ELIMINAR 
	**********************************/
	static public function mdlEliminarUsuarios($usuario)
	{
		$estado='INACTIVO';
		$stmt33 = Conexion::conectar()->prepare("UPDATE usuarios SET estado =:estado WHERE usuario = :usuario ");
		$stmt33->bindParam(":usuario", $usuario);
		$stmt33->bindParam(":estado", $estado); 
		$stmt33->execute(); 
		$stmt33=null;$sql3=null;	

		return 'ok';
	}


}



 