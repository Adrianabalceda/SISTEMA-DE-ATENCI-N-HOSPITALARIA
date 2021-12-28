<?php
include 'conexion_db.php';
$id = $_SESSION['datos_usuario']['id'];
$nombres = $_SESSION['datos_usuario']['nombres'];
$apellidos = $_SESSION['datos_usuario']['apellidos'];
$id_especialidad = $_SESSION['datos_usuario']['id_especialidad'];
/*
$sql = "SELECT nombre FROM especialidad WHERE id_especialidad = '.$id_especialidad.'";
$result = mysqli_query($conexion, $sql);
$especialidad = mysqli_fetch_array($result);
*/

?>