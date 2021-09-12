
<?php

class Perfil_Docente extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Docente")
        {
            $this->view->render('perfil/docente');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    private function cargar_datos_generales(){
        $resultado_docente = $this->model->getDocente($this->session->get("usuario"));
        $resultado_generales = $this->model->getDatosGeneralesUsuario($this->session->get("usuario"));
        
        if($resultado_docente && $resultado_generales)
        {   
            $resultado_grado = $this->model->getGrado($resultado_docente['ID_Grado']);
        
            $resultado_id_descripcion_periodo_actual =  $this->model->getDescripcionPeriodo($resultado_docente['Periodo_Actual']);
            $resultado_descripcion_periodo_actual = $this->model->getDescripcion($resultado_id_descripcion_periodo_actual['ID_Descripcion']);
            $resultado_estatus = $this->model->getEstatus($resultado_docente['Estatus']);
            $resultado_origen = $this->model->getOrigenUsuario($resultado_generales['ID_Origen']);
            $resultado_pais = $this->model->getPaisUsuario($resultado_origen['ID_Pais']);
            $resultado_estado = $this->model->getEstadoUsuario($resultado_origen['ID_Estado']);
            $resultado_municipio = $this->model->getMunicipioUsuario($resultado_origen['ID_Municipio']);
        
                //Renderizacion a la vista
                $this->view->resultado_docente = $resultado_docente;
                $this->view->resultado_generales = $resultado_generales;
    
                $this->view->resultado_id_descripcion_periodo_actual = $resultado_id_descripcion_periodo_actual;
                $this->view->resultado_descripcion_periodo_actual = $resultado_descripcion_periodo_actual;
                $this->view->resultado_grado = $resultado_grado;
                $this->view->resultado_estatus = $resultado_estatus;
                $this->view->resultado_pais = $resultado_pais;
                $this->view->resultado_estado = $resultado_estado;
                $this->view->resultado_municipio = $resultado_municipio;
        }
    }

    function datos_generales(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_docente/datos_generales');
    }

    function datos_generales_modificar(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_docente/datos_generales_modificar');
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
    
        header("Location: ". URL ."perfil_docente/datos_generales");
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

        $this->view->render('perfil_docente/contacto');
    }

    function contacto_modificar(){
        $this->cargar_contacto();

        $this->view->render('perfil_docente/contacto_modificar');
    }

    function update_contacto(){
        $array = array("tel_domi" => $_POST['contacto_tel_domi'], "cel" => $_POST['contacto_cel'], "num_eme" => $_POST['contacto_tel_eme']);
        $update = $this->model->UpdateContactoUsuario($array, $this->session->get("usuario"));
        
        $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 
        $this->session->add("operacion",$mensaje);

        header("Location: ". URL ."perfil_docente/contacto");
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

            $this->view->render('perfil_docente/datos_laborales');
        }
    }

    function cuenta(){
        $this->view->render('perfil_docente/cuenta');
    }

    function update_cuenta(){
        $array_cuenta = array("usuario" => $_POST['num_control'], "pass" =>  password_hash($_POST["password"], PASSWORD_DEFAULT));
        $update_cuenta= $this->model->UpdateCuenta($array_cuenta);

        if($update_cuenta){
            $this->session->add("operacion","Se actualizo correctamente");
        }else{
            $this->session->add("operacion","No se actualizo correctamente");
        }

        header("Location: ". URL ."perfil_docente/cuenta");
    }


    function documentos(){
        $resultado_documentos = $this->model->getDocumentosUsuario($this->session->get("usuario"));

        $this->view->resultado_documentos = $resultado_documentos;

        $this->view->render('perfil_docente/documentos');
    }

    function historial(){
        $resultado_historial = $this->model->getHistorial($this->session->get("usuario"));
        $resultado_asignaturas = $this->model->getAsignaturas($this->session->get("usuario"));

        $this->view->resultado_historial = $resultado_historial;
        $this->view->resultado_asignaturas = $resultado_asignaturas;

        $this->view->render('perfil_docente/historial');

    }


}
?>