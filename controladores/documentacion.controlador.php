<?php 


class DocumentacionControlador{

	/* ==============================
            SAVE DOCUMENTACION + FILE
       ============================== */
	static public function ctrlDocumentacionSave($data,$fileData){
		$resultados1 = DocumentacionModelo::mdlDocumentacionSave($data,$fileData);
		return $resultados1;
	}
 

	/* ==============================
            LISTAR DOCUMENTACION # 1
       ============================== */
	static public function ctrlDocumentacionListar(){
		$resultados1 = DocumentacionModelo::mdlDocumentacionListar();
		return $resultados1;
	}

	/* ======================================
            ELIMINAR DOCUMENTACION +file  # 2
       ====================================== */
	static public function ctrlDocumentacionEliminar($au_inc,$file_name){
		$resultados1 = DocumentacionModelo::mdlDocumentacionEliminar($au_inc,$file_name);
		return $resultados1;
	}	
}
