<?php
    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='admin') {
        header("Location: login.php");
    }
?>
<?php
    include('login/src/conexion_db.php');
    $camilla = $_POST['id'];
    $sql = "SELECT * FROM `cama` WHERE id = '$id'";
    $result = mysqli_query($conexion, $sql);
    $usuario = mysqli_fetch_array($result);
    $estado = 'ocupada';
    //$tipoUsuario = 'Doctor';


    // if(!isset($usuario)){
    //     $sql = "SELECT * FROM `cama` WHERE id = '$id'";
    //     $result = mysqli_query($conexion, $sql);
    //     $usuario = mysqli_fetch_array($result);
    //     $tipoUsuario = "Asegurado";

    // }
    include 'includes/header.php';
?>