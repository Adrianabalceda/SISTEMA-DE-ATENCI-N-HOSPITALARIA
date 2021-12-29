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
	<title>Medind | Doctores</title>

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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
						<a class="dropdown-item" href=""><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href=""><i class="dw dw-settings2"></i>Ajustes</a>
						
						<a class="dropdown-item" href="../src/cerrar_sesion.php"><i class="dw dw-logout"></i> Cerrar sesión</a>
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
						<a href="chat.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
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
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img height="200" src="https://st3.depositphotos.com/10281604/15407/v/450/depositphotos_154078856-stock-illustration-male-doctor-avartar-icon-vector.jpg" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Bienvenido de nuevo <div class="weight-600 font-30 text-blue"><?php echo $nombres; echo ' '; echo $apellidos?></div>
						</h4>
						<p class="font-18 max-width-600">En este panel encontrarás ...</p>
					</div>
				</div>
			</div>
			
			
	
				<div class="card-box mb-30">
				<h2 class="h4 pd-20">Pacientes asegurados a cargo</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
						<th>img</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							
							<th>Enfermedad</th>
							<th>Estado</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							 $consulta = "SELECT * FROM asegurado_atender WHERE id_doctor= '$id'";
							 $paci = mysqli_query($conexion, $consulta);
							 
							 $paciente = mysqli_fetch_array($paci);
							 foreach ($conexion->query($consulta) as $paciente){
						  
																		 ?>
							<td class="table-plus">
								<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" width="70" height="70" alt="">
							</td>
						
						<?php
								$consulta = "SELECT * FROM asegurado WHERE id = ".$paciente['id_asegurado']."";
								$paci = mysqli_query($conexion, $consulta);
								$paciente5 = mysqli_fetch_array($paci);?>
							<td><?php echo $paciente5['nombres'];?></td>

							<td><?php echo $paciente5['apellidos'];?></td>
								<?php
								$consulta = "SELECT * FROM enfermedad WHERE id= ".$paciente['id_enfermedad']."";
								$paci = mysqli_query($conexion, $consulta);
								$paciente5 = mysqli_fetch_array($paci);?>
							<td><?php echo $paciente5['nombre'];?></td>

							<td><?php echo $paciente['estado'];?></td>
							<td></td>
							
						
						</tr>

						</tbody>
					<?php }?>
				</table>


				
				<div class="card-box mb-30">
				<h2 class="h4 pd-20">Pacientes familiares a cargo</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
						<th>img</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							
							<th>Enfermedad</th>
							<th>Estado</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							 $consulta = "SELECT * FROM familiar_atender WHERE id_doctor= '$id'";
							 $paci = mysqli_query($conexion, $consulta);
							 
							 $paciente = mysqli_fetch_array($paci);
							 foreach ($conexion->query($consulta) as $paciente){
						  
																		 ?>
							<td class="table-plus">
								<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" width="70" height="70" alt="">
							</td>
						
						<?php
								$consulta = "SELECT * FROM familiar WHERE id = ".$paciente['id_familiar']."";
								$paci = mysqli_query($conexion, $consulta);
								$paciente5 = mysqli_fetch_array($paci);?>
							<td><?php echo $paciente5['nombres'];?></td>

							<td><?php echo $paciente5['apellidos'];?></td>
								<?php
								$consulta = "SELECT * FROM enfermedad WHERE id= ".$paciente['id_enfermedad']."";
								$paci = mysqli_query($conexion, $consulta);
								$paciente5 = mysqli_fetch_array($paci);?>
							<td><?php echo $paciente5['nombre'];?></td>

							<td><?php echo $paciente['estado'];?></td>
							<td></td>
							
						
						</tr>

						</tbody>
					<?php }?>
				</table>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Medifind <a href="" target="_blank">G3</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>
</html>