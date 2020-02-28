<?php
include ('../includes/conexion.php');

$contrasenaAnterior = $_POST['contrasenaAnterior'];
$contrasenaNueva = $_POST['contrasenaNueva'];
$contrasenaConfirmacion = $_POST ['contrasenaConfirmacion'];
$id = $_POST['usuario'];
$cont = 0;

$password = password_hash ($contrasenaConfirmacion, PASSWORD_DEFAULT);

$consulta = "SELECT * FROM `personas` WHERE `id` = ".$id."";
$query_consulta = mysqli_query($conexion,$consulta);

    while ($row = mysqli_fetch_array($query_consulta)) {

    $passwordbd = $row['password'];

        if (password_verify($contrasenaAnterior,$passwordbd)) {
         $cont++;
        }
    }

if ($cont>0) {

    if (($contrasenaNueva==$contrasenaConfirmacion)or($contrasenaConfirmacion==$contrasenaNueva)){
    
    $query = "UPDATE `personas` SET `password`='$password' WHERE `id` = ".$id."";
    $verificar = mysqli_query($conexion,$query);    
        echo "Se Ha Cambiado Contraseña Exitosamente";
    }else{
        echo "Error, No Coinciden Contraseñas";   
    }
  
} else {
    echo "Error, Contraseña Anterior Incorrecta";
}
?>