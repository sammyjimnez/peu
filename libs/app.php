<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){
        //echo "<p>Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //echo $_GET['url'];
        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $url[0] = 'login';
            /*$archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;*/
        }

        
        //print_r($url);
        
        $archivoController = 'controllers/' . $url[0] . '.php';
        //print_r($archivoController);
        if(file_exists($archivoController)){
            require_once $archivoController;

            // inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            

            // # elementos del arreglo
            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    if(method_exists($controller, $url[1]))
                    {
                        if(func_num_args() > 0)
                        {
                            $controller->{$url[1]}($param);
                        }else{
                            $controller = new Errores();
                        }   
                    }else{
                        $controller = new Errores();
                    }

                }else{
                    if(method_exists($controller,$url[1])){
                        $controller->{$url[1]}();
                    }else{
                        $controller = new Errores();
                    }
                }
            }else{
                $controller->render();
            }
        }else{
            $controller = new Errores();
        }
    }
}

?>