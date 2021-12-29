<?php
    include('conexion_db.php');
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $especialidad_id = $_POST['especialidad'];

    $doctor_id = stripcslashes($dni);
    $usuario = strtoupper($nombres.' '.$apellidos);
   
    switch($especialidad_id){
        case 1:
            $especialidad = "Medicina General";
            break;
        case 2:
            $especialidad = "Cardiología";
            break;
        case 3:
            $especialidad = "Neurología";
            break;
        case 4:
            $especialidad = "Pediatría";
            break;
        case 5:
            $especialidad = "Dermatología";
            break;
    }
    $sql = "SELECT * FROM `doctor` WHERE id_especialidad = '$especialidad'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
    //var_dump($count);

    $sql = "SELECT * FROM `doctor` WHERE id = '$doctor_id'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);

    $sql = "SELECT * FROM `asegurado` WHERE id = '$doctor_id'";
    $result = mysqli_query($conexion, $sql);
    $count3 = mysqli_num_rows($result);

   

    if($count < 1 && $count2 < 1 && $count3 < 1){
        $sql = "INSERT INTO `doctor` (`id`, `usuario`, `contraseña`, `nombres`, 
        `apellidos`, `id_especialidad`, `email`, `celular`) 
        VALUES ('$doctor_id','$usuario','$doctor_id','$nombres','$apellidos','$especialidad_id','$email','$celular')";
        mysqli_query($conexion, $sql);
    
        //var_dump($sql);
        header("location: ../modificar_doctor.php?mensaje=1");
    }
    else{
        if($count == 1){
            header("location: ../modificar_doctor.php?error=1");
        }
        if($count2 == 1 || $count3 == 1){
            header("location: ../modificar_doctor.php?error=2");
        }

        
    }


?>