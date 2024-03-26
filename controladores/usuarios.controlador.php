<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "../modelos/usuarios.modelo.php";
//require_once "constantes.php";


class UsuarioControlador{
	/* *********************************
		login de usuarios
	**********************************/
	static public function ctrLogin($usuario, $password){
			//$password = crypt($_POST['loginPassword'], '$2a$07$azybxcags23425sdg23sdfhsd$');
			$respuesta = UsuarioModelo::mdlIniciarSesion($usuario,$password);
			return $respuesta;
			//echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);


	}

	/* *********************************
			REGISTRAR USUARIOS
	**********************************/
	static public function ctrlRegistrarUsuarios($data){
		$Usuario1 = UsuarioModelo::mdlRegistrarUsuarios($data);
		return $Usuario1;
	}

	/* *********************************
			LISTAR USUARIOS
	**********************************/
	static public function ctrlListarUsuarios(){
		$menuUsuario = UsuarioModelo::mdlObtenerUsuarios();
		return $menuUsuario;
	}		

	// ACTUALIZAR
	static public function ctrActualizarUsuarios($table, $data, $id, $nameId){
		$respuesta = UsuarioModelo::mdlActualizarUsuarios($table, $data, $id, $nameId);
		return $respuesta;
	}	

	// ELIMINAR
	static public function ctrEliminarUsuarios($usuario){
		$respuesta = UsuarioModelo::mdlEliminarUsuarios($usuario);
		return $respuesta;
	}		
}


















// if (isset($_POST['accion']) && $_POST['accion'] == 1) { // verificar login
// 	$horarios1 = new UsuarioControlador();
// 	$horarios1-> login($_POST['usuario'],$_POST['clave']);

// } 