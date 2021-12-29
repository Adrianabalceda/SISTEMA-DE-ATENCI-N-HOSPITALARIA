<?php
    include('conexion_db.php');

    $nombresAsegurado = $_POST['nombresAsegurado'];
    $apellidosAsegurado = $_POST['apellidosAsegurado'];
    $dniAsegurado = $_POST['dniAsegurado'];
    $celularAsegurado = $_POST['celularAsegurado'];
    $emailAsegurado = $_POST['emailAsegurado'];
    $fechaAsegurado = $_POST['fechaAsegurado'];
	$contraseñaAsegurado = $_POST['contraseñaAsegurado'];
    $dniAsegurado = stripcslashes($dniAsegurado);
    $usuario = strtoupper($nombresAsegurado.'.'.$apellidosAsegurado);


    $sql = "SELECT * FROM `asegurado` WHERE DNI = '$dniAsegurado'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result); 

    if($count !== 1 && $count2 !== 1) {
        //actualizar datos por dniAsegurado
        $sql = "UPDATE `asegurado` SET `nombres`='$nombresAsegurado',`apellidos`='$apellidosAsegurado',`celular`='$celularAsegurado',`email`='$emailAsegurado',`fecha_nacimiento`='$fechaAsegurado' WHERE `DNI`='$dniAsegurado'"; //,`contraseña`='$contraseñaAsegurado'
        
        mysqli_query($conexion, $sql);


        header("location: ../modificar_asegurado.php?mensaje=1");
    }
    else{
        if($count == 1){
            header("location: ../modificar_asegurado.php?error=1");
        }
        if($count2 == 1 ){
            header("location: ../modificar_asegurado.php?error=2");
        }
        
    }
    
?>