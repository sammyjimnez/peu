<?php
class Planes extends Controller{
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
            $this->view->render('planes/director');
        }else{
            $this->view->render('errores/error401');
        }
    }
}


?>