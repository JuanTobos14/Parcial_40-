<?php

namespace app\models\entities;

use app\models\drivers\ConexDB;

class Empleado extends Entity {
    protected $id=null;
    protected $nombre="";
    protected $salario=null;
    protected $comision=null;

    public function all(){
        $sql="select * from empleados";
        $conex = new ConexDB();
        $resultDb = $conex->execSQL($sql);
        $empleados = [];

        if ($resultDb->num_rows > 0) {
            while ($rowDb = $resultDb->fetch_assoc()) {
                $empleado = new Empleado();
                $empleado->set('id', $rowDb['id']);
                $empleado->set('nombre', $rowDb['nombre']);
                $empleado->set('salario_base', $rowDb['salior_base']);
                $empleado->set('comision_pct', $rowDb['comision_pct']);
                array_push($empelados, $empleado);
            }
        }

        $conex->close();
        return $empleados;
    }

    function save(){
        $sql="insert into empleados (nombre, salario_base, comision_pct)";
        $sql .= " values ('{$this->nombre}', '{$this->salario}', '{$this->comision}')";
        $conex=new ConexDB();
        $result=$conex->execSQL($sql);

        if ($result) {
            $idResult = $conex->execSQL("SELECT LAST_INSERT_ID() AS id");
            $row = $idResult->fetch_assoc();
            $this->id = $row['id'];
        }
        
        $conex->close();
        return $result;
    }
}