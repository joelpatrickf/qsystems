<?php 
if(isset($_SESSION)){ }else{ session_start(); }

    session_start();
    session_unset();
    header('Location: index.php');
