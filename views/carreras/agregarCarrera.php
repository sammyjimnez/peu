<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Carreras</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL;?>public/css/main.css">
	<link rel="shortcut icon" href="<?php echo URL;?>public/assets/img/upqroo.ico"> 
	
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
						<h1><i class="zmdi zmdi-view-dashboard"></i> Carrera, planes y asignaturas</h1>
					</div>
					<div class="col-9 col-sm-6 col-md-4 seccion-datos">
						<div class="datos-usuario datos-orientacion">
							<h2 class="nombre-usuario"><?php echo $session->get("nombre"); ?></h2>
							<h5 class="tipo-usuario"><?php echo $session->get("tipo");?></h5>
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
								<ul class="list-unstyled full-box dashboard-sideBar-Menu">
									<li class="seleccionar">
										<a href="<?php echo URL;?>carreras"> 
											<i class="zmdi zmdi-graduation-cap"></i>  Carrera
										</a>
									</li>
									<li>
										<a href="<?php echo URL;?>planes">
											<i class="zmdi zmdi-library"></i>  Planes académicos
										</a>
									</li>
									<li>
										<a href="<?php echo URL;?>asignaturas">
											<i class="zmdi zmdi-book"></i> Asignaturas
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
													<a href="home"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
												</li>
												<li class="li-left indice-navegacion">
													<a href="#!"><div class="op-navegador"><div class="navegadornombre">Módulo carrera, planes y asignaturas</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
												</li>
												<li class="li-left indice-navegacion">
													<a href="#!"><div class="op-navegador"><div class="navegadornombre">Carrera</div></div></a>
												</li>
												<li class="li-right">
													<a href="#!" class="btn-exit-system margen-navbar"><div class="espacio"><i></i>Cerrar sesión</div></a>
												</li>
												<li class="li-right">
													<a href=""><div><i class="zmdi zmdi-menu"></i></div></a>
													<ul>
													<li>
															<a href="<?php echo URL;?>carreras" style="text-decoration:none"><div class="espacio menu-opciones-plus"><i class="zmdi zmdi-edit"></i> Editar</div></a>
														</li>
														
														<li>
															<a href="<?php echo URL;?>asignaturas" style="text-decoration:none"><div class="espacio menu-opciones-plus"><i class="zmdi zmdi-plus-circle"></i> Agregar</div></a>
														</li>
													</ul>
												</li>
											</ul>
										
								</nav>
								

							
					

					<!-- Contenido de pestaña-->

					<div class="pestaña-contenido">
						<section class="full-box">
							<div class="contenido">
	
			
								<!-- Pestaña | contenido de sección-->

								<div class="pestaña-contenido">
									<section class="full-box">
										<div class="contenido">
				
						
											<!-- Pestaña | contenido de sección-->
										
											<div class="contenido-box">
												<div class="nombre-seccion">
													<h3><i class="zmdi zmdi-graduation-cap"></i> Carreras</h3>
												</div>
												<div class="descripcion-seccion">
													<p>En nuestra casa de estudios ofrecemos una gran variedad de licenciaturas (carreras), debido a que eres coordinador puedes visualizar o 
														actualizar información de la carrera.</p>
												</div>
				
												<div class="formulario-box">
											
													<form class="diseño-formulario" id="validacioncarreras" action="<?php echo constant('URL'); ?>carreras/registrarCarrera" method="POST">
														<div class="nombre-clasificación-formulario">
															<h4><i class="zmdi zmdi-info"></i> Información sobre la carrera</h4>
														</div>
															<div class="container-fluid">
				
																<!-- Input grupo carrera-->
				
																<div class= "row">
																	<div class="col-sm-12 col-md-12 ">
																		<div class="formulario__grupo" id="grupo__carrera">
																			<label for="usuario" class="formulario__label">Nombre de carrera</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="carrera" id="carrera" placeholder="Nombre oficial de la carrera" required>
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 50.</p>
																		</div>
																		
																	</div>
																</div>
				
				
																<!-- Input fecha de inicio-->
				
																<div class="row ">
																	<div class="col-sm-12 col-md-6">
																		<div class="formulario__grupo was-validated" id="grupo__fechainicio">
																			<label for="fechainicio" class="formulario__label">Fecha de inicio</label>
																			<div class="formulario__grupo-input">
																				<input type="date" class="formulario__input form-control" name="fechainicio" id="fechainicio" required>
					
																				<div class="invalid-feedback formulario__input-error">Elije una fecha de inicio</div>
																			</div>
																			
																		</div>
																	</div>
				
																	<!--Input fehca de termino-->
																	<div class="col-sm-12 col-md-6">
																		<div class="formulario__grupo" id="grupo__fechatermino">
																			<label for="fechatermino" class="formulario__label">Fecha de finalización</label>
																			<div class="formulario__grupo-input">
																				<input type="date" class="formulario__input form-control" name="fechatermino" id="fechatermino">
																			</div>
																			
																		</div>
																	</div>
				
																</div>
				
																<!--Input select grado académico-->
				
																<div class="row">
																	<div class="col-sm-12 col-md-6">
																		<div class="separacion-input was-validated">
																			<label class="nombre-campo" for="grado-academico">Grado académico</label>
																			<select class="form-select" name="graAcademico" required>
																				<option value="">Selecciona el grado académico</option>
																				<option value="1">Licenciatura</option>
																				<option value="2">Ingeniería</option>
																				<option value="3">Maestría</option>
																				<option value="4">Diplomado</option>
																			  </select>
																			  <div class="invalid-feedback formulario__input-error">Selecciona el grado académico de la carrera.</div>
																		</div>
																	</div>
																	<div class="col-sm-12 col-md-6">
																		<div class="separacion-input was-validated">
																			<label class="nombre-campo" for="situacion-carrera">Situación</label>
																			<select class="form-select" name="situacion" required>
																				<option value="">Selecciona la situación</option>
																				<option value="1">Vigente</option>
																				<option value="2">No vigente</option>
																			  </select>
																			  <div class="invalid-feedback formulario__input-error">Selecciona la situación actual de la carrera.</div>
																		</div>
																	</div>
				
																	
																</div>
				
				
				
																<!-- Input grupo coordinador-->
				
																<div class= "row">
																	<div class="col-sm-12 col-md-12 ">
																		<div class="formulario__grupo" id="grupo__coordinador">
																			<label for="usuario" class="formulario__label">Nombre del coordinador</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="coordinador" id="coordinador" placeholder="Nombre del coordinador" required>
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 75.</p>
																		</div>
																		
																	</div>
																</div>

																<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_carreras"  style="display: none">
																	<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
																</div>
				
																
																<div class="boton-dise">
																	<button class="btn btn-primary botonespacio" id="boton" type="submit">Actualizar información</button>
																</div>
															</div>
									
														</div>
														
													</form>
												</div>
								
										
									
											</div>
											
							
								

							</div>
						</section>
					</div>


					
			</div>
		</div>
				
	
	

	<!--Pie de página | Footer -->
		<footer class="vertical">
			<p>Av. Arco Bicentenario, Mza. 11, Lote 1119-33, SM. 255. Cancún, Quintana Roo, México. C.P. 77500 Tel. y Fax (998) 283 1859</p>
		</footer>


	<!--Scripts -->
	<script src="<?php echo URL;?>public/js/validador_carreras.js"></script>
	<script src="<?php echo URL;?>public/js/validador_planes.js"></script>
	<script src="<?php echo URL;?>public/js/validador_asignaturas_modal.js"></script>
	<script src="<?php echo URL;?>public/js/validador_asignaturas.js"></script>
	<script src="<?php echo URL;?>public/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL;?>public/js/sweetalert2.min.js"></script>
	<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo URL;?>public/js/material.min.js"></script>
	<script src="<?php echo URL;?>public/js/ripples.min.js"></script>
	<script src="<?php echo URL;?>public/js/jquery.mCustomScrollbar.concat2.min.js"></script>
	<script src="<?php echo URL;?>public/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!--<script>
		$.material.init();
	</script>-->
</body>
</html>