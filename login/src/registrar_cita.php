<?php
    include('conexion_db.php');
    $nombres = $_POST['paciente'];
    $apellidos = $_POST['especialidad'];
    $celular = $_POST['fecha'];
    $email = $_POST['hora'];
    
   
    
    $sql = "SELECT * FROM `familiar` WHERE id_familiar = ".$nombres."";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
   

    $sql = "SELECT * FROM `asegurado` WHERE id = ".$nombres."";
    $result1 = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result1);

    $sql = "SELECT * FROM `doctor` WHERE id_especialidad = ".$apellidos."";
    $result2 = mysqli_query($conexion, $sql);
    $doctor = mysqli_fetch_array($result2);
    $id_doctor = $doctor['id'];


    if($count==1){
        $sql = "INSERT INTO `cita_familiar_doctor` (`id_familiar`, `id_doctor`, `fecha`, 
        `hora`) 
        VALUES (".$nombres.",".$id_doctor.",".$celular.",".$email.")";
        mysqli_query($conexion, $sql);
    
        
        header("location: ../Asegurado/citas_paciente.php?mensaje=1");
    }
    else{

        if($count2==1){
            $sql = "INSERT INTO `cita_paciente_doctor` (`id_asegurado`, `id_doctor`, `fecha`, `hora`) VALUES (".$nombres.",".$id_doctor.",".$celular.",".$email.")";
        mysqli_query($conexion, $sql);
        header("location: ../Asegurado/citas_paciente.php?mensaje=1");
        }
       
        
    }


?>