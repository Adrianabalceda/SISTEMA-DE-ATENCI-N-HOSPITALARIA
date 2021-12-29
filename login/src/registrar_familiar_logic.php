<?php
    include('conexion_db.php');
    
    $nombres = $_POST['nombresFamiliar'];
    $apellidos = $_POST['apellidosFamiliar'];
    $dni = $_POST['dniFamiliar'];
    $id_asegurado = $_POST['dniasegurado'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $dni = stripcslashes($dniAsegurado);



    $sql = "SELECT * FROM `asegurado` WHERE id = '$dni'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
    
    $sql = "SELECT * FROM `doctor` WHERE id = '$dni'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);

    $sql = "SELECT * FROM `familiar` WHERE id_familiar = '$dni'";
    $result = mysqli_query($conexion, $sql);
    $count3 = mysqli_num_rows($result);

    

    if($count !== 1 && $count2 !== 1 && $count3 !== 1) {
        
        $sql = "INSERT INTO `familiar` ('id_familiar',`DNI`,'id_asegurado', `nombres`, `apellidos`, `email`,'fecha_nac') 
        VALUES ('$dni','$dni','$id_asegurado','$nombres', '$apellidos', '$email','$fechaAsegurado')";
        
        mysqli_query($conexion, $sql);


        header("location: ../AñadirFamiliar.php?mensaje=1");
    }
    else{
        if($count == 1 || $count2 == 1 || $count3 == 1){
            header("location: ../AñadirFamiliar.php?error=1");
        }
      
    }
    
?>