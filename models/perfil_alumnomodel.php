<?php

class Perfil_AlumnoModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    
        //Informacion del alumno
            public function getAlumno($id){
                $sql="SELECT * FROM alumnos WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getPlanEstudio($id){
                $sql="SELECT Clave_Oficial FROM plan_de_estudio WHERE Clave= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
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
    
            public function getIngreso($id){
                $sql="SELECT Nombre FROM tipo_ingreso WHERE ID_Ingreso= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getGrupo($id){
                $sql="SELECT Clave FROM grupos WHERE ID_Grupos= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getImagen($id){
                $sql="SELECT Imagen FROM alumnos WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function UpdateGeneralAlumno($img, $id){
                $sql = "UPDATE alumnos SET Imagen=? WHERE Matricula=?";
                $consulta= $this->db->connect()->prepare($sql);
                $consulta->execute([$img, $id]);
    
                return !empty($consulta) ? true : false;
            }
    
            public function getProcedencia($id){
                $sql="SELECT * FROM procedencia WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBachilleres($id){
                $sql="SELECT Nombre FROM bachilleres WHERE ID_Bachiller= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBachilleresArea($id){
                $sql="SELECT Nombre FROM bachilleres_areas WHERE ID_Bach_Area= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getAdicionales($id){
                $sql="SELECT * FROM datos_adicionales WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getIndigena($id){
                $sql="SELECT * FROM datos_indigena WHERE ID_Indigena= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getGrupoIndigena($id){
                $sql="SELECT Nombre FROM grupo_indigena WHERE ID_Grupo_Indigena= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getLenguaIndigena($id){
                $sql="SELECT Nombre FROM lengua_indigena WHERE ID_Lengua= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBeca($id){
                $sql="SELECT Nombre FROM becas WHERE ID_Beca= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getDiscapacidad($id){
                $sql="SELECT Nombre FROM discapacidades WHERE ID_Discapacidad= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }

        //Informacion general
            public function getDatosGeneralesUsuario($id){
                $sql="SELECT * FROM datos_generales WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
         
            public function getCarreraUsuario($id){
                $sql="SELECT Nom_Carrera FROM carrera WHERE ID_Carrera= ?";//Se hace la consulta para validar los datos
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