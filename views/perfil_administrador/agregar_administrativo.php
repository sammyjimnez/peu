<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Agregar Perfil</title>
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
	
    <?php
        if($session->get('operacion'))
        {   
    ?>
        <script>
            alert('<?php echo $session->get('operacion'); ?>');
        </script>
    <?php
        $session->remove('operacion');
        } 
    ?>

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
											<a href="<?php echo URL.'perfil_administrador/agregar_perfil';?>"><div class="op-navegador"><div class="navegadornombre">Agregar Perfil</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="#!"><div class="op-navegador"><div class="navegadornombre">Administrativo</div></div></a>
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
                <!-- Informacion - Inicio -->
                <div class="pestaña-contenido">
					<section class="full-box">
						<div class="contenido">
                            <div class="contenido-box">
                <!-- Informacion - Inicio -->

                <form class="container mt-3"  action="<?php echo URL;?>perfil_administrador/nuevo_administrativo" method="POST" enctype="multipart/form-data">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <div class="col">                    
                        <!-- DATOS DEL ADMINISTRATIVO -->
                        <div class="row">
                            <div class="col mt-3">
                                <h4>Datos del administrativo</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Numero de control</label>
                                        <input type="text" name="num_control" required class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Nombres</label>
                                        <input type="text" name="nombres" required class="form-control" >
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido paterno</label>
                                        <input type="text" name="ap_P" required class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido materno</label>
                                        <input type="text" name="ap_M" required class="form-control" >
                                    </div>
                                    <div class="col-6">
                                        <label>Estatus</label>
                                        <select name="estatus" id="" class="form-control">
                                            <?php
                                                if($this->estatus){
                                                    foreach($this->estatus as $i){
                                                            ?>
                                                                <option value="<?Php echo $i['ID_Estatus_Perfil']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Carrera</label>
                                        <select name="carreras" id="" class="form-control">
                                            <?php
                                                if($this->carreras){
                                                    foreach($this->carreras as $i){
                                                            ?>
                                                                <option value="<?Php echo $i['ID_Carrera']; ?>"><?Php echo $i['Nom_Carrera']; ?></option>
                                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 imageform">
                                <img class="rounded-circle z-depth-1-half avatar-pic image-fluid" src="<?php echo URL;?>public/assets/fotos/foto.png" width="200" alt="example placeholder avatar">
                                <div>
                                    <input type="button" class="btn-primary rounded" onclick="type='file'" accept="image/jpeg,image/jpg,image/png" value="Seleccionar" name="imagen">
                                </div>
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
                                <input type="date"  name="nacimiento" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Pais</label>
                                <select name="paises" id="" class="form-control">
                                    <?php
                                        if($this->paises){
                                            foreach($this->paises as $i){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Pais']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
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
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Estado']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
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
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Municipio']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>CURP</label>
                                <input type="text"  name="curp" required maxlength="18" class="form-control" >
                            </div>

                            <div class="col-6">
                                <label>Estado civil</label>
                                <select name="estado_civil" id="" class="form-control">
                                        <?php
                                            $array_estados_civil = ["SOLTERO","CASADO","DIVORCIADO","SEPARACION EN PROCESO JUDICIAL", "VIUDO","CONCUBINATO"];

                                            for ($i=0; $i < count($array_estados_civil); $i++) { 
                                                    ?>
                                                        <option value="<?Php echo $array_estados_civil[$i]; ?>"><?Php echo $array_estados_civil[$i]; ?></option>
                                                    <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label>RFC</label>
                                <input type="text"  name="rfc" required maxlength="13" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Genero</label>
                                <select name="genero" id="" class="form-control">
                                        <?php
                                            $array_generos = ["HOMBRE","MUJER","NO ESPECIFICADO"];

                                            for ($i=0; $i < count($array_generos); $i++) { 
                                                    ?>
                                                        <option value="<?Php echo $array_generos[$i]; ?>"><?Php echo $array_generos[$i]; ?></option>
                                                    <?php
                                            }
                                        ?>
                                    </select>
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
                                <input type="text"  name="direccion" required  class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Telefono fijo</label>
                                <input type="text" minlength="10" maxlength="10" pattern="[0-9]+" required  name="contacto_tel_domi" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Celular</label>
                                <input type="text" minlength="10" maxlength="10" pattern="[0-9]+" required name="contacto_cel" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Nombre de emergencia</label>
                                <input type="text" name="nombre_emergencia" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Numero de emergencia</label>
                                <input type="text" minlength="10" maxlength="10" pattern="[0-9]+" required  name="contacto_tel_eme" class="form-control">
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
                                <input type="text" name="empresa_afiliada" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label>NSS</label>
                                <input type="number"  name="nss" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Tipo de sangre</label>
                                <select name="tipo_sangre" id="" class="form-control">
                                        <?php
                                            $array_sangre = ["A+","B+","O+","AB+","A-","B-","O-","AB-"];
                                            for ($i=0; $i < count($array_sangre); $i++) { 
                                                    ?>
                                                        <option value="<?Php echo $array_sangre[$i]; ?>"><?Php echo $array_sangre[$i]; ?></option>
                                                    <?php
                                            }
                                            ?>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label>Estatus</label>
                                <select name="estatus_medico" id="" class="form-control">
                                        <?php
                                            $array_estatus = ["VIGENTE","VENCIDO"];
                                            for ($i=0; $i < count($array_estatus); $i++) { 
                                                    ?>
                                                        <option value="<?Php echo $array_estatus[$i]; ?>"><?Php echo $array_estatus[$i]; ?></option>
                                                    <?php
                                            }
                                            ?>
                                    </select>   
                            </div>                               
                        </div>  
                        <br>
                        <!-- DATOS LABORALES -->
                        <div class="row">
                            <div class="col">
                                <h4>Datos laborales</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Area</label>
                                <select name="area_academica" id="" class="form-control">
                                    <?php
                                        if($this->areasAcademicas){
                                            foreach($this->areasAcademicas as $i){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Area']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Departamento</label>
                                <select name="departamento" id="" class="form-control">
                                    <?php
                                        if($this->departamentos){
                                            foreach($this->departamentos as $i){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Departamento']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>
                            <div class="col-6">
                                <label>Fecha de ingreso</label>
                                <input type="date" required name="fecha_ingreso" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Puesto</label>
                                <select name="puestos" id="" class="form-control">
                                    <?php
                                        if($this->puestos){
                                            foreach($this->puestos as $i){
                                                    ?>
                                                        <option value="<?Php echo $i['ID_Puesto']; ?>"><?Php echo $i['Nombre']; ?></option>
                                                    <?php 
                                            }
                                        }
                                    ?>
                                </select> 
                            </div>                               
                        </div>  
                        <br>                        
                        <!-- CUENTA -->
                        <div class="row">
                            <div class="col">
                                <h4>Cuenta</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">      
                            <div class="col-6">
                                <label>Password</label>
                                <input type="text" name="password" required minlength="8" maxlength="16" class="form-control">
                            </div>
                            <div class="col-6">
                                <label>Perfil</label>
                                <input type="text" name="perfil" id="" readonly="readonly" value="Administrativo" class="form-control" style="background: white;">
                            </div>
                        </div>   
                        <br>                                                    
                        <!-- DOCUMENTOS -->
                        <div class="row formcss">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <h4>Documentos</h4>
                                    </div>   
                                    <div class=" col mb-2 " style="text-align: right;">
                                        <button type="button" class="btn btn-primary" onclick="crearDocumento();">Agregar fila</button>
                                    </div>   
                                    <hr>
                                </div>   
                                <table class="table text-center">
                                <thead style="background: #00b6bf; color: #fff;">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo de Documento</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Archivo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="justify-content-center align-items-center" id="table_documentos">
                                </tbody>
                                </table>     
                            </div>
                        </div>     
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary mr-2">Crear Administrativo</button>
                            <a href="<?php echo URL; ?>perfil_administrador/agregar_administrativo" class="btn btn-danger">Cancelar</a>
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
