<?php

    function redirect($url, $statusCode = 303)
    {
    header('Location: ' . $url, true, $statusCode);
    die();
    }
    
    include('conexion_db.php');
    $nombres = $_POST['nombresFamiliar'];
    $apellidos = $_POST['apellidosFamiliar'];
    $dni = $_POST['dniFamiliar'];
    $id_asegurado = $_POST['dniasegurado'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $dni = stripcslashes($dni);

    $sql = "SELECT * FROM `asegurado` WHERE id = '$dni'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);

    $sql = "SELECT * FROM `familiar` WHERE id_familiar = '$dni'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);



    if ($count < 1 && $count2 < 1) {
        $sql = "INSERT INTO `familiar` (`id_familiar`,`DNI`,`id_asegurado`, `nombres`, `apellidos`, `email`,`fecha_nac`) 
            VALUES ('$dni','$dni','$id_asegurado','$nombres', '$apellidos', '$email','$fecha')";
        mysqli_query($conexion, $sql);

        header("location: ../AñadirFamiliar.php?mensaje=1");

        redirect("../admin_principal.php" , false);
    } else {

            header("location: ../AñadirFamiliar.php?error=1");

    }

?>