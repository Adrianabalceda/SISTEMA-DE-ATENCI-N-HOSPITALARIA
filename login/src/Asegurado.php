<?php
include 'conexion_db.php';

$id = $_SESSION['datos_usuario']['id'];
$nombres = $_SESSION['datos_usuario']['nombres'];
$apellidos = $_SESSION['datos_usuario']['apellidos'];
$dni = $_SESSION['datos_usuario']['DNI'];
/*
$sql = "SELECT nombre FROM especialidad WHERE id_especialidad = '.$id_especialidad.'";
$result = mysqli_query($conexion, $sql);
$especialidad = mysqli_fetch_array($result);
*/

?>