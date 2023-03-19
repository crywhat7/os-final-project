<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/mantenimiento.css">
  <title>Ganado</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mantenimiento</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Ganado
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Alimentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Establos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Clientes</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="contenido-principal">
    <section class="tabla">
      <div class="card border-primary mb-3">
        <div class="card-header">
          <h4>Tabla</h4>
          <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#formularioModal">+</button>
          <div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="formularioModalLabel"
            aria-hidden="true">
            <!--Formulario con modal -->
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formularioModalLabel">Agregar vaquita</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <form action="../php/enviar-formulario-ganado.php" method="post" id="formulario-new-vaca">
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Nombre:</label>
                      <input name="nombre" type="text" class="form-control" id="nombreInput">
                    </div>
                    <div class="mb-3">
                      <label for="emailInput" class="form-label">Fecha Nacimiento:</label>
                      <input name="fecha_nacimiento" type="date" class="form-control" id="dateInput">
                    </div>
                    <div class="mb-3">
                      <label for="establoInput" class="form-label">Pertece al establo:</label>
                      <input name="establo_pertenece" type="number" class="form-control" id="establoInput">
                    </div>
                    <div class="mb-3">
                      <label for="comidaInput" class="form-label">Su comida favorita:</label>
                      <input name="alimento_preferido" type="number" class="form-control" id="comidaInput">
                    </div>
                    <div class="mb-3">
                      <label for="imagenInput" class="form-label">Imagen</label>
                      <div class="mb-3">
                        <input name="imagen" type="text" class="form-control" id="imagenInput">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-success" onclick="enviarFormulario()">Enviar</button>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="card-body">
          <h4 class="card-title">Ganado</h4>
          <table class="table table-hover">
            <tr>
              <th>Nombre</th>
              <th>Nacimiento</th>
              <th>Imagen</th>
            </tr>
            <?php
            @include("../php/conexion.php");
            if ($conexion) {
              $sql = "SELECT * FROM ganado";
              $resultado = mysqli_query($conexion, $sql);
              // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
              // <li><a class="dropdown-item">Action</a></li>
              while ($vaca = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>{$vaca['nombre']}</td>";
                echo "<td>{$vaca['fecha_nacimiento']}</td>";
                echo "<td class='row-image text-center'>";
                echo "<img src='{$vaca['imagen']}'>";
                echo "</td>";
                echo "</tr>";
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section>
    <section class="tipo-ganado">
      <div class="card border-primary mb-3">
        <div class="card-header">Razas</div>
        <div class="card-body">Hola</div>
      </div>
    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="./js/script.js">

  </script>
</body>

</html>