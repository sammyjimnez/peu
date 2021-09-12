<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Asignaturas</title>
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
									<li>
										<a href="<?php echo URL;?>planes">
											<i class="zmdi zmdi-library"></i>  Planes académicos
										</a>
									</li>
									<li class="seleccionar">
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
							<div class="contenido-box">
								<div class="nombre-seccion">
									<h3><i class="zmdi zmdi-book"></i> Asignaturas</h3>
								</div>
								<div class="descripcion-seccion">
									<p>Visualiza, actualiza y agrega asignaturas de la carrera.</p>
								</div>

								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="input-group pb-4 pt-1 buscador">
											<input type="text" class="form-control" placeholder="Buscar asignatura por clave" aria-label="Recipient's username" aria-describedby="button-addon2">
											<button class="btn btn-primary" type="button" id="button-addon2"><i class="zmdi zmdi-search"></i> Buscar</button>
										  </div>
									</div>
								</div>

								<div class="formulario-box">
									<form class="diseño-formulario" id="validacion_asignatura" action="<?php echo constant('URL'); ?>asignaturas/registroAsignatura" method="POST">
										
											<div class="container-fluid">
											
												<div class="nombre-clasificación-formulario">
													<h4><i class="zmdi zmdi-info"></i> Información de la asignatura</h4>
												</div>

												<!-- Input clave asignatura-->

												<div class= "row">
													<div class="col-sm-12 col-md-4 col-lg-2">
														<div class="formulario__grupo" id="grupo__claveasignatura">
															<label for="claveasignatura" class="formulario__label">Clave</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="claveasignatura" id="claveasignatura" placeholder="Clave" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede tener letras, numeros y guiones, maximo 20 caracteres.</p>
														</div>
														
													</div>

													<!-- Input nombre asignatura-->
													<div class="col-sm-12 col-md-8 col-lg-5">
														<div class="formulario__grupo" id="grupo__nombreasignatura">
															<label for="usuario" class="formulario__label">Nombre de la asignatura</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="nombreasignatura" id="nombreasignatura" placeholder="Nombre de la signatura" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
														
													</div>

													<!-- Input nombre corto de la asignatura-->
													<div class="col-sm-12 col-md-12 col-lg-5">
														<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
															<label for="usuario" class="formulario__label">Nombre corto de asignatura</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="nombrecortoasignatura" id="nombrecortoasignatura" placeholder="Nombre corto de la asignatura" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, números y guiones, máximo 30 caracteres.</p>
														</div>
														
													</div>
												</div>

												<!-- Input créditos-->

												<div class= "row">
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__creditoasignatura">
															<label for="claveasignatura" class="formulario__label">Créditos</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="creditoasignatura" id="creditoasignatura" placeholder="Créditos" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo número y maximo 3 caracteres.</p>
														</div>
														
													</div>

													<!-- Input horas teóricas-->
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horasteoricas">
															<label for="horasteoricas" class="formulario__label">Horas teóricas</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control monto"  onkeyup="sumahorastotales();" name="horasteoricas" id="horasteoricas" placeholder="Horas teóricas" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>

													<!-- Input horas prácticas-->
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horaspracticas">
															<label for="horaspracticas" class="formulario__label">Horas prácticas</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control monto" onkeyup="sumahorastotales();" name="horaspracticas" id="horaspracticas" placeholder="Horas prácticas" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>

													<!--Input horas totales-->

													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horastotales">
															<label for="horastotales" class="formulario__label">Hora totales</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="horastotales" id="horastotales" placeholder="Horas totales" required readonly>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>
												</div>

												<!-- Input plan académico-->

												<div class= "row">
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__planacademico">
															<label for="planacademico" class="formulario__label">Plan académico</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="planacademico" id="planacademico" placeholder="Plan académico" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, numero y guiones, maximo 20 caracteres.</p>
														</div>
														
													</div>

													<!--Manual de unidad-->
													<div class="col-sm-12 col-md-6 col-lg-9">
														<div class="formulario__grupo" id="grupo__manual">
															<label for="usuario" class="formulario__label">Manual de asignatura</label>
															<div class="formulario__grupo-input">
																<div class="input-group was-validated">
																	<input type="file" class="form-control" aria-label="file example" accept="application/pdf" name="manual" required disabled>
																	<div class="invalid-feedback">Selecciona el manual de la asignatura.</div>
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
														<div class="formulario__grupo" id="grupo__caracterizacion">
															<label for="caracterizacion" class="formulario__label">Caracterización</label>
															<div class="formulario__grupo-input">
																<textarea class="formulario__input form-control" id="caracterizacion" name="caracterizacion" rows="3" required disabled></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>

													<!-- Text area intuición didáctica-->
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="formulario__grupo" id="grupo__intuicion">
															<label for="intuicion" class="formulario__label">Intuición didáctica</label>
															<div class="formulario__grupo-input">
																<textarea class="form-control" id="intuicion" name="intuicion" rows="3" required disabled></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>

													<!-- Text area competencia específica de la asignatura-->
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="formulario__grupo" id="grupo__competencia">
															<label for="usuario" class="formulario__label">Competencias específicas</label>
															<div class="formulario__grupo-input">
																<textarea class="form-control" id="competencia" name="competencia" rows="3" required disabled></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>													
												</div>


												<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_asignaturas"  style="display: none">
													<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
												</div>
												<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" id="alerta_asignaturas_nounidad"  style="display: none">
													<strong>Oops!</strong> No hay unidades agregadas a esta asignatura. ¡Agrega las que sea necesarias!
												</div>

												<div class="boton-dise linea_A pb-4">
													<button class="btn btn-primary botonespacio" id="boton" style="display:none" type="submit">Actualizar información</button>
													<button class="btn btn-primary botonespacio" id="boton_agregar" style="display:none" type="submit">Agregar nueva asignatura</button>
													<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" id="alerta_agrega_unidad" style="display: none;" >
														<strong>¡Advertencia!</strong> Recuerda agregar las unidades de la asignatura.
													</div>
												</div>

												<fieldset disabled class="bloqueo_unidades">
													<div class="alert alert-success alert-dismissible fade show mt-2" role="alert" id="alerta_ahora_agregar" style="display: none">
														<strong>¡Asignatura agregada!</strong> Ahora agregue las unidades.
													</div>


												<!--Contenidos de la asignatura-->

												<div class="nombre-clasificación-formulario">
													<h4><i class="zmdi zmdi-folder"></i> Contenidos de la asignaturas</h4>
												</div>

												<div class="row">
													<!-- Input unidades de la materia-->
													<div class="col-sm-12 col-md-3 col-lg-3">
														<div class="formulario__grupo" id="grupo__unidades">
															<label for="unidades" class="formulario__label">Unidades</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="unidades" id="unidades" placeholder="0" required readonly>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
														
													</div>

													<!-- boton agregar unidad-->
													<div class="col-sm-12 col-md-9 col-lg-9">
														<div class="formulario__grupo d-grid" id="grupo__nombrecortoasignatura">
															<label for="usuario" class="formulario__label">¡Agrega nuevas unidades!</label>
															<button type="button" class="btn btn-primary" onclick="cantidadunidades(), quitarmensajeunidades(), agregarunidad()"  disabled id="nuevaunidad" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="zmdi zmdi-plus-circle"></i> Agregar unidad</button>
														</div>
														
													</div>
												</div>

												<div class="table-responsive">
													<table class="table table-striped colortr" class="text-center">
														<thead>
														  <tr>
															<th class="text-center" scope="col">Unidad</th>
															<th scope="col">Descripción</th>
															<th scope="col">Sub</th>
															<th scope="col">Descripción</th>
															<th scope="col">Competencias genéricas</th>
															<th scope="col">Actividades de aprendizaje</th>
															<th scope="col">Opciones</th>
															
														  </tr>
														</thead>
														<tbody id="tabla">
														  <tr class="colortr" >
															<th class="text-center" scope="row">1</th>
															<td >Interacción inicial a las mateméticas discretas</td>
															<td>Números reales</td>
															<td>No hay descripción</td>
															<td>El alumno realizará procedimientos matemáticos para la aplicación de números reales</td>
															<td>Operaciones, resolución de problemas matéticos</td>
															<td style="text-align: center"><button class="btn btn-danger btn-sm"onclick="actualizarunidad()" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-edit"></i></button></td>
														  </tr>
														  <tr class="colortr" >
															<th class="text-center" scope="row">2</th>
															<td >Interacción inicial a las mateméticas discretas</td>
															<td>Números reales</td>
															<td>No hay descripción</td>
															<td>El alumno realizará procedimientos matemáticos para la aplicación de números reales</td>
															<td>Operaciones, resolución de problemas matéticos</td>
															<td style="text-align: center"><button class="btn btn-danger btn-sm"  onclick="actualizarunidad()" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="zmdi zmdi-edit"></i></button></td>
														  </tr>
														  
														</tbody>
														<tfoot>
															<tr>
																<th class="text-center" scope="col">Unidad</th>
																<th scope="col">Descripción</th>
																<th scope="col">Sub</th>
																<th scope="col">Descripción</th>
																<th scope="col">Competencias genéricas</th>
																<th scope="col">Actividades de aprendizaje</th>
																<th scope="col">Opciones</th>
															  </tr>
														</tfoot>
													  </table>
									
													</div>
												</div>

												</fieldset>

												
											</div>
					
										</div>
									</form>

									
								</div>
							</div>

							<!--Inicio de modal-->

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
								  <div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title info-asignatura" id="exampleModalLabel"> Unidad 1</h5>
									  <button type="button" onclick="cerrarunidad()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									 <form id="validacion_modalunidades">
										<div class="container">
											<div class="row">
												<!--Input unidad-->
													<div class="col-sm-12 col-md-4">
														<div class="formulario__grupo" id="grupo__numerounidad">
															<label for="numerounidad" class="formulario__label">Unidad</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control" rows="2" name="numerounidad" id="numerounidad" placeholder="Unidad" required readonly></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
													</div>
												<!--Input descripción-->
													<div class="col-sm-12 col-md-8">
															<div class="formulario__grupo" id="grupo__descripcion1">
																<label for="numerounidad" class="formulario__label">Descripción</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="descripcion1" id="descripcion1" placeholder="Descripción" required></textarea>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
															</div>
													</div>
											</div>

											<div class="row">
												<!--Input sub-->
													<div class="col-sm-12 col-md-6">
														<div class="formulario__grupo" id="grupo__sub">
															<label for="sub" class="formulario__label">Sub</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control"  rows="2" name="sub" id="sub" placeholder="Sub" required></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
													</div>
												<!--Input descripción-->
													<div class="col-sm-12 col-md-6">
															<div class="formulario__grupo" id="grupo__descripcion2">
																<label for="numerounidad" class="formulario__label">Descripción</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="descripcion2" id="descripcion2" placeholder="Descripción" required></textarea>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
															</div>
													</div>
											</div>

											<div class="row">
												<!--Input competencias genéricas-->
													<div class="col-sm-12 col-md-6">
														<div class="formulario__grupo" id="grupo__competenciasgenericas">
															<label for="competenciasgenericas" class="formulario__label">Competencias genéricas</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control" rows="2" name="competenciasgenericas" id="competenciasgenericas" placeholder="competenciasgenericas" required></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
													</div>
												<!--Input actividades de aprendizaje-->
													<div class="col-sm-12 col-md-6">
															<div class="formulario__grupo" id="grupo__actividades">
																<label for="actividades" class="formulario__label">Actividades de aprendizaje</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="actividades" id="actividades" placeholder="Actividades de aprendizaje" required></textarea>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
															</div>
													</div>
											</div>

											<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_modal"  style="display: none">
												<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
											</div>
										</div>
									 </form>
									</div>
									<div class="modal-footer">
									  <button type="button" onclick="cerrarunidad()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
									  <button type="submit" form="validacion_modalunidades" style="display:none" class="btn btn-primary" id="agregar_unidad">Agregar unidad</button>
									  <button type="submit" form="validacion_modalunidades" style="display:none" class="btn btn-primary" id="actualizar_unidad">Actualizar información</button>
									</div>
								  </div>
								</div>
							  </div>
							<!--Fin de modal-->


						</div>
					</section>
				</div>
			</div>
			</div>
		</div>
	</section>
	
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
	<!--<script>
		$.material.init();
	</script>-->
</body>
</html>