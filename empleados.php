<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] = array("dni" => "33300123", "nombre" => "David García", "bruto" => 85000.30);
$aEmpleados[] = array("dni" => "40874456", "nombre" => "Ana Del Valle", "bruto" => 90000);
$aEmpleados[] = array("dni" => "67567565", "nombre" => "Andrés Perez", "bruto" => 100000);
$aEmpleados[] = array("dni" => "75744545", "nombre" => "Victoria Luz", "bruto" => 70000);

function clacularNeto($bruto){
    return $bruto-($bruto*0.17);
}

//strtoupper

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Listado</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center pt-3">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-5">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        foreach ($aEmpleados as $empleados){                             
                        ?>
                        <tr>
                            <td><?php echo $empleados["dni"]; ?></td>
                            <td><?php echo $empleados["nombre"]; ?></td>                                                  
                            <td><?php echo clacularNeto(85000.30); ?></td>
                        </tr>
                        <?php
                        }                                          
                        ?>                       

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>