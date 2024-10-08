<?php 
	if(isset($_SESSION)){ }else{ session_start(); } 
	require_once "controladores/constantes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Qui Analytics</title>
   <!--Made with love by Mutiullah Samim -->
   <link rel="shortcut icon" href="vistas/images/favicon.ico" type="image/x-icon">
   
	<!--Bootsrap 4 CDN-->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    
    <!--Fontawesome CDN-->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->

	<!--Custom styles-->
		<link rel="stylesheet" type="text/css" href="styles.css">


	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  -->
	<script src="vistas/vendors/jquery/dist/jquery.min.js"></script>

<style>
.form-control {
     border-radius: 3px !important; 
    padding: 0.15rem 0.75rem !important;
    height: 2.8em !important;
    font-size: 13px !important;
}	
</style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Qui Analytics</h3>
<!-- 				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
			</div>
			<div class="card-body">
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" id="iptUser" class="form-control" placeholder="username" 
					style="height: 2.8em !important;border-radius: 2px !important;">
					
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" id="iptPassword" class="form-control" placeholder="password"
					style="height: 2.8em !important;border-radius: 2px !important;">
				</div>
				<div class="row align-items-center remember">
					<br>
				</div>
				<div class="form-group">
					<!-- <input type="submit" id="btnLogin" class="btn float-right login_btn"> -->
					<button class="btn btn-dark btn-lg btn-block" id="btnLogin"  type="button">Login</button>
				</div>

			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account? Ask Admin
					<!-- <a href="#">Sign Up</a> -->
				</div>
				<div class="d-flex justify-content-center">
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  -->
	
</body>
</html>
<script>

  $(document).ready(function(){

    $("#btnLogin").on('click',function(e){
    	e.preventDefault();

      var usuario = $("#iptUser").val();
      var pass = $("#iptPassword").val();

      $.ajax({
        url:"ajax/usuarios.ajax.php",
        type: "POST",
        data: {
          'accion': 5,
          'usuario': usuario ,
          'clave': pass
        },
        dataType: 'json',
        success:function(respuesta){
            console.log(respuesta);

            if (respuesta.length >0){
			  			//alert("Credenciales CORRECTAS!");
              //window.location = "vistas/";
              window.location = '<?php echo RUTA ?>';
				
            }else{
              //Swal.fire({icon: "error",title: "!Atención!",text: "Credenciales Incorrectas!",});
              alert("Credenciales Incorrectas!");
            }
        }
    });

    });  

  }); 
  </script>