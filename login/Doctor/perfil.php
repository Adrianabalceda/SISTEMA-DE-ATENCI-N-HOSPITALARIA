<?php
session_start();

if (!isset($_SESSION['datos_usuario']) || !$_SESSION['role'] == 'doctor') {
	header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Doctores | Perfil</title>

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

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<?php include '../src/Doctor.php'; ?>
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
							foreach ($conexion->query($consulta) as $doctor) {

							?>
								<ul>

									<li>
										<a href="#">

											<img src="https://thumbs.dreamstime.com/b/icono-p%C3%BArpura-fino-del-usuario-muestra-linear-de-la-pendiente-136856587.jpg" alt="">
											<h3><?php echo $doctor['nombres'];
												echo " ";
												echo $doctor['apellidos'];
												$cons = "SELECT nombre FROM especialidad WHERE id_especialidad = " . $doctor['id_especialidad'] . "";
												$f = mysqli_query($conexion, $cons);

												$especialidad = mysqli_fetch_array($f);
												?></h3>
											<p><?php echo $especialidad['nombre'];
												?></p>
										</a>
									</li>

								</ul>
							<?php } ?>
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
						<span class="user-name"><? echo $nombres;
												echo " ";
												echo $apellidos; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href=""><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href="../Doctor/ajustes.php"><i class="dw dw-settings2"></i>Ajustes</a>

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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Perfil</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Perfil</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Datos del Doctor</h4>
						</div>

					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Nombres: </label>
						<div class="col-sm-12 col-md-10">
							<input id="celular" class="form-control" value="<?php echo $nombres ?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Apellidos: </label>
						<div class="col-sm-12 col-md-10">
							<input id="celular" class="form-control" value="<?php echo $apellidos ?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">DNI: </label>
						<div class="col-sm-12 col-md-10">
							<input id="celular" class="form-control" value="<?php echo $id ?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Especialidad: </label>
						<div class="col-sm-12 col-md-10">
							<input id="celular" class="form-control" value="<?php echo $id_especialidad;
																			$sql = "SELECT nombre FROM especialidad WHERE id_especialidad = '$id_especialidad'";
																			$result = mysqli_query($conexion, $sql);
																			$especialidad = mysqli_fetch_array($result);
																			echo " | ", $especialidad[0] ?>" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Celular: </label>
						<div class="col-sm-12 col-md-10">
							<input id="celular" class="form-control" value="<?php echo $celular[0] ?>" readonly>
						</div>
					</div>



					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Correo: </label>
						<div class="col-sm-12 col-md-10">
							<input id="email" class="form-control" type="email" value="<?php echo $email[0] ?>" readonly>
						</div>
					</div>

					<div class="text-right">
						<a href="../Doctor/ajustes.php"><button class="btn btn-primary">Modificar Datos y/o Contraseña</button></a>
					</div>


				</div>

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