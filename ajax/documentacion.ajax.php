<?php 
require_once "../controladores/documentacion.controlador.php";
require_once "../modelos/documentacion.modelo.php";

class AjaxDocumentacion{
    
	/* ==============================
            SAVE DOCUMENTACION + FILE
       ============================== */
    public function ajaxDocumentacionSave($data,$fileData)
	{
		$res = DocumentacionControlador::ctrlDocumentacionSave($data,$fileData);
		echo json_encode($res);
	}

	/* ==============================
            LISTAR DOCUMENTACION # 1
       ============================== */
    public function ajaxDocumentacionListar()
	{
		$res = DocumentacionControlador::ctrlDocumentacionListar();
		echo json_encode($res);
	}

	/* ======================================
            ELIMINAR DOCUMENTACION +file  # 2
       ====================================== */
    public function ajaxDocumentacionEliminar($au_inc, $file_name)
	{
		$res = DocumentacionControlador::ctrlDocumentacionEliminar($au_inc, $file_name);
		echo json_encode($res);
	}
}



if (isset($_FILES["archivo"]) ) { // guardar documentación

	$data = array(
	        "codigo_documento" => $_POST['iptCodigoDocumento'],
	        "nombre_documento" => $_POST['iptNombreDocumento'],
	        "version" => $_POST['iptVersion'],
	        "area" => $_POST['iptArea'],
	        "tipo_documento" => $_POST['selTipoDocumento'],
	        "status" => $_POST['selStatus'],
	        "acceso" => $_POST['selAcceso'],
	        "observacion" => $_POST['iptObservacion']
	);
	$res = new AjaxDocumentacion();
	$res-> ajaxDocumentacionSave($data,$_FILES['archivo']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR DOCUMENTACION

    $res = new AjaxDocumentacion();
    $res-> ajaxDocumentacionListar();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // ELIMINAR DOCUMENTACION

    $res = new AjaxDocumentacion();
    $res-> ajaxDocumentacionEliminar($_POST['au_inc'],$_POST['file_name']);
}

