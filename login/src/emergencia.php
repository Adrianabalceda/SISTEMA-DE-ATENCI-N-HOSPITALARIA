<?php
    include('conexion_db.php');
    $nombres = $_POST['paciente'];
    $apellidos = $_POST['descripcion'];
    $celular = $_POST['fecha'];
    $email = $_POST['hora'];
    
    $sql = "SELECT * FROM `familiar` WHERE id_familiar = ".$nombres."";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
   
   
    $sql = "SELECT * FROM `asegurado` WHERE id = ".$nombres."";
    $result1 = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result1);

 

    if($count2==1){
        $sql = "INSERT INTO `emergencia` (`id_asegurado`, `descripcion`, `fecha`, 
    `hora`) 
    VALUES (".$nombres.",".$apellidos.",".$celular.",".$email.")";
    mysqli_query($conexion, $sql);

    
    header("location: ../Asegurado/emergencia.php?mensaje=1");}
    else{

        if($count==1){
            $sql = "INSERT INTO `emergencia_familiar` (`id_asegurado`, `descripcion`, `fecha`, 
            `hora`) 
            VALUES (".$nombres.",".$apellidos.",".$celular.",".$email.")";
            mysqli_query($conexion, $sql);
        
            
            header("location: ../Asegurado/emergencia.php?mensaje=1");}
       
        
    }

    
   

    

   


    

?>