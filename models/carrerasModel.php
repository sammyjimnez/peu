<?php

class carrerasModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
        //insertar datos a la bd
        //echo "insertardatos xd";
        $query = $this->db->connect()->prepare('INSERT INTO carrera (Nom_Carrera, ID_Niv, ID_Sit, Inicio, Terminacion, Cordinador) 
        VALUES(:carrera, :grado, :situacion, :inicio, :termino, :coordinador)');
        $query->execute(['carrera' =>$datos['carrera'], 'inicio'=>$datos['inicio'], 'termino'=>$datos['termino'],
       'grado'=>$datos['grado'], 'situacion'=>$datos['situacion'], 'coordinador'=>$datos['coordinador']]);
    }

    public function actualizar($datos){
        //insertar datos a la bd
        //echo "insertardatos xd";
        $query = $this->db->connect()->prepare('UPDATE carrera SET Nom_Carrera=:carrera, ID_Niv=:grado, ID_Sit=:situacion, Inicio=:inicio, Terminacion=:termino, Cordinador=:coordinador WHERE ID_Carrera=:idCarrera');
        $query->execute([
            'carrera' =>$datos['carrera'], 
            'inicio'=>$datos['inicio'], 
            'termino'=>$datos['termino'],
            'grado'=>$datos['grado'], 
            'situacion'=>$datos['situacion'], 
            'coordinador'=>$datos['coordinador'],
            'idCarrera'=>$datos['idCarrera']
        ]);
    }

    public function consultar($id){
        $sql="SELECT * FROM carrera WHERE ID_Carrera= ?";
        //$query = $this->db->connect()->prepare($sql);
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(array($id)); 
        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function llenarGrado(){
        $sql="SELECT * FROM nivel";
        //$query = $this->db->connect()->prepare($sql);
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(); 

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public function llenarSit(){
        $sql="SELECT * FROM situacion";
        //$query = $this->db->connect()->prepare($sql);
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(); 

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    
}