<?php
    session_start();

    if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='doctor') {
         header("Location: ../../login.php");
    }
        
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Medifind | Doctores</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>	
<?php include '../src/Doctor.php';?>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			
		
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<?php
							 $consulta = "SELECT * FROM doctor";
							 $fam = mysqli_query($conexion, $consulta);
							 
							 $doctor = mysqli_fetch_array($fam);
							 foreach ($conexion->query($consulta) as $doctor){
						  
																		 ?>
						<ul>

<li>
	<a href="#">

		<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" alt="">
		<h3><?php echo $doctor['nombres'];
		echo " "; 
		echo $doctor['apellidos'];
		$cons = "SELECT nombre FROM especialidad WHERE id_especialidad = ".$doctor['id_especialidad']."";
		$f = mysqli_query($conexion, $cons);
		
		$especialidad = mysqli_fetch_array($f);
		?></h3>
		<p><?php echo $especialidad['nombre'];
		?></p>
	</a>
</li>

</ul>
<?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" alt="">
						</span>
						<span class="user-name"><? echo $nombres; echo " "; echo $apellidos;?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="../Doctor/perfil.php"><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href="../Doctor/ajustes.php"><i class="dw dw-settings2"></i>Ajustes</a>
						
						<a class="dropdown-item" href="../src/cerrar_sesion.php"><i class="dw dw-logout"></i> Cerrar sesi??n</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="../../logo color/logo_white_large.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="">Inicio</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="internar.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Internar</span>
						</a>
					
					</li>
					<li class="dropdown">
						<a href="generar_cita_paciente.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Generar cita</span>
						</a>
					
					</li>
					<li>
						<a href="calendar.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Camillas</span>
						</a>
					</li>
					
					
					
					<li>
						<a href="retiro.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Retiro</span>
						</a>
					</li>
				
					<li>
						<div class="dropdown-divider"></div>
					</li>
					 
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Internar paciente</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Internar</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Internar paciente</h4>
							<p class="mb-30">Complete los siguientes campos</p>
							</div>
						
					</div>

					<form action="../src/internar.php" method="post" class="formulario"><div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Asegurado o familiar</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" id = "paciente" name="paciente">
								<option   selected>Seleccione</option>

									 
									<?php
									 $consulta = "SELECT * FROM familiar";
									 
									 $consulta2 = "SELECT * FROM asegurado";
									 
									
									 foreach ($conexion->query($consulta2) as $asegurado){
										
										?>  
											<option value="<?php echo $asegurado['id'];?>"><?php echo $asegurado['nombres'];echo " ";echo $asegurado['apellidos']; ?></option>
											<?php } 

									 foreach ($conexion->query($consulta) as $familiar){
										
								?>  
                                    <option value="<?php echo $familiar['id_familiar'];?>"><?php echo $familiar['nombres'];echo " ";echo $familiar['apellidos']; ?></option>
									<?php } ?>
                                </select>
								</div>
						</div>
						
						<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Camilla</label>
							<div class="col-sm-12 col-md-10">

								<select class="custom-select col-12" id = "cama" name="cama">

								
								<option selected>Seleccione</option>
									 
									<?php
									 $consulta = "SELECT id FROM cama WHERE estado = 'desocupada'";
									 
								
									 foreach ($conexion->query($consulta) as $cama){
										
										?>  
											<option value="<?php echo $cama['id'];?>"><?php echo $cama['id'];?></option>
											<?php  
} ?>
                                </select>
								</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Especialidad</label>
							<div class="col-sm-12 col-md-10">

								<select class="custom-select col-12" id = "especialidad" name="especialidad">



								<option selected>Seleccione</option>
                                    <option  input value="1">Medicina General</option>
                                    <option value="2">Cardiolog??a</option>
                                    <option value="3">Neurolog??a</option>
                                    <option value="4">Pediatr??a</option>
                                    <option value="5">Dermatolog??a</option>
									
								</select>
							</div>
							
						</div>
						
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Fecha</label>
							<div class="col-sm-12 col-md-10">

								<input class="form-control date-picker" placeholder="Seleccione la fecha" type="text" id = "fecha" name="fecha">


							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Hora</label>
							<div class="col-sm-12 col-md-10">

								<input class="form-control time-picker" placeholder="Seleccione la hora" type="text" id = "hora" name="hora">

								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Descripci??n</label>
							<div class="col-sm-12 col-md-10">

								<input class="form-control" placeholder="Describa la situaci??n" type="text" id = "descripcion" name="descripcion">

							
							</div>
						</div>
					
						<div class="text-right">

									
									<button class="btn btn-primary" type="submit" id="btnRegistrar">Registrar</button>

								</div>
					</form>
					
			
		</div>
	</div>


	<script src="../assets/js/internar.js?v=<?php echo time(); ?>"></script>
	<!--Fotter-->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js?v=<?php echo time(); ?>" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- FontAwesome para iconos -->
    <script src="https://kit.fontawesome.com/57888ec9eb.js?v=<?php echo time(); ?>" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11?v=<?php echo time(); ?>"></script>
	

	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>