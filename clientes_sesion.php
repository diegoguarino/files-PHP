<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"])){
    //Si existe la variable de session listadoClientes asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if($_POST){
    //Si hace click en Enviar entonces:
    //Asignamos en variables los datos que vienen del formulario
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    //Creamos un array que contendrá el listado de clientes
    $aClientes[] = array("nombre" => $nombre, 
                        "dni" => $dni,
                        "telefono" => $telefono,
                        "edad" => $edad
    );
    //Actualiza el contenido de variable de session
    $_SESSION["listadoClientes"] = $aClientes;

    //Si hace click en Eliminar:
    //session_destroy();

    //Agregar para eliminar una fila


}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form method="POST" action="" class="form">
                    <div class="py-2">
                        <label for="">Nombre:</label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese el nombre y apellido">
                    </div>
                    <div class="py-2">
                        <label for="">DNI:</label>
                        <input class="form-control" type="text" name="txtDni" id="txtDni" placeholder="Ingrese el número de documento">
                    </div>
                    <div class="py-2">
                        <label for="">Teléfono:</label>
                        <input class="form-control" type="tel" name="txtTelefono" id="txtTelefono" placeholder="Ingrese su número de télefono">
                    </div>
                    <div class="py-2">
                        <label for="">Edad:</label>
                        <input class="form-control" type="text" name="txtEdad" id="txtEdad" placeholder="Ingrese su edad">
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                        <button class="btn btn-danger" type="reset">Eliminar</button>
                    </div>
                </form>
            </div>


            <div class="col-6 offset-2">
                <table class="table table-hover border">
                    <thead>
                        <th>Nombre:</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente["nombre"];?> </td>
                            <td><?php echo $cliente["dni"];?> </td>
                            <td><?php echo $cliente["telefono"];?> </td>
                            <td><?php echo $cliente["edad"];?> </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>

</html>