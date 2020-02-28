<?php
include ('../includes/conexion.php');

$id = $_POST['id'];

$act_plan = "UPDATE `casos` SET `estado`='Activo' WHERE id = $id";
$query = mysqli_query($conexion, $act_plan);

if($query) {
    echo "Caso Aprobado Exitosamente";

} else {
    echo "Error: Intente Nuevamente";
}