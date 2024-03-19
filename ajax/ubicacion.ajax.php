<?php 
require_once "../controladores/ubicacion.controlador.php";
require_once "../modelos/ubicacion.modelo.php";

class AjaxUbicacion{
    
	public function ajaxListarUbicacion()
	{
		$Ubicacion = UbicacionControlador::ctrlListarUbicacion();
		echo json_encode($Ubicacion);
	}

		
}




if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR 
    $normativas = new AjaxUbicacion();
    $normativas-> ajaxListarUbicacion();

}