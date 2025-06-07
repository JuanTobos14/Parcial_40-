<?php

include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/empleado.php';

use app\controllers\Empleados;

$empleados = new Empleados();
$emplea2= $empleados->queryAllEmpleados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h1>Lista de empleados</h1>
    <table>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>SALARIO BASE</th>
                    <th>COMISIÓN</th>
                    <th>SALARIO TOTAL</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= $order->get('id') ?></td>
                        <td><?= $order->get('nombre') ?></td>
                        <td><?= $order->get('salario_base') ?></td>
                        <td><?= $order->get('comision_pct') ?></td>
                        <td>
                            <?php if (!$order->get('anulada')): ?>
                                <a href="cancelOrder.php?id=<?= $order->get('id') ?>" onclick="return confirm('¿Estás seguro de que deseas anular esta orden?');">Anular Orden</a>
                            <?php else: ?>
                                <span>Orden Anulada</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <tbody>

        </tbody>
    </table>
    <a href="../Views/registro.html">Volver</a>
</body>
</html>
