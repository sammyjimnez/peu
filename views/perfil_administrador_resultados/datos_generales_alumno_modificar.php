

<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Datos Generales</title>
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
											<a href="<?php echo URL.'home/adminsitrador';?>"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
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
                <form class="container mt-3" action="<?php echo URL;?>perfil_administrador_resultados/update_alumno_generales" method="POST" enctype="multipart/form-data">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <div class="col">
                        <div class="row">
                            <div class="col mt-3">
                                <h4>Datos Generales</h4>
                                    <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Matricula</label>
                                        <input type="text" class="form-control" name="matricula" readOnly value="<?php echo $this->resultado_alumno['Matricula']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombres" required value="<?php echo $this->resultado_alumno['Nombres']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido paterno</label>
                                        <input type="text" class="form-control" name="ap_P" required value="<?php echo $this->resultado_alumno['Apellido_Paterno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido materno</label>
                                        <input type="text" class="form-control" name="ap_M" required value="<?php echo $this->resultado_alumno['Apellido_Materno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Carrera</label>
                                        <select name="carreras" id="" class="form-control">
                                            <?php
                                                if($this->carreras){
                                                    foreach($this->carreras as $i){
                                                        if($i['Nom_Carrera'] == $this->resultado_carrera['Nom_Carrera']){
                                                            ?>
                                                                <option value="<?Php echo $i['ID_Carrera']; ?>" selected><?Php echo $i['Nom_Carrera']; ?></option>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <option value="<?Php echo $i['ID_Carrera']; ?>"><?Php echo $i['Nom_Carrera']; ?></option>
                                                            <?php 
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Estatus</label>
                                        <select name="estatus" id="" class="form-control">
                                            <?php
                                                $array_estatus = ["Activo","Baja","Temporal","Egresado"];

                                                for ($i=0; $i < count($array_estatus); $i++) { 
                                                    if($array_estatus[$i] == $this->resultado_alumno['Estauts']){
                                                        ?>
                                                            <option value="<?Php echo $array_estatus[$i]; ?>" selected><?Php echo $array_estatus[$i]; ?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <option value="<?Php echo $array_estatus[$i]; ?>"><?Php echo $array_estatus[$i]; ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 imageform">
                                <img src="<?php echo URL;?>public/assets/fotos/<?php echo $this->resultado_alumno['Imagen']; ?>" class="rounded-circle z-depth-1-half avatar-pic image-fluid" width="200" alt="example placeholder avatar">
                                <div>
                                    <input type="button" class="btn-primary rounded" onclick="type='file'" accept="image/jpeg,image/jpg,image/png" value="Seleccionar" name="imagen">
                                </div>
                            </div>

                            <div class="col-6">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" required name="nacimiento"  value="<?php echo $this->resultado_generales['Fecha_Nac']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Pais</label>
                                <select name="paises" id="" class="form-control">
                                    <?php
                                        if($this->paises){
                                            foreach($this->paises as $i){
                                                if($i['Nombre'] == $this->resultado_pais['Nombre']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Pais']; ?>" selected><?Php echo $i['Nombre']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Pais']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select>                                
                            </div>
                            <div class="col-6">
                                <label>Estado</label>
                                <select name="estados" id="" class="form-control">
                                    <?php
                                        if($this->estados){
                                            foreach($this->estados as $i){
                                                if($i['Nombre'] == $this->resultado_estado['Nombre']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Estado']; ?>" selected><?Php echo $i['Nombre']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Estado']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Municipio</label>
                                <select name="municipios" id="" class="form-control">
                                    <?php
                                        if($this->municipios){
                                            foreach($this->municipios as $i){
                                                if($i['Nombre'] == $this->resultado_municipio['Nombre']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Municipio']; ?>" selected><?Php echo $i['Nombre']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Municipio']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>CURP</label>
                                <input type="text" class="form-control" name="curp" required maxlength="18"  value="<?php echo $this->resultado_generales['CURP']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Plan de estudios</label>
                                <select name="plan_estudio" id="" class="form-control">
                                    <?php
                                        if($this->planes_estudios){
                                            foreach($this->planes_estudios as $i){
                                                if($i['Clave_Oficial'] == $this->resultado_plan_estudio['Clave_Oficial']){
                                                    ?>
                                                        <option value="<?Php echo $i['Clave']; ?>" selected><?Php echo $i['Clave_Oficial']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['Clave']; ?>"><?Php echo $i['Clave_Oficial']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Periodo de ingreso</label>
                                <select name="periodo_ingreso" id="" class="form-control">
                                    <?php
                                        if($this->periodos){
                                            foreach($this->periodos as $i){
                                                if($i['Descripcion'] == $this->resultado_descripcion_periodo_ingreso['Descripcion'] && $i['Anio'] == $this->resultado_id_descripcion_periodo_ingreso['Anio']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Periodo']; ?>" selected><?Php echo $i['Descripcion']. " ".$i['Anio']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Periodo']; ?>"><?Php echo $i['Descripcion']. " ".$i['Anio']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Periodo actual</label>
                                <select name="periodo_actual" id="" class="form-control">
                                    <?php
                                        if($this->periodos){
                                            foreach($this->periodos as $i){
                                                if($i['Descripcion'] == $this->resultado_descripcion_periodo_actual['Descripcion'] && $i['Anio'] == $this->resultado_id_descripcion_periodo_actual['Anio']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Periodo']; ?>" selected><?Php echo $i['Descripcion']. " ".$i['Anio']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Periodo']; ?>"><?Php echo $i['Descripcion']. " ".$i['Anio']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Creditos</label>
                                <input type="number" class="form-control"  value="<?php echo $this->resultado_alumno['Creditos_Acumulados']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Estado civil</label>
                                    <select name="estado_civil" id="" class="form-control">
                                        <?php
                                            $array_estados_civil = ["SOLTERO","CASADO","DIVORCIADO","SEPARACION EN PROCESO JUDICIAL", "VIUDO","CONCUBINATO"];

                                            for ($i=0; $i < count($array_estados_civil); $i++) { 
                                                if($array_estados_civil[$i] == $this->resultado_generales['Estado_Civil']){
                                                    ?>
                                                        <option value="<?Php echo $array_estados_civil[$i]; ?>" selected><?Php echo $array_estados_civil[$i]; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $array_estados_civil[$i]; ?>"><?Php echo $array_estados_civil[$i]; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" maxlength="13" name="rfc" required  value="<?php echo $this->resultado_generales['RFC']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Tipo de ingreso</label>
                                <select name="tipo_ingreso" id="" class="form-control">
                                    <?php
                                        if($this->tipos_ingresos){
                                            foreach($this->tipos_ingresos as $i){
                                                if($i['Nombre'] == $this->resultado_ingreso['Nombre']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Ingreso']; ?>" selected><?Php echo $i['Nombre']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Ingreso']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Grupo</label>
                                <select name="grupo" id="" class="form-control">
                                    <?php
                                        if($this->grupos){
                                            foreach($this->grupos as $i){
                                                if($i['Clave'] == $this->resultado_grupo['Clave']){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Grupos']; ?>" selected><?Php echo $i['Clave']; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Grupos']; ?>"><?Php echo $i['Clave']; ?></option>
                                                    <?php 
                                                }
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Genero</label>
                                    <select name="genero" id="" class="form-control">
                                        <?php
                                            $array_generos = ["HOMBRE","MUJER","NO ESPECIFICADO"];

                                            for ($i=0; $i < count($array_generos); $i++) { 
                                                if($array_generos[$i] == $resultado_generales['Genero']){
                                                    ?>
                                                        <option value="<?Php echo $array_generos[$i]; ?>" selected><?Php echo $array_generos[$i]; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="<?Php echo $array_generos[$i]; ?>"><?Php echo $array_generos[$i]; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" name="inf_alumno">Guardar</button>
                            <a href="<?php echo URL;?>perfil_administrador_resultados/alumno/<?php echo $this->usuario."/Generales";?>" class="btn btn-danger">Cancelar</a>
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

