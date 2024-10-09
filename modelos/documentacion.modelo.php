<?php 
if(isset($_SESSION)){ }else{ session_start(); } 
require_once "conexion.php";


class DocumentacionModelo{
	
	/* ==============================
            LISTAR DOCUMENTACION # 1
       ============================== */
	static public function mdlDocumentacionListar()
	{
		//$usuario=$_SESSION['login'][0]->usuario;
		$perfil = $_SESSION['login'][0]->perfil;
		
		if($perfil == 'ADMIN'){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM documentacion");
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM documentacion WHERE acceso='NORMAL'");
		}
		
		$stmt->execute();
		
		$res = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		
		return $res;

	}

	/* ==============================
            SAVE DOCUMENTACION + FILE
       ============================== */
	static public function mdlDocumentacionSave($data,$fileData)
	{
		
		$file_name1 = $fileData['name'];
		$file_name = str_replace(" ","_",$file_name1);



		$stmt = Conexion::conectar()->prepare("SELECT * FROM documentacion 
			where file_name = '$file_name'");
		$stmt->execute();
		$res = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		
		// if ($res){
		// 	echo "existe";
		// }else{
		// 	echo "NOOO existe";
		// }
		// print_r($res);
		// exit;

		
		if ($res){
			$resultado='existe';
		}else{
			$file = $file_name; 
			$url_temp = $fileData["tmp_name"]; 

			
			$url_insert = "../documentacion"; //Carpeta donde subiremos nuestros archivos
			//Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
			$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

			if (!file_exists($url_insert)) {
			    mkdir($url_insert, 0777, true);
			};

			if (move_uploaded_file($url_temp, $url_target)) {
			    //echo "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
				//try {
					$stmt=null;
					date_default_timezone_set("America/Guayaquil");

					$usuario=$_SESSION['login'][0]->usuario;
					$fechaActual = date('Y-m-d');
					$estado = 'ACTIVO';

			        $stmt = Conexion::conectar()->prepare("INSERT INTO documentacion(codigo, nombre_documento, file_name, version, area, tipo_documento, status, acceso, usuario, fecha_creacion,observacion) 
					VALUES(:codigo,:nombre_documento,:file_name,:version,:area,:tipo_documento,:status,:acceso,:usuario,:fecha_creacion,:observacion)");

			        $stmt->bindParam(":codigo", $data['codigo_documento']); 
			        $stmt->bindParam(":nombre_documento", $data['nombre_documento']); 
			        $stmt->bindParam(":file_name", $file_name); 
			        $stmt->bindParam(":version", $data['version']); 
			        $stmt->bindParam(":area", $data['area']); 
			        $stmt->bindParam(":tipo_documento", $data['tipo_documento']); 
			        $stmt->bindParam(":status", $data['status']); 
			        $stmt->bindParam(":acceso", $data['acceso']); 
			        $stmt->bindParam(":usuario", $usuario); 
			        $stmt->bindParam(":fecha_creacion", $fechaActual); 
			        $stmt->bindParam(":observacion", $data['observacion']); 
					$stmt->execute();
					$resultado = 'ok';

				//} catch (Exception $e) {
		        //    $resultado='Exception Capturada'. $e->getMessage(). "\n";
		             
		        //}
			} else {
			    //echo json_encode('error');
			    $resultado = 'error';
			}
		}
		return $resultado;
	}
	
 

	
	/* ======================================
        ELIMINAR DOCUMENTACION +file  # 2
   	====================================== */
	static public function mdlDocumentacionEliminar($au_inc,$file_name){
		
		If (unlink('../documentacion/'.$file_name)) {
		  	//print_r( "file was successfully deleted" );

			$stmt = Conexion::conectar()->prepare("DELETE FROM documentacion WHERE au_inc = '$au_inc' ");
			$stmt->execute(); 

			$stmt=null;
			return 'ok';
		} else {
		  print_r( "there was a problem deleting the file" );
		}

	
	
	}	


}



 