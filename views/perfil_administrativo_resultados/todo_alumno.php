
<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title><?php echo $this->usuario;?></title>
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
											<a href="<?php echo URL.'perfil_administrativo/buscador/Todos';?>"><div class="op-navegador"><div class="navegadornombre">Buscador</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
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
                        <!-- DATOS DEL ALUMNO -->
                        <div class="row">
                            <div class="col mt-3">
                                <h4>Datos del Alumno</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Matricula</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Matricula']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Nombres']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido paterno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Apellido_Paterno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido materno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Apellido_Materno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Carrera</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_carrera['Nom_Carrera']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Estatus</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Estatus']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 imageform">
                                <img class="rounded-circle z-depth-1-half avatar-pic image-fluid" src="<?php echo URL;?>public/assets/fotos/<?php echo $this->resultado_alumno['Imagen']; ?>" width="200" alt="example placeholder avatar">
                            </div>
                            <div class="col-6">
                                <label>Plan de estudios</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_plan_estudio['Clave_Oficial']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Periodo de ingreso</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_descripcion_periodo_ingreso['Descripcion'].' '.$this->resultado_id_descripcion_periodo_ingreso['Anio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Periodo actual</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_descripcion_periodo_actual['Descripcion'].' '.$this->resultado_id_descripcion_periodo_actual['Anio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Creditos</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Creditos_Acumulados']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Tipo de ingreso</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_ingreso['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Grupo</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_grupo['Clave']; ?>">
                            </div>
                        </div>
                        <br>
                        <!-- DATOS GENERALES -->
                        <div class="row">
                            <div class="col">
                                <h4>Datos generales</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">      
                            <div class="col-6">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" disabled value="<?php echo $this->resultado_generales['Fecha_Nac'] ?>">
                            </div>
                            <div class="col-6">
                                <label>Pais</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_pais['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Estado</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_estado['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Municipio</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_municipio['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>CURP</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['CURP']; ?>">
                            </div>

                            <div class="col-6">
                                <label>Estado civil</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['Estado_Civil']; ?>">
                            </div>
                            <div class="col-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['RFC']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Genero</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['Genero']; ?>">
                            </div>
                        </div>   
                        <br>
                        <!-- CONTACTO -->
                        <div class="row">
                            <div class="col">
                                <h4>Datos de contacto</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-12">
                                <label>Dirección</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Domicilio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Telefono fijo</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Tel_Domicilio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Celular</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Celular']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Nombre de emergencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Nombre_Emergencia']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Numero de emergencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Tel_Emergencia']; ?>">
                            </div>                                  
                        </div>  
                        <br>
                        <!-- SEGURO MEDICO -->
                        <div class="row">
                            <div class="col">
                                <h4>Datos del seguro medico</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Empresa afiliada</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>NSS</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Num_Afiliacion']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Tipo de sangre</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Tipo_Sangre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Estatus</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Estatus']; ?>">
                            </div>                               
                        </div>  
                        <br>
                        <!-- PROCEDENCIA -->
                        <div class="row">
                            <div class="col">
                                <h4>Datos de procedencia</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Escuela de procedencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_bachiller['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Area</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_bachiller_area['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio general</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_Gral'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio exani II</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_Exani_2'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio egel</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_EGEL'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio toefl</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_TOEFL'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Fecha de egreso</label>
                                <input type="date" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Fecha_egreso'] ;?>">
                            </div>                             
                        </div>   
                        <br>
                        <!-- DATOS ADICIONALES -->
                        <div class="row">
                            <div class="col">
                                <h4>Otros datos</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Grupo indigena</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_grupo_indigena['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Lengua indigena</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_lengua['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Discapacidad</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_discapacidad['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Beca</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_beca['Nombre'] ;?>">
                            </div>                          
                        </div>  
                        <br>                      
                        <!-- DOCUMENTOS -->
                        <div class="row formcss">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h4 >Documentos</h4>
                                    </div>   
                                    <hr>  
                                </div>   
                                <table class="table text-center">
                                <thead style="background: #00b6bf; color: #fff;">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo de Documento</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Ver</th>
                                    </tr>
                                </thead>
                                <tbody class="justify-content-center align-items-center">
                                <?php
                                    if($this->resultado_documentos)
                                    {
                                        foreach($this->resultado_documentos as $key => $value)
                                        {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['documento'] ;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['tipo_documento'] ;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['Estatus'] ;?>
                                                    </td>
                                                    <td><a href="<?php echo URL;?>public/docs/<?php echo $this->resultado_documentos[$key]['documento'] ;?>" target="_blank"><button
                                                            type="button" class="btn btn-secondary">Ver Documento</button></a>
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
                        <div class="row justify-content-end align-items-end text-right mr-3" style="width:100px;">
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

