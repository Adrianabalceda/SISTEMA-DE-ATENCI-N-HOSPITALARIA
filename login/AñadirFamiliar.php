<?php
    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='admin') {
        header("Location: login.php");
    }
?>
<?php
    include('src/conexion_db.php');
    $dni = $_POST['dni'];
    
    $sql = "SELECT * FROM `asegurado` WHERE id = '$dni'";
    $result = mysqli_query($conexion, $sql);
    
    $count = mysqli_num_rows($result);
     

    
    include 'includes/header.php';
?>

<body>
<div class="row">
            <div class="col-md-5 p-5 fst-quote-container text-white min-h-100vh">

                <div class="container">
                    <div class="container">
                        

                        <div class="text-center mt-5">
                            <div class="d-flex justify-content-center align-items-center"> 
                            <img class= "a" width="200" height="60" src="../logo color/logo_small.png"></i>
                            
                        </div>
                        <br></br>
                            <div>
                            
                                <b class="pt-4 lh-lg mb-0">
                                Los administradores de sitios web son los responsables de los sitios web de internet. Se aseguran de que la información del sitio web es correcta, segura y está actualizada. Trabaja estrechamente con diseñadores y programadores y con los departamentos que pertenecen al hospital.
        </b>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>

                
            </div>
            <div class="col-md-7 min-h-100vh d-flex align-items-center">
                <div class="container py-5">
                    <div class="d-flex justify-content-between align-self-start align-items-center ">
                        <div id="cerrarSesion" class="d-flex align-items-center mb-5 pointer">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#8692A6"/>
                            </svg>
                    
                            <a href = "admin_principal.php" class="mb-0 ms-2 text-secondary"> Volver </a>
                        </div>
                        <div id="volver" class="d-flex align-items-center mb-5 pointer d-none">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#8692A6"/>
                            </svg>
                    
                            <p class="mb-0 ms-2 text-secondary">Volver</p>
                        </div>
                        <div class="d-flex flex-column justify-content-end mb-5 me-lg-5">
                            <p style="font-size: 13px; color: #bdbdbd;" class="mb-0 me-lg-5">Cuenta Administrativa</p>
                            <p class="text-secondary mb-0 text-end me-lg-5" id="titlePhase">Menu Principal</p>
                        </div>
                    </div>
                    <div class="container ml-4" id="containerLoginPageRight">
                    <?php
                                if($count!=1){
                                   ?>
                                   <div>
                            <h5 class="fw-bold fs-4" id="titleLoginPage">No existe un usuario con ese DNI</h5>
                        </div>
                                   <?php }
                                else{
                                    
                               

?>
                 
                        <div>
                            <h5 class="fw-bold fs-4" id="titleLoginPage">Complete los datos del familiar</h5>
                        </div>
                        <form action="src/registrar_familiar_logic.php" method="POST" class="formulario" >
                        <div class="mb-1">
                            <p class="label-color mb-1">Nombres*</p>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombresFamiliar" id="nombresFamiliar" required />
                        </div>
                        <div class="mb-1">
                            <p class="label-color mb-1">Apellidos*</p>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidosFamiliar" id="apellidosFamiliar" required/>
                        </div>
                        <div class="mb-1">
                            <p class="label-color mb-1">ID Asegurado*</p>
                            <input type="text" class="form-control" value="<?php echo $dni?>" name="dniasegurado" id="dniasegurado" readonly/>
                        </div>

                        <div class="mb-1">
                            <p class="label-color mb-1">DNI*</p>
                            <input type="text" class="form-control" placeholder="DNI"  name = "dniFamiliar" id="dniFamiliar"/>
                        </div>
                      
                        <div class="mb-1">
                            <p class="label-color mb-1">Correo electronico*</p>
                            <input type="email" class="form-control" placeholder="Correo" name="email" id="email" required/>
                        </div>
                        <div class="mb-1">
                            <p class="label-color mb-1">Fecha nacimiento*</p>
                            <input type="date" class="form-control" placeholder="fecha" name="fecha" id="fecha" required/>
                        </div>
                        
                        <div class="mt-5">
                            <button class="btn btn-colors d-block w-100" type="submit" id="btnRegistrar">SIGUIENTE</button>
                        </div>
                    </form>
                    <?php } 
                    ?>
                       <script src="assets/js/registerFamiliarLogic.js?v=<?php echo time(); ?>"></script>
                </div>
                  
            </div>
        </div>
    </div>
 
        <!--Fotter-->
         <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- FontAwesome para iconos -->
        <script src="https://kit.fontawesome.com/57888ec9eb.js?v=<?php echo time(); ?>" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>
    </body>
</html>