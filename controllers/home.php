
<?php

class Home extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo")){
            switch($this->session->get("tipo"))
            {
                case 'Alumno': 
                        header("Location: ".URL."home/alumno");
                break;
                case 'Docente': 
                    header("Location: ".URL."home/docente");
                break;
                case 'Director': 
                    header("Location: ".URL."home/director");
                break;
                case 'Administrativo': 
                    header("Location: ".URL."home/administrativo");
                break;
                case 'Administrador': 
                    header("Location: ".URL."home/administrador");
                break;
                
            }
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function alumno(){
        if($this->session->get("tipo") == "Alumno")
        {
            $this->view->render('home/alumno');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function docente(){
        if($this->session->get("tipo") == "Docente")
        {
            $this->view->render('home/docente');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function director(){
        if($this->session->get("tipo") == "Director")
        {
            $this->view->render('home/director');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function administrativo(){
        if($this->session->get("tipo") == "Administrativo")
        {
            $this->view->render('home/administrativo');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function administrador(){
        if($this->session->get("tipo") == "Administrador")
        {
            $this->view->render('home/administrador');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }
}

?>