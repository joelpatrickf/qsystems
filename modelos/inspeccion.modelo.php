<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";

// require "vendor/autoload.php";
// use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};


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
		CERRAR INSPECCION	# 3
	********************************/
	static public function mdlInspeccionCerrar($id_insp,$flag_cerrar,$hora_fin,$observacion, $usuario)
	{
		date_default_timezone_set("America/Guayaquil");
		$horaActual = date('H:i:s', time()); 
		$user=$_SESSION['login'][0]->usuario;

		if ($flag_cerrar == 1){ // cerrar inspeccion del dia por el usuario
			$stmt33 = Conexion::conectar()->prepare("UPDATE insp_cab 
					SET hora_fin =:hora_fin 
					WHERE usuario = :usuario AND id_insp = :id_insp");
	
			$stmt33->bindParam(":usuario", $user);
			$stmt33->bindParam(":id_insp", $id_insp);
			$stmt33->bindParam(":hora_fin", $horaActual);
			$stmt33->execute(); 
			$stmt33=null;

		}else if ($flag_cerrar == 2){ // cerrar inspeccion del dia por el ADMIN
			$observacion = $observacion."     ". "Autorizado por: ".$user;
			$stmt33 = Conexion::conectar()->prepare("UPDATE insp_cab 
					SET hora_fin =:hora_fin , observacion =:observacion 
					WHERE usuario = :usuario AND id_insp = :id_insp");
	
			$stmt33->bindParam(":hora_fin", $hora_fin);
			$stmt33->bindParam(":observacion", $observacion);
			$stmt33->bindParam(":usuario", $usuario);
			$stmt33->bindParam(":id_insp", $id_insp);

			$stmt33->execute(); 
			$stmt33=null;
		}

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

		// buscamos si existe el producto/id_insp/area/linea/LOTE
		$stmt66 = Conexion::conectar()->prepare("SELECT id_item, count(id_item) as Cuenta from insp_productos 
							WHERE id_insp = :id_insp AND id_item = :id_item AND id_area = :id_area AND id_linea = :id_linea AND lote = :lote ");

			$stmt66->bindParam(":id_insp",$data['id_insp']);
			$stmt66->bindParam(":id_item",$data['id_item']);
			$stmt66->bindParam(":id_area",$data['id_area']);
			$stmt66->bindParam(":id_linea",$data['id_linea']);
			$stmt66->bindParam(":lote",$data['lote']);
		
		$stmt66->execute();
		$existeProducto = $stmt66 ->fetchAll(PDO::FETCH_CLASS);
		$existeProductoCuenta = $existeProducto[0]->Cuenta;
		if ($existeProductoCuenta >0){
			return "existe";
		}
		
		try {
			$num_muestras=0;
			$num_variables=0;
	        $stmt=null;
			$res_count_idItem=0; // iniciamos el contador demuestras/variables a 0 

	        $stmt = Conexion::conectar()->prepare("INSERT INTO insp_productos(id_insp,  fecha,  id_area,  id_linea,  id_item,  lote, turno,id_item_contador, num_muestras, sum_variables) 
			VALUES(:id_insp,  :fecha,  :id_area,  :id_linea,  :id_item,  :lote, :turno,:id_item_contador, :num_muestras, :sum_variables)");

	        $stmt->bindParam(":id_insp", $data['id_insp']); 
	        $stmt->bindParam(":fecha", $data['fecha']); 
	        $stmt->bindParam(":id_area", $data['id_area']); 
	        $stmt->bindParam(":id_linea", $data['id_linea']); 
	        $stmt->bindParam(":id_item", $data['id_item']); 
	        $stmt->bindParam(":lote", $data['lote']); 
	        $stmt->bindParam(":turno", $data['turno']); 
	        $stmt->bindParam(":id_item_contador", $res_count_idItem); 
	        $stmt->bindParam(":num_muestras", $num_muestras); 
	        $stmt->bindParam(":sum_variables", $num_variables); 
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
		$stmt = Conexion::conectar()->prepare("SELECT '' AS vacio, ip.au_inc, id_insp,  fecha,  v.id_area,v.area,  v.id_linea, v.linea,  prod.id_item, prod.nombre_producto,prod.categoria, prod.precio,lote, turno, ip.id_item_contador
								FROM insp_productos as ip
								INNER JOIN v_areas_lineas v ON ip.id_area = v.id_area AND ip.id_linea = v.id_linea 
								INNER JOIN productos prod ON ip.id_item =  prod.id_item 
								WHERE id_insp = :id_insp
		
		");
		$stmt->bindParam(":id_insp",$id_insp);
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

	static public function mdlInspeccionSaveMuestrasVariables($muestras,$variables,$id_insp,$id_item,$id_item_contador,$hora_actual,$id_area_validar,$id_linea_validar,$lote_validar)
	{
		$resMuestrasVariables = self::mdlInspeccionNumeroMuestras();
		date_default_timezone_set("America/Guayaquil");
		 $hora = date('H:i:s', time());

		$sumVariables=0;
		
		// parametrizando VARIABLES EN LA TABLA
		$tipoV = 'VARIABLES';
		$nRegVariables = count($variables);
		$nRegMuestras = count($muestras);
		
		// print_r($nRegMuestras);
		// echo "<br>";
		// print_r($nRegVariables);
		// exit();

		$id_item_contador = $id_item_contador+1; // incrementamos el contador de ingreso de muestras/variables
		
		// VARIABLES
		for ($i = 0; $i < $nRegVariables ; $i++) {
			$data2 = explode(" | ", $variables[$i]);
			$data3 = explode("_", $data2[0]);
			$valor = $data2[1];
			$sumVariables=$sumVariables+$valor;

			$idV = $data3[1];

			$stmt = Conexion::conectar()->prepare("INSERT INTO insp_muestras_variables(id_insp, tipo, id, valor, id_item,id_item_contador,hora)VALUES(:id_insp, :tipo, :id, :valor, :id_item,:id_item_contador,:hora)");
			$stmt->bindParam(":id_insp", $id_insp); 
			$stmt->bindParam(":tipo", $tipoV); 
			$stmt->bindParam(":id", $idV);
			$stmt->bindParam(":valor", $valor);
			$stmt->bindParam(":id_item", $id_item);
			$stmt->bindParam(":id_item_contador", $id_item_contador);
			$stmt->bindParam(":hora", $hora);
			$stmt->execute();
			$stmt=null;
			$resultado = 'ok';

		}


		$tipoV = 'MUESTRAS';
		for ($i = 0; $i < $nRegMuestras ; $i++) {
			$data2 = explode(" | ", $muestras[$i]);
			$data3 = $data2[0];
			$valor = $data2[1];

			$idV = $data3;

			// $data1 = explode(" | ", $muestras[$i]);
			// $muestrasId = $data1[0];
			// $muestrasValor = $data1[1];
			// if ($muestrasValor == ""){
			// 	$muestrasValor = null;
			// }			

			$stmt = Conexion::conectar()->prepare("INSERT INTO insp_muestras_variables(id_insp, tipo, id, valor, id_item,id_item_contador,hora)
			VALUES(:id_insp, :tipo, :id, :valor, :id_item,:id_item_contador,:hora)");

			$stmt->bindParam(":id_insp", $id_insp); 
			$stmt->bindParam(":tipo", $tipoV); 
			$stmt->bindParam(":id", $idV);
			$stmt->bindParam(":valor", $valor);
			$stmt->bindParam(":id_item", $id_item);
			$stmt->bindParam(":id_item_contador", $id_item_contador);
			$stmt->bindParam(":hora", $hora);
			$stmt->execute();
			$stmt=null;
			$resultado = 'ok';
		}
		
		
		
		//,$id_area_validar,$id_linea_validar,$lote_validar
		// incrementar el id_item_contador en productos (contador de ingresos de muestras/variables)
		$stmt44 = Conexion::conectar()->prepare("UPDATE insp_productos
				SET id_item_contador =:id_item_contador, 
				num_muestras = num_muestras+$nRegMuestras,
				sum_variables = sum_variables+$sumVariables
				WHERE id_insp = :id_insp 
				AND id_item=:id_item 
				AND id_area = :id_area_validar
				AND id_linea = :id_linea_validar
				AND lote = :lote_validar

				");

		$stmt44->bindParam(":id_insp", $id_insp);
		$stmt44->bindParam(":id_item", $id_item);
		$stmt44->bindParam(":id_item_contador", $id_item_contador);
		
		$stmt44->bindParam(":id_area_validar", $id_area_validar);
		$stmt44->bindParam(":id_linea_validar", $id_linea_validar);
		$stmt44->bindParam(":lote_validar", $lote_validar);

		$stmt44->execute(); 
		$stmt44=null;
		
		

		return $resultado;
	}		





	/* *********************************
	 	BUSCAR VARIABLES Y MUESTRAS  # 8
	**********************************/
	static public function mdlInspeccionBuscarMuestrasVariables($id_ins,$id_item,$id_item_contador)
	{	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM insp_muestras_variables WHERE id_insp = '$id_ins' and id_item = '$id_item' AND id_item_contador = '$id_item_contador'");
		$stmt->execute();
		$res_nmuestras_variables = $stmt ->fetchAll(PDO::FETCH_CLASS);

		
		return $res_nmuestras_variables;	
	}

	/* ***********************************
	 	MOSTRAR INSPECCIONES ABIERTAS  # 9
	**************************************/
	static public function mdlInspeccionAbierta()
	{	
		$stmt99 = Conexion::conectar()->prepare("SELECT '' as vacio,id_insp,fecha,hora_ini,hora_fin,usuario,observacion FROM insp_cab WHERE hora_fin IS NULL");
		$stmt99->execute();
		$insp_abiertas = $stmt99 ->fetchAll(PDO::FETCH_CLASS);

		
		return $insp_abiertas;	
	}

	/* ************************************
		INSPECCIONES REPORTE DE M&V  # 10
	**************************************/
	static public function mdlInspeccionReporte1()
	{	
		$user=$_SESSION['login'][0]->usuario;
		// print_r($user);
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio, ip.id_insp, ip.fecha,ip.id_item, nombre_producto,categoria,ip.id_area,area,ip.id_linea, linea, cab.usuario, ip.num_muestras, ip.sum_variables,ip.id_item_contador as cuenta
			FROM insp_productos ip
			inner join productos prod ON ip.id_item= prod.id_item
			inner join v_areas_lineas al ON ip.id_area= al.id_area AND ip.id_linea= al.id_linea
			inner join insp_cab cab ON ip.id_insp= cab.id_insp and cab.usuario = '$user'
			inner join insp_muestras_variables imv ON prod.id_item= imv.id_item
			where imv.id_item=prod.id_item 
			group by ip.id_insp, ip.fecha, nombre_producto,categoria,ip.id_area,area,ip.id_linea, linea, cab.usuario,imv.id_item, ip.num_muestras, ip.sum_variables,ip.id_item_contador		
		");
		$stmt->execute();
		$resReporte1 = $stmt ->fetchAll(PDO::FETCH_CLASS);

		
		return $resReporte1;	
	}

	/* ************************************
		INSPECCIONES REPORTE EXCEL # 11
	**************************************/
	static public function mdlInspeccionReporteExcel($id_insp,$id_item,$id_area,$id_linea,$usuario)
	{	

		// print_r($user);
		$stmt = Conexion::conectar()->prepare("SELECT '' as vacio,imv.id_insp, tipo, id, 
			(IF ((tipo='MUESTRAS'),(id),(var.variable))) as concepto,
			valor, imv.id_item,prod.nombre_producto,imv.id_item_contador,hora
			FROM insp_muestras_variables imv
			left join insp_variables var ON imv.id= var.id_ins_var
			left join productos prod ON imv.id_item= prod.id_item
			left join insp_productos ìnsp_p ON imv.id_insp = ìnsp_p.id_insp
			where imv.id_insp='$id_insp' and imv.id_item='$id_item' and ìnsp_p.id_area='$id_area'  and ìnsp_p.id_linea='$id_linea'
			group by imv.id_insp, tipo, id,valor, imv.id_item,prod.nombre_producto,imv.id_item_contador,hora


		");
		$stmt->execute();
		$resReporte1 = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $resReporte1;

		//exportProductDatabase($resReporte1); //excelente

		// header('Content-Type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment;filename="reporte.xls"');
		// header('Pragma: no-cache');
		// header('Expires: 0');
		// echo "<table border=1>";
		// echo "<tr>";
		// 	echo "<th colspan=4> REPORETE </th>";
		// 	echo "<tr>";
		// echo "<tr><th>NOMBRE</th><th>cantidad</th><th>precio</th><th>total</th></tr>";


		//print_r($resReporte1);
		
		// $excel = new Spreadsheet();
		// $horaActiva = $excel->getActiveSheet();
		// $horaActiva -> setTitle("ReporteMuestrasVariables");
		// $horaActiva ->setCellValue('A1','Id_Insp');
		// $horaActiva ->setCellValue('B1','Tipo');
		// $horaActiva ->setCellValue('C1','Concepto');
		// $horaActiva ->setCellValue('D1','Valor');
		// $horaActiva ->setCellValue('E1','Producto');
		// $horaActiva ->setCellValue('F1','Cont');
		// $horaActiva ->setCellValue('G1','Hora');

		// $fila =2;
		// while($rows = $resReporte1 ) {
		// 	$horaActiva ->setCellValue('A'.$fila,$rows['id_insp']);
		// 	$horaActiva ->setCellValue('B'.$fila,$rows['tipo']);
		// 	$horaActiva ->setCellValue('C'.$fila,$rows['concepto']);
		// 	$horaActiva ->setCellValue('D'.$fila,$rows['valor']);
		// 	$horaActiva ->setCellValue('E'.$fila,$rows['nombre_producto']);
		// 	$horaActiva ->setCellValue('F'.$fila,$rows['id_item_contador']);
		// 	$horaActiva ->setCellValue('G'.$fila,$rows['hora']);
			
		// 	$fila++;
		// }

		// header('Content-Type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment;filename="reporte.xls"');
		// header('Cache-Control: max-age=0');
		
		// $writer = IOFactory::createWriter($excel, 'Xlsx');
		// $writer->save('php://output');		

		
		//return;
		
		//return $resReporte1;	

	}

	
}



function exportProductDatabase($productResult) {
	
	$timestamp = time();
	$filename = 'Export_' . $timestamp . '.xls';
	
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Pragma: no-cache"); 
	header("Expires: 0");    
	
	$isPrintHeader = false;

	foreach ($productResult as $row) {

		if (! $isPrintHeader ) {

			echo implode("\t", array_keys($row)) . "\n";
			$isPrintHeader = true;

		}

		echo implode("\t", array_values($row)) . "\n";

	}

	exit();

}