<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("America/Argentina/Buenos_Aires");


$nombre = "Diego Guarino";
$edad = 32;
$aPeliculas = array("Underworld", "El día después de mañana", "Titanic");

//$aPeliculas = ["Volver al futuro", "Titanic", "El día después de mañana"]; //Otra forma




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha Personal</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Fecha:</td>
                        <td><?php echo date("d/m/Y"); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre y apellido</td>
                        <td><?php echo "$nombre"; ?></td>
                    </tr>
                    <tr>
                        <th>Edad</td>
                        <td><?php echo "$edad"; ?></td>
                    </tr>
                    <tr>
                        <th>Película favoritas</td>
                        <td><?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas[1]; ?><br>
                            <?php echo $aPeliculas[2]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>