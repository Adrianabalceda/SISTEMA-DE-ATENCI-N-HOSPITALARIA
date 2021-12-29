<?php
            session_start();

            if(!isset($_SESSION['datos_usuario']) || !$_SESSION['role']=='asegurado') {
                header("Location: ../../login.php");
            }
        
        ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Medifind | Asegurados</title>

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
	
<?php include '../src/Asegurado.php';?>
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
							 $consulta = "SELECT * FROM familiar WHERE id_asegurado = ".$id."";
							 $fam = mysqli_query($conexion, $consulta);
							 
							 $familiar = mysqli_fetch_array($fam);
							 foreach ($conexion->query($consulta) as $familiar){
						  
																		 ?>
						<ul>

<li>
	<a href="#">

		<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" alt="">
		<h3><?php echo $familiar['nombres'];
		echo " "; 
		echo $familiar['apellidos'];
		
		?></h3>
		
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
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i>Ajustes</a>
						
						<a class="dropdown-item" href="../src/cerrar_sesion.php"><i class="dw dw-logout"></i> Cerrar sesión</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="../../logo color/logo_small_icon_only.png" alt="" class="dark-logo">
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
						<a href="internados.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Internados</span>
						</a>
					
					</li>
					<li class="dropdown">
						<a href="doctores.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Doctores</span>
						</a>
					
					</li>
					<li>
						<a href="citas_paciente.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Citas</span>
						</a>
					</li>
					
					
					
					<li>
						<a href="emergencia.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-ambulance"></span><span class="mtext">Emergencia</span>
						</a>

					</li>
					<li>
						<a href="enfermedades.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hospital"></span><span class="mtext">Enfermedades</span>
						</a>
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
								<h4>Enfermedades</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctores</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="card-box mb-30">
				<h2 class="h4 pd-20">Enfermedades a atender en el Hospital</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							
							
						
							<th>ID</th>
							<th>Nombre</th>
							<th>Especialidad</th>
							<th>Doctor</th>

						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							 $consulta = "SELECT * FROM enfermedad ";
							 $paci = mysqli_query($conexion, $consulta);
							 
							 $paciente = mysqli_fetch_array($paci);
							 foreach ($conexion->query($consulta) as $paciente){
						  
																		 ?>
							
							<td>
							<h5 class="font-16"><?php echo $paciente['id'];?></h5>
							</td>

							<td><?php echo $paciente['nombre'];
							
							?></td>
							
							<?php
							 $consulta = "SELECT nombre FROM especialidad WHERE id_especialidad= ".$paciente['especialidad']."";
							 $paci = mysqli_query($conexion, $consulta);

							 $paciente5 = mysqli_fetch_array($paci);
							
							?>
							
							<td><?php echo $paciente5['nombre'];
							
							
							?></td>
								<td><?php
							 $consulta = "SELECT nombres, apellidos FROM doctor WHERE id_especialidad = ".$paciente['especialidad']."";
							 $paci = mysqli_query($conexion, $consulta);

							 $paciente6 = mysqli_fetch_array($paci);
							echo $paciente6['nombres'].' '.$paciente6['apellidos'];
							
							?></td>
							
							
							
						
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
</body>
</html>