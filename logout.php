<?php 
if(isset($_SESSION)){ }else{ session_start(); }
require_once "constantes/constantes.php";
    session_unset();
    session_destroy();
    header('Location:'.RUTA);
    
