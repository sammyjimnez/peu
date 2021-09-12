<?php

class asignaturasModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function setAsignaturas($datos) //las no sabemos los datos que van a ingresar, son variables
    {
        $query = $this->db->connect()->prepare("INSERT INTO asignatura
        (Clave_Materia, Nombre_Asig, Nombre_Corto, Creditos, Hrs_Clase, Hrs_Practicas, Hrs_Totales, Clave, Ruta_Descarga, Caracterizacion, Objetivos,
        Com_Especifica,ID_Area_Aca, ID_Cuat)
        VALUES
        (:clave_asig, :Nombre_asignatura, :Nombre_Corto, :Creditos, :Horas_teoricas, :Horas_Practicas, :Horas_Totales, '1', :ruta, :caracterizacion, :intuicion,
        :competencia, '1', '1')");
        $query->execute(['clave_asig' => $datos['clave_asig'], 'Nombre_asignatura' => $datos['Nombre_asignatura'],'Nombre_Corto' => $datos['Nombre_Corto'], 'Creditos' => $datos['Creditos'],'Horas_teoricas' => $datos['Horas_teoricas'],
        'Horas_Practicas' => $datos['Horas_Practicas'],'Horas_Totales' => $datos['Horas_Totales'],'ruta' => $datos['ruta'],
        'caracterizacion' => $datos['caracterizacion'],'intuicion' => $datos['intuicion'],'competencia'=>$datos['competencia']]);
    }

    /*public function setAsignaturas($datos) //las no sabemos los datos que van a ingresar, son variables
    {
        $query = "INSERT INTO 
        asignatura(Nombre_Asig,Nombre_Corto,Unidades,ID_Area_Aca,Creditos,Hrs_Clase,Hrs_Practicas,Hrs_Totales,Caracterizacion,Objetivos,Com_Especifica,Ruta_Descarga,ID_Cuat,Clave,Clave_Materia) 
        VALUES 
        ('?','?','?','?','?','?','?','?','?','?','?','?','?','?','?')";
        $smt =$this->cnx->prepare($query);
        $smt->execute(array($datos['Nombre_Asig'],$datos['Nombre_Corto'],$datos['Unidades'],$datos['ID_Area_Aca'],
        $datos['Creditos'],$datos['Hrs_Clase'],$datos['Hrs_Practicas'],$datos['Hrs_Totales'],$datos['Caracterizacion'],
        $datos['Objetivos'],$datos['Com_Especifica'],$datos['Ruta_Descarga'],$datos['ID_Cuat'],$datos['Clave'],$datos['Clave_Materia']));

        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAsignaturas($datos) //no sabemos qué asignatura van a pedir
    {
        $query = mysql_query("SELECT a.Clave_Materia,a.Nombre_Asig, a.Nombre_Corto, a.Creditos, a.Hrs_Clase, a.Hrs_Practicas, a.Hrs_Totales, p.Cod_Revision as 'Plan Academico', a.Unidades, a.Caracterizacion, a.Objetivos, a.Com_Especifica
        FROM asignatura as a
        INNER JOIN plan_de_estudio as p
        ON a.Clave = p.Clave
        WHERE a.Clave_Materia = '?'
        OR a.Nombre_Asig = '?'
        OR a.Nombre_Corto = '?'");
        $smt =$this->cnx->prepare($query);
        $smt->execute(array($datos['a.Clave_Materia'],$datos['a.Nombre_Asig'],$datos['a.Nombre_Corto']));
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateAsignaturas($datos){
        $query = mysql_query("UPDATE asignatura 
        SET Nombre_Asig = ?,Nombre_Corto = ?,Unidades = ?,ID_Area_Aca = ?,Creditos = ?,
        Hrs_Clase = ?,Hrs_Practicas = ?,Hrs_Totales = ?,Caracterizacion = ?,Objetivos = ?,
        Com_Especifica = ?,Ruta_Descarga = ?,ID_Cuat = ?,Clave = ?,Clave_Materia = ?
        WHERE Clave_Materia=$consulta['Clave_Materia']";
        $smt =$this->cnx->prepare($query);
        $smt->execute(array($datos['Nombre_Asig'],$datos['Nombre_Corto'],$datos['Unidades'],$datos['ID_Area_Aca'],
        $datos['Creditos'],$datos['Hrs_Clase'],$datos['Hrs_Practicas'],$datos['Hrs_Totales'],$datos['Caracterizacion'],
        $datos['Objetivos'],$datos['Com_Especifica'],$datos['Ruta_Descarga'],$datos['ID_Cuat'],$datos['Clave'],$datos['Clave_Materia']));
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }*/
}