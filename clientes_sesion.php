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
//pregunta si es post back sea para enviar o eliminar todos
if($_POST){

    if(isset($_POST["btnEnviar"])){
        //Si hace click en Enviar entonces:
        
        //Asignamos en variables los datos que vienen del formulario
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        //Creamos un array que contendrá el listado de clientes
        $aClientes[] = array("nombre" => $nombre, "dni" => $dni, "telefono" => $telefono, "edad" => $edad);

        //Actualiza el contenido de variable de session
        $_SESSION["listadoClientes"] = $aClientes;   
    }

    if(isset($_POST["btnEliminar"])){
    //Si hace click en Eliminar: 
    session_destroy();
    $aClientes = array();
    }  

}
//Agregar para eliminar una fila*/ 

//pregunta si viene pos en la query string
if(isset($_GET["pos"])){
    //recupero el dato que viene desde la query string via get
    $pos = $_GET["pos"];
    //elimina la posicion del array indicada
    unset($aClientes[$pos]);
    //Actualizo l avariable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}
   
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                        <input class="form-control" type="text" name="txtDni" id="txtDni">
                    </div>
                    <div class="py-2">
                        <label for="">Teléfono:</label>
                        <input class="form-control" type="tel" name="txtTelefono" id="txtTelefono">
                    </div>
                    <div class="py-2">
                        <label for="">Edad:</label>
                        <input class="form-control" type="text" name="txtEdad" id="txtEdad">
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary" name="btnEnviar" id="btnEnviar" type="submit">Enviar</button>
                        <button class="btn btn-danger" name="btnEliminar" id="btnEliminar" type="submit">Eliminar</button>
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
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td><?php echo $cliente["nombre"];?> </td>
                            <td><?php echo $cliente["dni"];?> </td>
                            <td><?php echo $cliente["telefono"];?> </td>
                            <td><?php echo $cliente["edad"];?> </td>
                            <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>

</html>
