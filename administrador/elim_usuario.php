<?php
include ('../includes/conexion.php');

$id = $_GET['id'];

$elim = "DELETE FROM `personas` WHERE `id` = '".$id."'";
$query = mysqli_query($conexion,$elim);

$msg = Array("msg" => "", "exito" => "");
if ($query) {
	$msg["msg"] = "Usuario eliminado satisfactoriamente";
	$msg["exito"] = true;
} else {
	$msg["msg"] = "Error, intente nuevamente";
	$msg["exito"] = false;
}
echo json_encode($msg);
?>