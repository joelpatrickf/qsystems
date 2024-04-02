<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class ProductosModelo{
	
	/* *********************************
			LISTAR 
	**********************************/
	static public function mdlListarProductos()
	{

		$stmt = Conexion::conectar()->prepare("SELECT id_item, codigo_barra1, nombre_producto, normativa, categoria,  presentacion, usuario, fecha_creacion, estado, precio FROM productos");		

		$stmt->execute();
		return $stmt-> fetchAll();

	}

	/* *********************************
			REGISTRAR
	**********************************/

	static public function mdlRegistrarProductos($data)
	{
		
		//try {
			$stmt=null;
			date_default_timezone_set("America/Guayaquil");

			$usuario=$_SESSION['login'][0]->usuario;
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$estado = 'ACTIVO';

	        $stmt = Conexion::conectar()->prepare("INSERT INTO productos(codigo_barra1, nombre_producto, categoria, normativa, presentacion, usuario, fecha_creacion, estado,precio) 
			VALUES(:codigo_barra1, :nombre_producto, :categoria, :normativa, :presentacion, :usuario, :fecha_creacion, :estado,:precio)");

	        $stmt->bindParam(":codigo_barra1", $data['codigo_barra1'], PDO::PARAM_STR); 
	        $stmt->bindParam(":nombre_producto", $data['nombre_producto'], PDO::PARAM_STR); 
	        $stmt->bindParam(":categoria", $data['categoria'], PDO::PARAM_STR); 
	        $stmt->bindParam(":normativa", $data['normativa'], PDO::PARAM_STR); 
	        $stmt->bindParam(":presentacion", $data['presentacion'], PDO::PARAM_STR); 
	        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR); 
	        $stmt->bindParam(":fecha_creacion", $fechaActual);
	        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR); 
	        $stmt->bindParam(":precio", $data['precio'], PDO::PARAM_STR); 
			$stmt->execute();
			$resultado = 'ok';

		//} catch (Exception $e) {
        //    $resultado='Exception Capturada'. $e->getMessage(). "\n";
        //}
		return $resultado;
	}
	
    // ACTUALIZAR
    static public function mdlActualizarProductos($table,$dataModificar, $id, $nameId){

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
			LISTAR AUTOCOMPLETE
	**********************************/
	static public function mdlAutocomplete()
	{
		$stmt = Conexion::conectar()->prepare("SELECT id_item, codigo_barra1, nombre_producto from productos");
		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		return $stmt-> fetchAll();

	}	


	/* *********************************
			LISTAR 
	**********************************/
	static public function mdlBuscarProducto($data)
	{
		
		$data1 = explode("-", $data);
		$codigo_barra = $data1[0]; 
		$descripcion = $data1[1]; 

		// $stmt = Conexion::conectar()->prepare("SELECT id_item, codigo_barra1, nombre_producto, categoria, normativa, presentacion 
		// 		from productos
		// 		where codigo_barra1 = '$codigo_barra' OR nombre_producto like '$descripcion' ");

		$stmt = Conexion::conectar()->prepare("SELECT id_item, codigo_barra1, nombre_producto, normativa, categoria, presentacion
				from productos 
				where codigo_barra1 = '$codigo_barra' OR nombre_producto like '$descripcion' ");		
		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		return $stmt-> fetchAll(PDO::FETCH_CLASS);

	}	


}



 