
<?php

class Login extends Controller{

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
            $this->view->render('login');
        }
    }

    function verificar(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $res_cuenta = $this->model->getUsuario(['usuario' => $usuario, 'password' => $password]);

        if($res_cuenta)
        {
            $res_perfil = $this->model->get_tipo_usuario(['perfil' => $res_cuenta['ID_Perfil']]);
            if($res_perfil)
            {
                switch($res_perfil['Nombre'])
                {
                    case 'Alumno': 
                        $res_nombre = $this->model->get_nombre_alumno(['usuario' => $usuario]);
                        if($res_nombre){
                            $this->session->add("usuario", $usuario);
                            $this->session->add("nombre", $res_nombre['Nombres']." ".$res_nombre['Apellido_Paterno']." ".$res_nombre['Apellido_Materno']);
                            $this->session->add("tipo", "Alumno");
                            header("Location:  ".URL."home/alumno");
                        }
                        else {
                            echo("<script>alert('¡Credenciales incorrectas!'); window.location = '".URL."login'</script>");
                        }
                    break;
                    case 'Docente': 
                        $res_nombre = $this->model->get_nombre_docente(['usuario' => $usuario]);
                        if($res_nombre){
                            $this->session->add("usuario", $usuario);
                            $this->session->add("nombre", $res_nombre['Nombres']." ".$res_nombre['Apellido_paterno']." ".$res_nombre['Apellido_materno']);
                            $this->session->add("tipo", "Docente");
                            header("Location:  ".URL."home/docente");
                        }
                        else {
                            echo("<script>alert('¡Credenciales incorrectas!'); window.location = '".URL."login'</script>");
                        }
                    break;
                    case 'Director': 
                        $res_nombre = $this->model->get_nombre_director(['usuario' => $usuario]);
                        if($res_nombre){
                            $this->session->add("usuario", $usuario);
                            $this->session->add("nombre", $res_nombre['Nombres']." ".$res_nombre['Apellido_paterno']." ".$res_nombre['Apellido_materno']);
                            $this->session->add("tipo", "Director");
                            $this->session->add("coorCarrera", $res_nombre['ID_Carrera']);
                            $this->session->add("alerta", false);
                            header("Location:  ".URL."home/director");
                        }
                        else {
                            echo("<script>alert('¡Credenciales incorrectas!'); window.location = '".URL."login'</script>");
                        }
                    break;
                    case 'Administrativo': 
                        $res_nombre = $this->model->get_nombre_administrativo(['usuario' => $usuario]);
                        if($res_nombre){
                            $this->session->add("usuario", $usuario);
                            $this->session->add("nombre", $res_nombre['Nombres']." ".$res_nombre['Apellido_paterno']." ".$res_nombre['Apellido_materno']);
                            $this->session->add("tipo", "Administrativo");
                            header("Location:  ".URL."home/administrativo");
                        }
                        else {
                            echo("<script>alert('¡Credenciales incorrectas!'); window.location = '".URL."login'</script>");
                        }
                    break;
                    case 'Administrador': 
                            $this->session->add("usuario", $usuario);
                            $this->session->add("nombre", $usuario);
                            $this->session->add("tipo", "Administrador");
                            header("Location:  ".URL."home/administrador");
                    break;
                    default:
                        echo("<script>alert('¡Credenciales incorrectas!'); window.location = '".URL."login'</script>");
                    break;
                }
            }else
                {
                    echo("<script> alert('¡Credenciales incorrectas!');  window.location = '".URL."login';</script>");
                }
        }else{
                echo("<script> alert('¡Credenciales incorrectas!');  window.location = ' ".URL."login';</script>");
            }    
    }

    function cerrarsession(){
        $this->session->close();
        header("Location: ".URL."login");
    }

}

?>