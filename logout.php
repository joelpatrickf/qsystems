<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "constantes/constantes.php";
print_r("HOOOOOOOOOOOOOOOLÑA");
print_r(RUTA);
print_r($_SESSION);

exit();
    session_unset();
    session_destroy();
    header('Location:'.RUTA);
    
