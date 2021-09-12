<?php

class Perfil_AdministrativoModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    
        //Informacion del docente
        //Un resultado
        public function getAdministrativo($id){
            $sql="SELECT * FROM administrativos WHERE Num_Control= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getCarrera($id){
            $sql="SELECT * FROM carrera WHERE ID_Carrera= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getEstatus($id){
            $sql="SELECT Nombre FROM estatus_perfil WHERE ID_Estatus_Perfil= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function getImagen($id){
            $sql="SELECT Imagen FROM administrativos WHERE Num_Control= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function UpdateGeneral($img, $id){
            $sql = "UPDATE administrativos SET Imagen=? WHERE Num_Control=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$img, $id]);

            return !empty($consulta) ? true : false;
        }

    //Informacion laborales

        //Un resultado
        public function getLaboral($id){
            $sql = "SELECT * FROM datos_laborales WHERE Num_Control=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getLaboralArea($id){
            $sql = "SELECT Nombre FROM areas WHERE ID_Area=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

         //Un resultado
        public function getLaboralDepartamento($id){
            $sql = "SELECT Nombre FROM departamentos WHERE ID_Departamento=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getLaboralPuesto($id){
            $sql = "SELECT Nombre FROM puestos WHERE ID_Puesto=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }
        
        //Informacion general
            public function getDatosGeneralesUsuario($id){
                $sql="SELECT * FROM datos_generales WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
            //Un resultado 
            public function getOrigenUsuario($id){
                $sql="SELECT * FROM origen WHERE ID_Origen= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }       
    
            //Un resultado 
            public function getPaisUsuario($id){
                $sql="SELECT Nombre FROM paises WHERE ID_Pais= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }      
    
            //Un resultado 
            public function getEstadoUsuario($id){
                $sql="SELECT Nombre FROM estados WHERE ID_Estado= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
            
            //Un resultado 
            public function getMunicipioUsuario($id){
                $sql="SELECT Nombre FROM municipios WHERE ID_Municipio= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
            
        //Informacion de contacto
            public function getContactoUsuario($id){
                $sql="SELECT * FROM contacto WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }  
            
        //Informacion del servicio medico
            public function getServicioMedicoUsuario($id){
                $sql="SELECT * FROM servicio_medico WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
    
        //Informacion actualizar 
            public function UpdateContactoUsuario($array, $id){
                $sql = "UPDATE contacto SET Tel_Domicilio=?, Celular=?, Tel_Emergencia=? WHERE ID_Mt_Ctl=?";
                $consulta= $this->db->connect()->prepare($sql);
                $consulta->execute([$array['tel_domi'],$array['cel'], $array['num_eme'], $id]);
    
                return !empty($consulta) ? true : false;
            }
    
        //Informacion de los documentos
            public function getDocumentosUsuario($id){
                $sql = "SELECT d.Nombre AS documento, Ruta, d.Estatus, td.Nombre AS tipo_documento FROM documentos d 
                INNER JOIN tipo_documentos td ON td.ID_Tipo_Doc = d.ID_Tipo_Doc WHERE ID_Mt_Ctl=?";
                $consulta= $this->db->connect()->prepare($sql);
                $consulta->execute(array($id));
    
                if(!empty($consulta))
                {
                    $resultado = array();
                    while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                    {
                        $resultado[] = $fila;
                    }
                    return $resultado;
                }
                return false;
            }


        //BUSCADOR

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
}

?>