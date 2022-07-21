<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;

if($_POST){
    $iva = $_POST["lstIva"];
    $precioSinIva = ($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"] : 0;
    $precioConIva = ($_POST["txtPrecioConIva"]) > 0? $_POST["txtPrecioConIva"] : 0; 

    if($precioSinIva > 0){
        $precioConIva = $precioSinIva * ($iva/100+1);
    }

    if($precioConIva > 0){
        $precioSinIva = $precioConIva / ($iva/100+1);
    }
    
    $ivaCantidad = $precioConIva - $precioSinIva;

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
    <title>Calcular iva</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form action="" method="post">                    
                    <div class="py-3">
                        <label for="">IVA    
                        <select class="form-control" id="lstIva" name="lstIva">
                            <option value="10.5">10.5</option>
                            <option value="19">19</option>
                            <option value="21" selected>21</option>
                            <option value="27">27</option>
                        </select>    
                        </label>    
                    </div>
                    <div class="py-3">
                        <label for="">Precio sin IVA</label>
                        <input type="text" class="form-control" id="txtPrecioConIva" name="txtPrecioConIva">
                    </div>
                    <div class="py-3">
                        <label for="">Precio con IVA</label>
                        <input type="text" class="form-control" id="txtPrecioSinIva" name="txtPrecioSinIva">
                    </div>
                    <div class="py-3">
                        <button class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-3 pt-5">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td>% <?php echo $iva; ?> </td>        
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td>$ <?php echo $precioConIva; ?></td>        
                    </tr><tr>
                        <th>Precio con IVA:</th>
                        <td>$ <?php echo $precioSinIva; ?></td>        
                    </tr><tr>
                        <th>IVA cantidad:</th>
                        <td>$ <?php echo $ivaCantidad; ?></td>        
                    </tr>
                </table>
            </div>    

        </div>



    </main> 
</body>
</html>