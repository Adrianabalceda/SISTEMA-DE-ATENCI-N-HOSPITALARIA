<?php
include 'conexion_db.php';

$id = $_SESSION['datos_usuario']['id'];
$nombres = $_SESSION['datos_usuario']['nombres'];
$apellidos = $_SESSION['datos_usuario']['apellidos'];
$dni = $_SESSION['datos_usuario']['DNI'];

$sql = "SELECT celular FROM asegurado WHERE id = '$id'";
$result = mysqli_query($conexion, $sql);
$celular = mysqli_fetch_array($result);

$sql = "SELECT email FROM asegurado WHERE id = '$id'";
$result = mysqli_query($conexion, $sql);
$email = mysqli_fetch_array($result);

$sql = "SELECT usuario FROM asegurado WHERE id = '$id'";
$result = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_array($result);

$sql = "SELECT fecha_nac FROM asegurado WHERE id = '$id'";
$result = mysqli_query($conexion, $sql);
$fecha_nac = mysqli_fetch_array($result);
/*
$sql = "SELECT nombre FROM especialidad WHERE id_especialidad = '.$id_especialidad.'";
$result = mysqli_query($conexion, $sql);
$especialidad = mysqli_fetch_array($result);
*/

?>