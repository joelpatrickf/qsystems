<?php 
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
    // public function ajaxLogin($usuario, $password){
    //         $respuesta = UsuarioControlador::ctrLogin($usuario,$password);
    //         //echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    // }

	public function ajaxListarUsuarios()
	{
		$bodegas = UsuarioControlador::ctrlListarUsuarios();

		echo json_encode($bodegas,JSON_UNESCAPED_UNICODE);
	}

	// REGISTRAR USUARIOS
	public function ajaxRegistrarUsuarios($data)
	{
		$usuarios = UsuarioControlador::ctrlRegistrarUsuarios($data);

		echo json_encode($usuarios,JSON_UNESCAPED_UNICODE);
	}	
    
	// ACTUALIAR USUARIOS
    public function ajaxActualizarUsuarios($data){
        $table= "usuarios";
        $id= $data['usuario']; 
        $nameId = "usuario";

        $respuesta = UsuarioControlador::ctrActualizarUsuarios($table,$data, $id, $nameId);
        echo json_encode($respuesta);
    }
    
	public function ajaxEliminarUsuarios($usuario)
	{
		$usuarios3 = UsuarioControlador::ctrEliminarUsuarios($usuario);

		echo json_encode($usuarios3,JSON_UNESCAPED_UNICODE);
	}    
}
if (isset($_POST['accion']) && $_POST['accion'] == 1) { // LISTAR
	$usuarios = new AjaxUsuarios();
	$usuarios-> ajaxListarUsuarios();

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //  REGISTRAR NUEVO 
    $registrarUsuario = new AjaxUsuarios();

	if ($_POST["perfil"] == 1){$perfil='ADMIN';}else{$perfil='NORMAL';}

    $data = array(
            "usuario" => $_POST["usuario"],
            "clave" => $_POST["clave"],
            "cedula" => $_POST["cedula"],
            "nombres" => strtolower ($_POST["nombres"]),
            "perfil" => $perfil,
            "cargo" => $_POST["cargo"]
    );

    $registrarUsuario -> ajaxRegistrarUsuarios($data);


}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // GUARDAR MODIFICACION
	
	if ($_POST["perfil"] == 1){$perfil='ADMIN';}else{$perfil='NORMAL';}
    $actualizar = new AjaxUsuarios();

    date_default_timezone_set("America/Guayaquil");
    $fechaActual = date('Y-m-d H:i:s', time()); 
    $varEstado = 'ACTIVO'; 

    // print_r($_POST);
    // die();
    
    $data1 = array(
            "usuario" => $_POST["usuario"],
            "password1" => $_POST["clave"],
            "idempleado" => $_POST["cedula"],
            "nombres" => $_POST["nombres"],
            "perfil" => $perfil,
            "fecha_creacion" => $fechaActual,
            "estado" => $varEstado,
            "cargo" => $_POST["cargo"]

    );
            //$accionEstado = $_POST["accionEstado"];

    $actualizar -> ajaxActualizarUsuarios($data1);
}else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ELIMINAR
	$usuarios = new AjaxUsuarios();
	$usuarios-> ajaxEliminarUsuarios($_POST['usuario']);

}

