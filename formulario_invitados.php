<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los DNIs permitidos
if(file_exists("invitados.text")){
    $archivo = fopen("invitados.text", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");
}else{
    //sino el array queda como un array vacio
    $aDocumentos = array();
}

    


if($_POST){

    if(isset($_POST["btnInvitado"])){
        $documento = $_REQUEST["txtDocumento"];
        //si el DNI ingresado se encuentra en la linea se mostrara un mensaje Bienvenido 
        if(in_array($documento, $aDocumentos)){
            $mensaje = "Bienvenido.";
        //sino un mensaje de No se encuentra la lista de invitados.
        } else{ 
            $mensaje = "No se encuentra en la lista de invitados.";
        }
    }

    if(isset($_POST["btnVip"])){
        $codigo = $_REQUEST["txtCodigo"];
        //si el codigo es "verde" entonces mostrará Su código de acceso es ....
        if($codigo == "verde"){
            $mensaje = "Su código de acceso es " . rand(1000,9999);
        
               
       } else{ //sino Ud. no tiene pase VIP
            $mensaje = "Ud. no tiene pase VIP";
       }
}

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
    <title>Lista de invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-2">
                <h1>Lista de invitados</h1>
            </div>
        </div>    
        <div class="row">
            <div class="col-12 py-2">
                <p>Complete el siguiente formulario:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="post" class="form">
                    <div class="alert alert-info" role="alert">
                    <?php echo $mensaje; ?>
                    </div>    
                    <div class="col-12 py-2">
                        <label for="" class="pb-2">Ingrese el DNI:</label>
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" require>
                        <button type="submit" name="btnInvitado" id="btnInvitado" class="btn btn-primary">Verificar invitado</button>
                    </div>

                    <div class="col-12 py-2">
                        <label for="" class="pb-2">Ingresa el código secreto para el pase VIP:</label>
                        <input type="password" name="txtCodigo" id="txtCodigo" class="form-control" require>
                        <button type="submit" name="btnVip" id="btnVip" class="btn btn-primary">Verificar código</button>
                    </div>

                </form>
            </div>
        </div>

    </main>
</body>
</html>

