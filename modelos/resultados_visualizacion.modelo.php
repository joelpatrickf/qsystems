<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class ResultadosVisualizacionModelo{

	// *********************************
	// 		BUSCAR # 2
	// **********************************/
	static public function mdlResultadosVisualizacionBuscar($lote)
	{
		// echo "<pre>";
		// print_r($stmt-> fetchAll(PDO::FETCH_CLASS));
		// echo "<pre>";
		// exit();

		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, res.id_resultados, res.orden_trabajo, res.id_normativa_analisis, res.fecha_creacion, res.usuario_creacion,nor.normativa, nor.categoria, nor.tipo_analisis, nor.analisis, res.resultado,res.validacion,res.estado, ot.lote, res.observacion
												FROM resultados res
												INNER JOIN normativas nor ON res.id_normativa_analisis=nor.id_normativa
												INNER JOIN orden_trabajo ot ON res.orden_trabajo=ot.orden_trabajo
												where ot.lote = '$lote'
													");

		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
	}

	/* *********************************
			LISTAR REGISTROS
	**********************************/
	// static public function mdlResultadosVisualizacionListar()
	// {

	// 	$stmt = Conexion::conectar()->prepare(" SELECT '' as vacio, m.orden_trabajo, m.numero_muestra,m.id_item, p.nombre_producto, p.categoria, p.normativa , p.presentacion, m.planta, ubi.ubicacion, prov.razon_social, m.turno, m.usuario, m.lote, m.fecha_muestreo, m.estado
	// 										FROM orden_trabajo m
	// 										INNER JOIN productos AS p
	// 											ON m.id_item= p.id_item
	// 										INNER JOIN proveedores AS prov
	// 											ON m.id_proveedor= prov.id_proveedor
	// 										INNER JOIN ubicacion AS ubi
	// 											ON m.ubicacion= ubi.id_ubicacion
	// 												");

	// 	$stmt->execute();
	// 	//return $stmt-> fetchAll(PDO::FETCH_OBJ);
	// 	//return $stmt-> fetchAll(PDO::FETCH_NUM);
		
	// 	return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
	// 	// echo "<pre>";
	// 	// print_r($stmt-> fetchAll(PDO::FETCH_CLASS));
	// 	// echo "<pre>";
	// 	// exit();
	// }

	/* *********************************
			GUARDAR NUEVOS REGISTROS # 3
	**********************************/

	static public function mdlResultadosVisualizacionGuardarCambios($validacion,$estado,$nuevo_resultado,$observacion,$nResultados)
	{
		// echo"<pre>";
		// print_r($data);
		// echo"<pre>";
		//exit();

		//print_r($_SESSION);

		$user= $_SESSION['login'][0]->usuario;
		// try {
			$stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 
				
			$stmt2 = Conexion::conectar()->prepare("UPDATE resultados SET 
				validacion =:validacion, 
				estado =:estado, 
				resultado =:nuevo_resultado, 
				observacion =:observacion 
				WHERE id_resultados = :nResultados  ");

				$stmt2->bindParam(":validacion", $validacion);
				$stmt2->bindParam(":estado", $estado);
				$stmt2->bindParam(":nuevo_resultado", $nuevo_resultado);
				$stmt2->bindParam(":observacion", $observacion);
				$stmt2->bindParam(":nResultados", $nResultados);
				$stmt2->execute();
				$resultado = 'ok';
				$stmt2=null;
			


		// } catch (Exception $e) {
            // $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        // }
		return $resultado;
	}

	
	/* *********************************
			ELIMINAR REGISTROS
	// **********************************/
	// static public function mdlResultadosVisualizacionEliminar($orden_trabajo,$estado)
	// {
	// 	//return 'ok';		
	// 	if ($estado == 'ACTIVO'){
	// 		$varEstado='INACTIVO';
	// 	}else if ($estado == 'INACTIVO'){
	// 		$varEstado='ACTIVO';
	// 	}

	// 	$stmt3 = Conexion::conectar()->prepare("UPDATE orden_trabajo SET 	estado =:estado
	// 	WHERE orden_trabajo = :numero_orden ");

	// 	$stmt3->bindParam(":estado", $varEstado);
	// 	$stmt3->bindParam(":numero_orden", $orden_trabajo);
	// 	$stmt3->execute();
	// 	return 'ok';
	// }	




}



 