<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Perfil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL;?>public/css/main.css">
	<link rel="shortcut icon" href="<?php echo URL;?>public/assets/img/upqroo.ico"> 

    

    <link href="<?php echo URL;?>public/css/style_perfil.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<!--Banner informativa de plataforma | Logo, nombre de módulo, Usuario y tipo de usuario-->
	<header >
		<section class="bannerinfo caja-full">
			<div class="container-fluid caja-full">
				<div class="row centrarvertical caja-full">
					<div class="col-3 col-sm-6 col-md-4 seccion-logo">
						<div class="logo logo-orientacion">
							<div class="logo-nombre ">
								<p>Plataforma Educativa Universitaria</p>
							</div>
						</div>
					</div>

					<div class="col-md-4 nombre-plan">
						<h1><i class="zmdi zmdi-view-dashboard"></i> Perfil</h1>
					</div>
					<div class="col-9 col-sm-6 col-md-4 seccion-datos">
						<div class="datos-usuario datos-orientacion">
							<h2 class="nombre-usuario"><?php echo $session->get("nombre"); ?></h2>
							<h5 class="tipo-usuario"><?php echo $session->get("tipo"); ?></h5>
						</div>
					</div>
				</div>
			</div>
	</section>
	</header>
	


	<!--Sección de contenido de página | Menú de hamburguesa e información de pestaña-->
	<section class="seccionmaster">
		<div class="contenedormaster">

			<!-- Menú de hamburguesa | MCPA -->
				
			<div class="cover dashboard-sideBar">
					<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
						<div class="full-box dashboard-sideBar-ct">
							<!-- Opciones del menú de hamburguesa | MCPA -->
							<div class="caja-menu centrarvertical">
								
									<ul class="list-unstyled full-box dashboard-sideBar-Menu menu-menu">
				
										<li class="seleccionar">
											<a href="<?php echo URL.'perfil_docente';?>"> 
												<i class="zmdi zmdi-account"></i> Perfiles
											</a>
										</li>
										<li>
											<a href="#">
												<i class="zmdi zmdi-calendar"></i> Periodos
											</a>
										</li>
										<li>
											<a href="#">
												<i class="zmdi zmdi-accounts"></i> Grupos
											</a>
										</li>
										<li>
											<a href="#">
												<i class="zmdi zmdi-time"></i> Horarios
											</a>
										</li>
										<li>
											<a href="#">
												<i class="zmdi zmdi-border-color"></i> Evaluación docente
											</a>
										</li>
									</ul>
								
							</div>
						</div>
				    </div>

			<!-- Barra de navegación | Opciones de pestaña-->

			<div class="dashboard-contentPage full-box">
		
				<!-- NavBar | Barra de navegación -->
					
								<!-- NavBar -->
								<nav class="dashboard-Navbar">
									
									<ul class="submenu list-unstyled">
										<li class="li-left">
											<a href="#!"><div class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="<?php echo URL.'home/docente';?>"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="#!"><div class="op-navegador"><div class="navegadornombre">Perfil</div></div></a>
										</li>
										<li class="li-right">
											<a href="#!" class="btn-exit-system margen-navbar"><div class="espacio"><i></i>Cerrar sesión</div></a>
										</li>
									</ul>
								
						        </nav>

				<!-- Contenido de pestaña-->
                <!-- Informacion - Inicio -->
                <div class="container mt-5" style="background-color: #f6f6f7;">
                <div class="row" align="center">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body mt-1">
                                <a href="<?Php echo URL; ?>perfil_docente/datos_generales" >
                                    <img src="<?php echo URL;?>public/assets/img/datos.png" class="img-fluid" width="100" height="100" align="center">
                                    <p></p>
                                 </a>
                                <h4 class="card-title mt-3">Datos generales</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body mt-1">
                                <a href="<?Php echo URL; ?>perfil_docente/contacto">
                                    <img src="<?php echo URL;?>public/assets/img/contacto.png" class="img-fluid" width="100" height="100" align="center">
                                    <p></p>
                                </a>
                                <h4 class="card-title mt-3">Contacto y Servicio Medico</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body mt-1">
                                <a href="<?Php echo URL; ?>perfil_docente/datos_laborales">
                                    <img src="<?php echo URL;?>public/assets/img/datos_laborales.png" class="img-fluid" width="100" height="100" align="center">
                                    <p></p>
                                </a>
                                <h4 class="card-title mt-3">Datos laborales</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body mt-1">
                                <a href="<?Php echo URL; ?>perfil_docente/documentos">
                                    <img src="<?php echo URL;?>public/assets/img/documentos.png" class="img-fluid" width="100" height="100" align="center">
                                    <p></p>
                                </a>
                                <h4 class="card-title mt-3">Documentos</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <div class="card">
                            <div class="card-body mt-1">
                                <a href="<?Php echo URL; ?>perfil_docente/historial">
                                    <img src="<?php echo URL;?>public/assets/img/historial.png" class="img-fluid" width="100" height="100" align="center">
                                    <p></p>
                                </a>
                                <h4 class="card-title mt-3">Historial</h4>
                            </div>
                        </div>
                    </div>
					<div class="col-sm-3">
                            <br>
                            <div class="card">
                                <div class="card-body mt-1">
                                    <a href="<?php echo URL.'perfil_docente/cuenta';?>">
                                        <img src="<?php echo URL;?>public/assets/img/datos.png" class="img-fluid" width="100" height="100" align="center">
                                        <p></p>
                                    </a>
                                    <h4 class="card-title mt-3">Cuenta</h4>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                <!-- Informacion - Fin -->
			</div>
			</div>
		</div>
	</section>

	<!--Pie de página | Footer -->
		<footer class="vertical">
			<p>Av. Arco Bicentenario, Mza. 11, Lote 1119-33, SM. 255. Cancún, Quintana Roo, México. C.P. 77500 Tel. y Fax (998) 283 1859</p>
		</footer>

	<!--Scripts -->
	<script src="<?php echo URL;?>public/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL;?>public/js/sweetalert2.min.js"></script>
	<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo URL;?>public/js/material.min.js"></script>
	<script src="<?php echo URL;?>public/js/ripples.min.js"></script>
	<script src="<?php echo URL;?>public/js/main.js"></script>
    <script src="<?php echo URL;?>public/js/script_perfil.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
