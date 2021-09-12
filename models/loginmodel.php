<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getUsuario($datos){

        $consulta = $this->db->connect()->prepare("SELECT ID_Perfil FROM cuenta WHERE ID_Mt_Ctl= ? AND Passw= ?");
        $consulta->execute(array($datos['usuario'], $datos['password']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function get_tipo_usuario($datos)
    {
        $consulta = $this->db->connect()->prepare("SELECT Nombre FROM perfiles WHERE ID_Perfil = ?");
        $consulta->execute(array($datos['perfil']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function get_nombre_alumno($datos)
    {
        $consulta = $this->db->connect()->prepare("SELECT Nombres, Apellido_Materno, Apellido_Paterno FROM alumnos WHERE Matricula = ?");
        $consulta->execute(array($datos['usuario']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;

    }

    //Obtiene el nombre completo si el perfil es docente - Un resultado    
    public function get_nombre_docente($datos)
    {
        $consulta = $this->db->connect()->prepare("SELECT Nombres, Apellido_materno, Apellido_paterno FROM docentes WHERE Num_Control = ?");
        $consulta->execute(array($datos['usuario']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    //Obtiene el nombre completo si el perfil es administrativo - Un resultado
    public function get_nombre_administrativo($datos)
    {
        $consulta = $this->db->connect()->prepare("SELECT Nombres, Apellido_materno, Apellido_paterno FROM administrativos WHERE Num_Control = ?");
        $consulta->execute(array($datos['usuario']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    //Obtiene el nombre completo si el perfil es director - Un resultado
    public function get_nombre_director($datos)
    {
        $consulta = $this->db->connect()->prepare("SELECT Nombres, Apellido_materno, Apellido_paterno, ID_Carrera FROM director_carrera WHERE Num_Control = ?");
        $consulta->execute(array($datos['usuario']));

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }  
}

?>