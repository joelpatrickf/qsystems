<?php 	

	if(isset($_GET['name_pdf'])){
		$documento1=$_GET['name_pdf'];
		$documento = "../documentacion/".$documento1;
	}
?>

<meta charset="UTF-8">
 <main>
 	<div class="container-fluid vh-100">
 		<iframe src="<?php echo $documento; ?> " frameborder="0" height="100%" width="100%" charset="UTF-8" >
 			
 		</iframe>
 	</div>
 </main>
 		

 		
