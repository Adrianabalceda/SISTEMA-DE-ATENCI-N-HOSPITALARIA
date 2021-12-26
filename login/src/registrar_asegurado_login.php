<?php
    include('conexion_db.php');
    $nombresPadre = $_POST['nombresAsegurado'];
    $apellidosPadre = $_POST['apellidosAsegurado'];
    $dniPadre = $_POST['dniAsegurado'];
    $celularPadre = $_POST['celularAsegurado'];
    $emailPadre = $_POST['emailAsegurado'];
    $fechaAsegurado = $_POST['fechaAsegurado'];
    $dniAsegurado = stripcslashes($dniAsegurado);


    $sql = "SELECT * FROM `asegurado` WHERE dni = '$dniAsegurado'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
    
    $sql = "SELECT * FROM `doctor` WHERE dni = '$dniAsegurado'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);

    

    if($count !== 1 && $count2 !== 1) {
        
        $sql = "INSERT INTO `asegurado` (`dni`, `usuario`, `contrasenia`, `nombres`, `apellidos`, `email`, `celular`,'fecha_nac') 
        VALUES ('$dniAsegurado', '$dniAsegurado','$dniAsegurado','$nombresAsegurado', '$apellidosAsegurado', '$emailAsegurado', '$celularAsegurado','$fechaAsegurado')";
        var_dump($sql);
        mysqli_query($conexion, $sql);


        header("location: ../registro_asegurado.php?mensaje=1");
    }
    else{
        if($count == 1){
            header("location: ../registro_asegurado.php?error=1");
        }
        if($count2 == 1 ){
            header("location: ../registro_asegurado.php?error=2");
        }
        
    }
    
?>