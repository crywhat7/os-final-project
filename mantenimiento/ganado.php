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
            <a class="nav-link active">Ganado
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./alimentos.php">Alimentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./establos.php">Establos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./productos.php">Productos</a>
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
                  <form action="../php/enviar-formulario-ganado.php" method="post" id="new-element-form">
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
                      <select class="form-control" name="establo_pertenece" id="establoInput">
                        <?php
                        @include("../php/conexion.php");
                        if ($conexion) {
                          $sql = "SELECT * FROM establos;";
                          $resultado = mysqli_query($conexion, $sql);
                          // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
                          // <li><a class="dropdown-item">Action</a></li>
                          while ($establo = mysqli_fetch_assoc($resultado)) {
                            echo <<<HTML
                            <option value="{$establo['codigo_establo']}">{$establo['nombre']}</option>
                            HTML;
                          }
                        }
                        ?>
                      </select>
                      <!-- <input name="establo_pertenece" type="number" class="form-control" id="establoInput"> -->
                    </div>
                    <div class="mb-3">
                      <label for="comidaInput" class="form-label">Su comida favorita:</label>
                      <select class="form-control" name="alimento_preferido" id="establoInput">
                        <?php
                        @include("../php/conexion.php");
                        if ($conexion) {
                          $sql = "SELECT * FROM alimentos;";
                          $resultado = mysqli_query($conexion, $sql);
                          // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
                          // <li><a class="dropdown-item">Action</a></li>
                          while ($alimento = mysqli_fetch_assoc($resultado)) {
                            echo <<<HTML
                            <option value="{$alimento['codigo_alimento']}">{$alimento['nombre']}</option>
                            HTML;
                          }
                        }
                        ?>
                      </select>
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
                  <button type="button" class="btn btn-success" onclick="enviarFormularioNewElement()">Enviar</button>
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
              <th>Alimento preferido</th>
              <th>Establo pertenece</th>
              <th class="text-center">Imagen</th>
              <th class="text-center">Eliminar</th>
            </tr>
            <?php
            @include("../php/conexion.php");
            if ($conexion) {
              $sql = "SELECT
              g.codigo_vaca,
              g.nombre,
              g.imagen,
              g.fecha_nacimiento,
              COALESCE ( a.nombre, 'SIN ALIMENTO' ) AS alimento_preferido,
              COALESCE ( e.nombre, 'SIN ESTABLO' ) AS establo_pertenece 
            FROM
              ganado g
              LEFT JOIN alimentos a ON a.codigo_alimento = g.alimento_preferido
              LEFT JOIN establos e ON e.codigo_establo = g.establo_pertenece;";
              $resultado = mysqli_query($conexion, $sql);
              // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
              // <li><a class="dropdown-item">Action</a></li>
              while ($vaca = mysqli_fetch_assoc($resultado)) {
                echo <<<HTML
                <tr>
                  <td>{$vaca['nombre']}</td>
                  <td>{$vaca['fecha_nacimiento']}</td>
                  <td>{$vaca['alimento_preferido']}</td>
                  <td>{$vaca['establo_pertenece']}</td>
                  <td class="row-image text-center">
                    <img src="{$vaca['imagen']}">
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-danger">
                      <i onclick="deleteElement('vaca',{$vaca['codigo_vaca']})" class='fa-solid fa-trash'></i>
                    </button>
                  </td>
                HTML;
              }
            }
            ?>
          </table>
        </div>
      </div>
    </section>
    <section class="info-extra">
      <div class="card border-primary mb-3">
        <div class="card-header">Razas</div>
        <div class="card-body info-extra-card-body">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Gyr</h4>
                <p class="card-text text-center">
                  <img src="./assets/gyr.png">
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Brahman</h4>
                <p class="card-text text-center">
                  <img src="./assets/brahman.png">
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Holstein</h4>
                <p class="card-text text-center">
                  <img src="./assets/holstein.png">
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Jersey</h4>
                <p class="card-text text-center">
                  <img src="./assets/jersey.png">
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Pardo Suizo</h4>
                <p class="card-text text-center">
                  <img src="./assets/pardo_suizo.png">
                </p>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Angus</h4>
                <p class="card-text text-center">
                  <img src="./assets/angus.png">
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ef2430d1e3.js" crossorigin="anonymous"></script>
  <script src="./js/script.js">

  </script>
</body>

</html>