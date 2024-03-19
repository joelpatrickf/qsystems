<?php 
if(isset($_SESSION)){ }else{ session_start(); } 

  require_once "controladores/constantes.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">

<!-- 	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

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
					<input type="text" id="iptUser" class="form-control" placeholder="username">
					
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" id="iptPassword" class="form-control" placeholder="password">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
</body>
</html>
<script>

  $(document).ready(function(){

    $("#btnLogin").on('click',function(e){
    	e.preventDefault();

      var usuario = $("#iptUser").val();
      var pass = $("#iptPassword").val();

      $.ajax({
        url:"functions/authcode.php",
        type: "POST",
        data: {
          'accion': 1,
          'usuario': usuario ,
          'clave': pass
        },
        dataType: 'json',
        success:function(respuesta){
            console.log(respuesta);

            if (respuesta.length >0){
              //Swal.fire({title: "!Atención!",text: "Credenciales Correctas, ingresando al sistema",icon: "info"});
              window.location = "vistas/";
				
            }else{
              //Swal.fire({icon: "error",title: "!Atención!",text: "Credenciales Incorrectas!",});
              alert("Credenciales Incorrectas!");
            }
        }
    });

    });  

  }); 
  </script>