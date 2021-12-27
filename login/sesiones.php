
<?php

    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='asegurado') {
        header("Location: login.php");
    }
?>

<main>
<link rel="stylesheet" href="assets/css/sesiones.css?v=<?php echo time(); ?>">
    
    <div class="row">
    <?php include 'src/sesiones.php';?>
          
    <div id="cerrarSesion" class="d-flex align-items-center mb-5 pointer">
                           
                            <a href="src/cerrar_sesion.php" class="mb-0 ms-2 text-secondary "><button> <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#fff"/>
                            </svg>
                    <b>Cerrar Sesión</b></button></a>
                        </div>
                       
                    <div class="" id="containerLoginPageRight">
                    <center>    
                    <div>
                            <h1 class="fw-bold fs-4" id="titleLoginPage">¡Bienvenido!</h1>
                            <h2 class="text-secondary" id="textLoginPage">Seleccione la sesión a la que desea ingresar</h2><br></br>
                        </div>

                    <div class="contenedor">
                                                       
                                                        <table>
                                                        <thead>
                                                                <tr>
                                                                <th>DNI</th>
                                                                <th>NOMBRES</th>
                                                                <th>APELLIDOS</th>
                                                                <th>INGRESAR</th>
                                                                </tr>
                                                            <thead>
                                                            <tbody>
                                                        <tr> 

                                                                <td><center><?php echo $dni; ?></center></td>
                                                                <td><center><?php echo $nombres; ?></center></td>
                                                                <td><center><?php echo $apellidos; ?></center></td>
                                                                
                                                                <td>
                                                                <center>
                                                                <button type="button" class="btn btn-info"> <?php echo 'Cuenta titular';?> </button>
</center>
                                                            </td>
                                                        </tr>
                                                            <?php

                                                            /* mostramos la tabla de familiares relacionados al asegurado
                                                            */
                                                            $consulta = "SELECT * FROM familiar WHERE id_asegurado = $id";
                                                            $fam = mysqli_query($conexion, $consulta);
                                                            $num_filas = mysqli_num_rows($fam);
                                                            $familiar = mysqli_fetch_array($fam);
                                                            foreach ($conexion->query($consulta) as $valor){
                                                         
                                                                                                        
                                                            
                                                                                                       
                                                                                                ?>
                                                             
                                                             <tr> 
                                                                
                                                                <td><center><?php echo $valor['DNI']; ?></center></td>
                                                                <td><center><?php echo $valor['nombres']; ?></center></td>
                                                                <td><center><?php echo $valor['apellidos']; ?></center></td>
                                                                <td>
                                                                    <center>
                                                                <button type="button" class="btn btn-info">INGRESAR </button>
                                                            </center>
                                                            </td>
                                                             </tr>
                                                            
                                                          
                                                            
                                                            
                                                               
                                                          
                                                            
                                                      
                                                        </div>

                                                    <?php
                                                    
                                                   
                                                }
                                                
                                            ?>
                                              </tbody>
                                                            <table/>
                        
                        </center>                     
</div>

    </main>

    
    <script src="assets/js/loginLogic.js?v=<?php echo time(); ?>"></script>
<?php include 'includes/footer.php' ?>