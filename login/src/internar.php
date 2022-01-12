<?php
    include('conexion_db.php');
    $nombres = $_POST['paciente'];
    $apellidos = $_POST['descripcion'];
    $celular = $_POST['fecha'];
    $email = $_POST['hora'];
    $cama = $_POST['cama'];
    $id_esp = $_POST['especialidad'];
    
    $sql = "SELECT * FROM `familiar` WHERE id_familiar = ".$nombres."";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
   
   
    $sql = "SELECT * FROM `asegurado` WHERE id = ".$nombres."";
    $result1 = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result1);

 

    if($count==1){
        $sql = "INSERT INTO `familiar_atender` (`id_familiar`, `id_cama`, `id_doctor`, `estado`) VALUES 
    VALUES (".$nombres.",".$id_cama.",".$id.",".$apellidos.")";
    mysqli_query($conexion, $sql);

    
    header("location: ../Doctor/internar.php?mensaje=1");}
    else{

        if($count2==1){
            $sql = "INSERT INTO `asegurado_atender` (`id_familiar`, `id_cama`, `id_doctor`, `estado`) VALUES 
    VALUES (".$nombres.",".$id_cama.",".$id.",".$apellidos.")";
    mysqli_query($conexion, $sql);
           
        
            
            header("location: ../Doctor/internar.php?mensaje=1");}
       
        
    }
