
<?php

class Main extends Controller{

    private $session;
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo")){
            header("Location:  ".URL."home");
        }else{
            $this->view->render('main/index');
        }

    }

}

?>