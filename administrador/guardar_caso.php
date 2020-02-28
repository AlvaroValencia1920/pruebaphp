<?php 
include ('../includes/conexion.php');

$motivo = utf8_decode($_POST['motivo']);
$direccion = utf8_decode($_POST['direccion']);
$estado = "Activo";


$consulta = "SELECT * FROM casos";
$query_consulta = mysqli_query($conexion,$consulta);

while($row=mysqli_fetch_array($query_consulta)){
   $consecutivo = $row ['consecutivo'];
}

if (mysqli_num_rows($query_consulta) == 0) {
	$convo = 1;
} else {
	$convo = $consecutivo + 1;
}

$registar = "INSERT INTO `casos`(id, motivo, direccion, estado, consecutivo) VALUES (NULL,'$motivo','$direccion','$estado','$convo')";
$query = mysqli_query($conexion, $registar);

if ($query) {
 	echo "Caso Registrado Exitosamente";  
} else {
 	echo "Error, Intente Nuevamente";
}
?>