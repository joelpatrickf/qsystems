<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";
//require_once "../modelos/normativas.ajax.php";


class NormativasModelo{
	
	/* ========================
			LISTAR NORMATIVAS # 1
		======================== */
	static public function mdlListarNormativas()
	{
		
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,n.id_normativa, n.normativa, cat.categoria as categoria_general,n.categoria,n.tipo_analisis,n.analisis,n.limite_min,n.limite_max,n.fecha_creacion,n.usuario, n.unidad_medida
			FROM normativas n
			inner join categorias cat ON n.id_categoria_general=cat.id_categoria
			");
		$stmt->execute();
		return $stmt-> fetchAll();

	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS # 2
	**********************************/

	static public function mdlNormativasRegistrar($normativa,$categoria,$tipo_analisis,$analisis,$limite_minimo,$limite_maximo,$unidad_medida,$categoria_general)
	{

		try {
	        $stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
			$usuario=$_SESSION['login'][0]->usuario;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO normativas(normativa,categoria,tipo_analisis,analisis,limite_min,limite_max,fecha_creacion,usuario,unidad_medida,id_categoria_general)
			 VALUES(:normativa,:categoria,:tipo_analisis,:analisis,:limite_minimo,:limite_maximo,:fecha_creacion,:usuario,:unidad_medida,:id_categoria_general)");

	        $stmt->bindParam(":normativa", $normativa); 
	        $stmt->bindParam(":categoria", $categoria); 
	        $stmt->bindParam(":tipo_analisis", $tipo_analisis); 
	        $stmt->bindParam(":analisis", $analisis); 
	        $stmt->bindParam(":limite_minimo", $limite_minimo); 
	        $stmt->bindParam(":limite_maximo", $limite_maximo); 
	        $stmt->bindParam(":fecha_creacion", $fechaActual); 
	        $stmt->bindParam(":usuario", $usuario); 
	        $stmt->bindParam(":unidad_medida", $unidad_medida); 
	        $stmt->bindParam(":id_categoria_general", $categoria_general); 
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

    /* *********************************
       AUTOCOMPLETE NORMATIVA # 4
     ********************************** */ 
	static public function mdlNormativasListarDisctint()
	{
		$stmt4 = Conexion::conectar()->prepare("SELECT DISTINCT normativa,categoria FROM normativas");
		$stmt4->execute();
		return $stmt4-> fetchAll();

	}	

	// *********************************
	// 		 BUSCAMOS LOS ANALISIS # 5
	// **********************************/
	static public function mdlNormativasBuscarAnalisis($orden_trabajo)
	{
		$stmt5 = Conexion::conectar()->prepare("SELECT '' as vacio, ot.orden_trabajo, nor.id_normativa, nor.normativa, nor.categoria,nor.tipo_analisis, nor.analisis, nor.limite_min, nor.limite_max, nor.unidad_medida
												FROM orden_trabajo ot
												INNER JOIN productos prod ON ot.id_item=prod.id_item
												INNER JOIN normativas nor ON ot.normativa=nor.normativa
												WHERE orden_trabajo='$orden_trabajo';
												");
		$stmt5->execute();
		return $stmt5-> fetchAll();

	}		

    /*===========================================
        Buscar Normativas x filtro de Categoria # 6
      ===========================================*/	
	static public function mdlNormativasIngresoResultados($id_categoria_general)	{
		
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,n.id_normativa, cat.categoria as categoria_general,n.categoria,n.tipo_analisis,n.analisis,n.limite_min,n.limite_max,n.unidad_medida,id_categoria_general
			FROM normativas n
			inner join categorias cat ON n.id_categoria_general=cat.id_categoria
         WHERE id_categoria_general = '$id_categoria_general'
			");
		$stmt->execute();
		return $stmt-> fetchAll(PDO::FETCH_ASSOC);

	}	
}



 