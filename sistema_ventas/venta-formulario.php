<?php

include_once("config.php");
include_once "header.php";
?>

<main>
    <div class="container-fluid">
                
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-800">Venta</h1>
                <?php if (isset($msg)): ?>
            </div>        
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <div class="row">
                <div class="col-12 mb-3">
                    <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            
            
                
                    <div class="row">
                        <div class="col-1 p-1">
                            <label for="lstDia"></label>
                            <select  required class="form-control" name="lstTipoDeProducto" id="lstTipoDeProducto">
                                <option disabled="" selected="">DD</option>
                            </select>                               
                        </div>
                        <div class="col-1 p-1">
                            <label for="lstNumeroDia"></label>
                            <select  required class="form-control" name="lstNumeroDia" id="lstNumeroDia">
                                <option disabled="" selected="">1</option>
                            </select>                               
                        </div>
                        <div class="col-1 p-1">
                            <label for="lstano"></label>
                            <select  required class="form-control" name="lstano" id="lstano">
                                <option disabled="" selected="">YYYY</option>
                            </select>                               
                        </div>
                        <div class="col-1 p-1">
                            <label for="txtHora"></label>
                            <input type="time" required class="form-control" name="txtHora" id="txtHora">
                            </select>                               
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="txtCliente">Cliente:</label>
                            <input type="text" required class="form-control selectpicker" name="txtCliente" id="txtCliente" value="">
                        </div>
                        <div class="col-6 form-group">
                            <label for="txtProducto">Producto:</label>
                            <input type="text" required class="form-control selectpicker" name="txtProducto" id="txtProducto" value="">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="txtCliente">Precio unitario:</label>
                            <input type="number" required disabled class="form-control selectpicker" name="txtCliente" id="txtCliente" value="" placeholder="$0">
                        </div>
                        <div class="col-6 form-group">
                            <label for="txtCantidad">Cantidad:</label>
                            <input type="number" required class="form-control selectpicker" name="txtCantidad" id="txtCantidad" value="" placeholder="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="txtTotal">Total:</label>
                            <input type="number" required class="form-control selectpicker" name="txtTotal" id="txtTotal" value="" placeholder="0">
                        </div>
                    </div>        
                </div>        



                            
        </div>             
    </div>
</div>               




</main>