<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class OrdenTrabajoModelo{
	
	/* *********************************
			LISTAR REGISTROS
	**********************************/
	static public function mdlOrdenTrabajoListar()
	{

		$stmt = Conexion::conectar()->prepare(" SELECT '' as vacio, m.orden_trabajo, m.numero_muestra,m.id_item, p.nombre_producto, p.categoria, p.normativa , p.presentacion, m.planta, ubi.ubicacion, prov.razon_social, m.turno, m.usuario, m.lote, m.fecha_muestreo, m.estado
											FROM orden_trabajo m
											INNER JOIN productos AS p
												ON m.id_item= p.id_item
											INNER JOIN proveedores AS prov
												ON m.id_proveedor= prov.id_proveedor
											INNER JOIN ubicacion AS ubi
												ON m.ubicacion= ubi.id_ubicacion
													");

		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
		// echo "<pre>";
		// print_r($stmt-> fetchAll(PDO::FETCH_CLASS));
		// echo "<pre>";
		// exit();
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/

	static public function mdlOrdenTrabajoGuardar($data)
	{
		// echo"<pre>";
		// print_r($data);
		// echo"<pre>";
		//exit();

		//print_r($_SESSION);

		$user= $_SESSION['login'][0]->usuario;
		try {
			$stmt=null;
			date_default_timezone_set("America/Guayaquil");
			$fechaActual = date('Y-m-d H:i:s', time()); 

			if ($data['accion'] == 2){
				$varEstado='ACTIVO';
				$stmt = Conexion::conectar()->prepare("INSERT INTO orden_trabajo(fecha_muestreo,id_item,planta,ubicacion,id_proveedor,turno,usuario,numero_muestra,lote,estado,normativa)
				 VALUES(:fecha_muestreo,:id_item,:planta,:ubicacion,:id_proveedor,:turno,:usuario,:numero_muestra,:lote,:estado,:normativa)");
	
				$stmt->bindParam(":fecha_muestreo", $data['fecha']); 
				$stmt->bindParam(":id_item", $data['id_item']); 
				$stmt->bindParam(":planta", $data['planta']);
				$stmt->bindParam(":ubicacion", $data['ubicacion']); 
				$stmt->bindParam(":id_proveedor", $data['proveedor']); 
				$stmt->bindParam(":turno", $data['turno']); 
				$stmt->bindParam(":usuario", $data['usuario']); 
				$stmt->bindParam(":numero_muestra", $data['lote']); 
				$stmt->bindParam(":lote", $data['lote']); 
				$stmt->bindParam(":usuario", $user); 
				$stmt->bindParam(":estado", $varEstado); 
				$stmt->bindParam(":normativa", $data['normativa']); 
	
				$stmt->execute();
				$resultado = 'ok-ING';
			}else if ($data['accion'] == 3){
				
				$stmt2 = Conexion::conectar()->prepare("UPDATE orden_trabajo SET 
					fecha_muestreo =:fecha_muestreo, 
					id_item =:id_item, 
					planta =:planta, 
					ubicacion =:ubicacion, 
					id_proveedor =:id_proveedor,
					turno =:turno,
					usuario =:usuario,
					numero_muestra =:numero_muestra,
					lote =:lote
					WHERE orden_trabajo = :numero_orden  ");

				$stmt2->bindParam(":fecha_muestreo", $data['fecha']);
				$stmt2->bindParam(":id_item", $data['id_item']);
				$stmt2->bindParam(":planta", $data['planta']);
				$stmt2->bindParam(":ubicacion", $data['ubicacion']);
				$stmt2->bindParam(":id_proveedor", $data['proveedor']);
				$stmt2->bindParam(":turno", $data['turno']);
				$stmt2->bindParam(":numero_muestra", $data['muestra']);
				$stmt2->bindParam(":lote", $data['lote']);
				$stmt2->bindParam(":usuario", $data['usuarios']);
				$stmt2->bindParam(":numero_orden", $data['numero_orden']);
				$stmt2->execute();
				$resultado = 'ok-EDIT';
				$stmt2=null;
			}


		} catch (Exception $e) {
            $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        }
		return $resultado;
	}

	
	/* *********************************
			ELIMINAR REGISTROS
	**********************************/
	static public function mdlOrdenTrabajoEliminar($orden_trabajo,$estado)
	{
		//return 'ok';		
		if ($estado == 'ACTIVO'){
			$varEstado='INACTIVO';
		}else if ($estado == 'INACTIVO'){
			$varEstado='ACTIVO';
		}

		$stmt3 = Conexion::conectar()->prepare("UPDATE orden_trabajo SET 	estado =:estado
		WHERE orden_trabajo = :numero_orden ");

		$stmt3->bindParam(":estado", $varEstado);
		$stmt3->bindParam(":numero_orden", $orden_trabajo);
		$stmt3->execute();
		return 'ok';
	}	

	// *********************************
	// 		BUSCAR ORDEN TRABAJO
	// **********************************/
	static public function mdlOrdenTrabajoBuscar($orden_trabajo)
	{
		// echo "<pre>";
		// print_r($stmt-> fetchAll(PDO::FETCH_CLASS));
		// echo "<pre>";
		// exit();

		$stmt = Conexion::conectar()->prepare(" SELECT ot.orden_trabajo, ot.fecha_muestreo, ot.id_item, prod.nombre_producto, 
								prod.categoria, prod.normativa, ot.planta, ubi.ubicacion,
								prov.razon_social, ot.turno, ot.numero_muestra, ot.lote, ot.estado
								FROM orden_trabajo ot
								INNER JOIN productos prod ON ot.id_item=prod.id_item
								INNER JOIN ubicacion ubi ON ubi.id_ubicacion=ot.ubicacion
								INNER JOIN proveedores prov ON ot.id_proveedor = prov.id_proveedor
								WHERE orden_trabajo='$orden_trabajo';
													");

		$stmt->execute();
		//return $stmt-> fetchAll(PDO::FETCH_OBJ);
		//return $stmt-> fetchAll(PDO::FETCH_NUM);
		
		return $stmt-> fetchAll(PDO::FETCH_CLASS);
		
	}


}



 