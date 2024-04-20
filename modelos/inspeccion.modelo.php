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

		$resMuestrasVariables = self::mdlInspeccionNumeroMuestras();
		$nRegMuestras = $resMuestrasVariables['nmuestras'][0]->nmuestras;
		$nRegVariables = count($resMuestrasVariables['variables']);
		
		// parametrizando VARIABLES EN LA TABLA
		$tipoV = 'VARIABLES';
		for ($i = 0; $i < $nRegVariables ; $i++) {
			$stmt=null;
			$idV = $resMuestrasVariables['variables'][$i]->id_ins_var;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_muestras_variables(id_insp, tipo, id, id_item)
			 VALUES(:id_insp, :tipo, :id, :id_item)");

	        $stmt->bindParam(":id_insp", $data['id_insp']); 
	        $stmt->bindParam(":tipo", $tipoV); 
	        $stmt->bindParam(":id", $idV);
	        $stmt->bindParam(":id_item", $data['id_item']); 
			$stmt->execute();
			$resultado = 'ok';
		}

		
		// parametrizando MUESTRAS
		$tipoM = 'MUESTRAS';
		for ($i = 0; $i < $nRegMuestras ; $i++) {
			$stmt=null;
			$idM = 'M'.$i+1;

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_muestras_variables(id_insp, tipo, id, id_item)
			 VALUES(:id_insp, :tipo, :id, :id_item)");

	        $stmt->bindParam(":id_insp", $data['id_insp']); 
	        $stmt->bindParam(":tipo", $tipoM); 
	        $stmt->bindParam(":id", $idM);
	        $stmt->bindParam(":id_item", $data['id_item']); 
			$stmt->execute();
			$resultado = 'ok';
		}



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
	
	
	/* *********************************
	 	NUMERO DE MUESTRAS  # 6
	**********************************/
	static public function mdlInspeccionNumeroMuestras()
	{	
		$stmt = Conexion::conectar()->prepare("SELECT nmuestras FROM insp_variables WHERE estado = 'ACTIVO' ORDER BY nmuestras DESC LIMIT 1");
		$stmt->execute();
		$res_nmuestras = $stmt ->fetchAll(PDO::FETCH_CLASS);

		$stmt1 = Conexion::conectar()->prepare("SELECT id_ins_var, variable FROM insp_variables where estado='ACTIVO'");
		$stmt1->execute();		
		$res_variables = $stmt1 ->fetchAll(PDO::FETCH_CLASS);
		
        $res = array(
            'nmuestras' => $res_nmuestras,
            'variables' => $res_variables
        );	
		return $res;	
	}

	/* ***********************************************************
				GUARDAR VARIABLES Y MUESTRAS  # 7
	**************************************************************/

	static public function mdlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp)
	{
		$resMuestrasVariables = self::mdlInspeccionNumeroMuestras();
		$nRegMuestras = $resMuestrasVariables['nmuestras'][0]->nmuestras;
		$nRegVariables = count($resMuestrasVariables['variables']);

		// print_r($nRegVariables);
		// echo "<BR>";
		// print_r($nRegVariables);
		// echo "<BR>";
		// exit();

		$filasMuestras = count($muestras);
		$filasVariables = count($variables);

		for ($i = 0; $i < $filasMuestras ; $i++) {
			$data1 = explode(" | ", $muestras[$i]);
			$muestrasId = $data1[0];
			$muestrasValor = $data1[1];

			// print_r($muestrasCampo);
			// echo "<br>";
			// print_r($muestrasValor);
			// echo "<br>";

			$stmt44 = Conexion::conectar()->prepare("UPDATE insp_muestras_variables
					SET valor =:muestras_valor 
					WHERE id_insp = :id_insp AND tipo = 'MUESTRAS' AND id = :muestras_id");

			$stmt44->bindParam(":muestras_id", $muestrasId);
			$stmt44->bindParam(":muestras_valor", $muestrasValor);
			$stmt44->bindParam(":id_insp", $id_insp);
			$stmt44->execute(); 
			$stmt44=null;
		}



		
		
		// try {
	    //     $stmt=null;

	    //     $stmt = Conexion::conectar()->prepare("INSERT INTO insp_productos(id_insp,  fecha,  id_area,  id_linea,  id_item,  lote, turno)
		// 	 VALUES(:id_insp,  :fecha,  :id_area,  :id_linea,  :id_item,  :lote, :turno)");

	    //     $stmt->bindParam(":id_insp", $data['id_insp']); 
	    //     $stmt->bindParam(":fecha", $data['fecha']); 
	    //     $stmt->bindParam(":id_area", $data['id_area']); 
	    //     $stmt->bindParam(":id_linea", $data['id_linea']); 
	    //     $stmt->bindParam(":id_item", $data['id_item']); 
	    //     $stmt->bindParam(":lote", $data['lote']); 
	    //     $stmt->bindParam(":turno", $data['turno']); 
		// 	$stmt->execute();
		// 	$resultado = 'ok';

		// } catch (Exception $e) {
        //     $resultado='Exception Capturada'. $e->getMessage(). "\n";
             
        // }
		// return $resultado;
	}		










	
}



 