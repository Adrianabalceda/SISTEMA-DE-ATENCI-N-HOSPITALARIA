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
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
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
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i>Perfil</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i>Ajustes</a>
						
						<a class="dropdown-item" href="../src/cerrar_sesion.php"><i class="dw dw-logout"></i> Cerrar sesión</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
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
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Camillas</span>
						</a>
					
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Internar</span>
						</a>
					
					</li>
					<li>
						<a href="calendar.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Calendario</span>
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
					<li>
						<div class="sidebar-small-cap">Extra</div>
					</li>
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
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
								<h4>Chat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Chat</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="bg-white border-radius-4 box-shadow mb-30">
					<div class="row no-gutters">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="chat-list bg-light-gray">
								<div class="chat-search">
									<span class="ti-search"></span>
									<input type="text" placeholder="Search Contact">
								</div>
								<div class="notification-list chat-notification-list customscroll">
									<ul>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-green"></i> online</p>
											</a>
										</li>
										<li class="active">
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-green"></i> online</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-green"></i> online</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-warning"></i> active 5 min</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-warning"></i> active 4 min</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-warning"></i> active 3 min</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<h3 class="clearfix">John Doe</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="chat-detail">
								<div class="chat-profile-header clearfix">
									<div class="left">
										<div class="clearfix">
											<div class="chat-profile-photo">
												<img src="vendors/images/profile-photo.jpg" alt="">
											</div>
											<div class="chat-profile-name">
												<h3>Rachel Curtis</h3>
												<span>New York, USA</span>
											</div>
										</div>
									</div>
									<div class="right text-right">
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												Setting
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Export Chat</a>
												<a class="dropdown-item" href="#">Search</a>
												<a class="dropdown-item text-light-orange" href="#">Delete Chat</a>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-box">
									<div class="chat-desc customscroll">
										<ul>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="chat-footer">
										<div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
										<div class="chat_text_area">
											<textarea placeholder="Type your message…"></textarea>
										</div>
										<div class="chat_send">
											<button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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