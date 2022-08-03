<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si el archivo existe
if(file_exists("archivo.txt")){

    //leemos y almacenamos el contenido en jsonClientes en una variable
    $jsonClientes = file_get_contents("archivo.txt"); //almacenar
    //convertir jsonClientes en un array llamado aClientes 
    $aClientes = json_decode($jsonClientes, true);

} else { 
   //si no aClientes en un array vacio
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

if($_POST){
    $documento = trim($_POST["txtDocumento"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if($pos>=0){
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
            //Eliminar la imagen anterior
            if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
                unlink("imagenes/".$aClientes[$pos]["imagen"]);
            } 
        } else {
            //Mantener el nombreImagen que teniamos antes
            $nombreImagen = $aClientes[$pos]["imagen"];
        }
        //Actualizar
        $aClientes[$pos] = array("documento" => $documento,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen);

    } else {
        if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }
        //Insertar
        $aClientes[] = array("documento" => $documento,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen);
    }

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
   //Eliminar del array aClientes la posición a borrar unset()
    unset($aClientes[$pos]);

    //Convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
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
    <title>Registro de cientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form method="POST" enctype="multipart/form-data" action="" class="form">
                    <div class="py-2">
                        <label for="">Documento: *</label>
                        <input class="form-control" type="text" name="txtDocumento" id="txtDocumento" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <label for="">Nombre: *</label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <label for="">Teléfono: *</label>
                        <input class="form-control" type="tel" name="txtTelefono" id="txtTelefono" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <label for="">Correo: *</label>
                        <input class="form-control" type="email" name="txtCorreo" id="txtCorreo" require value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary" name="btnGuardar" id="btnGuardar" type="submit">Guardar</button>    
                    </div>
                    <div>
                        <label for="" class="font-size">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpej, png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpej, png</small>
                    </div>
                </form>
            </div>


            <div class="col-6">
                <table class="table table-hover border">
                    <thead>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente): ?>                        
                        <tr> 
                                                       
                            <td>
                                <?php if ($cliente["imagen"] != ""): ?>
                                    <img src="imagenes/<?php echo $cliente["imagen"]; ?>" alt="" class="img-thumbnail">
                                <?php endif; ?>
                            </td>   
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                            <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>