<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) { //es postback?
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];
    
    if ($usuario != "" && $clave != "") {
        header("Location: acceso-confirmado.php");
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
        <div class="row">
            <div class="col-4">
                <?php if(isset($msg)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>                                       
                <?php endif; ?>            
                <form method="POST" action="index.php"> 
                    <div class="py-3">                      
                        <label for="">Usuario:</label>
                        <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                    </div>                
                    <div class="py-3">
                        <label for="">Clave:</label>
                        <input class="form-control" type="password" name="txtClave" id="txtClave">
                    </div>    
                    <div class="py-3">       
                        <button class="btn btn-primary" type="submit">INGRESAR</button>
                    </div>
                </form>
            </div>
        </div>    
    </main>    
</body>
</html>