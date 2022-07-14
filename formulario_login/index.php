<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $usuario = $_POST("txtUsuario");
    $clave = $_POST("txtClave");

    if ($usuario == "admin" && $clave == "123456") {
        header("Location: http://localhost/php/formulario_login/acceso-confirmado.php");
    }else {
        $msg = "Únicamente valido para usuarios registrados";
    }

}

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
            <div class="col-12 py-4">
                <h1>Formulario</h1>
            </div>
        </div>
        <form class="form" method="POST" action="index.php">
            <div class="row">
                <div class="col-2 py-2">
                    <label for="txtUsuario">Usuario:</label>
                    <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                </div>
            </div>
            <div class="row">
                <div class="col-2 py-2">
                    <label for="txtClave">Clave:</label>
                    <input class="form-control" type="password" name="txtClave" id="txtClave">
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-2">
                    <button class="btn btn-primary" type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    

    </main>
    
</body>
</html>