
<?php

class Perfil_Administrativo extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Administrativo")
        {
            $this->view->render('perfil/administrativo');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    private function cargar_datos_generales(){
        $resultado_administrativo = $this->model->getAdministrativo($this->session->get("usuario"));
        $resultado_generales = $this->model->getDatosGeneralesUsuario($this->session->get("usuario"));
        
        if($resultado_administrativo && $resultado_generales)
        {   
            $resultado_carrera = $this->model->getCarrera($resultado_administrativo['ID_Carrera']);
        
            $resultado_estatus = $this->model->getEstatus($resultado_administrativo['Estatus']);
            $resultado_origen = $this->model->getOrigenUsuario($resultado_generales['ID_Origen']);
            $resultado_pais = $this->model->getPaisUsuario($resultado_origen['ID_Pais']);
            $resultado_estado = $this->model->getEstadoUsuario($resultado_origen['ID_Estado']);
            $resultado_municipio = $this->model->getMunicipioUsuario($resultado_origen['ID_Municipio']);
        
        }
                //Renderizacion a la vista
                $this->view->resultado_administrativo = $resultado_administrativo;
                $this->view->resultado_generales = $resultado_generales;
                $this->view->resultado_carrera = $resultado_carrera;
                $this->view->resultado_estatus = $resultado_estatus;
                $this->view->resultado_pais = $resultado_pais;
                $this->view->resultado_estado = $resultado_estado;
                $this->view->resultado_municipio = $resultado_municipio;

    }

    function datos_generales(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_administrativo/datos_generales');
    }

    function datos_generales_modificar(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_administrativo/datos_generales_modificar');
    }

    function update_datos_generales(){
        if(!isset($_FILES['imagen']['name'])){
            
            $resultado_imagen = $this->model->getImagen($this->session->get("usuario"));
            $imagen = $resultado_imagen ? $resultado_imagen['Imagen'] : false;
        }
        else{
            $imagen=$_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/peu_upqroo/public/assets/fotos/'.$_FILES['imagen']['name']);
        }
    
        if($imagen != false) {
            $update = $this->model->UpdateGeneral($imagen, $this->session->get("usuario"));
            
            $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 

            $this->session->add("operacion",$mensaje);
        }else{

            $mensaje = "No se pudo llevar a cabo la operacion"; 

            $this->session->add("operacion",$mensaje);
        }
    
        header("Location: ". URL ."perfil_administrativo/datos_generales");
    }

//
    function cargar_contacto(){
        $resultado_contacto=$this->model->getContactoUsuario($this->session->get("usuario"));
        $resultado_medico=$this->model->getServicioMedicoUsuario($this->session->get("usuario"));

            $this->view->resultado_contacto = $resultado_contacto;
            $this->view->resultado_medico = $resultado_medico;
    }

    function contacto(){
        $this->cargar_contacto();

        $this->view->render('perfil_administrativo/contacto');
    }

    function contacto_modificar(){
        $this->cargar_contacto();

        $this->view->render('perfil_administrativo/contacto_modificar');
    }

    function update_contacto(){
        $array = array("tel_domi" => $_POST['contacto_tel_domi'], "cel" => $_POST['contacto_cel'], "num_eme" => $_POST['contacto_tel_eme']);
        $update = $this->model->UpdateContactoUsuario($array, $this->session->get("usuario"));
        
        $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 
        $this->session->add("operacion",$mensaje);

        header("Location: ". URL ."perfil_administrativo/contacto");
    }

    function datos_laborales(){
        $resultado_laboral = $this->model->getLaboral($this->session->get("usuario"));
        if($resultado_laboral)
        {
            $resultado_area=$this->model->getLaboralArea($resultado_laboral['ID_Area']);
            $resultado_departamento=$this->model->getLaboralDepartamento($resultado_laboral['ID_Departamento']);
            $resultado_puesto=$this->model->getLaboralPuesto($resultado_laboral['ID_Puesto']);

            $this->view->resultado_area = $resultado_area;
            $this->view->resultado_departamento = $resultado_departamento;
            $this->view->resultado_laboral = $resultado_laboral;
            $this->view->resultado_puesto = $resultado_puesto;

            $this->view->render('perfil_administrativo/datos_laborales');
        }
    }

    function cuenta(){
        $this->view->render('perfil_administrativo/cuenta');
    }

    function update_cuenta(){
        $array_cuenta = array("usuario" => $_POST['num_control'], "pass" =>  password_hash($_POST["password"], PASSWORD_DEFAULT));
        $update_cuenta= $this->model->UpdateCuenta($array_cuenta);

        if($update_cuenta){
            $this->session->add("operacion","Se actualizo correctamente");
        }else{
            $this->session->add("operacion","No se actualizo correctamente");
        }

        header("Location: ". URL ."perfil_administrativo/cuenta");
    }


    function documentos(){
        $resultado_documentos = $this->model->getDocumentosUsuario($this->session->get("usuario"));

        $this->view->resultado_documentos = $resultado_documentos;

        $this->view->render('perfil_administrativo/documentos');
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
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosConBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesConBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresConBuscarCarrera($carrera,$buscar);

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
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosConBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesConBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresConBuscar($buscar);

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
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosSinBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscarCarrera($carrera,$buscar);

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
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosSinBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscar($buscar);

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


        $this->view->render('perfil_administrativo/buscador');
    }


}
?>