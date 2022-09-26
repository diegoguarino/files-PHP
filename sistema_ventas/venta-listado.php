<?php

include_once "config.php";
include_once "entidades/venta.php";

$pg = "Listado de ventas";

$venta = new Venta();
$aVentas = $venta->cargarGrilla();

include_once("header.php"); 
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
          <div class="row">
              <div class="col-12 mb-3">
                  <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
              </div>
          </div>
          <table class="table table-hover border">
            <tr>
                <th style="width: 170px;">Fecha</th>
                <th style="width: 130px;">Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th style="width: 150px;">Total</th>
                <th style="width: 110px;">Acciones</th>
            </tr>
            <?php foreach ($aVentas as $venta): ?>
              <tr>
                  <td><?php echo date_format(date_create($venta->fecha), "d/m/Y H:m"); ?></td>
                  <td><?php echo $venta->cantidad; ?></td>
                  <td><a href="producto-formulario.php?id=<?php echo $venta->fk_idproducto; ?>"><?php echo $venta->nombre_producto; ?></a></td>
                  <td><a href="cliente-formulario.php?id=<?php echo $venta->fk_idcliente; ?>"><?php echo $venta->nombre_cliente; ?></a></td>
                  <td>$ <?php echo number_format($venta->total, 2, ',', '.'); ?></td>
                  <td>
                      <a href="venta-formulario.php?id=<?php echo $venta->idventa; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>   
                  </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>