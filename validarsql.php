<?php

require_once ('Usuario.php');


$usuario=new Usuario();
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$usuario->validar($email,$password);
if($_REQUEST['cerrar']){
    $usuario->cerrarsesion();
}



?>

