<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Buscador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL;?>public/css/main.css">
	<link rel="shortcut icon" href="<?php echo URL;?>public/assets/img/upqroo.ico"> 

    <link href="<?php echo URL;?>public/css/style_perfil.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo URL;?>public/css/buscador_perfil.css">
	
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
											<a href="<?php echo URL.'perfil_administrativo';?>"> 
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
											<a href="<?php echo URL.'home/administrativo';?>"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="<?php echo URL.'perfil_administrativo';?>"><div class="op-navegador"><div class="navegadornombre">Perfil</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="#!"><div class="op-navegador"><div class="navegadornombre">Buscador</div></div></a>
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

                <form  class="content-buscador">
                <div class="linea-buscador">
                    <img src="<?php echo URL;?>public/assets/img/search.png" alt="Icono_Buscador" class="logob" />
                    <p class="titulobuscador">Buscador de perfiles</p>
                </div>
                <hr>
                <div>
                    <p>Ingrese los datos del usuario a buscar. Puede usar nombres, matrículas o números de Control para
                        buscar: Alumnos, Docentes, o Directores
                        de carrera.
                    </p>
                    <input type="search" class="textb" name="buscar" id="buscar" value="<?php echo $this->buscar;?>">
                    <select name="perfil" id="perfil" >
                        <?php
                        $array_values = array("Alumnos", "Docentes","Directores","Perfiles");
                        $array_options = array("Alumnos", "Docentes","Directores","Todos");
                        $total_perfiles = 4;
                        for ($i=1; $i <= $total_perfiles; $i++) { 
                            if($this->perfil == $array_values[$i-1])
                            {
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>" selected> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>"> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <select name="carrera" id="carrera">
                    <?php
                        $array_values = ["Carreras", "Ingeniería Software","Ingenieria en biomedica","Ingenieria en biotecnologia", "Financiera","Terapia Fisica","Licenciatura en Pymes"];
                        $array_options = ["Todos", "Software","Biomedica","Biotecnologia", "Financiera","Terapia Fisica","Licenciatura en Pymes"];
                        $total_carreras = 7;
                        for ($i=1; $i <= $total_carreras; $i++) { 
                            if($this->carrera == $array_values[$i-1])
                            {
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>" selected> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>"> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="button" class="buttonb" value="Buscar" onclick="buscar_administrativo();">
                </div>
            </form>
            <br>
            <p class="text-resultados text-center">Resultados: <?php echo $this->total_registros;?></p>
            <div class="container cuadroresultado">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <!-- TARGETA -->
                    <?php
                        if($this->buscador_resultados){
                            for ($i=$this->inicio_pagina; $i < $this->fin_pagina ; $i++) { 
                                if($i <= ($this->total_registros-1)){
                                    ?>
                                        <div class="col" id="">
                                            <div class="element">
                                                <div class="sameline">
                                                    <p class="matricula"> <?php echo $this->buscador_resultados[$i]['ID']?> </p>
                                                    <p class="tipouser"> <?php echo $this->buscador_resultados[$i]['Perfil']?> </p>
                                                </div>
                                                <p class="name"> <?php echo $this->buscador_resultados[$i]['Nombres'].' '.$this->buscador_resultados[$i]['apP'].' '.$this->buscador_resultados[$i]['apM']; ?> </p>
                                                <label>Seccion: </label> 
                                                <select name="seccion" id="seccion<?php echo $i;?>">
                                                <?php
                                                    if($this->buscador_resultados[$i]['Perfil'] == "Alumno")
                                                    {
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Procedencia">Procedencia</option>
                                                            <option value="Adicionales">Adicionales</option>
                                                            <option value="Documentos">Documentos</option>
                                                            <?php
                                                    }else if($this->buscador_resultados[$i]['Perfil'] == "Docente"){
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Laborales">Datos laborales</option>
                                                            <option value="Documentos">Documentos</option>
                                                            <option value="Historial">Historial</option>
                                                        <?php                                                                
                                                    }
                                                    else if($this->buscador_resultados[$i]['Perfil'] == "Director"){
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Documentos">Documentos</option>
                                                        <?php                                                                
                                                    }
                                                ?>
                                                </select>
                                                <div class="botones text-right mt-3">
                                                    <?php
                                                        if($this->buscador_resultados[$i]['Perfil'] == "Alumno")
                                                        {
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionAlumno(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir" onclick="pdfAlumno(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                            <?php
                                                        }else if($this->buscador_resultados[$i]['Perfil'] == "Docente"){
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionDocente(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir">
                                                            <?php
                                                        }else if($this->buscador_resultados[$i]['Perfil'] == "Director"){
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionDirector(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir" onclick="">
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                    <!-- TARGETA -->
                </div>
                <!-- PAGINACION -->
                <div class="row my-2">
                    <div class="col-10">
                        <nav aria-label=" ">
                            <ul class="pagination">
                                <?php
                                    if($this->pagina !=1){
                                        ?>
                                            <li class="page-item"><a class="page-link" href="<?php echo URL."perfil_administrativo/buscador/".$this->buscar.'/'.$this->perfil.'/'.$this->carrera.'/'.($this->pagina-1);?>">Previous</a></li>
                                        <?php
                                    }else if($this->pagina == 1){
                                        ?>
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        <?php   
                                    }
                                    if($this->pagina < $this->total_paginas){
                                        ?>
                                            <li class="page-item"><a class="page-link" href="<?php echo URL."perfil_administrativo/buscador/".$this->buscar.'/'.$this->perfil.'/'.$this->carrera.'/'.($this->pagina+1);?>">Next</a></li>
                                        <?php
                                    }else if($this->pagina == $this->total_paginas){
                                        ?>
                                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Imprimir todos</button>
                    </div>
                </div>
                <!-- PAGINACION -->
            </div>

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
