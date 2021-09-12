<?php
class Asignaturas extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        
    }
    
    function render(){
        
        if($this->session->get("tipo") == "Director" || $this->session->get("tipo") == "Administrador")
        {
            $this->view->render('asignaturas/director');
        }else{
            $this->view->render('errores/error401');
            
        }
        
    }

    function registroAsignatura()
    {
        $Clave           = $_POST['claveasignatura'];
        $Nombre_Asig     = $_POST['nombreasignatura'];
        $Nombre_Corto    = $_POST['nombrecortoasignatura'];
        $Creditos        = $_POST['creditoasignatura'];
        $Hrs_Clase       = $_POST['horasteoricas'];
        $Hrs_Practicas   = $_POST['horaspracticas'];
        $Hrs_Totales     = $_POST['horastotales'];
        $Plan_Academico  =$_POST['planacademico'];
        $Ruta_Descarga   = $_POST['manual'];
        $Caracterizacion =$_POST['caracterizacion'];
        $intuicion       =$_POST['intuicion'];
        $Com_Especifica  = $_POST['competencia'];
       
       
        $this->model->setAsignaturas(['clave_asig' => $Clave,'Nombre_asignatura' => $Nombre_Asig,'Nombre_Corto' => $Nombre_Corto,
        'Creditos' => $Creditos, 'Horas_teoricas' => $Hrs_Clase, 'Horas_Practicas' => $Hrs_Practicas,
        'Horas_Totales' => $Hrs_Totales, 'plan_academico' => $Plan_Academico, 'ruta' => $Ruta_Descarga, 'caracterizacion' => $Caracterizacion,
        'intuicion' => $intuicion, 'competencia' => $Com_Especifica]);

        header("Location: ".URL."asignaturas");

    }   
}

?>