<?php

class planesModel extends Model {
    
    public function __construct(){
        parent::__construct();
    }

    /*public function setPlanes($datos) //especificar datos de entrada
    {
        $query = mysql_query("INSERT INTO plan_de_estudio (Clave_Oficial,ID_Carrera,Total_Materias,Creditos_Total,Per_Duracion,Per_Max,Cod_Revision)
        VALUES ('?','?','?','?','?','?','?')");
        $smt =$this->cnx->prepare($query);
        $smt->execute($datos['Clave_Oficial'],$datos['ID_Carrera'],$datos['Total_Materias'],$datos['Creditos_Total'],$datos['Per_Duacion']
        ,$datos['Per_Max'],$datos['Cod_Revision']);
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }
        
    public function getPlanes($datos) //especificar qué plan de estudios
    {
        $query = mysql_query("SELECT c.Nom_Carrera, p.Cod_Revision as 'Plan Academico', p.Clave_Oficial,c.Inicio,c.Terminacion,p.Per_Max
        FROM Carrera c INNER JOIN Plan_de_estudio p
        on c.ID_Carrera = p.ID_Carrera
        WHERE p.Cod_Revision = '?'
        OR c.Nom_Carrera = '?'
        AND p.Clave_Oficial = '?'");
        $smt =$this->cnx->prepare($query);
        $smt->execute($datos['Cod_Revision'],$datos['c.Nom_Carrera'],$datos['Clave_Oficial']);
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }
    public function updatePlanes($datos,$consulta) //especificar datos de entrada
    {
        $query = mysql_query("UPDATE plan_de_estudio 
        SET Clave_Oficial = ?,ID_Carrera = ?,Total_Materias = ?,Creditos_Total = ?,Per_Duracion = ?,Per_Max = ?,Cod_Revision = ?
        WHERE Clave_Oficial = $consulta['Clave_Oficial'], AND Cod_Revision = $consulta['Cod_Revision']");//Se necesita revision
        $smt =$this->cnx->prepare($query);
        $smt->execute($datos['Clave_Oficial'],$datos['ID_Carrera'],$datos['Total_Materias'],$datos['Creditos_Total'],$datos['Per_Duacion']
        ,$datos['Per_Max'],$datos['Cod_Revision']);
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }*/
}