<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";
//require_once "../modelos/normativas.ajax.php";


class NormativasModelo{
	
	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function mdlListarNormativas()
	{
		//$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,id_categoria, categoria, observacion, fecha_creacion from categorias");
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,id_normativa, normativa,categoria,tipo_analisis,analisis,limite_min,limite_max,fecha_creacion,usuario FROM normativas");
		$stmt->execute();
		return $stmt-> fetchAll();

	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/

	static public function mdlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo)
	{
		// print_r($data);
		// exit();

		try {
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$usuario=$_SESSION['login'][0]->usuario;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO normativas(normativa,categoria,tipo_analisis,analisis,limite_min,limite_max,fecha_creacion,usuario)
			 VALUES(:normativa,:categoria,:tipo_analisis,:analisis,:limite_minimo,:limite_maximo,:fecha_creacion,:usuario)");

	        $stmt->bindParam(":normativa", $normativa); 
	        $stmt->bindParam(":categoria", $categoria); 
	        $stmt->bindParam(":tipo_analisis", $tipo_analisis); 
	        $stmt->bindParam(":analisis", $analisis); 
	        $stmt->bindParam(":limite_minimo", $limite_minimo); 
	        $stmt->bindParam(":limite_maximo", $limite_maximo); 
	        $stmt->bindParam(":fecha_creacion", $fechaActual); 
	        $stmt->bindParam(":usuario", $usuario); 
			$stmt->execute();
			$resultado = 'ok';

		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	
	/* *********************************
			GUARDAR ACTUALIZACION 
	**********************************/
   static public function mdlNormativasActualizar($table,$data, $id, $nameId){
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

	// *********************************
	// 		LISTAR DISCTINT NORMATIVA
	// *********************************/
	static public function mdlNormativasListarDisctint()
	{
		$stmt4 = Conexion::conectar()->prepare("SELECT DISTINCT normativa,categoria FROM normativas");
		$stmt4->execute();
		return $stmt4-> fetchAll();

	}	

	// *********************************
	// 		 BUSCAMOS LOS ANALISIS
	// **********************************/
	static public function mdlNormativasBuscarAnalisis($orden_trabajo)
	{
		$stmt5 = Conexion::conectar()->prepare("SELECT ot.orden_trabajo, nor.id_normativa, nor.normativa, nor.categoria,nor.tipo_analisis, nor.analisis, nor.limite_min, nor.limite_max
												FROM orden_trabajo ot
												INNER JOIN productos prod ON ot.id_item=prod.id_item
												INNER JOIN normativas nor ON ot.normativa=nor.normativa
												WHERE orden_trabajo='$orden_trabajo';
												");
		$stmt5->execute();
		return $stmt5-> fetchAll();

	}		
}



 