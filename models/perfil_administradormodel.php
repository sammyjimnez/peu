<?php
    class Perfil_AdministradorModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAlumnosSinBuscar(){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscar(){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscar(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscar(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosSinBuscarPerfil(){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarPerfil(){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarPerfil(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarPerfil(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarPerfilCarrera($carrera){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }


        public function getAlumnosSinBuscarCarrera($carrera){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarCarrera($carrera){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscar($buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM  
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscar($buscar){
            $sql="SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscar($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscar($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarPerfil($buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM 
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarPerfil($buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ?  AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarPerfil($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarPerfil($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarPerfilCarrera($carrera, $buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre, ca.Nom_Carrera FROM 
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarPerfilCarrera($carrera,$buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre, ca.Nom_Carrera FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente", "$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarPerfilCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarPerfilCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM  
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarCarrera($carrera,$buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }
    }
?>