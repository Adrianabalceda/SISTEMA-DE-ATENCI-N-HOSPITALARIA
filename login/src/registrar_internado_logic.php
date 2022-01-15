<?php
    include('conexion_db.php');
    $paciente = $_POST['usuario'];
    $cama = $_POST['id_camilla'];
    $especialidad_id = $_POST['especialidad'];
    $cama = $_POST['usuario'];
    $fecha =$_POST['fecha'];
    $hora =$_POST['hora'];
    $descripcion =$_POST['descripcion'];

   
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

    $sql = "SELECT * FROM `internado` WHERE id = '$internado_id_asegurado'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);
   

    if($count < 1 && $count2 < 1){
        $sql = "INSERT INTO `internado` (`id_asegurado`, `usuario`, `id_camilla`, `id_especialidad`, 
        `fecha`, `hora`, `descripcion`) 
        VALUES ('$internado_id_asegurado','$paciente','$cama','$especialidad_id','$fecha','$hora','$descripcion)";
        mysqli_query($conexion, $sql);
    
        //var_dump($sql);
        header("location: ../registro_doctor.php?mensaje=1");
    }
    else{
        if($count == 1){
            header("location: ../registro_doctor.php?error=1");
        }
        if($count2 == 1){
            header("location: ../registro_doctor.php?error=2");
        }

        
    }