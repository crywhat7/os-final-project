<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/mantenimiento.css">
  <title>Establos</title>
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
            <a class="nav-link" href="./ganado.php">Ganado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./alimentos.php">Alimentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Establos</a>
            <span class="visually-hidden">(current)</span>
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
                  <h5 class="modal-title" id="formularioModalLabel">Agregar establo</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <form action="../php/enviar-formulario-establo.php" method="post" id="new-element-form">
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Nombre:</label>
                      <input name="nombre" type="text" class="form-control" id="nombreInput">
                    </div>
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Capacidad:</label>
                      <input name="capacidad" type="number" class="form-control" id="nombreInput">
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
          <h4 class="card-title">Establos</h4>
          <div class="card-group alimentos-card-group">
          <?php
            @include("../php/conexion.php");
            if ($conexion) {
              $sql = "SELECT * FROM establos";
              $resultado = mysqli_query($conexion, $sql);
              // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
              // <li><a class="dropdown-item">Action</a></li>
              while ($establo = mysqli_fetch_assoc($resultado)) {
                echo <<<HTML
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">{$establo['nombre']}</h4>
                      <p class="card-text">
                        <img class="card-img" style="max-width: 10rem;" src="{$establo['imagen']}" alt="Imagen de establo">
                      </p>
                    </div>
                    <div class="card-footer text-muted">
                      <button class="btn btn-danger" onclick="deleteElement('establo',{$establo['codigo_establo']})">
                        <i class='fa-solid fa-trash'></i>
                      </button>
                    </div>
                  </div>
                  HTML;
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <section class="info-extra">
      <div class="card border-primary mb-3">
        <div class="card-header">¿Que son los establos?</div>
        <div class="card-body">
          <p class="card-text">
          Los establos son estructuras diseñadas para alojar y proteger a los animales, especialmente caballos, vacas, ovejas, cerdos, entre otros. Estos edificios deben proporcionar un espacio adecuado y seguro para que los animales se muevan, descansen y se alimenten. Aquí hay algunos detalles importantes sobre los establos para animales:
          </p>
          <p class="card-text">
          En resumen, los establos para animales son estructuras importantes para mantener a los animales seguros y cómodos. Deben diseñarse y construirse cuidadosamente para satisfacer las necesidades específicas de los animales alojados en ellos.
          </p>
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