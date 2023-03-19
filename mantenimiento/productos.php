<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/mantenimiento.css">
  <title>Productos</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <!-- Boton de regresar a la store -->
      <button class="btn btn-primary mr-2" onclick="window.location.href='../store/'">
        <i class="fa-solid fa-shop"></i>
      </button>
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
            <a class="nav-link" href="./establos.php">Establos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Productos</a>
            <span class="visually-hidden">(current)</span>
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
                  <h5 class="modal-title" id="formularioModalLabel">Agregar producto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                  <form action="../php/enviar-formulario-producto.php" method="post" id="new-element-form">
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Nombre:</label>
                      <input name="nombre" type="text" class="form-control" id="nombreInput">
                    </div>
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Categoria:</label>
                      <select class="form-control" name="tipo_producto" id="establoInput">
                        <?php
                        @include("../php/conexion.php");
                        if ($conexion) {
                          $sql = "SELECT * FROM tipo_producto;";
                          $resultado = mysqli_query($conexion, $sql);
                          // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
                          // <li><a class="dropdown-item">Action</a></li>
                          while ($tipo = mysqli_fetch_assoc($resultado)) {
                            echo <<<HTML
                            <option value="{$tipo['id_tipo']}">{$tipo['descripcion']}</option>
                            HTML;
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="nombreInput" class="form-label">Precio:</label>
                      <input name="precio" type="number" step="-1" class="form-control" id="nombreInput">
                    </div>
                    <div class="mb-3">
                      <label for="imagenInput" class="form-label">Imagen:</label>
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
          <h4 class="card-title">Alimentos</h4>
          <div class="card-group alimentos-card-group">
          <?php
            @include("../php/conexion.php");
            if ($conexion) {
              $sql = "SELECT * FROM productos p LEFT JOIN tipo_producto tp ON tp.id_tipo = p.tipo_producto";
              $resultado = mysqli_query($conexion, $sql);
              // Necesito que me itere sobre los datos de la consulte y me imprima en la lista.
              // <li><a class="dropdown-item">Action</a></li>
              while ($producto = mysqli_fetch_assoc($resultado)) {
                echo <<<HTML
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">{$producto['nombre_producto']}</h4>
                      <p class="card-text">
                        <img class="card-img" style="max-width: 10rem;" src="{$producto['imagen']}" alt="Imagen de producto">
                      </p>
                      <p class="card-text">
                        <b>Tipo:</b> {$producto['descripcion']}
                        <br/>
                        <b>Precio:</b> L {$producto['precio']} 

                      </p>
                    </div>
                    <div class="card-footer text-muted">
                      <button class="btn btn-danger" onclick="deleteElement('producto',{$producto['codigo_producto']})">
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
        <div class="card-header">Productos derivados de la vaca</div>
        <div class="card-body">
          <p>Los productos derivados de la vaca son de gran importancia para la economía y la alimentación de muchas sociedades alrededor del mundo. La carne de vaca es una fuente importante de proteínas y nutrientes, mientras que la leche de vaca es utilizada para producir una amplia variedad de productos lácteos. Además, la piel de la vaca se utiliza para fabricar cuero, y los huesos y tejidos conectivos de la vaca son utilizados para producir gelatina y otros productos.</p>
          <p>Otras aplicaciones de los productos derivados de la vaca incluyen su uso como fertilizantes para la agricultura, y la producción de biocombustibles utilizando el estiércol de vaca. En muchas partes del mundo, la vaca también tiene un importante valor cultural y religioso, y es considerada un animal sagrado en algunas religiones.</p>
          <ul>
            <li>Carne</li>
            <li>Leche</li>
            <li>Cuero</li>
            <li>Gelatina</li>
            <li>Caldo</li>
            <li>Fertilizantes</li>
            <li>Combustible</li>
          </ul>
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