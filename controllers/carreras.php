<?php
class Carreras extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        //header("Location: ".URL."asignaturas/director");
        
    }
    function render(){
        if($this->session->get("tipo") == "Director" || $this->session->get("tipo") == "Administrador")
        {
            $this->consultar();
            $this->llenadoGrado();
            $this->llenadoSituacion();
            $this->view->render('carreras/director');
        }else{
            $this->view->render('errores/error401');
        }
    }

    function agregarCarrera(){
        $this->view->render('carreras/agregarCarrera');
    }
    
    function registrarCarrera(){
        //echo "registrarcarrera si funciona xd";
        $nomCarrera = $_POST['carrera'];
        $fecInicio = $_POST['fechainicio'];
        $fecTermino = $_POST['fechatermino'];
        $graAcademico = $_POST['graAcademico'];
        $situación = $_POST['situacion'];
        $nomCoordinador = $_POST['coordinador'];

        $this->model->insertar(['carrera' => $nomCarrera, 'inicio' => $fecInicio, 'termino' => $fecTermino, 'grado' => $graAcademico,
        'situacion' => $situación, 'coordinador' => $nomCoordinador]);

        header("Location: ".URL."carreras");
    }

    function actualizarCarrera(){
        //echo "registrarcarrera si funciona xd";
        $nomCarrera = $_POST['carrera'];
        $fecInicio = $_POST['fechainicio'];
        $fecTermino = $_POST['fechatermino'];
        $graAcademico = $_POST['graAcademico'];
        $situación = $_POST['situacion'];
        $nomCoordinador = $_POST['coordinador'];

        $this->model->actualizar(['carrera' => $nomCarrera, 'inicio' => $fecInicio, 'termino' => $fecTermino, 'grado' => $graAcademico,
        'situacion' => $situación, 'coordinador' => $nomCoordinador, 'idCarrera' => $this->session->get("coorCarrera")]);
        //echo $idCarrera;
        $this->session->add("alerta", true);
        header("Location: ".URL."carreras"); 
    }

    function consultar(){
        //$carrera = $_GET['buscador'];
        $resultado=$this->model->consultar($this->session->get("coorCarrera"));
        //echo $resultado;
        if($resultado)
        {
            $this->view->resultado = $resultado;
        }
    }

    function llenadoGrado(){
        $niveles=$this->model->llenarGrado();
        if($niveles)
        {
            $this->view->niveles = $niveles;
        }
    }

    function llenadoSituacion(){
        $situacionCarrera=$this->model->llenarSit();
        if($situacionCarrera)
        {
            $this->view->situacionCarrera = $situacionCarrera;
        }
    }

}


?>