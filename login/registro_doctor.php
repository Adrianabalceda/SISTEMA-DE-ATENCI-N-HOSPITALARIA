<?php
    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='admin') {
        header("Location: login.php");
    }
    include 'includes/header.php'
?>

<body>
       

<div class="row">
       
       <div class="col-md-5 p-5 fst-quote-container text-white min-h-100vh">

       <div class="d-flex align-items-center">
               <img class= "a" width="200" height="60" src="../logo color/logo_small.png"></i>
             
           </div>


           <div class="text-quote-login">
               <div>
                   <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M31.9297 0.632812C33.5703 0.632812 34.3906 0.960938 34.3906 1.61719C34.3906 1.89844 34.1328 2.13281 33.6172 2.32031C29.3047 4.05469 27.1484 7.42969 27.1484 12.4453C27.8047 12.3516 28.2734 12.3047 28.5547 12.3047C34.1797 12.3047 36.9922 15.1172 36.9922 20.7422C36.9922 26.3203 34.1797 29.1094 28.5547 29.1094C22.0391 29.1094 18.7812 25.5234 18.7812 18.3516C18.7812 10.6172 21.8984 5.0625 28.1328 1.6875C29.4453 0.984375 30.7109 0.632812 31.9297 0.632812ZM13.5781 0.84375C15.2188 0.84375 16.0391 1.17188 16.0391 1.82812C16.0391 2.10938 15.7812 2.34375 15.2656 2.53125C10.9531 4.26563 8.79688 7.64063 8.79688 12.6562C9.45312 12.5625 9.92188 12.5156 10.2031 12.5156C15.8281 12.5156 18.6406 15.3281 18.6406 20.9531C18.6406 26.5312 15.8281 29.3203 10.2031 29.3203C3.6875 29.3203 0.429688 25.7344 0.429688 18.5625C0.429688 10.8281 3.54688 5.27344 9.78125 1.89844C11.0938 1.19531 12.3594 0.84375 13.5781 0.84375Z" fill="#DDDDDD"/>
                   </svg>
                   <p class="pt-4 px-5 lh-lg mb-0">
                       El Hospital San Juan pone a disposición de sus asegurados la plataforma Medifind a fin de priorizar la salud de sus asegurados.</p>
                   <div class="float-end">
                       <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M21 0H33.5V33H0V20.5H21V0Z" fill="white"/>
                       </svg>
                   </div>
               </div>

               <div class="d-flex align-items-center mt-5 px-5">
                   <p class="mb-0">Director General</p>
                   
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
                    
                            <a href = "registro_tipo_usuario.php" class="mb-0 ms-2 text-secondary"> Volver </a>
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
                        <div>
                            <h5 class="fw-bold fs-4" id="titleLoginPage">Datos del doctor</h5>
                        </div>
                        <form role="form" action="src/registro_doctor_logic.php" method="POST" class="formulario">
                            <div class="form-group">
                              <label for="full_name">Nombres:</label>
                              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Juan carlos">
                            </div>

                            <div class="form-group">
                              <label for="full_name">Apellidos:</label>
                              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Torres Cano">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Telefono:</label>
                                <input type="tel" class="form-control" id="celular" placeholder="+51  123-456-789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required name="celular">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo:</label>
                                <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email">
                            </div>
                            <div class="form-group">
                                <label for="DNI">DNI:</label>
                                <input type="tel" class="form-control" id="dni" placeholder="28844275" name="dni">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Especialidad :</label> 
                                <select class="form-select" aria-label="Default select example" name="especialidad" id="especialidad">
                                    <option selected>Seleccione</option>
                                    <option value="1">Medicina General</option>
                                    <option value="2">Cardiología</option>
                                    <option value="3">Neurología</option>
                                    <option value="4">Pediatría</option>
                                    <option value="5">Dermatología</option>
                                </select>
                            </div>
                            <div  class = " mt-5 " >
                            <button  class = " btn btn-colors d-block w-100 " type = " submit " id="btnRegistrar"> Registrar </button>
                        </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/registerDoctorLogic.js?v=<?php echo time(); ?>"></script>
        <!--Fotter-->
         <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- FontAwesome para iconos -->
        <script src="https://kit.fontawesome.com/57888ec9eb.js?v=<?php echo time(); ?>" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>
    </body>
</html>