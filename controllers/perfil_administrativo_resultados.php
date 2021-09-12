
<?php

class Perfil_Administrativo_Resultados extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        header("Location: ".URL."perfil_administrativo/buscador/Todos");
    }


    function cargar_datos_alumno($alumno){
        $resultado_alumno = $this->model->getAlumno($alumno);

        $resultado_id_descripcion_periodo_ingreso =  $this->model->getDescripcionPeriodo($resultado_alumno['Periodo_Ingreso']);
        $resultado_descripcion_periodo_ingreso = $this->model->getDescripcion($resultado_id_descripcion_periodo_ingreso['ID_Descripcion']);
        $resultado_id_descripcion_periodo_actual =  $this->model->getDescripcionPeriodo($resultado_alumno['Periodo_Actual']);
        $resultado_descripcion_periodo_actual = $this->model->getDescripcion($resultado_id_descripcion_periodo_actual['ID_Descripcion']);
    
        $resultado_ingreso = $this->model->getIngreso($resultado_alumno['Tipo_Ingreso']);
        $resultado_grupo = $this->model->getGrupo($resultado_alumno['Grupo']);
        $resultado_carrera = $this->model->getCarreraUsuario($resultado_alumno['ID_Carrera']);
        $resultado_plan_estudio = $this->model->getPlanEstudio($resultado_alumno['Plan_estudio']);

        $this->view->resultado_alumno = $resultado_alumno;
        $this->view->resultado_id_descripcion_periodo_ingreso = $resultado_id_descripcion_periodo_ingreso;
        $this->view->resultado_id_descripcion_periodo_actual = $resultado_id_descripcion_periodo_actual;
        $this->view->resultado_descripcion_periodo_actual = $resultado_descripcion_periodo_actual;
        $this->view->resultado_descripcion_periodo_ingreso = $resultado_descripcion_periodo_ingreso;

        $this->view->resultado_ingreso = $resultado_ingreso;
        $this->view->resultado_grupo = $resultado_grupo;
        $this->view->resultado_carrera = $resultado_carrera;
        $this->view->resultado_plan_estudio = $resultado_plan_estudio;
    }

    function cargar_datos_generales($usuario){
        $resultado_generales = $this->model->getDatosGeneralesUsuario($usuario);

        $resultado_origen = $this->model->getOrigenUsuario($resultado_generales['ID_Origen']);
        $resultado_pais = $this->model->getPaisUsuario($resultado_origen['ID_Pais']);
        $resultado_estado = $this->model->getEstadoUsuario($resultado_origen['ID_Estado']);
        $resultado_municipio = $this->model->getMunicipioUsuario($resultado_origen['ID_Municipio']);

        $this->view->resultado_generales = $resultado_generales;
        $this->view->resultado_estado = $resultado_estado;
        $this->view->resultado_pais = $resultado_pais;
        $this->view->resultado_municipio = $resultado_municipio;
    }
    function cargar_contacto($usuario){
        $resultado_contacto=$this->model->getContactoUsuario($usuario);
        $resultado_medico=$this->model->getServicioMedicoUsuario($usuario);

        $this->view->resultado_contacto = $resultado_contacto;
        $this->view->resultado_medico = $resultado_medico;
    }

    function cargar_documentos($usuario){
        $resultado_documentos = $this->model->getDocumentosUsuario($usuario);
        $this->view->resultado_documentos = $resultado_documentos;
    }

    function alumno($params){
        switch ($params[1]) {
            case "Secciones":

                $this->cargar_datos_alumno($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->cargar_contacto($params[0]);
                $this->cargar_documentos($params[0]);

                $resultado_procedencia = $this->model->getProcedencia($params[0]);
                $resultado_adicional = $this->model->getAdicionales($params[0]);

                    //PROCEDENCIA
                    $resultado_bachiller = $this->model->getBachilleres($resultado_procedencia['ID_Bachiller']);
                    $resultado_bachiller_area = $this->model->getBachilleresArea($resultado_procedencia['ID_Bach_Area']);
    
                    //ADICIONALES
                    $resultado_indigena = $this->model->getIndigena($resultado_adicional['ID_Indigena']);
                    $resultado_grupo_indigena = $this->model->getGrupoIndigena($resultado_indigena['ID_Grupo_Indigena']);
                    $resultado_lengua = $this->model->getLenguaIndigena($resultado_indigena['ID_Lengua']);
                    $resultado_beca = $this->model->getBeca($resultado_adicional['ID_Beca']);;
                    $resultado_discapacidad= $this->model->getDiscapacidad($resultado_adicional['ID_Discapacidad']);

                    $this->view->resultado_procedencia = $resultado_procedencia;
                    $this->view->resultado_adicional = $resultado_adicional;

                    $this->view->resultado_bachiller = $resultado_bachiller;
                    $this->view->resultado_bachiller_area = $resultado_bachiller_area;
                    $this->view->resultado_indigena = $resultado_indigena;
                    $this->view->resultado_grupo_indigena = $resultado_grupo_indigena;
                    $this->view->resultado_lengua = $resultado_lengua;
                    $this->view->resultado_beca = $resultado_beca;
                    $this->view->resultado_discapacidad = $resultado_discapacidad;
                    $this->view->usuario = $params[0];

                    $this->view->render('perfil_administrativo_resultados/todo_alumno');

            break;
            case "Generales":
                $this->cargar_datos_alumno($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/datos_generales_alumno');

            break;
            case "Contacto":
                $this->cargar_contacto($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/contacto');
            break;
            case "Procedencia":
                $resultado_procedencia = $this->model->getProcedencia($params[0]);

                $resultado_bachiller = $this->model->getBachilleres($resultado_procedencia['ID_Bachiller']);
                $resultado_bachiller_area = $this->model->getBachilleresArea($resultado_procedencia['ID_Bach_Area']);

                $this->view->resultado_procedencia = $resultado_procedencia;
                $this->view->resultado_bachiller = $resultado_bachiller;
                $this->view->resultado_bachiller_area = $resultado_bachiller_area;
                $this->view->usuario = $params[0];
                
                $this->view->render('perfil_administrativo_resultados/procedencia');
            break;
            case "Adicionales":
                $resultado_adicional = $this->model->getAdicionales($params[0]);

                $resultado_indigena = $this->model->getIndigena($resultado_adicional['ID_Indigena']);
                $resultado_grupo_indigena = $this->model->getGrupoIndigena($resultado_indigena['ID_Grupo_Indigena']);
                $resultado_lengua = $this->model->getLenguaIndigena($resultado_indigena['ID_Lengua']);
                $resultado_beca = $this->model->getBeca($resultado_adicional['ID_Beca']);;
                $resultado_discapacidad= $this->model->getDiscapacidad($resultado_adicional['ID_Discapacidad']);

                $this->view->resultado_indigena = $resultado_indigena;
                $this->view->resultado_grupo_indigena = $resultado_grupo_indigena;
                $this->view->resultado_lengua = $resultado_lengua;
                $this->view->resultado_beca = $resultado_beca;
                $this->view->resultado_discapacidad = $resultado_discapacidad;
                $this->view->usuario = $params[0];
                
                $this->view->render('perfil_administrativo_resultados/datos_adicionales');
            break;
            case "Documentos":
                $this->cargar_documentos($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/documentos');
            break;
            default:
                
            break;
        }
    }

    private function cargar_datos_docente($docente){
        $resultado_docente = $this->model->getDocente($docente);

            $resultado_grado = $this->model->getGrado($resultado_docente['ID_Grado']);
        
            $resultado_id_descripcion_periodo_actual =  $this->model->getDescripcionPeriodo($resultado_docente['Periodo_Actual']);
            $resultado_descripcion_periodo_actual = $this->model->getDescripcion($resultado_id_descripcion_periodo_actual['ID_Descripcion']);
            $resultado_estatus = $this->model->getEstatus($resultado_docente['Estatus']);

                //Renderizacion a la vista
                $this->view->resultado_docente = $resultado_docente;
    
                $this->view->resultado_id_descripcion_periodo_actual = $resultado_id_descripcion_periodo_actual;
                $this->view->resultado_descripcion_periodo_actual = $resultado_descripcion_periodo_actual;
                $this->view->resultado_grado = $resultado_grado;
                $this->view->resultado_estatus = $resultado_estatus;

    }

    private function cargar_datos_laborales($usuario){

        $resultado_laboral = $this->model->getLaboral($usuario);

        $resultado_area=$this->model->getLaboralArea($resultado_laboral['ID_Area']);
        $resultado_departamento=$this->model->getLaboralDepartamento($resultado_laboral['ID_Departamento']);
        $resultado_puesto=$this->model->getLaboralPuesto($resultado_laboral['ID_Puesto']);

        $this->view->resultado_area = $resultado_area;
        $this->view->resultado_departamento = $resultado_departamento;
        $this->view->resultado_laboral = $resultado_laboral;
        $this->view->resultado_puesto = $resultado_puesto;
    }

    function docente($params){
        switch ($params[1]) {
            case "Secciones":

                $this->cargar_datos_docente($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->cargar_contacto($params[0]);
                $this->cargar_documentos($params[0]);
                $this->cargar_datos_laborales($params[0]);

                $resultado_historial = $this->model->getHistorial($params[0]);
                $resultado_asignaturas = $this->model->getAsignaturas($params[0]);

                $this->view->resultado_historial = $resultado_historial;
                $this->view->resultado_asignaturas = $resultado_asignaturas;
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/todo_docente');

            break;
            case "Generales":
                $this->cargar_datos_docente($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/datos_generales_docente');

            break;
            case "Contacto":
                $this->cargar_contacto($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/contacto');
            break;
            case "Laborales":
                $this->cargar_datos_laborales($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/datos_laborales');
            break;
            case "Historial":
                $resultado_historial = $this->model->getHistorial($params[0]);
                $resultado_asignaturas = $this->model->getAsignaturas($params[0]);

                $this->view->resultado_historial = $resultado_historial;
                $this->view->resultado_asignaturas = $resultado_asignaturas;
                
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/historial');
            break;
            case "Documentos":
                $this->cargar_documentos($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/documentos');
            break;
            default:
                
            break;
        }
    }

    function cargar_datos_director($director){
        $resultado_director = $this->model->getDirector($director);

        $resultado_carrera =  $this->model->getCarreraUsuario($resultado_director['ID_Carrera']);
        $resultado_id_descripcion_periodo = $this->model->getDescripcionPeriodo($resultado_director['ID_Periodo']) ;
        $resultado_descripcion_periodo = $this->model->getDescripcion($resultado_id_descripcion_periodo['ID_Descripcion']) ;
        $resultado_estatus = $this->model->getEstatus($resultado_director['Estatus']);

        $this->view->resultado_director = $resultado_director;
        $this->view->resultado_carrera = $resultado_carrera;
        $this->view->resultado_id_descripcion_periodo = $resultado_id_descripcion_periodo;
        $this->view->resultado_descripcion_periodo = $resultado_descripcion_periodo;
        $this->view->resultado_estatus = $resultado_estatus;
    }

    function director($params){
        switch ($params[1]) {
            case "Secciones":

                $this->cargar_datos_director($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->cargar_contacto($params[0]);
                $this->cargar_documentos($params[0]);

                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/todo_director');

            break;
            case "Generales":
                $this->cargar_datos_director($params[0]);
                $this->cargar_datos_generales($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/datos_generales_director');

            break;
            case "Contacto":
                $this->cargar_contacto($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/contacto');
            break;
            case "Documentos":
                $this->cargar_documentos($params[0]);
                $this->view->usuario = $params[0];

                $this->view->render('perfil_administrativo_resultados/documentos');
            break;
            default:
                
            break;
        }
    }
}   

?>