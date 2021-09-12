<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Historial</title>
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
											<a href="<?php echo URL.'perfil_administrador';?>"> 
												<i class="zmdi zmdi-account"></i> Perfiles
											</a>
										</li>
										<li>
											<a href="<?php echo constant('URL'); ?>carreras">
												<i class="zmdi zmdi-graduation-cap"></i> Carreras
											</a>
										</li>
										<li>
											<a href="<?php echo constant('URL'); ?>planes">
												<i class="zmdi zmdi-library"></i> Planes
											</a>
										</li>
										<li>
											<a href="<?php echo constant('URL'); ?>asignaturas">
												<i class="zmdi zmdi-book"></i> Asignaturas
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
											<a href="<?php echo URL.'home/administrador';?>"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="<?php echo URL.'perfil_administrador';?>"><div class="op-navegador"><div class="navegadornombre">Perfil</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
                                        <li class="li-left indice-navegacion">
											<a href="<?php echo URL.'perfil_administrador/buscador/Todos';?>"><div class="op-navegador"><div class="navegadornombre">Buscador</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="#!"><div class="op-navegador"><div class="navegadornombre">Resultado <?php echo $this->usuario;?></div></div></a>
										</li>
										<li class="li-right">
											<a href="#!" class="btn-exit-system margen-navbar"><div class="espacio"><i></i>Cerrar sesión</div></a>
										</li>
										<li class="li-right">
											<a href="#!"><div><i class="zmdi zmdi-menu"></i></div></a>
										</li>
									</ul>
								
						        </nav>

				<!-- Contenido de pestaña-->

                <div class="pestaña-contenido">
					<section class="full-box">
						<div class="contenido">
                            <div class="contenido-box">
                <!-- Informacion - Inicio -->                
                <form class="container mt-3">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <div class="col">
                        <div class="row formcss">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col mt-3">
                                        <h4>Asignaturas</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                        if($this->resultado_asignaturas)
                                        {   
                                            foreach($this->resultado_asignaturas as $key => $value)
                                            {
                                                ?>
                                                    <div class="col-4 text-center">
                                                        <label>Carrera</label>
                                                        <input type="text" class="form-control form-control-sm text-center" disabled value="<?Php echo $this->resultado_asignaturas[$key]['Nom_Carrera']; ?>">
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <label>Asignatura</label>
                                                        <input type="text" class="form-control form-control-sm text-center" disabled value="<?Php echo $this->resultado_asignaturas[$key]['Nombre_Asig']; ?>">
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <label>Estatus</label>
                                                        <input type="text" class="form-control form-control-sm text-center" disabled value="<?Php echo $this->resultado_asignaturas[$key]['Estatus']; ?>">
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col mt-3">
                                        <h4>Historial</h4>
                                        <hr>
                                    </div>
                                </div>
                                <table class="table text-center">
                                <thead style="background: #00b6bf; color: #fff;">
                                    <tr>
                                        <th scope="col">Año</th>
                                        <th scope="col">Periodo</th>
                                        <th scope="col">Asignatura</th>
                                        <th scope="col">Carrera</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($this->resultado_historial)
                                    {
                                        foreach($this->resultado_historial as $key => $value)
                                        {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $this->resultado_historial[$key]['Anio'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_historial[$key]['Descripcion'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_historial[$key]['Nombre_Asig'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_historial[$key]['Nom_Carrera'];?>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                            <div class="row justify-content-end align-items-end mr-3" style="width:100px;">
                                <button type="submit" class="btn btn-primary " name="imp">Imprimir</button>
                            </div> 
                    </div>
                </div>
            </form>
            <br>
                <!-- Informacion - Fin -->                
                            </div>
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
