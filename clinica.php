<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
);
$aPacientes[] = array(
    "dni" => "45.628.147",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 65
);
$aPacientes[] = array(
    "dni" => "54.162.241",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 75
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Clínica</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-4">
                <h1>Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <!-- <?php ?> -->
                    <tbody>
                    <?php
                    $contador=0;
                 // while ($contador<4){
                    for ($contador=0; $contador< count($aPacientes); $contador++ ){
                        
                    ?>
                        <tr>
                            <td><?php echo $aPacientes[$contador]["dni"];?></td>
                            <td><?php echo $aPacientes[$contador]["nombre"];?></td>
                            <td><?php echo $aPacientes[$contador]["edad"];?></td>
                            <td><?php echo $aPacientes[$contador]["peso"];?></td>
                        </tr>
                    <?php
                 // $contador++;
                    }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
























    </main>
</body>
</html>

