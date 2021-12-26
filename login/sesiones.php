<?php include 'includes/header.php';
?>
<?php

    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='asegurado') {
        header("Location: login.php");
    }
?>

<main>
    <div class="row">
    <?php include 'src/sesiones.php';?>
          
    <div id="cerrarSesion" class="d-flex align-items-center mb-5 pointer">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#8692A6"/>
                            </svg>
                    
                            <a href="src/cerrar_sesion.php" class="mb-0 ms-2 text-secondary ">Cerrar Sesión</a>
                        </div>
                        <div id="volver" class="d-flex align-items-center mb-5 pointer d-none">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#8692A6"/>
                            </svg>
                    
                            <p class="mb-0 ms-2 text-secondary">Volver</p>
                        </div>
                    <div class="" id="containerLoginPageRight">
                    <center>    
                    <div>
                            <h5 class="fw-bold fs-4" id="titleLoginPage">¡Bienvenido!</h5>
                            <p class="text-secondary" id="textLoginPage">Seleccione la sesión a la que desea ingresar</p>
                        </div>
                    </center>  
                   
                                                        <tr>
                                                        <td> 
                                                                <button class="user-subhead text-center"> <?php echo 'Cuenta titular';?> </span>
                                                            </td>
                                                            <?php

                                                            /* mostramos la tabla de familiares relacionados al asegurado
                                                            */
                                                            $consulta = "SELECT * FROM familiar WHERE id_asegurado = $id";
                                                            $fam = mysqli_query($conexion, $consulta);
                                                            $num_filas = mysqli_num_rows($fam);
                                                            $familiar = mysqli_fetch_array($fam);
                                                            foreach ($conexion->query($consulta) as $valor){
                                                         
                                                                                                        
                                                            
                                                                                                       
                                                                                                ?>
                                                            <td> 
                                                                <button class="user-subhead text-center"> <?php echo $valor['nombres'];?> </span>
                                                            </td>
                                                            
                                                        </tr>

                                                    <?php
                                                    
                                                   
                                                }
                                            ?>
                        
                    
</div>
    </main>

    
    <script src="assets/js/loginLogic.js?v=<?php echo time(); ?>"></script>
<?php include 'includes/footer.php' ?>