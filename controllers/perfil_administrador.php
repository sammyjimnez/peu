
<?php

class Perfil_Administrador extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Administrador")
        {
            $this->view->render('perfil/administrador');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function agregar_perfil(){
        $this->view->render('perfil_administrador/agregar_perfil');
    }

    function agregar_alumno(){
        //
            $carreras = $this->model->getCarreras();
            $paises = $this->model->getPaises();
            $estados = $this->model->getEstados();
            $municipios = $this->model->getMunicipios();
            $planes_estudios = $this->model->getPlanesEstudios();
            $periodos = $this->model->getPeriodos();
            $tipos_ingresos = $this->model->getTiposIngresos();
            $grupos = $this->model->getGrupos();


            $this->view->carreras = $carreras;
            $this->view->paises = $paises;
            $this->view->estados = $estados;
            $this->view->municipios = $municipios;
            $this->view->planes_estudios = $planes_estudios;
            $this->view->periodos = $periodos;
            $this->view->tipos_ingresos = $tipos_ingresos;
            $this->view->grupos = $grupos;   
 

            $bachilleres = $this->model->getBachilleresActualizar();
            $areas_bachilleres = $this->model->getAreasBachilleres();

            $this->view->bachilleres = $bachilleres;
            $this->view->areas_bachilleres = $areas_bachilleres;

            $grupos_indigena = $this->model->getGruposIndigenas();
            $discapacidades = $this->model->getDiscapacidades();
            $becas = $this->model->getBecas();

            $this->view->grupos_indigena = $grupos_indigena;
            $this->view->discapacidades = $discapacidades;
            $this->view->becas = $becas;

        $this->view->render('perfil_administrador/agregar_alumno');
    }

    function getTiposDocumentos(){
        $tipos_documentos = $this->model->getTiposDocumentos();
        echo json_encode($tipos_documentos);  
    }

    function getAsignaturas(){
        $carreras = $this->model->getCarreras();
        $asignaturas = $this->model->getAsignaturas();
        echo json_encode(array("carreras" => $carreras, "asignaturas" => $asignaturas));  
    }

    function agregar_docente(){
        
        $paises = $this->model->getPaises();
        $estados = $this->model->getEstados();
        $municipios = $this->model->getMunicipios();
        $grados = $this->model->getGrados();    
        $periodos = $this->model->getPeriodos(); 
        $estatus = $this->model->getEstatusActualizar();
        
        $this->view->estatus = $estatus;
        $this->view->paises = $paises;
        $this->view->estados = $estados;
        $this->view->municipios = $municipios;
        $this->view->grados = $grados;
        $this->view->periodos = $periodos;

        $areasAcademicas = $this->model->getAreasAcademicas();
        $departamentos = $this->model->getDepartamentos();
        $puestos = $this->model->getPuestos();

        $this->view->areasAcademicas = $areasAcademicas;
        $this->view->departamentos = $departamentos;
        $this->view->puestos = $puestos;

        $this->view->render('perfil_administrador/agregar_docente');
    }

    function agregar_director(){
  
        $carreras = $this->model->getCarreras();
        $paises = $this->model->getPaises();
        $estados = $this->model->getEstados();
        $municipios = $this->model->getMunicipios();
        $estatus = $this->model->getEstatusActualizar();
        $periodos = $this->model->getPeriodos();

        $this->view->carreras = $carreras;
        $this->view->paises = $paises;
        $this->view->estados = $estados;
        $this->view->municipios = $municipios;
        $this->view->estatus = $estatus;
        $this->view->periodos = $periodos;

        $this->view->render('perfil_administrador/agregar_director');
    }

    function agregar_administrativo(){
        $carreras = $this->model->getCarreras();
        $paises = $this->model->getPaises();
        $estados = $this->model->getEstados();
        $municipios = $this->model->getMunicipios();
        $estatus = $this->model->getEstatusActualizar();

        $this->view->carreras = $carreras;
        $this->view->paises = $paises;
        $this->view->estados = $estados;
        $this->view->municipios = $municipios;
        $this->view->estatus = $estatus;

        $areasAcademicas = $this->model->getAreasAcademicas();
        $departamentos = $this->model->getDepartamentos();
        $puestos = $this->model->getPuestos();

        $this->view->areasAcademicas = $areasAcademicas;
        $this->view->departamentos = $departamentos;
        $this->view->puestos = $puestos;
        
        $this->view->render('perfil_administrador/agregar_administrativo');
    }

    function nuevo_alumno(){
        $array_origen = array("pais" => $_POST["paises"], "estado" => $_POST["estados"], "municipio" => $_POST["municipios"]);

        $resultado_origen =  $this->model->getOrigen($array_origen);
        $resultado_perfil = $this->model->getPerfil($_POST["perfil"]);

        if($resultado_origen && $resultado_perfil){
            if(!isset($_FILES['imagen']['name'])){
                $imagen = "foto.png";
            }
            else{
                $imagen=$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/assets/fotos/'.$_FILES['imagen']['name']);
            }
            $i = 0;
            if(isset($_FILES['imagen_documento'.$i]['name'])){
                while(isset($_FILES['imagen_documento'.$i]['name'])){
                    $array_documento = array("usuario" => $_POST['matricula'], "nombre" => $_POST['nom_doc'.$i], 
                    "ruta" => $_FILES['imagen_documento'.$i]['name'], "estatus" => $_POST['sel_est'.$i], "tipo_doc" => $_POST['sel_tip'.$i]);

                    move_uploaded_file($_FILES['imagen_documento'.$i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/docs/'.$_FILES['imagen_documento'.$i]['name']);

                    $insert_documento = $this->model->insertDocumentos($array_documento);

                    $i++;
                }
            }

           $array_alumno = array("usuario" => $_POST["matricula"],"nombres" => $_POST["nombres"], "ap_P" => $_POST["ap_P"], 
            "ap_M" => $_POST["ap_M"], "carrera" => $_POST["carreras"], "estatus" => $_POST["estatus"], "plan_estudio" => $_POST["plan_estudio"], "periodo_ingreso" => $_POST["periodo_ingreso"], 
            "periodo_actual" => $_POST["periodo_actual"], "creditos" => $_POST["creditos"], "tipo_ingreso" => $_POST["tipo_ingreso"], "grupo" => $_POST["grupo"],"imagen" => $imagen);
    
            $array_generales = array("usuario"=>$_POST["matricula"], "origen" => $resultado_origen['ID_Origen'], "nacimiento" => $_POST["nacimiento"], "curp" => $_POST["curp"], "estado_civil" => $_POST["estado_civil"], "rfc" => $_POST['rfc'], "genero" => $_POST['genero']);
    
            $array_contacto = array("usuario"=>$_POST["matricula"],"direccion" => $_POST["direccion"], "tel_fijo" => $_POST["contacto_tel_domi"],"celular" => $_POST["contacto_cel"], "nombre_emergencia" => $_POST["nombre_emergencia"],
            "num_emergencia" => $_POST["contacto_tel_eme"]);
    
            $array_medico = array("usuario"=>$_POST["matricula"],"empresa_afiliada" => $_POST["empresa_afiliada"], "nss" => $_POST["nss"], "tipo_sangre" => $_POST["tipo_sangre"], "estatus_medico" => $_POST['estatus_medico']);
    
            $array_procedencia = array("usuario"=>$_POST["matricula"],"bachiller" => $_POST["bachiller"], "area_bachiller" => $_POST["area_bachiller"], "general" => $_POST["general"], 
            "exani" => $_POST['exani'], "egel" => $_POST['egel'], "toeftl" => $_POST['toeftl'], "fecha_egreso" => $_POST['fecha_egreso']);
    
            $array_adicionales = array("usuario"=>$_POST["matricula"],"grupo_indigena" => $_POST["grupo_indigena"], "discapacidad" => $_POST["discapacidad"], 
            "beca" => $_POST['beca']);
    
            $array_cuenta = array("usuario" => $_POST["matricula"],"password" =>  password_hash($_POST["password"], PASSWORD_DEFAULT), "perfil" => $resultado_perfil['ID_Perfil']);

            $insert_alumno = $this->model->insertAlumno($array_alumno);
            if($insert_alumno)
            {
                $insert_generales = $this->model->insertGenerales($array_generales);
                $insert_contacto = $this->model->insertContacto($array_contacto);
                $insert_medico = $this->model->insertMedico($array_medico);
                $insert_procedencia = $this->model->insertProcedencia($array_procedencia);
                $insert_adicional = $this->model->insertAdicional($array_adicionales);
                $insert_cuenta = $this->model->insertCuenta($array_cuenta);
    
                $this->session->add("operacion","Se ha agregado correctamente");
                header("Location: ".URL."perfil_administrador/agregar_alumno");
            }else{
                $this->session->add("operacion","No se ha podido agregar");
                header("Location: ".URL."perfil_administrador/agregar_alumno");
            }

        }else{
            $this->session->add("operacion","Origen no encontrado");
            header("Location: ".URL."perfil_administrador/agregar_alumno");
        }
    }

    function nuevo_docente(){
        $array_origen = array("pais" => $_POST["paises"], "estado" => $_POST["estados"], "municipio" => $_POST["municipios"]);

        $resultado_origen =  $this->model->getOrigen($array_origen);
        $resultado_perfil = $this->model->getPerfil($_POST["perfil"]);

        if($resultado_origen && $resultado_perfil){

            if(!isset($_FILES['imagen']['name'])){
                $imagen = "foto.png";
            }
            else{
                $imagen=$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/assets/fotos/'.$_FILES['imagen']['name']);
            }
            $i = 0;
            if(isset($_FILES['imagen_documento'.$i]['name'])){
                while(isset($_FILES['imagen_documento'.$i]['name'])){
                    $array_documento = array("usuario" => $_POST['num_control'], "nombre" => $_POST['nom_doc'.$i], 
                    "ruta" => $_FILES['imagen_documento'.$i]['name'], "estatus" => $_POST['sel_est'.$i], "tipo_doc" => $_POST['sel_tip'.$i]);

                    move_uploaded_file($_FILES['imagen_documento'.$i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/docs/'.$_FILES['imagen_documento'.$i]['name']);

                    $insert_documento = $this->model->insertDocumentos($array_documento);

                    $i++;
                }
            }
            $j = 0;
            if(isset($_POST['sel_carr'.$j])){
                while(isset($_POST['sel_carr'.$j])){
                    $array_asignatura = array("usuario" => $_POST['num_control'], "carrera" => $_POST['sel_carr'.$j], 
                    "asignatura" => $_POST['sel_asig'.$j], "estatus" => $_POST['sel_asig_est'.$j]);

                    $insert_asignatura = $this->model->insertAsignaturas($array_asignatura);
                    $j++;
                }
            }

            $array_docente = array("usuario" => $_POST["num_control"],"nombres" => $_POST["nombres"], "ap_P" => $_POST["ap_P"], 
            "ap_M" => $_POST["ap_M"], "estatus" => $_POST["estatus"], "grado" => $_POST["grado"], "periodo_ingreso" => $_POST["periodo_ingreso"], "imagen" => $imagen);
    
            $array_generales = array("usuario"=>$_POST["num_control"], "origen" => $resultado_origen['ID_Origen'], "nacimiento" => $_POST["nacimiento"], "curp" => $_POST["curp"], "estado_civil" => $_POST["estado_civil"], "rfc" => $_POST['rfc'], "genero" => $_POST['genero']);
    
            $array_contacto = array("usuario"=>$_POST["num_control"],"direccion" => $_POST["direccion"], "tel_fijo" => $_POST["contacto_tel_domi"],"celular" => $_POST["contacto_cel"], "nombre_emergencia" => $_POST["nombre_emergencia"],
            "num_emergencia" => $_POST["contacto_tel_eme"]);
    
            $array_medico = array("usuario"=>$_POST["num_control"],"empresa_afiliada" => $_POST["empresa_afiliada"], "nss" => $_POST["nss"], "tipo_sangre" => $_POST["tipo_sangre"], "estatus_medico" => $_POST['estatus_medico']);
    
            $array_laborales= array("usuario"=>$_POST["num_control"],"area_academica" => $_POST["area_academica"], "departamento" => $_POST["departamento"], "fecha_ingreso" => $_POST["fecha_ingreso"], 
            "puestos" => $_POST['puestos']);
    
            $array_cuenta = array("usuario" => $_POST["num_control"],"password" => password_hash($_POST["password"], PASSWORD_DEFAULT), "perfil" => $resultado_perfil['ID_Perfil']);

            $insert_docente= $this->model->insertDocente($array_docente);
            if($insert_docente)
            {
                $insert_generales = $this->model->insertGenerales($array_generales);
                $insert_contacto = $this->model->insertContacto($array_contacto);
                $insert_medico = $this->model->insertMedico($array_medico);
                $insert_laboral = $this->model->insertLaboral($array_laborales);
                $insert_cuenta = $this->model->insertCuenta($array_cuenta);
    
                $this->session->add("operacion","Se ha agregado correctamente");
                header("Location: ".URL."perfil_administrador/agregar_alumno");
            }else{
                $this->session->add("operacion","No se ha podido agregar");
                header("Location: ".URL."perfil_administrador/agregar_alumno");
            }

        }else{
            $this->session->add("operacion","Origen no encontrado");
            header("Location: ".URL."perfil_administrador/agregar_alumno");
        }
    }

    function nuevo_director(){
        $array_origen = array("pais" => $_POST["paises"], "estado" => $_POST["estados"], "municipio" => $_POST["municipios"]);

        $resultado_origen =  $this->model->getOrigen($array_origen);
        $resultado_perfil = $this->model->getPerfil($_POST["perfil"]);

        if($resultado_origen && $resultado_perfil){

            if(!isset($_FILES['imagen']['name'])){
                $imagen = "foto.png";
            }
            else{
                $imagen=$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/assets/fotos/'.$_FILES['imagen']['name']);
            }
            $i = 0;
            if(isset($_FILES['imagen_documento'.$i]['name'])){
                while(isset($_FILES['imagen_documento'.$i]['name'])){
                    $array_documento = array("usuario" => $_POST['num_control'], "nombre" => $_POST['nom_doc'.$i], 
                    "ruta" => $_FILES['imagen_documento'.$i]['name'], "estatus" => $_POST['sel_est'.$i], "tipo_doc" => $_POST['sel_tip'.$i]);

                    move_uploaded_file($_FILES['imagen_documento'.$i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/docs/'.$_FILES['imagen_documento'.$i]['name']);

                    $insert_documento = $this->model->insertDocumentos($array_documento);

                    $i++;
                }
            }

            $array_director = array("usuario" => $_POST["num_control"],"nombres" => $_POST["nombres"], "ap_P" => $_POST["ap_P"], 
            "ap_M" => $_POST["ap_M"], "estatus" => $_POST["estatus"], "carrera" => $_POST["carreras"], "periodo_ingreso" => $_POST["periodo_ingreso"], "imagen" => $imagen);
    
            $array_generales = array("usuario"=>$_POST["num_control"], "origen" => $resultado_origen['ID_Origen'], "nacimiento" => $_POST["nacimiento"], "curp" => $_POST["curp"], "estado_civil" => $_POST["estado_civil"], "rfc" => $_POST['rfc'], "genero" => $_POST['genero']);
    
            $array_contacto = array("usuario"=>$_POST["num_control"],"direccion" => $_POST["direccion"], "tel_fijo" => $_POST["contacto_tel_domi"],"celular" => $_POST["contacto_cel"], "nombre_emergencia" => $_POST["nombre_emergencia"],
            "num_emergencia" => $_POST["contacto_tel_eme"]);
    
            $array_medico = array("usuario"=>$_POST["num_control"],"empresa_afiliada" => $_POST["empresa_afiliada"], "nss" => $_POST["nss"], "tipo_sangre" => $_POST["tipo_sangre"], "estatus_medico" => $_POST['estatus_medico']);
    
            $array_cuenta = array("usuario" => $_POST["num_control"],"password" =>password_hash($_POST["password"], PASSWORD_DEFAULT), "perfil" => $resultado_perfil['ID_Perfil']);

            $insert_director= $this->model->insertDirector($array_director);
            if($insert_director)
            {
                $insert_generales = $this->model->insertGenerales($array_generales);
                $insert_contacto = $this->model->insertContacto($array_contacto);
                $insert_medico = $this->model->insertMedico($array_medico);
                $insert_cuenta = $this->model->insertCuenta($array_cuenta);
    
                $this->session->add("operacion","Se ha agregado correctamente");
                header("Location: ".URL."perfil_administrador/agregar_director");
            }else{
                $this->session->add("operacion","No se ha podido agregar");
                header("Location: ".URL."perfil_administrador/agregar_director");
            }

        }else{
            $this->session->add("operacion","Origen no encontrado");
            header("Location: ".URL."perfil_administrador/agregar_director");
        }
    }

    function nuevo_administrativo(){
        $array_origen = array("pais" => $_POST["paises"], "estado" => $_POST["estados"], "municipio" => $_POST["municipios"]);

        $resultado_origen =  $this->model->getOrigen($array_origen);
        $resultado_perfil = $this->model->getPerfil($_POST["perfil"]);

        if($resultado_origen && $resultado_perfil){

            if(!isset($_FILES['imagen']['name'])){
                $imagen = "foto.png";
            }
            else{
                $imagen=$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/assets/fotos/'.$_FILES['imagen']['name']);
            }
            $i = 0;
            if(isset($_FILES['imagen_documento'.$i]['name'])){
                while(isset($_FILES['imagen_documento'.$i]['name'])){
                    $array_documento = array("usuario" => $_POST['num_control'], "nombre" => $_POST['nom_doc'.$i], 
                    "ruta" => $_FILES['imagen_documento'.$i]['name'], "estatus" => $_POST['sel_est'.$i], "tipo_doc" => $_POST['sel_tip'.$i]);

                    move_uploaded_file($_FILES['imagen_documento'.$i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/docs/'.$_FILES['imagen_documento'.$i]['name']);

                    $insert_documento = $this->model->insertDocumentos($array_documento);

                    $i++;
                }
            }

            $array_administrativo = array("usuario" => $_POST["num_control"],"nombres" => $_POST["nombres"], "ap_P" => $_POST["ap_P"], 
            "ap_M" => $_POST["ap_M"], "estatus" => $_POST["estatus"], "carrera" => $_POST["carreras"], "imagen" => $imagen);
    
            $array_generales = array("usuario"=>$_POST["num_control"], "origen" => $resultado_origen['ID_Origen'], "nacimiento" => $_POST["nacimiento"], "curp" => $_POST["curp"], "estado_civil" => $_POST["estado_civil"], "rfc" => $_POST['rfc'], "genero" => $_POST['genero']);
    
            $array_contacto = array("usuario"=>$_POST["num_control"],"direccion" => $_POST["direccion"], "tel_fijo" => $_POST["contacto_tel_domi"],"celular" => $_POST["contacto_cel"], "nombre_emergencia" => $_POST["nombre_emergencia"],
            "num_emergencia" => $_POST["contacto_tel_eme"]);
    
            $array_medico = array("usuario"=>$_POST["num_control"],"empresa_afiliada" => $_POST["empresa_afiliada"], "nss" => $_POST["nss"], "tipo_sangre" => $_POST["tipo_sangre"], "estatus_medico" => $_POST['estatus_medico']);
    
            $array_laborales= array("usuario"=>$_POST["num_control"],"area_academica" => $_POST["area_academica"], "departamento" => $_POST["departamento"], "fecha_ingreso" => $_POST["fecha_ingreso"], 
            "puestos" => $_POST['puestos']);
    
            $array_cuenta = array("usuario" => $_POST["num_control"],"password" => password_hash($_POST["password"], PASSWORD_DEFAULT), "perfil" => $resultado_perfil['ID_Perfil']);

            $insert_administrativo= $this->model->insertAdministrativo($array_administrativo);
            if($insert_administrativo)
            {
                $insert_generales = $this->model->insertGenerales($array_generales);
                $insert_contacto = $this->model->insertContacto($array_contacto);
                $insert_medico = $this->model->insertMedico($array_medico);
                $insert_laboral = $this->model->insertLaboral($array_laborales);
                $insert_cuenta = $this->model->insertCuenta($array_cuenta);
    
                $this->session->add("operacion","Se ha agregado correctamente");
                header("Location: ".URL."perfil_administrador/agregar_administrativo");
            }else{
                $this->session->add("operacion","No se ha podido agregar");
                header("Location: ".URL."perfil_administrador/agregar_administrativo");
            }

        }else{
            $this->session->add("operacion","Origen no encontrado");
            header("Location: ".URL."perfil_administrador/agregar_administrativo");
        }
    }

    function buscador($params){
        if(count($params) == 4){
            $buscar = $params[0];
            $perfil = $params[1];
            $carrera = $params[2];
            $pagina = $params[3];
        }else if(count($params) == 3){
            $buscar = "";
            $perfil = $params[0];
            $carrera = $params[1];
            $pagina = $params[2];
        }else{
            $buscar = "";
            $carrera = "Carreras";
            $perfil = "Perfiles";
            $pagina = 1;
        }

        $perfil_definido = $perfil != "Perfiles" ? true : false;
        $carrera_definido = $carrera != "Carreras" ? true : false;

    //Array que agrega todos los resultados de la busqueda sin importar el peril o los campos diferentes, de esta manera solo se tiene control en una variable.
    $buscador_resultados = array();
    if($buscar != "")
    {
        if($perfil_definido ==true && $carrera_definido == false){ //UN ARRAY
        //Un perfil definido de todas las carreras
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == true && $carrera_definido == true){ //UN ARRAY
        //Un perfil definido de una carrera especifico
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosConBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesConBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresConBuscarCarrera($carrera,$buscar);
            $resultado_administrativos = $this->model->getAdministrativosConBuscarCarrera($carrera,$buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                 foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosConBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesConBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresConBuscar($buscar);
            $resultado_administrativos = $this->model->getAdministrativosConBuscar($buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }
    }else if($buscar == ""){
        if($perfil_definido ==true && $carrera_definido == false){ //UN ARRAY
        //Un perfil definido de todas las carreras
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }

        }else if($perfil_definido == true && $carrera_definido == true){ //UN ARRAY
        //Un perfil definido de una carrera especifico
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosSinBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscarCarrera($carrera,$buscar);
            $resultado_administrativos = $this->model->getAdministrativosSinBuscarCarrera($carrera,$buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosSinBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscar($buscar);
            $resultado_administrativos = $this->model->getAdministrativosSinBuscar($buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }
    }
    $total_registros = count($buscador_resultados);
    $por_pagina = 4;
    $total_paginas = ceil($total_registros / $por_pagina);

    $inicio_pagina = ($pagina-1) * $por_pagina;
    $fin_pagina = ($pagina) * $por_pagina;

        $this->view->buscador_resultados = $buscador_resultados;
        $this->view->por_pagina = $por_pagina;
        $this->view->total_paginas = $total_paginas;
        $this->view->inicio_pagina = $inicio_pagina;
        $this->view->fin_pagina = $fin_pagina;
        $this->view->total_registros = $total_registros;
        //
        $this->view->perfil = $perfil;
        $this->view->carrera = $carrera;
        $this->view->buscar = $buscar;
        $this->view->pagina = $pagina;


        $this->view->render('perfil_administrador/buscador');
    }


}
?>