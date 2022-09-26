<?php

include_once "config.php";
include_once "entidades/usuario.php";

$pg = "Listado de usuarios";

$entidadUsuario = new Usuario();
$aUsuarios = $entidadUsuario->obtenerTodos();

include_once "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de usuarios</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($aUsuarios as $usuario): ?>
              <tr>
                  <td><?php echo $usuario->usuario; ?></td>
                  <td><?php echo $usuario->nombre; ?></td>
                  <td><?php echo $usuario->apellido; ?></td>
                  <td><?php echo $usuario->correo; ?></td>
                  <td style="width: 110px;">
                      <a href="usuario-formulario.php?id=<?php echo $usuario->idusuario; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg></a>
                  </td>
              </tr>
            <?php endforeach;?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>