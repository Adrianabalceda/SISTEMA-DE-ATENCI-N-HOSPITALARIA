<?php
    include('conexion_db.php');
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $doctor_id = $_SESSION['datos_usuario']['id'];

    $sql = "SELECT * FROM `doctor` WHERE celular = '$celular'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);

    $sql = "SELECT * FROM `doctor` WHERE email = '$email'";
    $result = mysqli_query($conexion, $sql);
    $count2 = mysqli_num_rows($result);
   

    if($count < 1 && $count2 < 1){
        $sql = "UPDATE `doctor` SET `celular`='$celular',`email`='$email' WHERE `id`='$doctor_id'";
        mysqli_query($conexion, $sql);
    
        //var_dump($sql);
        header("location: ../modificar_doctor.php?mensaje=1");
    }
    else{
        if($count == 1){
            header("location: ../modificar_doctor.php?error=1");
        }

    }

?>