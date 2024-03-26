<?php
function redirect($url, $message)
{
$_SESSION['messaje'] = "No esta atorizado a esta página";
header("Location". $url);
exit();
}
?>