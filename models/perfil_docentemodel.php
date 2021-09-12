<?php

class Perfil_DocenteModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    
        //Informacion del docente
        public function getDocente($id){
            $sql="SELECT * FROM docentes WHERE Num_Control= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getGrado($id){
            $sql="SELECT Nombre FROM grados WHERE ID_Grado= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }
    
            public function getDescripcionPeriodo($id){
                $sql="SELECT ID_Descripcion, Anio FROM periodos WHERE ID_Periodo= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getDescripcion($id){
                $sql="SELECT Descripcion FROM descripcion WHERE ID_Descripcion= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
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
            $sql="SELECT Imagen FROM docentes WHERE Num_Control= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function UpdateGeneral($img, $id){
            $sql = "UPDATE docentes SET Imagen=? WHERE Num_Control=?";
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
        

    //INFORMACION DEL HISTORIAL
        public function getHistorial($id){
            $sql = "SELECT p.Anio, d.Descripcion, a.Nombre_Asig, c.Nom_Carrera FROM historial_docente hs 
            INNER JOIN periodos p ON p.ID_Periodo = hs.Periodo INNER JOIN descripcion d ON d.ID_Descripcion = p.ID_Descripcion 
            INNER JOIN asignatura a ON a.ID_Asig = hs.ID_Asig INNER JOIN carrera c ON c.ID_Carrera = hs.ID_Carrera
            WHERE Num_Control = ?";
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

        public function getAsignaturas($id){
            $sql = "SELECT a.Nombre_Asig, c.Nom_Carrera, ad.Estatus FROM asignaturas_docente ad 
            INNER JOIN asignatura a ON a.ID_Asig = ad.ID_Asignatura INNER JOIN carrera c ON c.ID_Carrera = ad.ID_Carrera 
            WHERE Num_Control=?";
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
}

?>