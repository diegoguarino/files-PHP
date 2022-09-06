<?php

include_once("config.php");
include_once "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
          <?php if (isset($msg)): ?>
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
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="">
                </div>
                <div class="col-6 form-group mt-2">
                    <label for="lstTipoDeProducto"></label>
                    <select  required class="form-control" name="lstTipoDeProducto" id="lstTipoDeProducto">
                        <option disabled selected>Seleccionar</option>
                        <option value="">Librería</option>
                        <option value="">Informática</option>
                        <option value="">Muebles</option>
                        <option value="">Bazar</option>
                        <option value="">Electrodomésticos</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="text" required class="form-control" name="txtCantidad" id="txtCantidad" value="">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="number" required class="form-control" name="txtPrecio" id="txtPrecio" value="" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="txtDescripcion">Descripción:</label>
                    <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="2"></textarea>
                </div>               
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="fileProducto">Imagen:</label><br>                    
                    <input type="file" name="fileProducto" id="fileProducto" value="">                                                       
                </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>


</script>
<?php include_once "footer.php";?>