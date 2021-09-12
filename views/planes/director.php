<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Planes académicos</title>
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
									<li>
										<a href="<?php echo URL;?>carreras"> 
											<i class="zmdi zmdi-graduation-cap"></i>  Carrera
										</a>
									</li>
									<li class="seleccionar">
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
													<a href="#!"><div><i class="zmdi zmdi-menu"></i></div></a>
													<ul>
														<li>
															<a onclick="activarinput()"><div class=espacio><i class="zmdi zmdi-edit"></i> Editar</div></a>
														</li>
														<li>
															<a onclick="agregar()"><div class=espacio><i class="zmdi zmdi-plus-circle"></i> Agregar</div></a>
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
													<h3><i class="zmdi zmdi-library"></i></i> Planes académicos</h3>
												</div>
												<div class="descripcion-seccion">
													<p>Visualiza, actualiza y agrega asignaturas  según el programa de la carrera, procura ser cuidadoso con la información para no tener 
														problemas a largo plazo.</p>
												</div>

												<div class="row justify-content-center">
													<div class="col-md-12">
														<div class="input-group pb-4 pt-1 buscador">
															<input type="text" class="form-control" placeholder="Buscar plan por clave" aria-label="Recipient's username" aria-describedby="button-addon2">
															<button class="btn btn-primary" type="button" id="button-addon2"><i class="zmdi zmdi-search"></i> Buscar</button>
														  </div>
													</div>
												</div>
				
												<div class="formulario-box">
													<form class="diseño-formulario" id="validacionplanes" >
														<div class="nombre-clasificación-formulario">
															<h4><i class="zmdi zmdi-info"></i> Información de plan académico</h4>
														</div>
															<div class="container-fluid">
				
																<!-- Input grupo carrera-->
				
																<div class= "row">
																	<div class="col-sm-12 col-md-12 ">
																		<div class="formulario__grupo" id="grupo__carrera">
																			<label for="usuario" class="formulario__label">Nombre de carrera</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="carrera" id="carrera" placeholder="Nombre oficial de la carrera" required disabled>
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																		</div>
																		
																	</div>
																</div>
				
				
																<!-- Input plan académico-->
				
																<div class="row ">
																	<div class="col-sm-12 col-md-6">
																		<div class="formulario__grupo" id="grupo__plan">
																			<label for="plan" class="formulario__label">Plan académico</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="plan" id="plan" placeholder="Plan académico" required disabled>
																				
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracter tipo letra y maximo de 1 en mayúsculas.</p>
																		</div>
																	</div>
				
																	<!--Input clave oficial-->
																	<div class="col-sm-12 col-md-6">
																		<div class="formulario__grupo" id="grupo__claveoficial">
																			<label for="claveoficial" class="formulario__label">Clave oficial</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="claveoficial" id="claveoficial" placeholder="Clave oficial del plan académico" required disabled>
																				
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracteres tipo alfanumérico y un máximo de 10.</p>
																		</div>
																	</div>
				
																</div>
				
																<!-- Input periodo duración-->
				
																<div class="row ">
				
																	<div class="col-sm-12 col-md-6 col-lg-4">
																		<div class="formulario__grupo" id="grupo__periododuracion">
																			<label for="periododuracion" class="formulario__label">Periodo de duración</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="periododuracion" id="periododuracion" placeholder="Periodo de duración" required disabled>
																				
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracter tipo numérico y un maximo de 2.</p>
																		</div>
																	</div>
				
																	<!-- Input créditos totales-->
				
																	<div class="col-sm-12 col-md-6 col-lg-4">
																		<div class="formulario__grupo" id="grupo__creditostotales">
																			<label for="creditostotales" class="formulario__label">Créditos totales</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="creditostotales" id="creditostotales" placeholder="Créditos totales" required disabled>
																				
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracter tipo numérico y un maximo de 3.</p>
																		</div>
																	</div>
				
																	<!--Input periodo máximo-->
																	<div class="col-sm-12 col-md-12 col-lg-4">
																		<div class="formulario__grupo" id="grupo__periodomaximo">
																			<label for="periodomaximo" class="formulario__label">Periodo máximo</label>
																			<div class="formulario__grupo-input">
																				<input type="text" class="formulario__input form-control" name="periodomaximo" id="periodomaximo" placeholder="Periodo máximo" required disabled>
																				
																			</div>
																			<p class="formulario__input-error">Solo puede contener caracter tipo numérico y un maximo de 2.</p>
																		</div>
																	</div>
				
																</div>
				
																
				
																<div class="nombre-clasificación-formulario">
																	<h4><i class="zmdi zmdi-book"></i> Asignaturas</h4>
																</div>
				
																<div class="table-responsive tablapadding">
																	<table id="example" class="table table-striped color-tabla" style="width:100%">
																		
																			<thead>
																				<tr>
																					<th>Clave</th>
																					<th>Asignatura</th>
																					<th>Créditos</th>
																					<th>Unidades</th>
																					<th>Horas totales</th>
																					<th style="text-align: center" data-orderable="false"><i class="zmdi zmdi-settings"></i> Opciones </th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Mat_Discre</td>
																					<td>Matemáticas discretas</td>
																					<td>6</td>
																					<td>3</td>
																					<td>120</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>POO_IS23</td>
																					<td>Programación orientada a objetos</td>
																					<td>8</td>
																					<td>4</td>
																					<td>140</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Progr-Web12</td>
																					<td>Programación web</td>
																					<td>6</td>
																					<td>3</td>
																					<td>140</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>sistm_21</td>
																					<td>Sistemas digitales</td>
																					<td>2</td>
																					<td>2</td>
																					<td>100</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Arqui_soft12</td>
																					<td>Arquitectura de software</td>
																					<td>8</td>
																					<td>4</td>
																					<td>150</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Moviles-2</td>
																					<td>Programación para móviles 2</td>
																					<td>6</td>
																					<td>3</td>
																					<td>170</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Ciencias-V54</td>
																					<td>Ciencias naturales</td>
																					<td>4</td>
																					<td>2</td>
																					<td>120</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Progr-Web12</td>
																					<td>Perreo intenso I</td>
																					<td>6</td>
																					<td>3</td>
																					<td>140</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Arqui_soft12</td>
																					<td>Arquitectura de software</td>
																					<td>8</td>
																					<td>4</td>
																					<td>150</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Moviles-2</td>
																					<td>Programación para móviles 2</td>
																					<td>6</td>
																					<td>3</td>
																					<td>170</td>
																					<td style="text-align: center"><a href="asignaturas.html" class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				<tr>
																					<td>Ciencias-V54</td>
																					<td>Ciencias naturales</td>
																					<td>4</td>
																					<td>2</td>
																					<td>120</td>
																					<td style="text-align: center"><a href="asignaturas.html"  class="btn btn-danger btn-sm editar-boton"><i class="zmdi zmdi-edit"></i></a><button class="btn btn-primary btn-sm"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-eye"></i></button></td>
																				</tr>
																				
																			</tbody>
																			<tfoot>
																				<tr>
																					<th>Clave</th>
																					<th>Asignatura</th>
																					<th>Créditos</th>
																					<th>Unidades</th>
																					<th>Horas totales</th>
																					<th style="text-align: center" data-orderable="false"><i class="zmdi zmdi-settings"></i> Opciones </th>
																				</tr>
																			</tfoot>
																		
																	</table>
				
									
																</div>

																<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_planes"  style="display: none">
																	<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
																</div>

																<div class="boton-dise">
																	<button class="btn btn-primary botonespacio" id="boton" style="display:none" type="submit">Actualizar información</button>
																	<button class="btn btn-primary botonespacio" id="boton_agregar" style="display:none" type="submit">Agregar plan</button>
																</div>
															</div>
									
														</div>
														
													</form>

													<!--Aqui inicia el modal de ver asignaturas-->

													<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
														<div class="modal-content">
															<div class="modal-header">
															<h5 class="modal-title info-asignatura" id="exampleModalLabel"><i class="zmdi zmdi-book"></i> Asignaturas</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
															<!--aqui inicia formulario-->
															<form>
																<div class="modalnombre-clasificación-formulario">
																	<h4><i class="zmdi zmdi-info"></i> Información de la asignatura</h4>
																</div>
																<div class="">
																		<!-- Input clave asignatura-->

																		<div class= "row">
																			<div class="col-sm-12 col-md-4 col-lg-2">
																				<div class="formulario__grupo" id="grupo__claveasignatura">
																					<label for="claveasignatura" class="formulario__label">Clave</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="claveasignatura" id="claveasignatura" placeholder="Clave" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input nombre asignatura-->
																			<div class="col-sm-12 col-md-8 col-lg-5">
																				<div class="formulario__grupo" id="grupo__nombreasignatura">
																					<label for="usuario" class="formulario__label">Nombre de la asignatura</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombreasignatura" id="nombreasignatura" placeholder="Nombre de la signatura" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input nombre corto de la asignatura-->
																			<div class="col-sm-12 col-md-12 col-lg-5">
																				<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
																					<label for="usuario" class="formulario__label">Nombre corto de asignatura</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombrecortoasignatura" id="nombrecortoasignatura" placeholder="Nombre corto de la asignatura" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>
																		</div>

																		<!-- Input créditos-->
																		<div class= "row">
																			<div class="col-sm-12 col-md-6 col-lg-3">
																				<div class="formulario__grupo" id="grupo__creditoasignatura">
																					<label for="claveasignatura" class="formulario__label">Créditos</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="claveasignatura" id="claveasignatura" placeholder="Créditos" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input nombre asignatura-->
																			<div class="col-sm-12 col-md-6 col-lg-3">
																				<div class="formulario__grupo" id="grupo__nombreasignatura">
																					<label for="usuario" class="formulario__label">Horas teóricas</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombreasignatura" id="nombreasignatura" placeholder="Horas teóricas" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input nombre corto de la asignatura-->
																			<div class="col-sm-12 col-md-6 col-lg-3">
																				<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
																					<label for="usuario" class="formulario__label">Horas practicas</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombrecortoasignatura" id="nombrecortoasignatura" placeholder="Horas practicas" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<div class="col-sm-12 col-md-6 col-lg-3">
																				<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
																					<label for="usuario" class="formulario__label">Hora totales</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombrecortoasignatura" id="nombrecortoasignatura" placeholder="Horas totales" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>
																		</div>

																		<!-- Input plan académico-->

																		<div class= "row">
																			<div class="col-sm-12 col-md-6 col-lg-3">
																				<div class="formulario__grupo" id="grupo__creditoasignatura">
																					<label for="claveasignatura" class="formulario__label">Plan académico</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="claveasignatura" id="claveasignatura" placeholder="Plan académico" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input unidades de la materia-->
																			<div class="col-sm-12 col-md-6 col-lg-2">
																				<div class="formulario__grupo" id="grupo__nombreasignatura">
																					<label for="usuario" class="formulario__label">Unidades</label>
																					<div class="formulario__grupo-input">
																						<input type="text" class="formulario__input form-control" name="nombreasignatura" id="nombreasignatura" placeholder="Unidades" required readonly>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>

																			<!-- Input nombre corto de la asignatura-->
																			<div class="col-sm-12 col-md-12 col-lg-7">
																				<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
																					<label for="usuario" class="formulario__label">Manual de asignatura</label>
																					<div class="formulario__grupo-input">
																						<div class="d-grid">
																							<a href="https://www.proturbiomarspa.com/files/_pdf-prueba.pdf" download="Manual_Asignatura.pdf" class="btn btn-primary btn-block"><i class="zmdi zmdi-download"></i> Descargar manual</a>
																						</div>
																						
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>
																		</div>

																		<!--Objetivos de la materia-->

																		<div class="nombre-clasificación-formulario">
																			<h4><i class="zmdi zmdi-check-circle"></i> Objetivos de la asignatura</h4>
																		</div>

																		<!-- Text area caracterización-->

																		<div class= "row">
																			<div class="col-sm-12 col-md-12 col-lg-12">
																				<div class="formulario__grupo" id="grupo__creditoasignatura">
																					<label for="claveasignatura" class="formulario__label">Caracterización</label>
																					<div class="formulario__grupo-input">
																						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required readonly></textarea>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>
																			<!-- Text area intuición didáctica-->
																			<div class="col-sm-12 col-md-12 col-lg-12">
																				<div class="formulario__grupo" id="grupo__nombreasignatura">
																					<label for="usuario" class="formulario__label">Intuición didáctica</label>
																					<div class="formulario__grupo-input">
																						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required readonly></textarea>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>
																			<div class="col-sm-12 col-md-12 col-lg-12">
																				<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
																					<label for="usuario" class="formulario__label">Competencias específicas</label>
																					<div class="formulario__grupo-input">
																						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required readonly></textarea>
																						<i class="formulario__validacion-estado zmdi zmdi-check-circle"></i>
																					</div>
																					<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
																				</div>
																				
																			</div>	
																		</div>

																		<!--Contenidos de la asignatura-->

																		<div class="nombre-clasificación-formulario">
																			<h4><i class="zmdi zmdi-folder"></i> Contenidos de la asignaturas</h4>
																		</div>

																		<div class="table-responsive">
																			<table class="table table-striped colortr">
																				<thead>
																				<tr>
																					<th scope="col">Unidad</th>
																					<th scope="col">Descripción</th>
																					<th scope="col">Sub</th>
																					<th scope="col">Descripción</th>
																					<th scope="col">Competencias genéricas</th>
																					<th scope="col">Actividades de aprendizaje</th>
																				</tr>
																				</thead>
																				<tbody>
																				<tr class="colortr">
																					<th scope="row" class="text-center">1</th>
																					<td>Interacción inicial a las mateméticas discretas</td>
																					<td>Números reales</td>
																					<td>No hay descripción</td>
																					<td>El alumno realizará procedimientos matemáticos para la aplicación de números reales</td>
																					<td>Operaciones, resolución de problemas matéticos</td>
																				</tr>
																				<tr>
																					<th scope="row" class="text-center">2</th>
																					<td>Interacción inicial a las mateméticas discretas</td>
																					<td>Números reales</td>
																					<td>No hay descripción</td>
																					<td>El alumno realizará procedimientos matemáticos para la aplicación de números reales</td>
																					<td>Operaciones, resolución de problemas matéticos</td>
																				</tr>
																				<tr>
																					<th scope="row" class="text-center">3</th>
																					<td>Interacción inicial a las mateméticas discretas</td>
																					<td>Números reales</td>
																					<td>No hay descripción</td>
																					<td>El alumno realizará procedimientos matemáticos para la aplicación de números reales</td>
																					<td>Operaciones, resolución de problemas matéticos</td>
																				</tr>
																				</tbody>
																			</table>
																		</div>
																		
																		
																	</div>
																</form>
																<!--aqui inicia formulario-->
																</div>
																<div class="modal-footer">
																<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
																</div>
															</div>
															</div>
														</div>

													<!--Aqui termina el modal de ver asignaturas-->

															
				
													
				
				
													
				
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
	<script type="text/javascript" src="./datatables/datatables.min.js"></script> 
	<script type="text/javascript" src="./js/data.js"></script>  
</body>
</html>