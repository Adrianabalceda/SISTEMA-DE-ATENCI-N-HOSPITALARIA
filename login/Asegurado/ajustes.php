<?php
session_start();

if (!isset($_SESSION['datos_usuario']) || !$_SESSION['role'] == 'asegurado') {
	header("Location: ../../login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Medind | Ajustes</title>

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

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>

	<?php include '../src/Asegurado.php'; ?>
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
						<span class="user-name"><? echo $nombres;
												echo " ";
												echo $apellidos; ?></span>
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Ajustes</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Ajustes</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Modificar Datos</h4>
							<p class="mb-30">Modifique los datos que desee.</p>
						</div>

					</div>
					<form role="form" action="/login/src/editar_datos_asegurado_logic.php" method="POST" class="formulario">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Celular*: </label>
							<div class="col-sm-12 col-md-10">
								<input id="celular" class="form-control" placeholder="999999999" type="tel" pattern="[9]{1}[0-9]{8}" value="<?php echo $celular[0] ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Correo*: </label>
							<div class="col-sm-12 col-md-10">
								<input id="email" class="form-control" placeholder="ejemplo@gmail.com" type="email" pattern="^\w+{2,3}$@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" value="<?php echo $email[0] ?>" size="30" required>
							</div>
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" id="btnModificarDatos">Modificar</button>
						</div>
					</form>


				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Modificar Contraseña</h4>
						</div>

					</div>
					<form role="form" action="/login/src/editar_contra_doctor_logic.php" method="POST" class="formulario">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contraseña actual*: </label>
							<div class="col-sm-12 col-md-10">
								<input id="contrasena_old" class="form-control" name="contrasena" maxlength="16" type="password" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contraseña nueva*: </label>
							<div class="col-sm-12 col-md-10">
								<input id="contrasena_new" class="form-control" name="contrasena_new" minlength="6" maxlength="16" type="password" autocomplete="off" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Repita la nueva contraseña*: </label>
							<div class="col-sm-12 col-md-10">
								<input id="contrasena_repeat" class="form-control" name="contrasena_repeat" minlength="6" maxlength="16" type="password" autocomplete="off" required>
							</div>
						</div>

						<div class="text-right">
							<button class="btn btn-primary" type="submit" id="btnModificarContra">Modificar</button>
						</div>
					</form>


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