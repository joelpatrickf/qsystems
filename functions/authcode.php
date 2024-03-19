<?php 
if(isset($_SESSION)){ }else{ session_start(); }

require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/constantes.php";


class UsuarioControlador{
	/* *********************************
		login de usuarios
	**********************************/
	public function login($usuario, $password){
			//$password = crypt($_POST['loginPassword'], '$2a$07$azybxcags23425sdg23sdfhsd$');
			//echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
			
			$respuesta = UsuarioModelo::mdlIniciarSesion($usuario,$password);
			echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);

			$_SESSION['login'] = $respuesta;


            // if (!empty($respuesta)){
            //     $_SESSION['auth'] = true;
            //     $_SESSION['auth_user'] = $respuesta[0];

            //     if ($respuesta[0]->perfil== 'Admin'){
            //         $_SESSION["message"] = "Welcome to dashboard";
            //         //header('Location: ../admin/index.php');
            //         echo ' <script> window.location = "../admin/index.php</script>';
            //     }else{
            //         $_SESSION["message"] = "Logged in Successefully";
            //         header('Location: ../index.php');
            //     }

            // }else{
            //     $_SESSION["message"] = "Invalid Credentials";
            //     header('Location: ../login.php');      
            // }
			
			// if (count($respuesta)>0){

			// 	// $_SESSION['usuario'] = $respuesta[0]; // almacena la respuesta en una sesion
			// 	//echo '<script> window.location = '. constHost .'</script>';
			// 	echo '<script> 
			// 		fncSweetAlert(
			// 			"error",
			// 			"Usuario y/o contraseña invalida",
			// 			"http://localhost/rsWeb/"
			// 		);
			// 	</script>';

			// }else{
			// 	echo '<script> 
			// 		fncSweetAlert(
			// 			"error",
			// 			"Usuario y/o contraseña invalida",
			// 			"http://localhost/rsWeb/"
			// 		);
			// 	</script>';

			// }
		
		
		
	}
}

	if (isset($_POST['accion']) && $_POST['accion'] == 1) { // auth users
		$horarios1 = new UsuarioControlador();
		$horarios1-> login($_POST['usuario'],$_POST['clave']);
	} 


