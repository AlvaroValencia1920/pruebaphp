<?php
include ('includes/conexion.php');

$tipo_documento = $_POST['tipo_documento'];
$documento = $_POST['documento'];
$nombre_completo = utf8_decode($_POST['nombre_completo']);
$email = $_POST ['email'];
$telefono = $_POST['telefono'];
$rol = 3;

$password = password_hash ($documento, PASSWORD_DEFAULT);

$consulta = "SELECT documento FROM `personas` WHERE `documento` = ".$documento."";
$query_consulta = mysqli_query($conexion,$consulta);

if (mysqli_num_rows($query_consulta)==0) {
    
    $query = "INSERT INTO `personas`(`id`, `tipo_documento`, `documento`, `nombre_completo`, `correo`, `celular`, `password`, `rol`) VALUES (NULL,'$tipo_documento','$documento','$nombre_completo','$email','$telefono','$password','$rol')";
    $verificar = mysqli_query($conexion,$query); 

    echo "Usuario registrado satisfactoriamente";       
  
} else {
    echo "Error, El usuario ya existe en el sistema";
}
?>