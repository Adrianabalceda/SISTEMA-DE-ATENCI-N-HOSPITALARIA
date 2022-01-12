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
	<title>Medind | Asegurados</title>

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
					<i class="icon-copy ion-ios-people"  ></i>
					
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
		<p><?php echo $familiar['id_familiar'];
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
						<a class="dropdown-item" href="../Asegurado/perfil.php"><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href="../Asegurado/ajustes.php"><i class="dw dw-settings2"></i>Ajustes</a>
						
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
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img height="200" src="https://static.vecteezy.com/system/resources/previews/002/991/843/non_2x/doctor-patient-checkup-vector.jpg" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Bienvenido asegurado <div class="weight-600 font-30 text-blue"><?php echo $nombres; echo ' '; echo $apellidos?></div>
						</h4>
						<p class="font-18 max-width-600">En este panel encontrará una variedad de opciones referentes a su cuenta...</p>
					</div>
				</div>
			</div>
			
			
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Citas programadas para usted</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							
						<th>Fecha</th>
							<th>Hora</th>
							<th>Nombres</th>
							
							<th>Apellidos</th>
							<th>Especialidad</th>
							<th>Doctor</th>
							
							
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							 $consulta = "SELECT * FROM cita_paciente_doctor WHERE id_asegurado= '$id'";
							 $paci = mysqli_query($conexion, $consulta);
							 
							 $paciente = mysqli_fetch_array($paci);
							 foreach ($conexion->query($consulta) as $paciente){
						  
																		 ?>
							
							<td>
							<h5 class="font-16"><?php echo $paciente['fecha'];?></h5>
							</td>
							<td><?php echo $paciente['hora'];?></td>
							<td><?php echo $nombres;?></td>
							<td><?php echo $apellidos;?></td>
							
							<td><?php echo $paciente['id_especialidad']; ?></td>
							<?php
							 $consulta = "SELECT nombres,apellidos FROM doctor WHERE id= ".$paciente['id_especialidad']."";
							 $paci = mysqli_query($conexion, $consulta);
							 $paciente = mysqli_fetch_array($paci);
							
							?> </td>
							
							<td><?php echo $paciente['nombres']; echo ' '; echo $paciente['apellidos'];?></td>

							
							
						
						</tr>
						
						
					</tbody>
					<?php }?>
				</table>
			</div>

			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Citas programadas para sus familiares</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							
							
							<th>Fecha</th>
							<th>Hora</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Doctor</th>
							<th>Especialidad</th>
						

							
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
							 $consulta = "SELECT * FROM cita_familiar_doctor WHERE id_familiar IN (SELECT id_familiar from familiar WHERE id_asegurado = ".$id.")";
							 $paci = mysqli_query($conexion, $consulta);
							 
							 $paciente = mysqli_fetch_array($paci);
							 foreach ($conexion->query($consulta) as $paciente){
						  	 ?>
							
							<td>
							<h5 class="font-16"><?php echo $paciente['fecha'];?></h5>
							</td>
							<td><?php echo $paciente['hora'];
							$consulta2 = "SELECT nombres,apellidos FROM familiar WHERE id= ".$paciente['id_familiar']."";
							$paci5 = mysqli_query($conexion, $consulta2);

							$paciente5 = mysqli_fetch_array($paci5);
							
							?></td>
							<td><?php echo $paciente5['nombres'];?></td>
							<td><?php echo $paciente5['apellidos'];
							 $consulta = "SELECT nombres,apellidos FROM doctor WHERE id= ".$paciente['id_especialidad']."";
							 $paci = mysqli_query($conexion, $consulta);

							 $paciente4 = mysqli_fetch_array($paci);
							
							?></td>
							
							<td><?php echo $paciente4['nombres']; echo ' '; echo $paciente4['apellidos'];
							
							
							?></td>
							
							<td><?php echo $paciente['id_especialidad']; ?></td>
							
						
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