<?php include 'includes/header.php' ?>

    <?php
        session_start();

        if(isset($_SESSION['datos_usuario'])) {
            header('Location: index.php');
        }
    ?>

    <main>
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
            <div class="col-md-7 min-h-100vh d-flex align-items-center my-5 my-md-0">
                <div class="container ">
                    <div id="volver" class="d-flex align-items-center mb-5 pointer d-none">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.8627 2.225L8.37936 0.75L0.137695 9L8.3877 17.25L9.8627 15.775L3.0877 9L9.8627 2.225Z" fill="#8692A6"/>
                        </svg>
                
                        <p class="mb-0 ms-2 text-secondary">Volver</p>
                    </div>
                    <div class="container mx-lg-5" id="containerLoginPageRight">
                    <center>    
                    <div>
                            <h5 class="fw-bold fs-4" id="titleLoginPage">¡Bienvenido!</h5>
                            <p class="text-secondary" id="textLoginPage">Para comenzar este viaje, seleccione el tipo de cuenta a ingresar</p>
                        </div>
                    </center>  
                        <div class="row mx-auto" id="containerBtnRoles">
                            <div href="#" id="btnAsegurado" class="d-block shadow box-pre-login pointer bg-2nd text-decoration-none text-black rounded border-sacns-ge p-2 d-flex align-items-center mt-4 col-lg-10">
                                <div class="bg-1st p-3 pb-2 ms-2 me-4 polygon">
                                    <i class="far fa-user fs-5 text-white"></i>
                                </div>
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <div>
                                        <p class="fw-bold mb-0">ASEGURADO</p>
                                        <p class="text-secondary fs-6">Cuenta para pacientes registrados en la base de datos de Medifind, esta cuenta estará a cargo del titular del seguro.</p>
                                    </div>
                                    <div class="pe-3 d-none arrow">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.58927 0.577574C7.26383 0.252137 6.73619 0.252137 6.41075 0.577574C6.08532 0.903011 6.08532 1.43065 6.41075 1.75609L10.8215 6.16683H1.16668C0.70644 6.16683 0.333344 6.53993 0.333344 7.00016C0.333344 7.4604 0.70644 7.8335 1.16668 7.8335H10.8215L6.41075 12.2442C6.08532 12.5697 6.08532 13.0973 6.41075 13.4228C6.73619 13.7482 7.26383 13.7482 7.58927 13.4228L13.4226 7.58942C13.748 7.26398 13.748 6.73634 13.4226 6.41091L7.58927 0.577574Z" fill="#2EBD59"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div href="#" id="btnDoctor" class="d-block shadow box-pre-login pointer bg-2nd text-decoration-none text-black rounded border-sacns-ge p-2 d-flex align-items-center mt-4 col-lg-10">
                                <div class="bg-1st p-3 pb-2 ms-2 me-4 polygon">
                                    <i class="fas fa-suitcase fs-5 text-white"></i>
                                </div>
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <div>
                                        <p class="fw-bold mb-0">DOCTOR</p>
                                        <p class="text-secondary fs-6">Cuenta de un doctor perteneciente al hospital.</p>
                                    </div>
                                    <div class="pe-3 d-none arrow">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.58927 0.577574C7.26383 0.252137 6.73619 0.252137 6.41075 0.577574C6.08532 0.903011 6.08532 1.43065 6.41075 1.75609L10.8215 6.16683H1.16668C0.70644 6.16683 0.333344 6.53993 0.333344 7.00016C0.333344 7.4604 0.70644 7.8335 1.16668 7.8335H10.8215L6.41075 12.2442C6.08532 12.5697 6.08532 13.0973 6.41075 13.4228C6.73619 13.7482 7.26383 13.7482 7.58927 13.4228L13.4226 7.58942C13.748 7.26398 13.748 6.73634 13.4226 6.41091L7.58927 0.577574Z" fill="#2EBD59"/>
                                        </svg>
                                    </div> 
                                </div>
                            </div>
                            <div href="#" id="btnAdmin" class="d-block shadow box-pre-login pointer bg-2nd text-decoration-none text-black rounded border-sacns-ge p-2 d-flex align-items-center mt-4 col-lg-10">
                                <div class="bg-1st p-3 pb-2 ms-2 me-4 polygon">
                                    <i class="fas fa-wrench fs-5 text-white"></i>
                                </div>
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <div>
                                        <p class="fw-bold mb-0">ADMINISTRADOR</p>
                                        <p class="text-secondary fs-6">Cuenta administrativa.</p>
                                    </div>
                                    <div class="pe-3 d-none arrow">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.58927 0.577574C7.26383 0.252137 6.73619 0.252137 6.41075 0.577574C6.08532 0.903011 6.08532 1.43065 6.41075 1.75609L10.8215 6.16683H1.16668C0.70644 6.16683 0.333344 6.53993 0.333344 7.00016C0.333344 7.4604 0.70644 7.8335 1.16668 7.8335H10.8215L6.41075 12.2442C6.08532 12.5697 6.08532 13.0973 6.41075 13.4228C6.73619 13.7482 7.26383 13.7482 7.58927 13.4228L13.4226 7.58942C13.748 7.26398 13.748 6.73634 13.4226 6.41091L7.58927 0.577574Z" fill="#2EBD59"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <form method="POST" class="d-none formulario" action="src/autenticacion.php">
                            <input type="hidden" name="frmname" id="frmname" value=""/>
                            <div class="mb-4">
                                <p class="label-color">ID</p>
                                <input type="text" class="form-control" placeholder="ID" id="id" name="id"/>
                            </div>
                            <div class="mb-5">
                                <p class="label-color">Contraseña*</p>
                                <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" />
                            </div>
                            <div class="mt-5">
                                <input type="submit" class="btn btn-colors d-block w-100" value="INGRESAR" id="btnIngresar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <script src="assets/js/loginLogic.js?v=<?php echo time(); ?>"></script>
<?php include 'includes/footer.php' ?>