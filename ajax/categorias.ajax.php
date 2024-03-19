<?php 
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
    
	public function ajaxListarCategorias()
	{
		$categorias = CategoriasControlador::ctrlListarCategorias();
		echo json_encode($categorias);
	}

	/* *********************************
			GUARDAR NUEVOS REGISTROS
	**********************************/
	public function ajaxRegistrarCategorias($data)
	{
		$categorias = CategoriasControlador::ctrlRegistrarCategorias($data);
		echo json_encode($categorias,JSON_UNESCAPED_UNICODE);
	}	
    
	// // ACTUALIAR 
    public function ajaxActualizarCategorias($data){
        $table= "categorias";
        $id= $data['id_categoria']; 
        $nameId = "id_categoria";

        $respuesta = CategoriasControlador::ctrlActualizarCategorias($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }	
}






if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR REGISTROS
    $productos = new AjaxCategorias();
    $productos-> ajaxListarCategorias();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //  GUARDAR REGISTROS NUEVOS
    $registrarUsuario = new AjaxCategorias();

    $data = array(
            "categoria" => $_POST["categoria"],
            "observacion" => $_POST["observacion"],
            "id_normativa" => $_POST["id_normativa"]
    );

	$registrarUsuario -> ajaxRegistrarCategorias($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR ->  ACTUALIZAR MODIFICAR, EDITAR
    //print_r($_POST["id_normativa"]);
    $modificar = new AjaxCategorias();

    $data = array(
            "id_categoria" => $_POST["id_categoria"],
            "categoria" => $_POST["categoria"],
            "observacion" => $_POST["observacion"],
            "id_normativa" => $_POST["id_normativa"]
    );



	$modificar -> ajaxActualizarCategorias($data);

 }
//else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR MODIFICACION
	
// 	if ($_POST["estado"] == 1){$estado='ACTIVO';}else{$estado='INACTIVO';}
//     $actualizarUsuario = new AjaxUsuarios();
    
//     // print_r($_POST);
//     // die();
    
//     $data = array(
//             "password1" => $_POST["password1"],
//             "cod_farmacia" => $_POST["cod_farmacia"],
//             "rol" => $_POST["rol"],
//             "id_perfil_usuario" => $_POST["id_perfil_usuario"],
//             "estado" => $estado,
//             "usuario" => $_POST["usuario"],

//     );
//             $accionEstado = $_POST["accionEstado"];

//     $actualizarUsuario -> ajaxActualizarUsuarios($data,$accionEstado);
// }

