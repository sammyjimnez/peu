
<?php

class Perfil_Director extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Director")
        {
            $this->view->render('perfil/director');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    private function cargar_datos_generales(){
        $resultado_director = $this->model->getDirector($this->session->get("usuario"));
        $resultado_generales = $this->model->getDatosGeneralesUsuario($this->session->get("usuario"));
        
            $resultado_carrera =  $this->model->getCarrera($resultado_director['ID_Carrera']) ;
            $resultado_id_descripcion_periodo = $this->model->getDescripcionPeriodo($resultado_director['ID_Periodo']) ;
            $resultado_descripcion_periodo = $this->model->getDescripcion($resultado_id_descripcion_periodo['ID_Descripcion']) ;
            $resultado_estatus = $this->model->getEstatus($resultado_director['Estatus']);
        
            $resultado_origen =  $this->model->getOrigenUsuario($resultado_generales['ID_Origen']) ;
            $resultado_pais =  $this->model->getPaisUsuario($resultado_origen['ID_Pais']);
            $resultado_estado = $this->model->getEstadoUsuario($resultado_origen['ID_Estado']);
            $resultado_municipio = $this->model->getMunicipioUsuario($resultado_origen['ID_Municipio']);
    
                //Renderizacion a la vista
                $this->view->resultado_director = $resultado_director;
                $this->view->resultado_generales = $resultado_generales;
    
                $this->view->resultado_carrera = $resultado_carrera;
                $this->view->resultado_id_descripcion_periodo = $resultado_id_descripcion_periodo;
                $this->view->resultado_descripcion_periodo = $resultado_descripcion_periodo;
                $this->view->resultado_estatus = $resultado_estatus;
                $this->view->resultado_pais = $resultado_pais;
                $this->view->resultado_estado = $resultado_estado;
                $this->view->resultado_municipio = $resultado_municipio;
    }

    function datos_generales(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_director/datos_generales');
    }

    function datos_generales_modificar(){
        $this->cargar_datos_generales();

        $this->view->render('perfil_director/datos_generales_modificar');
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
    
        header("Location: ". URL ."perfil_director/datos_generales");
    }

    function cargar_contacto(){
        $resultado_contacto=$this->model->getContactoUsuario($this->session->get("usuario"));
        $resultado_medico=$this->model->getServicioMedicoUsuario($this->session->get("usuario"));

            $this->view->resultado_contacto = $resultado_contacto;
            $this->view->resultado_medico = $resultado_medico;

    }

    function contacto(){
        $this->cargar_contacto();

        $this->view->render('perfil_director/contacto');
    }

    function contacto_modificar(){
        $this->cargar_contacto();

        $this->view->render('perfil_director/contacto_modificar');
    }

    function update_contacto(){
        $array = array("tel_domi" => $_POST['contacto_tel_domi'], "cel" => $_POST['contacto_cel'], "num_eme" => $_POST['contacto_tel_eme']);
        $update = $this->model->UpdateContactoUsuario($array, $this->session->get("usuario"));
        
        $mensaje = $update  ? "Se actualizo correctamente" : "No se pudo actualizar"; 
        $this->session->add("operacion",$mensaje);

        header("Location: ". URL ."perfil_director/contacto");
    }

    function cuenta(){
        $this->view->render('perfil_director/cuenta');
    }

    function update_cuenta(){
        $array_cuenta = array("usuario" => $_POST['num_control'], "pass" =>  password_hash($_POST["password"], PASSWORD_DEFAULT));
        $update_cuenta= $this->model->UpdateCuenta($array_cuenta);

        if($update_cuenta){
            $this->session->add("operacion","Se actualizo correctamente");
        }else{
            $this->session->add("operacion","No se actualizo correctamente");
        }

        header("Location: ". URL ."perfil_director/cuenta");
    }

    function documentos(){
        $resultado_documentos = $this->model->getDocumentosUsuario($this->session->get("usuario"));

        $this->view->resultado_documentos = $resultado_documentos;

        $this->view->render('perfil_director/documentos');
    }

}
?>