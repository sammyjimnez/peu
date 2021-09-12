
<?php

class Perfil_Alumno extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Alumno")
        {
            $this->view->render('perfil/alumno');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    private function cargar_datos_generales(){
        $resultado_alumno = $this->model->getAlumno($this->session->get("usuario"));
        $resultado_generales = $this->model->getDatosGeneralesUsuario($this->session->get("usuario"));
    
            if($resultado_alumno && $resultado_generales)
            {   
                $resultado_carrera = $this->model->getCarreraUsuario($resultado_alumno['ID_Carrera']);
                $resultado_plan_estudio = $this->model->getPlanEstudio($resultado_alumno['Plan_estudio']);
    
                $resultado_id_descripcion_periodo_ingreso =  $this->model->getDescripcionPeriodo($resultado_alumno['Periodo_Ingreso']);
                $resultado_descripcion_periodo_ingreso = $this->model->getDescripcion($resultado_id_descripcion_periodo_ingreso['ID_Descripcion']);
                $resultado_id_descripcion_periodo_actual =  $this->model->getDescripcionPeriodo($resultado_alumno['Periodo_Actual']);
                $resultado_descripcion_periodo_actual = $this->model->getDescripcion($resultado_id_descripcion_periodo_actual['ID_Descripcion']);
    
                $resultado_ingreso = $this->model->getIngreso($resultado_alumno['Tipo_Ingreso']);
                $resultado_grupo = $this->model->getGrupo($resultado_alumno['Grupo']);
                $resultado_origen = $this->model->getOrigenUsuario($resultado_generales['ID_Origen']);
                $resultado_pais = $this->model->getPaisUsuario($resultado_origen['ID_Pais']);
                $resultado_estado = $this->model->getEstadoUsuario($resultado_origen['ID_Estado']);
                $resultado_municipio = $this->model->getMunicipioUsuario($resultado_origen['ID_Municipio']);
    
                //Renderizacion a la vista
                $this->view->resultado_alumno = $resultado_alumno;
                $this->view->resultado_generales = $resultado_generales;
    
                $this->view->resultado_carrera = $resultado_carrera;
                $this->view->resultado_plan_estudio = $resultado_plan_estudio;
                $this->view->resultado_id_descripcion_periodo_actual = $resultado_id_descripcion_periodo_actual;
                $this->view->resultado_descripcion_periodo_actual = $resultado_descripcion_periodo_actual;
                $this->view->resultado_id_descripcion_periodo_ingreso = $resultado_id_descripcion_periodo_ingreso;
                $this->view->resultado_descripcion_periodo_ingreso = $resultado_descripcion_periodo_ingreso;
                $this->view->resultado_ingreso = $resultado_ingreso;
                $this->view->resultado_grupo = $resultado_grupo;
                $this->view->resultado_pais = $resultado_pais;
                $this->view->resultado_estado = $resultado_estado;
                $this->view->resultado_municipio = $resultado_municipio;
                
            }
    }

    function datos_generales(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_alumno/datos_generales');
    }

    function datos_generales_modificar(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_alumno/datos_generales_modificar');
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
            $update = $this->model->UpdateGeneralAlumno($imagen, $this->session->get("usuario"));
            
            $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 

            $this->session->add("operacion",$mensaje);
        }else{

            $mensaje = "No se pudo llevar a cabo la operacion"; 

            $this->session->add("operacion",$mensaje);
        }
    
        header("Location: ". URL ."perfil_alumno/datos_generales");
    }

    function cargar_contacto(){
        $resultado_contacto=$this->model->getContactoUsuario($this->session->get("usuario"));
        $resultado_medico=$this->model->getServicioMedicoUsuario($this->session->get("usuario"));

        if($resultado_contacto && $resultado_medico)
        {
            $this->view->resultado_contacto = $resultado_contacto;
            $this->view->resultado_medico = $resultado_medico;
        }
    }

    function contacto(){
        $this->cargar_contacto();

        $this->view->render('perfil_alumno/contacto');
    }

    function contacto_modificar(){
        $this->cargar_contacto();

        $this->view->render('perfil_alumno/contacto_modificar');
    }

    function update_contacto(){
        $array = array("tel_domi" => $_POST['contacto_tel_domi'], "cel" => $_POST['contacto_cel'], "num_eme" => $_POST['contacto_tel_eme']);
        $update = $this->model->UpdateContactoUsuario($array, $this->session->get("usuario"));
        
        $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 
        $this->session->add("operacion",$mensaje);

        header("Location: ". URL ."perfil_alumno/contacto");
    }

    function procedencia(){
        $resultado_procedencia = $this->model->getProcedencia($this->session->get("usuario"));
        if($resultado_procedencia)
        {
            $resultado_bachiller = $this->model->getBachilleres($resultado_procedencia['ID_Bachiller']);
            $resultado_bachiller_area = $this->model->getBachilleresArea($resultado_procedencia['ID_Bach_Area']);

            $this->view->resultado_procedencia = $resultado_procedencia;
            $this->view->resultado_bachiller = $resultado_bachiller;
            $this->view->resultado_bachiller_area = $resultado_bachiller_area;

            $this->view->render('perfil_alumno/procedencia');
        }
    }

    function datos_adicionales() {
        $resultado_adicional = $this->model->getAdicionales($this->session->get("usuario"));
        if($resultado_adicional)
        {
            $resultado_indigena = $this->model->getIndigena($resultado_adicional['ID_Indigena']);
            if($resultado_indigena){
                $resultado_grupo_indigena = $this->model->getGrupoIndigena($resultado_indigena['ID_Grupo_Indigena']);
                $resultado_lengua = $this->model->getLenguaIndigena($resultado_indigena['ID_Lengua']);
                $resultado_beca = $this->model->getBeca($resultado_adicional['ID_Beca']);;
                $resultado_discapacidad= $this->model->getDiscapacidad($resultado_adicional['ID_Discapacidad']);

                $this->view->resultado_grupo_indigena = $resultado_grupo_indigena;
                $this->view->resultado_lengua = $resultado_lengua;
                $this->view->resultado_beca = $resultado_beca;
                $this->view->resultado_discapacidad = $resultado_discapacidad;

                $this->view->render('perfil_alumno/datos_adicionales');
            }
        }
    }

    function cuenta(){
        $this->view->render('perfil_alumno/cuenta');
    }

    function update_cuenta(){
        $array_cuenta = array("usuario" => $_POST['matricula'], "pass" =>  password_hash($_POST["password"], PASSWORD_DEFAULT));
        $update_cuenta= $this->model->UpdateCuenta($array_cuenta);

        if($update_cuenta){
            $this->session->add("operacion","Se actualizo correctamente");
        }else{
            $this->session->add("operacion","No se actualizo correctamente");
        }

        header("Location: ". URL ."perfil_alumno/cuenta");
    }

    function documentos(){
        $resultado_documentos = $this->model->getDocumentosUsuario($this->session->get("usuario"));

        $this->view->resultado_documentos = $resultado_documentos;

        $this->view->render('perfil_alumno/documentos');
    }

}
?>