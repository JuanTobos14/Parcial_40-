<?php

namespace app\controllers;

use app\models\drivers\ConexDB;
use app\models\entities\Empleado;

class Empleados {

    public function queryAllEmpleados(){
        $db = new ConexDB();
        $sql = all();
        $result = $db->execSQL($sql);

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $empleado = new Empleado();
            $empleado->set('id', $rowDb['id']);
            $empleado->set('salario_base', $rowDb['salior_base']);
            $empleado->set('comision_pct', $rowDb['comision_pct']);
            $empleado->set('nombre', $rowDb['nombre']);
            $empleados[] = $empleado;
        }

        return $orders;

    }

    private function saveEmpleado($request){
        $empleado=new Empleado();
        $empleado->set('')
    }
}