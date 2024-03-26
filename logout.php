<?php 
if(isset($_SESSION)){ }else{ session_start(); }

    session_unset();
    session_destroy();
    // header('Location: index.php');
    echo '<script> window.location = "http://localhost/qsystems/"</script>';
    //echo '<script> window.location = "https://qanalytics.farmagreenscc.com/"</script>';
    