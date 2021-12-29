<?php
    include('conexion_db.php');
    $dni = $_POST['dni'];
    $tipoUsuario = $_POST['tipoUsuario'];


    if($tipoUsuario === "Asegurado"){

        $consulta = "SELECT * FROM familiar WHERE id_asegurado = ".$dni."";
        
        foreach ($conexion->query($consulta) as $f){
                                                          
        $sql = "DELETE FROM `familiar` WHERE id_familiar= ".$f['id_familiar']."";
        mysqli_query($conexion, $sql);

        }
        $sql = "DELETE FROM `asegurado` WHERE `id` = '$dni';";
        mysqli_query($conexion, $sql);

        header("location: ../busquedaEliminarUsuario.php?mensaje=1");
    }
    if($tipoUsuario === "Doctor"){
       
        $sql = "DELETE FROM `doctor` WHERE `id` = '$dni';";
        mysqli_query($conexion, $sql);
        header("location: ../busquedaEliminarUsuario.php?mensaje=1");


    }
?>